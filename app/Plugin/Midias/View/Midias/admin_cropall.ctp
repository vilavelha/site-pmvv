<?php
//list($oldWidth, $oldHeight, $type) = getimagesize('midia' . DS . $arquivo['Midia']['pasta'] . DS . $arquivo['Midia']['arquivo']);
list($oldWidth, $oldHeight, $type) = getimagesize(WWW_ROOT . DS . 'midia' . DS . str_replace('/',DIRECTORY_SEPARATOR, $arquivo['Midia']['pasta']) . DS . $arquivo['Midia']['arquivo']);

echo $this->Html->scriptBlock(
        "var oldWidth = {$oldWidth};
        var oldHeight = {$oldHeight};
        ", array('inline' => false)
);
echo $this->Html->script(
        array(
    //'/midias/js/jCrop/jquery.Jcrop.min',
    '/midias/js/jCrop/init_novo_900',
    '/midias/js/jCrop/init_novo_1600',
    '/midias/js/jCrop/init_novo_326',
    '/midias/js/jCrop/init_novo_146'
        ), false
);
//echo $this->Html->css('/midias/css/jquery.Jcrop', null, array('inline' => false));
?>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<style type="text/css">
    #trabalho{
        width:1600px;
        height:514px;
        overflow: hidden;
    }
    #trabalho2{
        width:326px;
        height:290px;
        overflow: hidden;
    }
    #trabalho3{
        width:146px;
        height:160px;
        overflow: hidden;
    }
    #trabalho4{
        width:900px;
        height:500px;
        overflow: hidden;
    }
</style>

<div class="arquivos">
    <h2>Seleciona para cortar</h2>
    <div id="trabalho">
        <?php
        $width = $oldWidth;
        $height = $oldHeight;
        $newWidth = 1600;
        $newHeight = 514;
        $xwidth = ($width * $newHeight) / $height;
        $xwidth = round($xwidth);
        if ($xwidth < 1600) {
            $xwidth = 1600;
        }
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
            'action' => 'cropall',
            $arquivo['Midia']['id']
        )
            )
    );
    echo 'Posição X :' . $this->Form->input('x', array('id' => 'x', 'style' => 'width:70px;', 'div' => false, 'label' => false, 'readonly', 'value' => '0'));
    echo 'Posição Y :' . $this->Form->input('y', array('id' => 'y', 'style' => 'width:70px;', 'div' => false, 'label' => false, 'readonly', 'value' => '0'));
    echo 'Largura :' . $this->Form->input('w', array('id' => 'w', 'style' => 'width:70px;', 'div' => false, 'label' => false, 'readonly', 'value' => '1600'));
    echo 'Altura :' . $this->Form->input('h', array('id' => 'h', 'style' => 'width:70px;', 'div' => false, 'label' => false, 'readonly', 'value' => '514'));

    echo 'Tamanho Orignal  :' . $this->Form->input('oldw', array('id' => 'oldw', 'style' => 'width:50px;', 'div' => false, 'label' => false, 'readonly'));

    echo $this->Form->input('largura', array('id' => 'largura', 'value' => '1600', 'type' => 'hidden'));
    echo $this->Form->input('altura', array('id' => 'altura', 'value' => '514', 'type' => 'hidden'));
    ?>
    <div id="max" style="float:left; margin-right:20px;">Aumentar +</div> <div id="min" style="float:left">Diminuir -</div>

    <br clear="all"/><br/>
    <hr/>

    <h2>Seleciona para cortar</h2>
    <div id="trabalho2">
        <?php
        $width = $oldWidth;
        $height = $oldHeight;
        $newWidth = 326;
        $newHeight = 290;
        $xwidth = ($width * $newHeight) / $height;
        $xwidth = round($xwidth);
        //$pasta = str_replace(DS, SEPARADOR, $arquivo['Midia']['pasta']);
        $pasta = str_replace('/', SEPARADOR, $arquivo['Midia']['pasta']);
        echo $this->Html->image("/admin/midias/midias/miniatura/app|webroot|midia|{$pasta}/{$arquivo['Midia']['arquivo']}/{$xwidth}", array('id' => 'cropbox2'));
        ?>
    </div>
    <?php
    echo 'Posição X :' . $this->Form->input('x2', array('id' => 'x2', 'style' => 'width:70px;', 'div' => false, 'label' => false, 'readonly', 'value' => '0'));
    echo 'Posição Y :' . $this->Form->input('y2', array('id' => 'y2', 'style' => 'width:70px;', 'div' => false, 'label' => false, 'readonly', 'value' => '0'));
    echo 'Largura :' . $this->Form->input('w2', array('id' => 'w2', 'style' => 'width:70px;', 'div' => false, 'label' => false, 'readonly', 'value' => '326'));
    echo 'Altura :' . $this->Form->input('h2', array('id' => 'h2', 'style' => 'width:70px;', 'div' => false, 'label' => false, 'readonly', 'value' => '290'));

    echo 'Tamanho Orignal  :' . $this->Form->input('oldw2', array('id' => 'oldw2', 'style' => 'width:50px;', 'div' => false, 'label' => false, 'readonly'));

    echo $this->Form->input('largura2', array('id' => 'largura2', 'value' => '326', 'type' => 'hidden'));
    echo $this->Form->input('altura2', array('id' => 'altura2', 'value' => '290', 'type' => 'hidden'));
    ?>
    <div id="max2" style="float:left; margin-right:20px;">Aumentar +</div> <div id="min2" style="float:left">Diminuir -</div>

    <br clear="all"/><br/>
    <hr/>

    <h2>Seleciona para cortar</h2>
    <div id="trabalho3">
        <?php
        $width = $oldWidth;
        $height = $oldHeight;
        $newWidth = 146;
        $newHeight = 160;
        $xwidth = ($width * $newHeight) / $height;
        $xwidth = round($xwidth);
        //$pasta = str_replace(DS, SEPARADOR, $arquivo['Midia']['pasta']);
        $pasta = str_replace('/', SEPARADOR, $arquivo['Midia']['pasta']);
        echo $this->Html->image("/admin/midias/midias/miniatura/app|webroot|midia|{$pasta}/{$arquivo['Midia']['arquivo']}/{$xwidth}", array('id' => 'cropbox3'));
        ?>
    </div>
    <?php
    echo 'Posição X :' . $this->Form->input('x3', array('id' => 'x3', 'style' => 'width:70px;', 'div' => false, 'label' => false, 'readonly', 'value' => '0'));
    echo 'Posição Y :' . $this->Form->input('y3', array('id' => 'y3', 'style' => 'width:70px;', 'div' => false, 'label' => false, 'readonly', 'value' => '0'));
    echo 'Largura :' . $this->Form->input('w3', array('id' => 'w3', 'style' => 'width:70px;', 'div' => false, 'label' => false, 'readonly', 'value' => '146'));
    echo 'Altura :' . $this->Form->input('h3', array('id' => 'h3', 'style' => 'width:70px;', 'div' => false, 'label' => false, 'readonly', 'value' => '160'));

    echo 'Tamanho Orignal  :' . $this->Form->input('oldw3', array('id' => 'oldw3', 'style' => 'width:50px;', 'div' => false, 'label' => false, 'readonly'));

    echo $this->Form->input('largura3', array('id' => 'largura3', 'value' => '146', 'type' => 'hidden'));
    echo $this->Form->input('altura3', array('id' => 'altura3', 'value' => '160', 'type' => 'hidden'));
    ?>
    <div id="max3" style="float:left; margin-right:20px;">Aumentar +</div> <div id="min3" style="float:left">Diminuir -</div>

    <br clear="all"/><br/>
    <hr/>

    <h2>Seleciona para cortar</h2>
    <div id="trabalho4">
        <?php
        $width = $oldWidth;
        $height = $oldHeight;
        $newWidth = 900;
        $newHeight = 500;
        $xwidth = ($width * $newHeight) / $height;
        $xwidth = round($xwidth);
        //$pasta = str_replace(DS, SEPARADOR, $arquivo['Midia']['pasta']);
        $pasta = str_replace('/', SEPARADOR, $arquivo['Midia']['pasta']);
        echo $this->Html->image("/admin/midias/midias/miniatura/app|webroot|midia|{$pasta}/{$arquivo['Midia']['arquivo']}/{$xwidth}", array('id' => 'cropbox4'));
        ?>
    </div>
    <?php
    echo $this->Form->hidden('x4', array('id' => 'x4', 'style' => 'width:70px;', 'div' => false, 'label' => false, 'readonly', 'value' => '0'));
    echo $this->Form->hidden('y4', array('id' => 'y4', 'style' => 'width:70px;', 'div' => false, 'label' => false, 'readonly', 'value' => '0'));
    echo $this->Form->hidden('w4', array('id' => 'w4', 'style' => 'width:70px;', 'div' => false, 'label' => false, 'readonly', 'value' => '900'));
    echo $this->Form->hidden('h4', array('id' => 'h4', 'style' => 'width:70px;', 'div' => false, 'label' => false, 'readonly', 'value' => '500'));
    echo $this->Form->hidden('oldw4', array('id' => 'oldw4', 'style' => 'width:50px;', 'div' => false, 'label' => false, 'readonly'));
    echo $this->Form->hidden('largura4', array('id' => 'largura4', 'value' => '900', 'type' => 'hidden'));
    echo $this->Form->hidden('altura4', array('id' => 'altura4', 'value' => '500', 'type' => 'hidden'));
    ?>
    <div id="max4" style="float:left; margin-right:20px;">Aumentar +</div> <div id="min4" style="float:left">Diminuir -</div>

    <br clear="all"/><br/>
    <hr/>
    <?php echo $this->Form->end(__('Cortar', true)); ?>

</div>