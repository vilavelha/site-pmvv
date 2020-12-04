<?php


class UtilsHelper extends AppHelper {

    public $helpers = array('Html');

    public function linkMidia($midia) {
        if (!is_array($midia)) {
            return $midia;
        }
        $link = '';
        $nome = DOMAIN_FULL . $this->webroot . MIDIA_URI . '/' . $midia['pasta'] . '/' . $midia['arquivo'];
        if ($this->tipoArquivo($midia['arquivo']) == MIDIA_IMAGENS) {
            $link = $this->Html->link(
                    $nome, '/' . MIDIA_URI . '/' . $midia['pasta'] . '/' . $midia['arquivo'], array('title' => 'Clique para ver', 'class' => 'midia')
            );
        } else {
            $link = $this->Html->link(
                    $nome, array(
                'controller' => 'midias',
                'action' => 'download',
                substr(DS, SEPARADOR, $midia['pasta']),
                $midia['arquivo']
                    ), array('title' => 'Clique para baixar')
            );
        }
        return $link;
    }

    public function linkImagemMidia($midia, $options = array()) {
        if (!is_array($midia)) {
            return $midia;
        }
        $link = '';
        $nome = DOMAIN_FULL . $this->webroot . MIDIA_URI . '/' . $midia['pasta'] . '/' . $midia['arquivo'];
        if ($this->tipoArquivo($midia['arquivo']) == MIDIA_IMAGENS) {
            $link = $this->Html->link(
                    $this->imagemMidia($midia, $options), '/' . MIDIA_URI . '/' . $midia['pasta'] . '/' . $midia['arquivo'], array('escape' => false, 'title' => 'Clique para ver', 'class' => 'midia')
            );
        } else {
            $link = $this->Html->link(
                    $nome, array(
                'controller' => 'midias',
                'action' => 'download',
                substr(DS, SEPARADOR, $midia['pasta']),
                $midia['arquivo']
                    ), array('title' => 'Clique para baixar')
            );
        }
        return $link;
    }

    public function imagemMidia($midia, $options = array()) {
        $titulo = $midia['nome'];
        if (!empty($midia['autor'])) {
            $titulo .= ' - Imagem: ' . $midia['autor'];
        }

        $options = array_merge(
                array(
            'alt' => $titulo,
            'title' => $titulo
                ), $options);
        return $this->Html->image('/' . MIDIA_URI . '/' . $midia['pasta'] . '/' . $midia['arquivo'], $options);
    }

    public function urlMidia($midia) {
        return DOMAIN_FULL . $this->webroot . MIDIA_URI . '/' . $midia['pasta'] . '/' . $midia['arquivo'];
    }

    public function fileMidia($midia) {
		return WWW_ROOT . MIDIA_URI . DS . str_replace('/',DS,$midia['pasta']) . DS . $midia['arquivo'];
    }
    public function generateInteger($defaults = null) {
        $options = array('min' => 1, 'max' => 10);
        if (isset($defaults)) {
            $options = array_merge($options, $defaults);
        }
        $retorno = array();
        for ($i = $options['min']; $i <= $options['max']; $i++) {
            $retorno[$i] = $i;
        }
        return $retorno;
    }

    public function tipoArquivo($nome = null) {
        if (!$nome) {
            return PARAMETRO_NAO_INFORMADO;
        }
        switch ($this->__getExtensaoArquivo($nome)) {
            case 'jpeg' :
            case 'jpg' :
            case 'png' :
            case 'gif':
                return MIDIA_IMAGENS;
                break;
            case 'mp3' :
            case 'wma':
                return MIDIA_AUDIOS;
                break;
            case 'swf' :
                return MIDIA_FLASH;
                break;
            case 'pdf' :
            case 'pdf' :
            case 'doc' :
            case 'docx':
            case 'xls' :
            case 'xlsx':
            case 'ppt' :
            case 'pptx':
            case 'pps' :
            case 'ppsx':
            case 'txt' :
                return MIDIA_DOCUMENTOS;
                break;
            case 'zip' :
            case 'rar' :
            case 'gzip' :
                return MIDIA_COMPACTADOS;
                break;
            case 'mov' :
            case 'mpg' :
            case 'avi' :
            case 'mp4':
            case 'wmv' :
                return MIDIA_VIDEOS;
                break;
            default :
                return MIDIA_OUTROS;
        }
    }

    public function __getExtensaoArquivo($arquivo = null) {
        if (!$arquivo) {
            return PARAMETRO_NAO_INFORMADO;
        }
        $retorno = pathinfo($arquivo);
        if (!isset($retorno['extension'])) {
            return '';
        }
        return $retorno['extension'];
    }

}

?>
