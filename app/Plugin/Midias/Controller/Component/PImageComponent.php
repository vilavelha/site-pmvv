<?php

class PImageComponent extends Component {
    /*
     * PImageComponent: component to resize or crop images 
     * @author: Wendy Perkins aka The Perkster
     * @website: http://www.perksterdesigns.com/  - Probably still not up to par
     * @license: MIT
     * @version: 0.8.3.1
     */

    /*
     * @param $cType - the conversion type: resize (default), resizeCrop (square), crop (from center) 
     * @param $id - image filename
     * @param $imgFolder  - the folder where the image is
     * @param $newName - include extension (if desired)
     * @param $newWidth - the  max width or crop width
     * @param $newHeight - the max height or crop height
     * @param $quality - the quality of the image
     * @param $bgcolor - this was from a previous option that was removed, but required for backward compatibility
     */

    public function resizeImage($cType = 'resize', $id, $imgFolder, $newName = false, $newWidth = false, $newHeight = false, $quality = 75, $bgcolor = false) {
        $img = $imgFolder . $id;

        list($oldWidth, $oldHeight, $type) = getimagesize($img);
        $ext = $this->image_type_to_extension($type);
        //check to make sure that the file is writeable, if so, create destination image (temp image)
        if (is_writeable($imgFolder)) {
            if ($newName) {
                $dest = $imgFolder . $newName;
            } else {
                $dest = $imgFolder . 'tmp_' . $id;
            }
        } else {
            //if not let developer know
            $imgFolder = substr($imgFolder, 0, strlen($imgFolder) - 1);
            $imgFolder = substr($imgFolder, strrpos($imgFolder, '\\') + 1, 20);
            debug("You must allow proper permissions for image processing. And the folder has to be writable.");
            debug("Run \"chmod 777 on '$imgFolder' folder\"");
            exit();
        }

        //check to make sure that something is requested, otherwise there is nothing to resize.
        //although, could create option for quality only
        if ($newWidth OR $newHeight) {
            /*
             * check to make sure temp file doesn't exist from a mistake or system hang up.
             * If so delete.
             */
            if (file_exists($dest)) {
                unlink($dest);
            } else {
                switch ($cType) {
                    default:
                    case 'resize':
                        # Maintains the aspect ration of the image and makes sure that it fits
                        # within the maxW(newWidth) and maxH(newHeight) (thus some side will be smaller)
                        $widthScale = 2;
                        $heightScale = 2;
                        if ($newWidth) {
                            //acerto pra corte dentro da caixa
                            //if ($newWidth < $oldWidth)
                            if ($newWidth > $oldWidth)
                                $newWidth = $oldWidth;
                            $widthScale = $newWidth / $oldWidth;
                        }
                        if ($newHeight) {
                            //acerto pra corte dentro da caixa
                            //if ($newHeight < $oldHeight)
                            if ($newHeight > $oldHeight)
                                $newHeight = $oldHeight;
                            $heightScale = $newHeight / $oldHeight;
                        }
                        //debug("W: $widthScale  H: $heightScale<br>");
                        if ($widthScale < $heightScale) {
                            $maxWidth = $newWidth;
                            $maxHeight = false;
                        } elseif ($widthScale > $heightScale) {
                            $maxHeight = $newHeight;
                            $maxWidth = false;
                        } else {
                            $maxHeight = $newHeight;
                            $maxWidth = $newWidth;
                        }

                        if ($maxWidth > $maxHeight) {
                            $applyWidth = $maxWidth;
                            $applyHeight = ($oldHeight * $applyWidth) / $oldWidth;
                        } elseif ($maxHeight > $maxWidth) {
                            $applyHeight = $maxHeight;
                            $applyWidth = ($applyHeight * $oldWidth) / $oldHeight;
                        } else {
                            $applyWidth = $maxWidth;
                            $applyHeight = $maxHeight;
                        }

                        if ($applyHeight < $newHeight) {
                            $applyHeight = $newHeight;
                            $applyWidth = ($applyHeight * $oldWidth) / $oldHeight;
                        }

                        if ($applyWidth < $newWidth) {
                            $applyWidth = $newWidth;
                            $applyHeight = ($oldHeight * $applyWidth) / $oldWidth;
                        }
                        //debug("mW: $maxWidth mH: $maxHeight<br>");
                        //debug("aW: $applyWidth aH: $applyHeight<br>");
                        $startX = 0;
                        $startY = 0;
                        //exit();
                        break;
                    case 'resizeCrop':
                        // -- resize to max, then crop to center

                        if ($newWidth > $oldWidth)
                            $newWidth = $oldWidth;
                        $ratioX = $newWidth / $oldWidth;
                        if ($newHeight > $oldHeight)
                            $newHeight = $oldHeight;
                        $ratioY = $newHeight / $oldHeight;

                        if ($ratioX < $ratioY) {
                            $startX = round(($oldWidth - ($newWidth / $ratioY)) / 2);
                            $startY = 0;
                            $oldWidth = round($newWidth / $ratioY);
                            $oldHeight = $oldHeight;
                        } else {
                            $startX = 0;
                            $startY = round(($oldHeight - ($newHeight / $ratioX)) / 2);
                            $oldWidth = $oldWidth;
                            $oldHeight = round($newHeight / $ratioX);
                        }
                        $applyWidth = $newWidth;
                        $applyHeight = $newHeight;
                        break;
                    case 'crop':
                        // -- a straight centered crop
                        $startY = ($oldHeight - $newHeight) / 2;
                        $startX = ($oldWidth - $newWidth) / 2;
                        $oldHeight = $newHeight;
                        $applyHeight = $newHeight;
                        $oldWidth = $newWidth;
                        $applyWidth = $newWidth;
                        break;
                }

                $newImage = imagecreatetruecolor($applyWidth, $applyHeight);

                switch ($ext) {
                    case 'gif' :
                        $oldImage = imagecreatefromgif($img);
                        break;
                    case 'png' :
                        $oldImage = imagecreatefrompng($img);
                        imagealphablending($newImage, false);
                        break;
                    case 'jpg' :
                    case 'jpeg' :
                        $oldImage = imagecreatefromjpeg($img);
                        break;
                    default :
                        //image type is not a possible option
                        return false;
                        break;
                }

                //create new image

                if ($bgcolor):
                    //set up background color for new image
                    sscanf($bgcolor, "%2x%2x%2x", $red, $green, $blue);
                    $newColor = ImageColorAllocate($newImage, $red, $green, $blue);
                    imagefill($newImage, 0, 0, $newColor);
                endif;

                //put old image on top of new image
                imagecopyresampled($newImage, $oldImage, 0, 0, $startX, $startY, $applyWidth, $applyHeight, $oldWidth, $oldHeight);
                //chmod($imgFolder . $id, 0777);
                switch ($ext) {
                    case 'gif' :
                        imagegif($newImage, $dest, $quality);
                        break;
                    case 'png' :
                        imagesavealpha($newImage, true);
                        imagepng($newImage, $dest, round(($quality / 10) - 1));
                        break;
                    case 'jpg' :
                    case 'jpeg' :
                        imagejpeg($newImage, $dest, $quality);
                        break;
                    default :
                        return false;
                        break;
                }

                imagedestroy($newImage);
                imagedestroy($oldImage);

                if (!$newName) {
                    unlink($img);
                    rename($dest, $img);
                }

                return true;
            }
        } else {
            return false;
        }
    }

    public function resizeImageNovo($cType = 'resize', $id, $imgFolder, $newName = false, $newWidth = false, $newHeight = false, $quality = 75, $bgcolor = false, $limitW = false) {
        ini_set('memory_limit', '512M');
        $img = $imgFolder . $id;

        list($oldWidth, $oldHeight, $type) = getimagesize($img);
        $ext = $this->image_type_to_extension($type);
        //check to make sure that the file is writeable, if so, create destination image (temp image)
        if (is_writeable($imgFolder)) {
            if ($newName) {
                $dest = $imgFolder . $newName;
            } else {
                $dest = $imgFolder . 'tmp_' . $id;
            }
        } else {
            //if not let developer know
            $imgFolder = substr($imgFolder, 0, strlen($imgFolder) - 1);
            $imgFolder = substr($imgFolder, strrpos($imgFolder, '\\') + 1, 20);
            debug("You must allow proper permissions for image processing. And the folder has to be writable.");
            debug("Run \"chmod 777 on '$imgFolder' folder\"");
            exit();
        }

        //check to make sure that something is requested, otherwise there is nothing to resize.
        //although, could create option for quality only

        if ($newWidth OR $newHeight) {
            /*
             * check to make sure temp file doesn't exist from a mistake or system hang up.
             * If so delete.
             */
            if (file_exists($dest)) {
                unlink($dest);
            } else {
                switch ($cType) {
                    default:
                    case 'resize':
                        # Maintains the aspect ration of the image and makes sure that it fits
                        # within the maxW(newWidth) and maxH(newHeight) (thus some side will be smaller)
                        $widthScale = 2;
                        $heightScale = 2;
                        if ($newWidth) {
                            //acerto pra corte dentro da caixa
                            if ($newWidth < $limitW)
                                $newWidth = $limitW;
                            $widthScale = $newWidth / $oldWidth;
                        }
                        
                        if ($newHeight) {
                            //acerto pra corte dentro da caixa
                            if ($newHeight < $oldHeight)
                                $newHeight = $oldHeight;
                            $heightScale = $newHeight / $oldHeight;
                        }
                        //debug("W: $widthScale  H: $heightScale<br>");
                        if ($widthScale < $heightScale) {
                            $maxWidth = $newWidth;
                            $maxHeight = false;
                        } elseif ($widthScale > $heightScale) {
                            $maxHeight = $newHeight;
                            $maxWidth = false;
                        } else {
                            $maxHeight = $newHeight;
                            $maxWidth = $newWidth;
                        }

                        if ($maxWidth > $maxHeight) {
                            $applyWidth = $maxWidth;
                            $applyHeight = ($oldHeight * $applyWidth) / $oldWidth;
                        } elseif ($maxHeight > $maxWidth) {
                            $applyHeight = $maxHeight;
                            $applyWidth = ($applyHeight * $oldWidth) / $oldHeight;
                        } else {
                            $applyWidth = $maxWidth;
                            $applyHeight = $maxHeight;
                        }

                        if ($applyHeight < $newHeight) {
                            $applyHeight = $newHeight;
                            $applyWidth = ($applyHeight * $oldWidth) / $oldHeight;
                        }

                        if ($applyWidth < $newWidth) {
                            $applyWidth = $newWidth;
                            $applyHeight = ($oldHeight * $applyWidth) / $oldWidth;
                        }
                        //debug("mW: $maxWidth mH: $maxHeight<br>");
                        //debug("aW: $applyWidth aH: $applyHeight<br>");
                        $startX = 0;
                        $startY = 0;
                        //exit();
                        break;
                    case 'resizeCrop':
                        // -- resize to max, then crop to center

                        if ($newWidth > $oldWidth)
                            $newWidth = $oldWidth;
                        $ratioX = $newWidth / $oldWidth;
                        if ($newHeight > $oldHeight)
                            $newHeight = $oldHeight;
                        $ratioY = $newHeight / $oldHeight;

                        if ($ratioX < $ratioY) {
                            $startX = round(($oldWidth - ($newWidth / $ratioY)) / 2);
                            $startY = 0;
                            $oldWidth = round($newWidth / $ratioY);
                            $oldHeight = $oldHeight;
                        } else {
                            $startX = 0;
                            $startY = round(($oldHeight - ($newHeight / $ratioX)) / 2);
                            $oldWidth = $oldWidth;
                            $oldHeight = round($newHeight / $ratioX);
                        }
                        $applyWidth = $newWidth;
                        $applyHeight = $newHeight;
                        break;
                    case 'crop':
                        // -- a straight centered crop
                        $startY = ($oldHeight - $newHeight) / 2;
                        $startX = ($oldWidth - $newWidth) / 2;
                        $oldHeight = $newHeight;
                        $applyHeight = $newHeight;
                        $oldWidth = $newWidth;
                        $applyWidth = $newWidth;
                        break;
                }
                
                $newImage = imagecreatetruecolor($applyWidth, $applyHeight);

                switch ($ext) {
                    case 'gif' :
                        $oldImage = imagecreatefromgif($img);
                        break;
                    case 'png' :
                        $oldImage = imagecreatefrompng($img);
                        imagealphablending($newImage, false);
                        break;
                    case 'jpg' :
                    case 'jpeg' :
                        $oldImage = imagecreatefromjpeg($img);
                        break;
                    default :
                        //image type is not a possible option
                        return false;
                        break;
                }

                //create new image

                if ($bgcolor):
                    //set up background color for new image
                    sscanf($bgcolor, "%2x%2x%2x", $red, $green, $blue);
                    $newColor = ImageColorAllocate($newImage, $red, $green, $blue);
                    imagefill($newImage, 0, 0, $newColor);
                endif;

                //put old image on top of new image
                imagecopyresampled($newImage, $oldImage, 0, 0, $startX, $startY, $applyWidth, $applyHeight, $oldWidth, $oldHeight);
                //chmod($imgFolder . $id, 0777);
                switch ($ext) {
                    case 'gif' :
                        imagegif($newImage, $dest, $quality);
                        break;
                    case 'png' :
                        imagesavealpha($newImage, true);
                        imagepng($newImage, $dest, round(($quality / 10) - 1));
                        break;
                    case 'jpg' :
                    case 'jpeg' :
                        imagejpeg($newImage, $dest, $quality);
                        break;
                    default :
                        return false;
                        break;
                }

                imagedestroy($newImage);
                imagedestroy($oldImage);

                if (!$newName) {
                    unlink($img);
                    rename($dest, $img);
                }

                return true;
            }
        } else {
            return false;
        }
    }

    public function image_type_to_extension($imagetype) {
        if (empty($imagetype))
            return false;
        switch ($imagetype) {
            case IMAGETYPE_GIF : return 'gif';
            case IMAGETYPE_JPEG : return 'jpg';
            case IMAGETYPE_PNG : return 'png';
            case IMAGETYPE_SWF : return 'swf';
            case IMAGETYPE_PSD : return 'psd';
            case IMAGETYPE_BMP : return 'bmp';
            case IMAGETYPE_TIFF_II : return 'tiff';
            case IMAGETYPE_TIFF_MM : return 'tiff';
            case IMAGETYPE_JPC : return 'jpc';
            case IMAGETYPE_JP2 : return 'jp2';
            case IMAGETYPE_JPX : return 'jpf';
            case IMAGETYPE_JB2 : return 'jb2';
            case IMAGETYPE_SWC : return 'swc';
            case IMAGETYPE_IFF : return 'aiff';
            case IMAGETYPE_WBMP : return 'wbmp';
            case IMAGETYPE_XBM : return 'xbm';
            default : return false;
        }
    }

}

?>