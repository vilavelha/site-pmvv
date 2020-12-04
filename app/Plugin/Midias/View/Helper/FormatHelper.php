<?php


class FormatHelper extends AppHelper {
    
    public $helpers = array('Time');

    public function boolean($valor) {
        return ($valor) ? __('Sim', true) : __('Não', true);
    }

    public function date($data, $format = 'd/m/Y \à\s H:i\h') {
        $dataZero = '0000-00-00 00:00:00';
        if ($data && $data != $dataZero) {
            return $this->Time->format($format, $data);
        }
        return '';
    }

}

?>
