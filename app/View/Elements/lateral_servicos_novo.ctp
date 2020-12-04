<div class="row">
	<div class="col-md-12 col-lg-12">
		<div class="servicosPara">
			<h3 class="titulo-capa">SERVIÇOS PARA <i class="fa fa-arrow-down"></i></h3>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-lg-12">
		<?php $cidadao = $this->requestAction(array('controller' => 'servicos', 'action' => 'carregaServico', '1', 'admin' => false, 'plugin' => false)); ?>
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-4">
				<?php echo $this->Html->image('cidadaos.png');?>
			</div>
			<div class="col-md-8 col-sm-8 col-xs-8">
				<h4>Para o Cidadão</h4>
				<select name="lista-cidadao" id="lista-cidadao" class="form-control listaServicos selectpicker" data-mobile="true" data-style="btn-cidadao-lista">
				    <option disabled="disabled" selected="selected" value="Escolha um Serviço">Escolha um Serviço</option>
					<?php foreach($cidadao as $cidadaoMenu): ?>
						<option value="<?php echo $cidadaoMenu['Servico']['link'];?>"><?php echo $cidadaoMenu['Servico']['nome']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
	</div>
</div>
<br/>
<div class="row">
	<div class="col-md-12 col-lg-12">
		<?php $servidor = $this->requestAction(array('controller' => 'servicos', 'action' => 'carregaServico', '2', 'admin' => false, 'plugin' => false)); ?>
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-4">
				<?php echo $this->Html->image('servidores.png');?>
			</div>
			<div class="col-md-8 col-sm-8 col-xs-8">
				<h4>Para o Servidor</h4>
				<select name="lista-servidor" id="lista-servidor" class="form-control listaServicos selectpicker" data-mobile="true" data-style="btn-servidor-lista">
				    <option disabled="disabled" selected="selected" value="Escolha um Serviço">Escolha um Serviço</option>
					<?php foreach($servidor as $servidorMenu): ?>
						<option value="<?php echo $servidorMenu['Servico']['link'];?>"><?php echo $servidorMenu['Servico']['nome']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
	</div>
</div>
<br/>
<div class="row">
	<div class="col-md-12 col-lg-12">
		<?php $empresa = $this->requestAction(array('controller' => 'servicos', 'action' => 'carregaServico', '3', 'admin' => false, 'plugin' => false)); ?>
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-4">
				<?php echo $this->Html->image('empresas.png');?>
			</div>
			<div class="col-md-8 col-sm-8 col-xs-8">
				<h4>Para a Empresa</h4>
				<select name="lista-empresa" id="lista-empresa" class="form-control listaServicos selectpicker" data-mobile="true" data-style="btn-empresa-lista">
				    <option disabled="disabled" selected="selected" value="Escolha um Serviço">Escolha um Serviço</option>
					<?php foreach($empresa as $empresaMenu): ?>
						<option value="<?php echo $servidorMenu['Servico']['link'];?>"><?php echo $empresaMenu['Servico']['nome']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
	</div>
</div>
<br/>
<script type="text/javascript">
$(function(){
	$('.listaServicos').on('change', function () {
		var url = $(this).val(); // get selected value
		if (url) { // require a URL
			window.location = url; // redirect
		}
		return false;
	});
});
</script>
