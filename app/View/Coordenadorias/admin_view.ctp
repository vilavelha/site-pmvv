<div class="coordenadorias view">
<h2><?php echo __('Coordenadoria'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($coordenadoria['Coordenadoria']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Orgao'); ?></dt>
		<dd>
			<?php echo $this->Html->link($coordenadoria['Orgao']['id'], array('controller' => 'orgaos', 'action' => 'view', $coordenadoria['Orgao']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($coordenadoria['Tipo']['id'], array('controller' => 'tipos', 'action' => 'view', $coordenadoria['Tipo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($coordenadoria['Coordenadoria']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($coordenadoria['Coordenadoria']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($coordenadoria['Coordenadoria']['slug']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Coordenadoria'), array('action' => 'edit', $coordenadoria['Coordenadoria']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Coordenadoria'), array('action' => 'delete', $coordenadoria['Coordenadoria']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $coordenadoria['Coordenadoria']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Coordenadorias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coordenadoria'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orgaos'), array('controller' => 'orgaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orgao'), array('controller' => 'orgaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipos'), array('controller' => 'tipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo'), array('controller' => 'tipos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Paginas'), array('controller' => 'paginas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pagina'), array('controller' => 'paginas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Servicos'), array('controller' => 'servicos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Servico'), array('controller' => 'servicos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Paginas'); ?></h3>
	<?php if (!empty($coordenadoria['Pagina'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Orgao Id'); ?></th>
		<th><?php echo __('Coordenadoria Id'); ?></th>
		<th><?php echo __('Tipo'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Conteudo'); ?></th>
		<th><?php echo __('Publicar'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($coordenadoria['Pagina'] as $pagina): ?>
		<tr>
			<td><?php echo $pagina['id']; ?></td>
			<td><?php echo $pagina['orgao_id']; ?></td>
			<td><?php echo $pagina['coordenadoria_id']; ?></td>
			<td><?php echo $pagina['tipo']; ?></td>
			<td><?php echo $pagina['nome']; ?></td>
			<td><?php echo $pagina['conteudo']; ?></td>
			<td><?php echo $pagina['publicar']; ?></td>
			<td><?php echo $pagina['slug']; ?></td>
			<td><?php echo $pagina['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'paginas', 'action' => 'view', $pagina['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'paginas', 'action' => 'edit', $pagina['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'paginas', 'action' => 'delete', $pagina['id']), array('confirm' => __('Are you sure you want to delete # %s?', $pagina['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Pagina'), array('controller' => 'paginas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Servicos'); ?></h3>
	<?php if (!empty($coordenadoria['Servico'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Orgao Id'); ?></th>
		<th><?php echo __('Coordenadoria Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Texto'); ?></th>
		<th><?php echo __('Link'); ?></th>
		<th><?php echo __('Nova Aba'); ?></th>
		<th><?php echo __('Publicar'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($coordenadoria['Servico'] as $servico): ?>
		<tr>
			<td><?php echo $servico['id']; ?></td>
			<td><?php echo $servico['orgao_id']; ?></td>
			<td><?php echo $servico['coordenadoria_id']; ?></td>
			<td><?php echo $servico['nome']; ?></td>
			<td><?php echo $servico['texto']; ?></td>
			<td><?php echo $servico['link']; ?></td>
			<td><?php echo $servico['nova_aba']; ?></td>
			<td><?php echo $servico['publicar']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'servicos', 'action' => 'view', $servico['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'servicos', 'action' => 'edit', $servico['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'servicos', 'action' => 'delete', $servico['id']), array('confirm' => __('Are you sure you want to delete # %s?', $servico['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Servico'), array('controller' => 'servicos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
