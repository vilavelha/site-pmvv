<div class="actions">
	<h3><?php __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $this->Form->value('MidiasCategoria.id')), null, sprintf(__('Você tem certeza que deseja excluir o id #%s?', true), $this->Form->value('MidiasCategoria.id'))); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('Listar %s', true), __('Midias Categorias', true)), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('Listar %s', true), __('Midias', true)), array('controller' => 'midias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('Nova %s', true), __('Midia', true)), array('controller' => 'midias', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="MidiasCategorias form">
<?php echo $this->Form->create('MidiasCategoria');?>
	<fieldset>
 		<legend><?php printf(__('Admin Edit %s', true), __('MidiasCategoria', true)); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar', true));?>
</div>