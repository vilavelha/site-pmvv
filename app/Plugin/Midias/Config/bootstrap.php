<?php

ini_set('post_max_size', '50M');
ini_set('upload_max_filesize', '50M');


define('HTTP_PROTOCOL', 'http://');
$servidor = 'Não está em domínio.';
if (isset($_SERVER['SERVER_NAME'])) {
    $servidor = $_SERVER['SERVER_NAME'];
}
define('DOMAIN', $servidor);
define('DOMAIN_FULL', HTTP_PROTOCOL . DOMAIN); //CONFIGURA O CAMINHO ABSOLUTO COMPLETO ATÉ A PASTA WEBROOT

if (!defined('SEPARADOR')) {
    define('SEPARADOR', '|');
}

if (!defined('MIDIA_URI')) {
    define('MIDIA_URI', 'midia');
}
define('MIDIA_IMAGENS', 'imagens');
define('MIDIA_AUDIOS', 'audios');
define('MIDIA_FLASH', 'flash');
define('MIDIA_COMPACTADOS', 'compactados');
define('MIDIA_VIDEOS', 'videos');
define('MIDIA_DOCUMENTOS', 'documentos');
define('MIDIA_OUTROS', 'outros');
define('MIDIA_WIDTH', 1600);
define('MIDIA_HEIGHT', 768);
define('MIDIA_PASTA_TEMPORARIA_ZIP', MIDIA_PLUGIN_PATH . 'tmp' . DS . 'zip');
define('MIDIA_PASTA_TEMPORARIA_EXTRAIDOS', MIDIA_PLUGIN_PATH . 'tmp' . DS . 'extraidos');
//define('MIDIA_MAX_SIZE_UPLOAD', 10485760);
//define('MIDIA_MAX_SIZE_UPLOAD', 20971520); // 20 MB
define('MIDIA_MAX_SIZE_UPLOAD', 52428800); // 50 MB
define('MIDIA_ARQUIVO_NAO_INFORMADO', 8);
define('MIDIA_ARQUIVO_MUITO_GRANDE', 9);
define('MIDIA_ARQUIVO_NAO_PERMITIDO', 10);
define('MIDIA_PROBLEMA_NA_COPIA', 11);
define('MIDIA_PROBLEMA_EXTRAIR', 12);
define('MIDIA_PROBLEMA_EXCLUIR', 13);
define('MIDIA_SEM_ARQUIVOS_PERMITIDOS', 14);
define('MIDIA_PROBLEMA_AO_CRIAR_PASTA', 15);
define('MIDIA_PROBLEMA_REDIMENSIONAR_IMAGEM', 16);
define('PARAMETRO_NAO_INFORMADO', -1);
define('CKEDITOR_ALTURA', 300);

/**
 * Arquivo para adaptação da aplicação para Português-Brasil
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @author        Juan Basso <jrbasso@gmail.com>
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
// Definindo idioma da aplicação

?>
