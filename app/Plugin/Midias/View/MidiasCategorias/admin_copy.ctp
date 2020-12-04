<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Midias Categorias', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Midias', true), array('controller' => 'midias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Midia', true), array('controller' => 'midias', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="MidiasCategorias form">
<?php echo $this->Form->create('MidiasCategoria');?>
	<fieldset>
 		<legend><?php __('Admin Copy MidiasCategoria'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>