	<h2><?php echo __('Downloads'); ?></h2>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th>Tipo</th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('concurso_id','Concurso'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($downloads as $download): ?>
	<tr>
		<td><?php echo h($download['Download']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $tipos[$download['Download']['tipo_id']]; ?>
		</td>
		<td><?php echo h($download['Download']['nome']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($download['Concurso']['titulo'], array('controller' => 'concursos', 'action' => 'view', $download['Concurso']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link('Visualizar', array('action' => 'view', $download['Download']['id']), array('class' => 'btn btn-info')); ?>
			<?php echo $this->Html->link('Editar', array('action' => 'edit', $download['Download']['id']), array('class' => 'btn btn-warning')); ?>
			<?php echo $this->Form->postLink('Excluir', array('action' => 'delete', $download['Download']['id']), array('class' => 'btn btn-danger'), array('confirm' => __('Are you sure you want to delete # %s?', $download['Download']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
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