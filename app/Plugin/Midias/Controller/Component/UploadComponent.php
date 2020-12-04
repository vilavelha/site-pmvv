<?php

class UploadComponent extends Component {

    public $components = array('Midias.PImage');

    public function uploadImagemNovo($arquivo = null) {
        if ($arquivo['error']) {
            return $arquivo['error'];
        }
        if ($arquivo['size'] > MIDIA_MAX_SIZE_UPLOAD) {
            return MIDIA_ARQUIVO_MUITO_GRANDE;
        }
        if (!$arquivo) {
            return MIDIA_ARQUIVO_NAO_INFORMADO;
        }

        $tipo = $this->tipoArquivo($arquivo['name']);
        $pasta = $this->__nomePasta($tipo);
        if (!$pasta) {
            return PARAMETRO_NAO_INFORMADO;
        }
        $novoNome = $this->nomeSlug($pasta, $arquivo['name']);
        $caminho = $pasta . DS . $novoNome;

        $retorno = array('pasta' => $pasta, 'arquivo' => $novoNome);
        if (move_uploaded_file($arquivo['tmp_name'], WWW_ROOT . MIDIA_URI . DS . $caminho)) {
            if ($this->__redimensionarNovo(WWW_ROOT . MIDIA_URI . DS . $pasta, $novoNome, MIDIA_WIDTH, MIDIA_HEIGHT)) {
                return $retorno;
            }
            return MIDIA_PROBLEMA_REDIMENSIONAR_IMAGEM;
        } else {
            return MIDIA_PROBLEMA_NA_COPIA;
        }
    }

    public function uploadImagem($arquivo = null) {
        if ($arquivo['error']) {
            return $arquivo['error'];
        }
        if ($arquivo['size'] > MIDIA_MAX_SIZE_UPLOAD) {
            return MIDIA_ARQUIVO_MUITO_GRANDE;
        }
        if (!$arquivo) {
            return MIDIA_ARQUIVO_NAO_INFORMADO;
        }

        $tipo = $this->tipoArquivo($arquivo['name']);
        $pasta = $this->__nomePasta($tipo);
        if (!$pasta) {
            return PARAMETRO_NAO_INFORMADO;
        }
        $novoNome = $this->nomeSlug($pasta, $arquivo['name']);
        $caminho = $pasta . DS . $novoNome;

        $retorno = array('pasta' => $pasta, 'arquivo' => $novoNome);
        if (move_uploaded_file($arquivo['tmp_name'], WWW_ROOT . MIDIA_URI . DS . $caminho)) {
            if ($this->__redimensionar(WWW_ROOT . MIDIA_URI . DS . $pasta, $novoNome, MIDIA_WIDTH, false)) {
                return $retorno;
            }
            return MIDIA_PROBLEMA_REDIMENSIONAR_IMAGEM;
        } else {
            return MIDIA_PROBLEMA_NA_COPIA;
        }
    }

    public function uploadArquivo($parametros) {

        if (isset($parametros['pasta'])) {
            $pasta = $parametros['pasta'];
        }

        if (isset($parametros['arquivo'])) {
            $arquivo = $parametros['arquivo'];
        } else {
            die('Não foi passado o parâmetro $parametros["arquivos"]');
        }

        $nome = $arquivo['name'];
        if (isset($parametros['nome'])) {
            $nome = $parametros['nome'];
        }

        $local = WWW_ROOT . str_replace(SEPARADOR, DS, $pasta) . DS;
        if (move_uploaded_file($arquivo['tmp_name'], $local . $nome)) {
            chmod($local . $nome, 0777);
        } else {
            die('Existe algum problema para upload. Verifique se a pasta existe e possui permissão para gravação');
        }
    }

    public function descompactarArquivos($arquivo = null) {
        echo $arquivo['size'] . ' x ' . MIDIA_MAX_SIZE_UPLOAD;
//        die();
        if ($arquivo['size'] > MIDIA_MAX_SIZE_UPLOAD) {
            return MIDIA_ARQUIVO_MUITO_GRANDE;
        }
        if ($arquivo['error']) {
            return $arquivo['error'];
        }
        if (!$arquivo) {
            return MIDIA_ARQUIVO_NAO_INFORMADO;
        }
        if ($this->getExtensaoArquivo($arquivo['name']) != 'zip') {
            return MIDIA_ARQUIVO_NAO_PERMITIDO;
        }
        $tipo = $this->tipoArquivo($arquivo['name']);
        $pasta = $this->__nomePasta($tipo);
        if (!$pasta) {
            return PARAMETRO_NAO_INFORMADO;
        }

        $novoNome = $this->nomeSlug($pasta, $arquivo['name']);
        $caminho = $pasta . DS . $novoNome;

        $tempZip = MIDIA_PASTA_TEMPORARIA_ZIP . DS;
        $tempExtraidos = MIDIA_PASTA_TEMPORARIA_EXTRAIDOS . DS;

        if (!is_dir($tempZip)) {
            if (!mkdir($tempZip, 0777, true)) {
                return MIDIA_PROBLEMA_AO_CRIAR_PASTA;
            }
        }
        if (!is_dir($tempExtraidos)) {
            if (!mkdir($tempExtraidos, 0777, true)) {
                return MIDIA_PROBLEMA_AO_CRIAR_PASTA;
            }
        }

        if (move_uploaded_file($arquivo['tmp_name'], $tempZip . $novoNome)) {
            $zip = new ZipArchive();
            if ($zip->open($tempZip . $novoNome)) {
                $zip->extractTo($tempExtraidos);
                $zip->close();
                unlink($tempZip . $novoNome);
            } else {
                return MIDIA_PROBLEMA_EXTRAIR;
            }
            $arquivosExtraidos = $this->__listaArquivosDiretorio($tempExtraidos);
            $retorno = $this->__moveArquivos($arquivosExtraidos);
            return $retorno;
        } else {
            return MIDIA_PROBLEMA_NA_COPIA;
        }
    }

    public function __redimensionarNovo($pasta, $nome, $largura, $altura) {
        $local = str_replace(SEPARADOR, DS, $pasta) . DS;
        if ($this->PImage->resizeImageNovo('resize', $nome, $local, false, $largura, $altura, 75)) {
            return true;
        }
        return MIDIA_PROBLEMA_REDIMENSIONAR_IMAGEM;
    }

    public function __redimensionar($pasta, $nome, $largura, $altura) {
        $local = str_replace(SEPARADOR, DS, $pasta) . DS;
        if ($this->PImage->resizeImage('resize', $nome, $local, false, $largura, $altura, 75)) {
            return true;
        }
        return MIDIA_PROBLEMA_REDIMENSIONAR_IMAGEM;
    }

    public function __moveArquivos($arquivos = null) {
        if (!$arquivos) {
            return PARAMETRO_NAO_INFORMADO;
        }
        if ($arquivos == MIDIA_PROBLEMA_NA_COPIA) {
            return MIDIA_PROBLEMA_NA_COPIA;
        }
        $retorno = array();
        foreach ($arquivos as $arquivo) {
            $tipo = $this->tipoArquivo($arquivo);
            $pasta = $this->__nomePasta($tipo);
            $novoNome = $this->nomeSlug($pasta, $arquivo);
            if ($this->__arquivoPermitido($novoNome)) {
                if (copy(MIDIA_PASTA_TEMPORARIA_EXTRAIDOS . DS . $arquivo, WWW_ROOT . MIDIA_URI . DS . $pasta . DS . $novoNome)) {
                    if ($this->__redimensionarNovo(WWW_ROOT . MIDIA_URI . DS . $pasta, $novoNome, MIDIA_WIDTH, MIDIA_HEIGHT)) {
                        $retorno[] = array('pasta' => $pasta, 'arquivo' => $novoNome);
                    } else {
                        return MIDIA_PROBLEMA_REDIMENSIONAR_IMAGEM;
                    }
                } else {
                    return MIDIA_PROBLEMA_NA_COPIA;
                }
            }
            unlink(MIDIA_PASTA_TEMPORARIA_EXTRAIDOS . DS . $arquivo);
        }
        if (empty($retorno)) {
            return MIDIA_SEM_ARQUIVOS_PERMITIDOS;
        }
        return $retorno;
    }

    public function __listaArquivosDiretorio($diretorio = null) {
        if (!$diretorio) {
            return PARAMETRO_NAO_INFORMADO;
        }

        $ponteiro = opendir($diretorio);
        while ($nome_itens = readdir($ponteiro)) {
            $itens[] = $nome_itens;
        }
        sort($itens);
        $arquivos = array();
        foreach ($itens as $item) {
            if (!is_dir($diretorio . $item) && $item != "." && $item != "..") {
                $arquivos[] = $item;
            } else if ($item != "." && $item != "..") {
                $ponteiro = opendir($diretorio . $item);
                while ($nome_subitens = readdir($ponteiro)) {
                    $subitens[] = $nome_subitens;
                }
                sort($subitens);

                foreach ($subitens as $subitem) {
                    if (!is_dir($diretorio . $item . DS . $subitem) && $subitem != "." && $subitem != "..") {
                        $arquivos[] = $subitem;
                        if (!copy($diretorio . $item . DS . $subitem, $diretorio . $subitem)) {
                            return MIDIA_PROBLEMA_NA_COPIA;
                        }
                        unlink($diretorio . $item . DS . $subitem);
                    } else if ($subitem != "." && $subitem != "..") {
                        $this->__removeDiretorio($diretorio . DS . $subitem);
                    }
                }
                $this->__removeDiretorio($diretorio . DS . $item);
            }
        }
        return $arquivos;
    }

    public function __removeDiretorio($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir . "/" . $object) == "dir")
                        $this->__removeDiretorio($dir . "/" . $object);
                    else
                        unlink($dir . "/" . $object);
                }
            }
            reset($objects);
            rmdir($dir);
        }
    }

    public function removeArquivo($pasta, $arquivo) {
        if (!$arquivo || !$pasta) {
            return PARAMETRO_NAO_INFORMADO;
        }
        if (unlink($pasta . DS . $arquivo)) {
            return SUCESSO;
        }
        return MIDIA_PROBLEMA_EXCLUIR;
    }

    public function tipoArquivo($nome = null) {
        if (!$nome) {
            return PARAMETRO_NAO_INFORMADO;
        }
        switch ($this->getExtensaoArquivo($nome)) {
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

    public function getFiltro($tipo) {
        switch ($tipo) {
            case MIDIA_IMAGENS :
                $filtro = MIDIA_IMAGENS;
                break;
            case MIDIA_DOCUMENTOS :
                $filtro = MIDIA_DOCUMENTOS;
                break;
            case MIDIA_AUDIOS :
                $filtro = MIDIA_AUDIOS;
                break;
            case MIDIA_VIDEOS :
                $filtro = MIDIA_VIDEOS;
                break;
            case MIDIA_FLASH :
                $filtro = MIDIA_FLASH;
                break;
            case MIDIA_COMPACTADOS :
                $filtro = MIDIA_COMPACTADOS;
                break;
            case MIDIA_OUTROS :
                $filtro = MIDIA_OUTROS;
                break;
            default :
                break;
        }
        return $filtro;
    }

    public function getMidiasTipos() {
        return array(
            MIDIA_IMAGENS => MIDIA_IMAGENS,
            MIDIA_DOCUMENTOS => MIDIA_DOCUMENTOS,
            MIDIA_AUDIOS => MIDIA_AUDIOS,
            MIDIA_COMPACTADOS => MIDIA_COMPACTADOS,
            MIDIA_FLASH => MIDIA_FLASH,
            MIDIA_VIDEOS => MIDIA_VIDEOS,
            MIDIA_OUTROS => MIDIA_OUTROS
        );
    }

    public function __arquivoPermitido($nome = null) {
        if (!$nome) {
            return PARAMETRO_NAO_INFORMADO;
        }
        $permitidos = array(
            0 => 'pdf', 1 => 'doc', 2 => 'docx', 3 => 'xls', 4 => 'xlsx', 5 => 'ppt', 6 => 'pptx', 7 => 'pps', 8 => 'ppsx', 9 => 'txt',
            20 => 'mov', 21 => 'mpg', 22 => 'avi', 23 => 'mp4', 24 => 'wmv',
            30 => 'jpeg', 31 => 'jpg', 32 => 'png', 33 => 'gif',
            40 => 'zip', 41 => 'rar', 42 => 'gzip',
            50 => 'mp3', 51 => 'wma',
            60 => 'swf'
        );
        $extensao = $this->getExtensaoArquivo($nome);
        return in_array($extensao, $permitidos);
    }

    public function getMensagemValidacao($nome) {
        switch ($nome) {
            case UPLOAD_ERR_PARTIAL :
                $mensagem = 'O arquivo não foi carregado completamente.<br />Tente novamente.';
                break;
            case UPLOAD_ERR_NO_FILE :
                $mensagem = 'Nenhum arquivo foi informado.';
                break;
            case UPLOAD_ERR_NO_TMP_DIR :
                $mensagem = 'Diretório temporário não encontrado.<br />Entre em contato com o administrador do sistema.';
                break;
            case PARAMETRO_NAO_INFORMADO :
                $mensagem = 'Parâmetro não informado na função';
                break;
            case UPLOAD_ERR_CANT_WRITE :
                $mensagem = 'Problema de disco<br />Entre em contato com o administrador do sistema.';
                break;
            case UPLOAD_ERR_EXTENSION :
                $mensagem = 'Problema em uma extensão do php';
                break;
            case UPLOAD_ERR_FORM_SIZE :
            case UPLOAD_ERR_INI_SIZE :
            case MIDIA_ARQUIVO_MUITO_GRANDE :
                $mensagem = 'O arquivo é maior do que o permitido (10Mb)';
                break;
            case MIDIA_ARQUIVO_NAO_PERMITIDO :
                $mensagem = 'Arquivo com extensão não permitida.<br />Envie apenas .zip.';
                break;
            case MIDIA_PROBLEMA_NA_COPIA :
                $mensagem = 'Ocorreu um problema na cópia dos arquivos internos.<br />Verifique o conteúdo da pasta.';
                break;
            case MIDIA_PROBLEMA_EXTRAIR :
                $mensagem = 'Problema ao extrair os arquivos<br />Verifique o conteúdo do arquivo.';
                break;
            case MIDIA_PROBLEMA_EXCLUIR :
                $mensagem = 'Problema ao excluir o arquivo.<br />Tente novamente ou verifique se o caminho está correto';
                break;
            case MIDIA_SEM_ARQUIVOS_PERMITIDOS :
                $mensagem = 'Não foram encontrados arquivos permitidos no arquivo enviado.';
                break;
            case MIDIA_PROBLEMA_AO_CRIAR_PASTA :
                $mensagem = 'Problema ao criar pasta';
                break;
            case MIDIA_PROBLEMA_REDIMENSIONAR_IMAGEM :
                $mensagem = 'Problema ao redimensionar imagem';
                break;
            case SUCESSO :
                $mensage = 'Operação realizada com sucesso.';
                break;
            default :
                $mensagem = 'Erro desconhecido';
                break;
        }
        return $mensagem;
    }

    public function __nomePasta($tipo = null) {
        if (!$tipo) {
            return false;
        }
        $ano = date('Y');
        $mes = date('m');
        $pasta = $tipo . DS . $ano . DS . $mes;
        if (!is_dir(WWW_ROOT . MIDIA_URI . DS . $pasta)) {
            if (!mkdir(WWW_ROOT . MIDIA_URI . DS . $pasta, 0777, true)) {
                return false;
            }
        }
        return $pasta;
    }

    public function getNomeArquivo($arquivo = null) {
        if (!$arquivo) {
            return PARAMETRO_NAO_INFORMADO;
        }
        $retorno = pathinfo($arquivo);
        return $retorno['filename'];
    }

    public function getExtensaoArquivo($arquivo = null) {
        if (!$arquivo) {
            return PARAMETRO_NAO_INFORMADO;
        }
        $retorno = pathinfo($arquivo);
        if (!isset($retorno['extension'])) {
            return '';
        }
        return strtolower($retorno['extension']);
    }

    var $Model = null;
    var $nameModel = 'Midia';

    public function nomeSlug($pasta = null, $arquivo = null) {
        if (!$arquivo || !$pasta) {
            return PARAMETRO_NAO_INFORMADO;
        }
        $nome = Inflector::slug($this->getNomeArquivo($arquivo), '-');
        $extensao = $this->getExtensaoArquivo($arquivo);
        $this->Model = ClassRegistry::init($this->nameModel);
        $this->Model->recursive = -1;
        $lista = $this->Model->find('count', array('conditions' => array("{$this->nameModel}.pasta" => $pasta, "{$this->nameModel}.arquivo LIKE" => "{$nome}%")));
        $arquivo = "{$nome}.{$extensao}";
        if ($lista > 0) {
            $arquivo = "{$nome}-{$lista}.{$extensao}";
        }
        return strtolower($arquivo);
    }

}

?>
