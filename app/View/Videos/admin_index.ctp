<div class="videos index">
	<h2><?php echo __('Videos'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('titulo'); ?></th>
			<th><?php echo $this->Paginator->sort('link'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($videos as $video): ?>
	<tr>
		<td><?php echo h($video['Video']['id']); ?>&nbsp;</td>
		<td><?php echo h($video['Video']['titulo']); ?>&nbsp;</td>
		<td><?php echo h($video['Video']['link']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar'), array('action' => 'view', $video['Video']['id']), array('class' => 'btn btn-info')); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $video['Video']['id']), array('class' => 'btn btn-warning')); ?><br>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $video['Video']['id']),array('class' => 'btn btn-danger'), array('confirm' => __('Are you sure you want to delete # %s?', $video['Video']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>

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
</div>



</div>

