<?php
echo $this->element('Midias.window2');
?>
<div class="actions">
    <h3><?php __('Ações'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(('Excluir'), array('action' => 'delete', $this->Form->value('MidiasGaleria.id')), null, sprintf(__('Você tem certeza que deseja excluir o id #%s?', true), $this->Form->value('MidiasGaleria.id'))); ?></li>
        <li><?php echo $this->Html->link(sprintf('Listar Midias Galerias'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(sprintf('Listar Midias'), array('controller' => 'midias', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(sprintf('Nova Midia'), array('controller' => 'midias', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="midiasGalerias form">
    <?php echo $this->Form->create('MidiasGaleria'); ?>
    <fieldset>
        <legend><?php printf('Editar Midias Galerias'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('nome');
        echo $this->Form->input('descricao');
        echo $this->Form->input('publicar');
        echo $this->Html->link(__('Adicionar Imagens', true), '#', array('id' => 'Imagem', 'class' => 'midiasLink', 'rel' => 'multiplo'));
        echo $this->Form->input('Midia', array('id' => 'inputImagem', 'style' => 'display:none', 'label' => false));
        echo $this->Form->input('imagem_id', array('type' => 'hidden', 'id' => 'listaImagem'));
        ?>
        <div id="divImagem" class="imagens"></div>
    </fieldset>
    <?php echo $this->Form->end(__('Enviar', true)); ?>
</div>