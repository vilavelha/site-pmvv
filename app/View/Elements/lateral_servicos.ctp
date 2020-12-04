<div class="servicosPara">
	<h3 class="titulo-capa">SERVIÇOS PARA <i class="fa fa-arrow-down"></i></h3>
</div>
<ul class="nav nav-tabs" id="tabServicos" role="tablist">
	<li role="presentation"><a class="tabCidadao" href="#cidadao" id="home-tab" role="tab" data-toggle="tab" aria-controls="cidadao" aria-expanded="true">CIDADÃO</a></li>
	<li role="presentation"><a class="tabServidor" href="#servidor" id="A1" role="tab" data-toggle="tab" aria-controls="servidor" aria-expanded="true">SERVIDOR</a></li>
	<li role="presentation"><a class="tabEmpresa" href="#empresa" id="A2" role="tab" data-toggle="tab" aria-controls="empresa" aria-expanded="true">EMPRESA</a></li>
</ul>
<div class="tab-content">
	<div class="tab-pane tab-active" id="cidadao" style="overflow-y: scroll; overflow-x: hidden; height: 205px;">
		<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
			<div class="bs-glyphicons">
				<ul class="bs-glyphicons-list">
					<?php $cidadao = $this->requestAction(array('controller' => 'servicos', 'action' => 'carregaServico', '1', 'admin' => false, 'plugin' => false)); ?>
					<?php foreach($cidadao as $cidadaoMenu): ?>
						<li><span class="glyphicon-class"><?php echo $this->Html->link($cidadaoMenu['Servico']['nome'], $cidadaoMenu['Servico']['link'], array('target' => '_blank')); ?></span></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		</div>
	</div>
	<div class="tab-pane tab-active" id="servidor" style="overflow-y: scroll; overflow-x: hidden; height: 275px;">
		<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
			<div class="bs-glyphicons">
				<ul class="bs-glyphicons-list">
					<li><span class="glyphicon-class"><a href="http://pontoeletronico.vilavelha.es.gov.br/ponto4" target="_blank">Ponto Eletrônico</a></span></li>
					<?php $servidor = $this->requestAction(array('controller' => 'servicos', 'action' => 'carregaServico', '2', 'admin' => false, 'plugin' => false)); ?>
					<?php foreach($servidor as $servidorMenu): ?>
						<li><span class="glyphicon-class"><?php echo $this->Html->link($servidorMenu['Servico']['nome'], $servidorMenu['Servico']['link'], array('target' => '_blank')); ?></span></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		</div>
	</div>
	<div class="tab-pane tab-active" id="empresa" style="overflow-y: scroll; overflow-x: hidden; height: 275px;">
		<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
			<div class="bs-glyphicons">
				<ul class="bs-glyphicons-list">
					<?php $empresa = $this->requestAction(array('controller' => 'servicos', 'action' => 'carregaServico', '3', 'admin' => false, 'plugin' => false)); ?>
					<?php foreach($empresa as $empresaMenu): ?>
						<li><span class="glyphicon-class"><?php echo $this->Html->link($empresaMenu['Servico']['nome'], $empresaMenu['Servico']['link'], array('target' => '_blank')); ?></span></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		</div>
	</div>
</div>
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