
<h2 align="center"><?php echo __('Página'); ?></h2>

	<div align="center">

	<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $pagina['Pagina']['id']),array('class' => 'btn btn-warning')); ?> 
		<?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $pagina['Pagina']['id']),array('class' => 'btn btn-danger'), array('confirm' => __('Are you sure you want to delete # %s?', $pagina['Pagina']['id']))); ?> 
    </div>

<hr>
	<dl>
		<dt class="col-md-5 col-md-push-3"><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pagina['Pagina']['id']); ?>
			&nbsp;
		</dd><br>
		<dt class="col-md-5 col-md-push-3"><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($pagina['Pagina']['slug']); ?>
			&nbsp;
		</dd><br>
		<dt class="col-md-5 col-md-push-3"><?php echo __('Orgao'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pagina['Orgao']['nome'], array('controller' => 'orgaos', 'action' => 'view', $pagina['Orgao']['id'])); ?>
			&nbsp;
		</dd><br>
		<dt class="col-md-5 col-md-push-3"><?php echo __('Coordenadoria'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pagina['Coordenadoria']['nome'], array('controller' => 'coordenadorias', 'action' => 'view', $pagina['Coordenadoria']['id'])); ?>
			&nbsp;
		</dd><br>
		<dt class="col-md-5 col-md-push-3"><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php if($pagina['Pagina']['tipo'] != 0){ echo h($tipos[$pagina['Pagina']['tipo']]);}; ?>
			&nbsp;
		</dd><br>
		<dt class="col-md-5 col-md-push-3"><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($pagina['Pagina']['nome']); ?>
			&nbsp;
		</dd><br>
		<dt align="center"><?php echo __('Conteúdo'); ?></dt>
		<dd align="center">
			<?php echo $pagina['Pagina']['conteudo']; ?>
			&nbsp;
		</dd><br>
		<dt class="col-md-5 col-md-push-3"><?php echo __('Publicar'); ?></dt>
		<dd>
			<?php if ($pagina['Pagina']['publicar']) { echo 'Sim'; } else { echo 'Não'; }?>
			&nbsp;
		</dd><br>
		
		<dt class="col-md-5 col-md-push-3"><?php echo __('Criado em'); ?></dt>
		<dd>
			<?php echo h($pagina['Pagina']['created']); ?>
			&nbsp;
		</dd><br>
	</dl>

	
	

