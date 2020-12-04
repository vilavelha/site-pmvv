<?php

echo $this->Html->script(
        array(
    '/midias/js/jquery-ui-1.8.9.custom.min',
    '/midias/js/jquery.json-2.2.min.js',
    '/midias/js/jquery.window.min',
    '/midias/js/midias',
    '/midias/js/init2'
        ), false
);
echo $this->Html->css(
        array(
    '/midias/css/jquery-ui',
    '/midias/css/jquery.window'
        ), null, array('inline' => false)
);
?>
