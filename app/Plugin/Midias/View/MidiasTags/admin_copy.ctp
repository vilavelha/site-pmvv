<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List MidiasTags', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Midias', true), array('controller' => 'midias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Midia', true), array('controller' => 'midias', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="MidiasTags form">
<?php echo $this->Form->create('MidiasTag');?>
	<fieldset>
 		<legend><?php __('Admin Copy MidiasTag'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
		echo $this->Form->input('Midia');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>