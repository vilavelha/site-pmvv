
<?php

class ImagemHelper extends AppHelper {

    public $helpers = array('Html');

    function miniatura($nome, $parametros = null, $inline = null) {
        if (isset($nome) && isset($parametros)) {
            $pasta = '';
            if (isset($parametros['pasta'])) {
                $pasta = $parametros['pasta'];
            }

            $largura = 100;
            if (isset($parametros['largura'])) {
                $largura = $parametros['largura'];
            }

            $altura = 100;
            if (isset($parametros['altura'])) {
                $altura = $parametros['altura'];
            }
            $propriedades = '';
            if (isset($inline)) {
                foreach ($inline as $chave => $valor) {
                    $propriedades .= "{$chave}='{$valor}' ";
                }
            }
            return "<img src='midias/midias/miniatura/{$pasta}/{$nome}/{$largura}/{$altura}' {$propriedades}/>";
        } else {
            debug('Parâmetros obrigatórios não foram informados');
        }
    }

    function arredondada($nome, $parametros = array(), $inline = array()) {
        if (isset($nome) && !empty($parametros)) {
            $pasta = '';
            if (isset($parametros['pasta'])) {
                $pasta = $parametros['pasta'];
            }

            $raio = 10;
            if (isset($parametros['raio'])) {
                $largura = $parametros['raio'];
            }

            $corFundo = 'ffffff';
            if (isset($parametros['corFundo'])) {
                $corFundo = $parametros['corFundo'];
            }
            $propriedades = '';
            if (!empty($inline)) {
                foreach ($inline as $chave => $valor) {
                    $propriedades .= "{$chave}='{$valor}' ";
                }
            }
            return "<img src='midias/imagens/arredondada/{$pasta}/{$nome}/{$raio}/{$corFundo}' {$propriedades}/>";
        } else {
            debug('Parâmetros obrigatórios não foram informados');
        }
    }

}

?>