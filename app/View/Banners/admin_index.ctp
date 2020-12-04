<h2><?php echo __('Banners'); ?></h2>
<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('titulo'); ?></th>
		<th><?php echo $this->Paginator->sort('imagem_id'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('publicar'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($banners as $banner): ?>
		<tr>
			<td><?php echo h($banner['Banner']['id']); ?>&nbsp;</td>
			<td><?php echo h($banner['Banner']['titulo']); ?>&nbsp;</td>
			<td>
				<?php echo $this->Html->link($banner['Imagem']['id'], array('controller' => 'midias', 'action' => 'view', $banner['Imagem']['id'])); ?>
			</td>
			<td><?php echo $this->Time->format($banner['Banner']['created'], '%d/%m/%y'); ?><br/><?php echo $this->Time->format($banner['Banner']['created'], '%H:%M'); ?>&nbsp;</td>
			<td><?php echo h($banner['Banner']['publicar']); ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('action' => 'view', $banner['Banner']['id']), array('class' => 'btn btn-info')); ?>
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $banner['Banner']['id']), array('class' => 'btn btn-warning')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $banner['Banner']['id']), array('class' => 'btn btn-danger'), array('confirm' => __('Are you sure you want to delete # %s?', $banner['Banner']['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
<div clas="row">
	<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 text-center">
		<div class="pagination pagination-large">
			<ul class="pagination">
				<?php
				echo $this->Paginator->prev('anterior', array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
				echo $this->Paginator->numbers(array('separator' => '', 'ellipsis' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
				echo $this->Paginator->next('próxima', array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
				?>
			</ul>
		</div>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Banner'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Midias'), array('controller' => 'midias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Imagem'), array('controller' => 'midias', 'action' => 'add')); ?> </li>
	</ul>
</div>
