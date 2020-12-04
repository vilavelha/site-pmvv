<div class="downloads view">
<h2><?php echo __('Download'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($download['Download']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($download['Tipo']['id'], array('controller' => 'tipos', 'action' => 'view', $download['Tipo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($download['Download']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($download['Download']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Arquivo'); ?></dt>
		<dd>
			<?php echo h($download['Download']['arquivo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($download['Download']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publicar'); ?></dt>
		<dd>
			<?php echo h($download['Download']['publicar']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Concurso'); ?></dt>
		<dd>
			<?php echo $this->Html->link($download['Concurso']['id'], array('controller' => 'concursos', 'action' => 'view', $download['Concurso']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Download'), array('action' => 'edit', $download['Download']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Download'), array('action' => 'delete', $download['Download']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $download['Download']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Downloads'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Download'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipos'), array('controller' => 'tipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo'), array('controller' => 'tipos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Concursos'), array('controller' => 'concursos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Concurso'), array('controller' => 'concursos', 'action' => 'add')); ?> </li>
	</ul>
</div>
