<?php

class FormatComponent extends Component {

    public function dateTimeToMySQL($data) {
        $formato = '%d/%m/%Y %H:%M';
        $dataQuebrada = strptime($data, $formato);
        if($dataQuebrada) {
            $dataUnix = mktime($dataQuebrada['tm_hour'], $dataQuebrada['tm_min'], $dataQuebrada['tm_sec'], $dataQuebrada['tm_mon'] + 1, $dataQuebrada['tm_mday'], ($dataQuebrada['tm_year'] + 1900));
            return date('Y-m-d H:i:s', $dataUnix);
        }
        return null;
    }

    public function dateTimeToBR($data, $format = 'd/m/Y H:i') {
        $dataZero = '0000-00-00 00:00:00';
        if($data && $data != $dataZero) {
            return date($format, strtotime($data));
        }
        return '';
    }

    public function dateToMySQL($data) {
        $formato = '%d/%m/%Y';
        $dataQuebrada = strptime($data, $formato);
        if($dataQuebrada) {
            $dataUnix = mktime($dataQuebrada['tm_hour'], $dataQuebrada['tm_min'], $dataQuebrada['tm_sec'], $dataQuebrada['tm_mon'] + 1, $dataQuebrada['tm_mday'], ($dataQuebrada['tm_year'] + 1900));
            return date('Y-m-d', $dataUnix);
        }
        return null;
    }

    public function dateToBR($data, $format = 'd/m/Y') {
        $dataZero = '0000-00-00';
        if($data && $data != $dataZero) {
            return date($format, strtotime($data));
        }
        return '';
    }
}
