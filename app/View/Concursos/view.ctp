<?php
/**
* @link          http://cakephp.org CakePHP(tm) Project
* @package       app.View.Pages
* @since         CakePHP(tm) v 0.10.0.1076
*/
?>
<div class="container" style="padding-top: 20px;clear:both">
	<section class="team">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<h6 class="description">CONCURSO</h6>
			</div>
		</div>
	</section>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p><?php echo $concurso['Concurso']['titulo']; ?></p>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p>
						<b>Situação: </b>
						 <?php
						            if ($concurso['Concurso']['situacao'] == 1) {
						                echo 'Inscrições Abertas';
						            } elseif ($concurso['Concurso']['situacao'] == 2) {
						                echo 'Em Andamento';
						            } elseif ($concurso['Concurso']['situacao'] == 3) {
						                echo 'Cancelada';
						            } elseif ($concurso['Concurso']['situacao'] == 4) {
						                echo 'Encerrado';
						            } elseif ($concurso['Concurso']['situacao'] == 5) {
						                echo 'Homologado';
						            }
					            ?>
					</p>
				</div>
			</div>
		</div>
	</div>
	<section class="team">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<h6 class="description">DESCRIÇÃO</h6>
			</div>
		</div>
	</section>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p><?php echo $concurso['Concurso']['descricao']; ?></p>
				</div>
			</div>
		</div>
	</div>
	<?php if (!empty($concurso['Concurso']['informacoes_adicionais'])) { ?>
		<section class="team">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<h6 class="description">INFORMAÇÕES ADICIONAIS</h6>
				</div>
			</div>
		</section>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p><?php echo $concurso['Concurso']['informacoes_adicionais']; ?></p>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php if (!empty($concurso['Concurso']['cargo'])) { ?>
		<section class="team">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<h6 class="description">CARGOS</h6>
				</div>
			</div>
		</section>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p><?php echo $concurso['Concurso']['cargo']; ?></p>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php if (!empty($concurso['Concurso']['vagas'])) { ?>
		<section class="team">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<h6 class="description">VAGAS</h6>
				</div>
			</div>
		</section>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p><?php echo $concurso['Concurso']['vagas']; ?></p>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php if ((!empty($concurso['Concurso']['taxa'])) && (!empty($concurso['Concurso']['horario']))) { ?>
		<section class="team">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<h6 class="description">INSCRIÇÕES, TAXAS E HORÁRIO</h6>
				</div>
			</div>
		</section>
		<?php if(!empty($concurso['Concurso']['taxa'])){ ?>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p>Taxa:<?php echo $concurso['Concurso']['taxa']; ?></p>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php if(!empty($concurso['Concurso']['horario'])){ ?>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p>Horário:<?php echo $concurso['Concurso']['horario']; ?></p>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	<?php } ?>
	<?php if(!empty($concurso['Concurso']['link'])){ ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p>
					<?php
					            if (!empty($concurso['Concurso']['link'])) {
					                echo $this->Html->link('Inscrição', $concurso['Concurso']['link'], array('target' => '_blank', 'escape' => false));
					            } elseif (!empty($concurso['Concurso']['ficha'])) {
					                echo $this->Html->link(
					                        'Clique aqui visualizar o Edital.', '/' .'files' . '/' .'concursos' . '/' .$concurso['Concurso']['id'] . '/' .$concurso['Concurso']['ficha'], array('target' => '_blank', 'escape' => false));
					            }
					            ?>
				            </p>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<?php if (!empty($editais)) { ?>
		<section class="team">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<h6 class="description">EDITAIS, COMUNICADOS E INFORMAÇÕES</h6>
				</div>
			</div>
		</section>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<ul class="list-group">
					                <?php foreach ($editais as $download): ?>
					                    <li class="list-group-item">
					                        <?php
					                        echo $this->Html->image('pdf.jpg');
					                        echo $this->Html->link(
					                                $this->Time->format('d/m/Y', $download['Download']['created']) . ' - ' . $download['Download']['nome'], '/' .'files' . '/' .'concursos' . '/' .$concurso['Concurso']['id'] . '/' .'outros' . '/' .$download['Download']['arquivo']
					                                , array('target' => '_blank', 'escape' => false));
					                        ?>
					                    </li>
					                <?php endforeach; ?>
					            </ul>
					</div>
				</div>
			</div>
		</div>
	 <?php }; ?>
	 <?php if (!empty($provas)) { ?>
		<section class="team">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<h6 class="description">PROVAS E GABARITOS</h6>
				</div>
			</div>
		</section>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<ul class="list-group">
					                <?php foreach ($provas as $prova): ?>
					                    <li class="list-group-item">
					                       <?php
					                        echo $this->Html->link(
					                                $this->Html->image('pdf.jpg') . $this->Time->format('d/m/Y', $prova['Download']['created']) . ' - ' . $prova['Download']['nome'], '/' .'files' . '/' .'concursos' . '/' .$concurso['Concurso']['id'] . '/' .'outros' . '/' .$prova['Download']['arquivo']
					                                , array('target' => '_blank', 'escape' => false));
					                        ?>
					                    </li>
					                <?php endforeach; ?>
					            </ul>
					</div>
				</div>
			</div>
		</div>
	 <?php }; ?>
	 <?php if (!empty($concurso['Concurso']['links'])) { ?>
		<section class="team">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<h6 class="description">LINKS</h6>
				</div>
			</div>
		</section>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p><?php echo $concurso['Concurso']['links']; ?></p>
					</div>
				</div>
			</div>
		</div>
	 <?php }; ?>
</div>