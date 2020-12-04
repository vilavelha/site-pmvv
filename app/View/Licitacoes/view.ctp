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
				<h6 class="description">LICITAÇÃO</h6>
			</div>
		</div>
	</section>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p><b>Número do Edital: </b><?php echo $licitacao['Licitacao']['numero']; ?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p><b>Orgão: </b><?php echo $licitacao['Orgao']['nome'];?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p><b>Setor Requisitante: </b><?php echo $licitacao['Licitacao']['requisitante_id']['Orgao']['nome'];?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p><b>Processo: </b><?php echo $licitacao['Licitacao']['processo']; ?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p><b>Modalidade: </b><?php echo $licitacao['Licitacao']['modalidade']; ?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p><b>Pregoeiro/Presidente/Equipe: </b><?php echo $licitacao['Licitacao']['responsavel']; ?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p><b>Resultado: </b><?php echo $licitacao['Licitacao']['resultado']; ?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<?php
						if ((!empty($licitacao['Licitacao']['inicio_acolhimento'])) && ($licitacao['Licitacao']['inicio_acolhimento_ver'] == true)) {
							?>

							<p>
								<b>Inicio Acolhimento: </b><?php echo $this->Time->format('d/m/Y - H:i', $licitacao['Licitacao']['inicio_acolhimento']); ?> hrs
							</p>

							<?php
						}
					?>
					<?php
						if ((!empty($licitacao['Licitacao']['fim_recebimento'])) && ($licitacao['Licitacao']['fim_recebimento_ver'] == true)) {
							?>
							<p>
								<b>Fim recebimento de Proposta: </b><?php echo $this->Time->format('d/m/Y - H:i', $licitacao['Licitacao']['fim_recebimento']); ?> hrs
							</p>
							<?php
						}
					?>
					<?php
						if ((!empty($licitacao['Licitacao']['inicio_disputa'])) && ($licitacao['Licitacao']['inicio_disputa_ver'] == true)) {
							?>
							<p>
								<b>Data do Certame: </b><?php echo $this->Time->format('d/m/Y - H:i', $licitacao['Licitacao']['inicio_disputa']); ?> hrs
							</p>
							<?php
						}
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<section class="team">
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<h6 class="description">OBJETO</h6>
					</div>
				</div>
			</section>
			<p><?php echo $licitacao['Licitacao']['objeto']; ?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<section class="team">
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<h6 class="description">INFORMAÇÕES</h6>
					</div>
				</div>
			</section>
			<p>
				<?php 
					if(!empty($licitacao['Licitacao']['info'])) {
						echo $licitacao['Licitacao']['info'];
					}else{
						echo 'Não foram cadastradas informações.';
					}
				?>
			</p>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<section class="team">
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<h6 class="description">EDITAL</h6>
					</div>
				</div>
			</section>
			<p id="post">
				<?php
					if ((!empty($licitacao['Licitacao']['edital'])) && ($licitacao['Licitacao']['edital_ver'] == false)) {
						if(isset($ContadorBaixarLicitacao[$licitacao['Licitacao']['id']])){
							if(($ContadorBaixarLicitacao[$licitacao['Licitacao']['id']]['ativo']) && ($ContadorBaixarLicitacao[$licitacao['Licitacao']['id']]['licitacao_id']==$licitacao['Licitacao']['id'])){
								echo $this->Js->link('Visualizar lista de anexos', array('controller' => 'contadores', 'action' => 'download',$licitacao['Licitacao']['id']), array('class' => 'btn btn-success col-md-12', 'update' => '#post'));
							}
						}else{
							echo $this->Js->link('Clique aqui para baixar os anexos', array('controller' => 'contadores', 'action' => 'baixar', 'id' => $licitacao['Licitacao']['id']), array('class' => 'btn btn-danger col-md-12', 'update' => '#post', 'data' => "{id: {$licitacao['Licitacao']['id']}}"));
						}

						echo $this->Js->writeBuffer();
						//echo $this->Html->link('Clique aqui para fazer o Download', array('controller' => 'licitacoes', 'action' => 'download', $licitacao['Licitacao']['id']));
					} else {
						echo 'Nenhum edital cadastrado.';
					}
				?>
			</p>
		</div>
	</div>
</div>
