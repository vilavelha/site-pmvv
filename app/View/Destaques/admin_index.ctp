<h2><?php echo __('Destaques'); ?></h2>
<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('imagem'); ?></th>
			<th><?php echo $this->Paginator->sort('orgao_id','Secretaria'); ?></th>
			<th><?php echo $this->Paginator->sort('link'); ?></th>
			<th><?php echo $this->Paginator->sort('anexo'); ?></th>
			<th><?php echo $this->Paginator->sort('publicar'); ?></th>
			<th><?php echo $this->Paginator->sort('capa'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($destaques as $destaque): ?>
		<tr>
			<td><?php echo h($destaque['Destaque']['id']); ?>&nbsp;</td>
			<td><?php echo $this->Html->image('/files/destaques/'.$destaque['Destaque']['imagem'], array('class' => 'img-thumbnail', 'width' => '320')); ?>&nbsp;</td>
			<td><?php echo h($destaque['Orgao']['nome']); ?>&nbsp;</td>
			<td><?php echo $this->Html->link($destaque['Destaque']['link'], $destaque['Destaque']['link']);?>&nbsp;</td>
			<td><?php echo $this->Html->link( $destaque['Destaque']['anexo'], '/files/destaques/'.$destaque['Destaque']['anexo'], array('target' => '_blank', 'escape' => false)); ?>&nbsp;</td>
			<td><?php if ($destaque['Destaque']['publicar']) { echo 'Sim'; } else { echo 'Não'; } ?>&nbsp;</td>
			<td><?php if ($destaque['Destaque']['capa']) { echo 'Sim'; } else { echo 'Não'; } ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link('Editar', array('action' => 'edit', $destaque['Destaque']['id']), array('class' => 'btn btn-warning')); ?>
				<?php echo $this->Form->postLink('Excluir', array('action' => 'delete', $destaque['Destaque']['id']), array('class' => 'btn btn-danger'), array('confirm' => __('Are you sure you want to delete # %s?', $destaque['Destaque']['id']))); ?>
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
