<?php if($erro): ?>
<div class="row">
	<div class="col-sm-12">
		<p class="bg-danger" style="padding:10px; font-weight: bolder; text-align: center;">Houve um erro ao salvar seu cadastro, favor informar todos os campos corretamente.</p>
	</div>
</div>
<?php
	echo $this->Js->link('Clique aqui para fazer Download dos Anexos', array('controller' => 'contadores', 'action' => 'baixar', 'id' => $licitacao['Licitacao']['id']), array('class' => 'btn btn-danger col-md-12', 'update' => '#post', 'data' => "{id: {$licitacao['Licitacao']['id']}}"));
	echo $this->Js->writeBuffer();
?>
<?php endif; ?>
<?php if($erro == false): ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<section class="team">
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<h6 class="description">ANEXOS</h6>
					</div>
				</div>
			</section>
			<p>
				<?php 
					if(!empty($licitacao['Licitacao']['anexos']))
					{
						
					
					echo	$novo_link = str_replace('href', 'target="_blank" href', $licitacao['Licitacao']['anexos']);	
					}
					else
					{
						echo 'Não foram cadastrados anexos.';
					}
				?>
			</p>
		</div>
	</div>
<?php endif; ?>