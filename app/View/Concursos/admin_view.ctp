<div class="concursos view">
<h2><?php echo __('Concurso'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($concurso['Concurso']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titulo'); ?></dt>
		<dd>
			<?php echo h($concurso['Concurso']['titulo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($concurso['Concurso']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Informacoes Adicionais'); ?></dt>
		<dd>
			<?php echo h($concurso['Concurso']['informacoes_adicionais']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cargo'); ?></dt>
		<dd>
			<?php echo h($concurso['Concurso']['cargo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vagas'); ?></dt>
		<dd>
			<?php echo h($concurso['Concurso']['vagas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Taxa'); ?></dt>
		<dd>
			<?php echo h($concurso['Concurso']['taxa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Horario'); ?></dt>
		<dd>
			<?php echo h($concurso['Concurso']['horario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Links'); ?></dt>
		<dd>
			<?php echo h($concurso['Concurso']['links']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Situacao'); ?></dt>
		<dd>
			<?php echo h($concurso['Concurso']['situacao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ficha'); ?></dt>
		<dd>
			<?php echo h($concurso['Concurso']['ficha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($concurso['Concurso']['link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($concurso['Concurso']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($concurso['Usuario']['id'], array('controller' => 'usuarios', 'action' => 'view', $concurso['Usuario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($concurso['Concurso']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Concurso'), array('action' => 'edit', $concurso['Concurso']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Concurso'), array('action' => 'delete', $concurso['Concurso']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $concurso['Concurso']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Concursos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Concurso'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Downloads'), array('controller' => 'downloads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Download'), array('controller' => 'downloads', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Downloads'); ?></h3>
	<?php if (!empty($concurso['Download'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tipo Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Arquivo'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Publicar'); ?></th>
		<th><?php echo __('Concurso Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($concurso['Download'] as $download): ?>
		<tr>
			<td><?php echo $download['id']; ?></td>
			<td><?php echo $download['tipo_id']; ?></td>
			<td><?php echo $download['nome']; ?></td>
			<td><?php echo $download['descricao']; ?></td>
			<td><?php echo $download['arquivo']; ?></td>
			<td><?php echo $download['created']; ?></td>
			<td><?php echo $download['publicar']; ?></td>
			<td><?php echo $download['concurso_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'downloads', 'action' => 'view', $download['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'downloads', 'action' => 'edit', $download['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'downloads', 'action' => 'delete', $download['id']), array('confirm' => __('Are you sure you want to delete # %s?', $download['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Download'), array('controller' => 'downloads', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
