<?php

class ImComponent extends Component {

    public function resize($newName, $imgFolder, $newWidth=false, $newHeight=false, $bgcolor = false) {
        $img = $imgFolder . $newName;
        $quality = 95;
        if ($newWidth OR $newHeight) {

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

            list($oldWidth, $oldHeight, $type) = getimagesize($img);

            $widthScale = 2;
            $heightScale = 2;

            if ($newWidth) {
                if ($newWidth > $oldWidth)
                    $newWidth = $oldWidth;
                $widthScale = $newWidth / $oldWidth;
            }
            if ($newHeight) {
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
            
            $newImage = imagecreatetruecolor($applyWidth, $applyHeight);
            $oldImage = imagecreatefromjpeg($img);

            imagecopyresampled($newImage, $oldImage, 0, 0, 0, 0, $applyWidth, $applyHeight, $oldWidth, $oldHeight);
            imagejpeg($newImage, $dest, $quality);

            imagedestroy($newImage);
            imagedestroy($oldImage);

            if (!$newName) {
                unlink($img);
                rename($dest, $img);
            }

            return true;
        } else {
            return false;
        }
    }

}

?>