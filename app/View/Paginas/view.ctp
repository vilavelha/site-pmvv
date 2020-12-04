<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */
?>
<div class="container" style="padding-top: 20px;clear:both">
	<?php if($this->Session->read('Auth.User')): ?>
	<div class="row">
		<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 text-center">
			<p> <?php echo $this->Html->link('Editar Página', array('controller' => 'paginas', 'action' => 'edit', $pagina['Pagina']['id'], 'admin' => true)); ?> </p>
		</div>
	</div>
	<?php endif; ?>
	<div clas="row">
		<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 area-noticia">
			<h3>
				<b><?php echo $pagina['Pagina']['nome']; ?></b>
			</h3>
			<h5>
				De: <b>Secretaria de <?php echo $pagina['Orgao']['nome']; ?></b>
			</h5>
			<h6>Criado: <b><?php echo $this->Time->format('d', $pagina['Pagina']['created']) . ' de ' . $meses[$this->Time->format('n', $pagina['Pagina']['created'])] . ' de ' . $this->Time->format('Y', $pagina['Pagina']['created']); ?></b></h6>
			<p><?php echo $pagina['Pagina']['conteudo']; ?></p>
		</div>
		<!-- barra prefeito + servicos direita inicio -->
		<!-- <div class="col-lg-4 col-sm-12 btn-group">
			<div class="row">
				<div class="col-md-12">
					<?php //echo $this->element('agenda_prefeito');?>
					<?php //echo $this->element('lateral_servicos');?>
				</div>
			</div>
			<div class="divisor-20"></div>
			<div class="col-md-12 atalhos-coluna-direita">
				<?php //echo $this->element('programacoes');?>
				<?php //echo $this->element('youtube');?>
			</div>
		</div> -->
		<!-- barra prefeito + servicos direita fim -->
	</div>
</div>