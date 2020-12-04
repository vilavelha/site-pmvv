<?php

class MidiasAppController extends AppController {

    public function beforeFilter() {
        $this->layout = 'admin';
        if ($this->Session->read('Auth.User.Group.id') == 4) {
            $this->Auth->allow();
        }
    }

    public function isImage($str) {
        $extensoes = array(
            'jpg',
            'jpeg',
            'gif',
            'png'
        );
        if (in_array($this->getExtension($str), $extensoes)) {
            return true;
        }
        return false;
    }

    public function getExtension($str) {
        $i = strrpos($str, ".");
        if (!$i) {
            return "";
        }
        $l = strlen($str) - $i;
        $ext = substr($str, $i + 1, $l);
        return strtolower($ext);
    }

}

?>