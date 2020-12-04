<div class="actions">
	<h3><?php __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('Editar %s', true), __('Midias Categoria', true)), array('action' => 'edit', $MidiasCategoria['MidiasCategoria']['id'])); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('Excluir %s', true), __('Midias Categoria', true)), array('action' => 'delete', $MidiasCategoria['MidiasCategoria']['id']), null, sprintf(__('Você tem certeza que deseja excluir o id #%s?', true), $MidiasCategoria['MidiasCategoria']['id'])); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('Listar %s', true), __('Midias Categorias', true)), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('Novo %s', true), __('Midias Categoria', true)), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('Listar %s', true), __('Midias', true)), array('controller' => 'midias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('Nova %s', true), __('Midia', true)), array('controller' => 'midias', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="MidiasCategorias view">
<h2><?php  __('MidiasCategoria');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $MidiasCategoria['MidiasCategoria']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $MidiasCategoria['MidiasCategoria']['nome']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php printf(__('%s relacionados', true), __('Midias', true));?></h3>
	<?php if (!empty($MidiasCategoria['Midia'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('MidiasCategoria Id'); ?></th>
		<th><?php __('Nome'); ?></th>
		<th><?php __('Autor'); ?></th>
		<th><?php __('Pasta'); ?></th>
		<th><?php __('Arquivo'); ?></th>
		<th><?php __('Descrição'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($MidiasCategoria['Midia'] as $midia):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $midia['id'];?></td>
			<td><?php echo $midia['midias_categoria_id'];?></td>
			<td><?php echo $midia['nome'];?></td>
			<td><?php echo $midia['autor'];?></td>
			<td><?php echo $midia['pasta'];?></td>
			<td><?php echo $midia['arquivo'];?></td>
			<td><?php echo $midia['descricao'];?></td>
			<td><?php echo $midia['created'];?></td>
			<td><?php echo $midia['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver', true), array('controller' => 'midias', 'action' => 'view', $midia['id'])); ?>
				<?php echo $this->Html->link(__('Editar', true), array('controller' => 'midias', 'action' => 'edit', $midia['id'])); ?>
				<?php echo $this->Html->link(__('Excluir', true), array('controller' => 'midias', 'action' => 'delete', $midia['id']), null, sprintf(__('Você tem certeza que deseja excluir o id #%s?', true), $midia['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(sprintf(__('Novo %s', true), __('Midia', true)), array('controller' => 'midias', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
