<?php
echo $this->element('window', array('plugin' => 'midias'));
?>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Midias Galerias', true), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Midias', true), array('controller' => 'midias', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Midia', true), array('controller' => 'midias', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="midiasGalerias form">
    <?php echo $this->Form->create('MidiasGaleria'); ?>
    <fieldset>
        <legend><?php __('Admin Copy Midias Galeria'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('nome');
        echo $this->Form->input('descricao');
        echo $this->Form->input('publicar');
        echo $this->Html->link(__('Adicionar Imagens', true), '#', array('id' => 'Imagem', 'class' => 'midiasLink', 'rel' => 'multiplo'));
        echo $this->Form->input('imagem_miniatura_id', array('id' => 'inputImagem', 'style' => 'display:none', 'label' => false));
        echo $this->Form->input('Midia', array('type' => 'hidden', 'id' => 'listaImagem'));
        ?>
        <div id="divImagem" class="imagens"></div>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>