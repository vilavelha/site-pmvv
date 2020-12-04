<div class="destaques view">
<h2><?php echo __('Destaque'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($destaque['Destaque']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imagem'); ?></dt>
		<dd>
			<?php echo $this->Html->image('/files/destaques/'.$destaque['Destaque']['imagem'], array('class' => '', 'width' => '320')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo $this->Html->link($destaque['Destaque']['link'], $destaque['Destaque']['link']);?>
			&nbsp;
		</dd>
		<dt><?php echo __('Anexo'); ?></dt>
		<dd>
			<?php echo $this->Html->link( $destaque['Destaque']['anexo'], '/files/destaques/'.$destaque['Destaque']['anexo'], array('target' => '_blank', 'escape' => false)); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publicar'); ?></dt>
		<dd>
			<?php if ($destaque['Destaque']['publicar']) { echo 'Sim'; } else { echo 'Não'; } ?>
			&nbsp;
		</dd>
	</dl>
</div>