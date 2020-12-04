<h2><?php echo __('Servicos'); ?></h2>
<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('orgao_id'); ?></th>
		<th><?php echo $this->Paginator->sort('coordenadoria_id'); ?></th>
		<th><?php echo $this->Paginator->sort('nome'); ?></th>
		<th><?php echo $this->Paginator->sort('publicar'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($servicos as $servico): ?>
		<tr>
			<td><?php echo h($servico['Servico']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($servico['Orgao']['nome'], array('controller' => 'orgaos', 'action' => 'view', $servico['Orgao']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($servico['Coordenadoria']['nome'], array('controller' => 'coordenadorias', 'action' => 'view', $servico['Coordenadoria']['id'])); ?>
		</td>
		<td><?php echo h($servico['Servico']['nome']); ?>&nbsp;</td>
		<td><?php echo ($servico['Servico']['publicar']) ? 'Sim' : 'Não'; ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link('Visualizar', array('action' => 'view', $servico['Servico']['id']), array('class' => 'btn btn-info')); ?>
				<?php echo $this->Html->link('Editar', array('action' => 'edit', $servico['Servico']['id']), array('class' => 'btn btn-warning')); ?>
				<?php echo $this->Form->postLink('Excluir', array('action' => 'delete', $servico['Servico']['id']), array('class' => 'btn btn-danger'), array('confirm' => __('Are you sure you want to delete # %s?', $servico['Servico']['id']))); ?>
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
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nova Notícia'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Mídias'), array('controller' => 'midias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Mídia'), array('controller' => 'midias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Galerias'), array('controller' => 'midias_galerias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Galeria'), array('controller' => 'midias_galerias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Secretarias'), array('controller' => 'orgaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Secretaria'), array('controller' => 'orgaos', 'action' => 'add')); ?> </li>
	</ul>
</div>
