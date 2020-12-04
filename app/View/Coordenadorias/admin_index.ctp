	<h2><?php echo __('Coordenadorias'); ?></h2>
	<table class="table table-striped">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('orgao_id'); ?></th>
				<th><?php echo $this->Paginator->sort('tipo'); ?></th>
				<th><?php echo $this->Paginator->sort('nome'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($coordenadorias as $coordenadoria): ?>
				<tr>
					<td><?php echo h($coordenadoria['Coordenadoria']['id']); ?> &nbsp; </td>
					<td>
						<?php echo $this->Html->link($coordenadoria['Orgao']['nome'], array('controller' => 'orgaos', 'action' => 'view', $coordenadoria['Orgao']['id'])); ?>
					</td>
					<td>
						<?php echo $this->Html->link($coordenadoria['Tipo']['nome'], array('controller' => 'tipos', 'action' => 'view', $coordenadoria['Tipo']['nome'])); ?>
					</td>
					<td><?php echo h($coordenadoria['Coordenadoria']['nome']); ?> &nbsp; </td>
					
					<td class="actions">
						<?php echo $this->Html->link(__('Visualizar'), array('action' => 'view', $coordenadoria['Coordenadoria']['id']), array('class' => 'btn btn-info')); ?>
						<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $coordenadoria['Coordenadoria']['id']), array('class' => 'btn btn-warning')); ?><br>
						<?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $coordenadoria['Coordenadoria']['id']),array('class' => 'btn btn-danger'), array('confirm' => __('Are you sure you want to delete # %s?', $coordenadoria['Coordenadoria']['id']))); ?>
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