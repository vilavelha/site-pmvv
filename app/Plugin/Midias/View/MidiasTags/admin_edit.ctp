<div class="actions">
	<h3><?php __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $this->Form->value('MidiasTag.id')), null, sprintf(__('Você tem certeza que deseja excluir o id #%s?', true), $this->Form->value('MidiasTag.id'))); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('Listar %s', true), __('MidiasTags', true)), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('Listar %s', true), __('Midias', true)), array('controller' => 'midias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('Nova %s', true), __('Midia', true)), array('controller' => 'midias', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="MidiasTags form">
<?php echo $this->Form->create('MidiasTag');?>
	<fieldset>
 		<legend><?php printf(__('Admin Edit %s', true), __('MidiasTag', true)); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
		echo $this->Form->input('Midia');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar', true));?>
</div>