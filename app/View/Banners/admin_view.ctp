<div class="banners view">
<h2><?php echo __('Banner'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titulo'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['titulo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imagem'); ?></dt>
		<dd>
			<?php echo $this->Html->link($banner['Imagem']['id'], array('controller' => 'midias', 'action' => 'view', $banner['Imagem']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Inicial'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['data_inicial']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Final'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['data_final']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publicar'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['publicar']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Banner'), array('action' => 'edit', $banner['Banner']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Banner'), array('action' => 'delete', $banner['Banner']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $banner['Banner']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Banners'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Banner'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Midias'), array('controller' => 'midias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Imagem'), array('controller' => 'midias', 'action' => 'add')); ?> </li>
	</ul>
</div>
