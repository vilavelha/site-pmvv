<?php

echo $this->Html->script(
        array(
            '/midias/js/jquery.easing-1.3.pack',
            '/midias/js/jquery.fancybox-1.3.4.pack',
            '/midias/js/init.fancybox'
        ), false
);
echo $this->Html->css(
        array(
            '/midias/css/fancybox/jquery.fancybox-1.3.4'
        ),
        null,
        array('inline' => false)
);
?>
