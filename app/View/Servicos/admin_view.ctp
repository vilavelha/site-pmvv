<div class="servicos view">
<h2><?php echo __('Servico'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($servico['Servico']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Orgao'); ?></dt>
		<dd>
			<?php echo $this->Html->link($servico['Orgao']['id'], array('controller' => 'orgaos', 'action' => 'view', $servico['Orgao']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Coordenadoria'); ?></dt>
		<dd>
			<?php echo $this->Html->link($servico['Coordenadoria']['id'], array('controller' => 'coordenadorias', 'action' => 'view', $servico['Coordenadoria']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($servico['Servico']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Texto'); ?></dt>
		<dd>
			<?php echo h($servico['Servico']['texto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($servico['Servico']['link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nova Aba'); ?></dt>
		<dd>
			<?php echo h($servico['Servico']['nova_aba']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publicar'); ?></dt>
		<dd>
			<?php echo h($servico['Servico']['publicar']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Servico'), array('action' => 'edit', $servico['Servico']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Servico'), array('action' => 'delete', $servico['Servico']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $servico['Servico']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Servicos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Servico'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orgaos'), array('controller' => 'orgaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orgao'), array('controller' => 'orgaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Coordenadorias'), array('controller' => 'coordenadorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coordenadoria'), array('controller' => 'coordenadorias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Servicos Categorias'), array('controller' => 'servicos_categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Servicos Categoria'), array('controller' => 'servicos_categorias', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Servicos Categorias'); ?></h3>
	<?php if (!empty($servico['ServicosCategoria'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($servico['ServicosCategoria'] as $servicosCategoria): ?>
		<tr>
			<td><?php echo $servicosCategoria['id']; ?></td>
			<td><?php echo $servicosCategoria['nome']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'servicos_categorias', 'action' => 'view', $servicosCategoria['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'servicos_categorias', 'action' => 'edit', $servicosCategoria['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'servicos_categorias', 'action' => 'delete', $servicosCategoria['id']), array('confirm' => __('Are you sure you want to delete # %s?', $servicosCategoria['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Servicos Categoria'), array('controller' => 'servicos_categorias', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
