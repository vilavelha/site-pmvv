<?php

class CkHelper extends AppHelper {

    public $helpers = array('Html');

    public function load($id, $option = array()) {
        $did = Inflector::classify(strtr($id, '.', '_'));

        $altura = CKEDITOR_ALTURA;
        if (isset($option['width'])) {
            $largura = $option['width'];
        }
        if (isset($option['height'])) {
            $altura = $option['height'];
        }

        $code = $this->Html->scriptBlock("
                var ckId = '{$did}';
                var ckHeight = {$altura};
                CKEDITOR.replace( ckId, {
                    filebrowserBrowseUrl      : webroot + 'js/ckfinder/ckfinder.html',
                    filebrowserImageBrowseUrl : webroot + 'js/ckfinder/ckfinder.html?type=Images',
                    filebrowserFlashBrowseUrl : webroot + 'js/ckfinder/ckfinder.html?type=Flash',
                    filebrowserUploadUrl      : webroot + 'js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                    height                    : ckHeight
                });
                ", array('inline' => true));
        return $code;
    }

}

?>
