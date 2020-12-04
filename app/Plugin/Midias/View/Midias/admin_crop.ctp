<?php
$chave = key($modulos);
$tamanho = explode(SEPARADOR, $chave);
//list($oldWidth, $oldHeight, $type) = getimagesize('midia' . DS . $arquivo['Midia']['pasta'] . DS . $arquivo['Midia']['arquivo']);
list($oldWidth, $oldHeight, $type) = getimagesize(WWW_ROOT . DS . 'midia' . DS . $arquivo['Midia']['pasta'] . DS . $arquivo['Midia']['arquivo']);


$width = $oldWidth;
$height = $oldHeight;
$newWidth = $tamanho[0];
$newHeight = $tamanho[1];
$xwidth = ($width * $newHeight) / $height;
$xwidth = round($xwidth);

echo $this->Html->scriptBlock(
        "var oldWidth = {$oldWidth};
        var oldHeight = {$oldHeight};
        var largura = {$tamanho[0]};
        var altura = {$tamanho[1]};", array('inline' => false)
);
echo $this->Html->script(
        array(
    //'/midias/js/jCrop/jquery.Jcrop.min',
    '/midias/js/jCrop/init_novo
'), false
);
//echo $this->Html->css('/midias/css/jquery.Jcrop', null, array('inline' => false));
?>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<style type="text/css">
    #trabalho{
        width:<?php echo $tamanho[0]; ?>px;
        height:<?php echo $tamanho[1]; ?>px;
        overflow: hidden;
    }
</style>

<div class="arquivos view">
    <h2>Seleciona para cortar</h2>

    <?php
    echo $this->Form->input('modulo', array('name' => 'data[Midia][modulo]', 'id' => 'MidiaModuloId', 'options' => $modulos, 'empty' => 'Selecione'));
//    echo $this->Utils->imagemMidia($arquivo['Midia'], array('id' => 'cropbox', 'width' => '600'));
    ?>
    <div id="trabalho">
        <?php
        //$pasta = str_replace(DS, SEPARADOR, $arquivo['Midia']['pasta']);
        $pasta = str_replace('/', SEPARADOR, $arquivo['Midia']['pasta']);
        echo $this->Html->image("/admin/midias/midias/miniatura/app|webroot|midia|{$pasta}/{$arquivo['Midia']['arquivo']}/{$xwidth}", array('id' => 'cropbox'));
        ?>
    </div>
    <?php
    echo $this->Form->create('Midia', array('method' => 'post',
        'onsubmit' => 'return checkCoords();',
        'url' => array(
            'plugin' => 'midias',
            'admin' => true,
            'controller' => 'midias',
            'action' => 'crop',
            $arquivo['Midia']['id']
        )
            )
    );
    echo $this->Form->input('x', array('id' => 'x', 'style' => 'width:50px;', 'div' => false, 'label' => false));
    echo $this->Form->input('y', array('id' => 'y', 'style' => 'width:50px;', 'div' => false, 'label' => false));
    echo $this->Form->input('w', array('id' => 'w', 'style' => 'width:50px;', 'div' => false, 'label' => false));
    echo $this->Form->input('h', array('id' => 'h', 'style' => 'width:50px;', 'div' => false, 'label' => false));
    echo $this->Form->input('oldw', array('id' => 'oldw', 'style' => 'width:50px;', 'div' => false, 'label' => false));
    echo $this->Form->input('largura', array('id' => 'largura', 'value' => $tamanho[0], 'type' => 'hidden'));
    echo $this->Form->input('altura', array('id' => 'altura', 'value' => $tamanho[1], 'type' => 'hidden'));
    echo $this->Form->end(__('Cortar', true));
    ?>
</div>
<div id="max" style="float:left; margin-right:20px;">Aumentar +</div> <div id="min" style="float:left">Diminuir -</div>