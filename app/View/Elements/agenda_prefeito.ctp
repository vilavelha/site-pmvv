<div class="row">
    <div class="col-md-12 col-lg-12">
        <?php echo $this->Html->link(
			$this->Html->image('coronavirus.png', array('class' => 'img-responsive', 'style' => 'width:100%; margin-bottom:10px;')),
			'https://www.vilavelha.es.gov.br/coronavirus/',
			array('escape' => false)
		); ?>
    </div>
    <div class="col-md-12 col-lg-12">
        <?php echo $this->Html->link(
			$this->Html->image('banner_painel_site.jpg', array('class' => 'img-responsive', 'style' => 'width:100%; margin-bottom:10px;')),
			'http://covid.vilavelha.es.gov.br:8080/covid/publico.xhtml',
			array('escape' => false)
		); ?>
    </div>
    <div class="col-md-12 col-lg-12">
        <?php echo $this->Html->link($this->Html->image('banners/banner_IPTU2020.jpeg', array('class' => 'img-fluid img-thumbnail')), 'https://www.vilavelha.es.gov.br/paginas/administracao-pagamento-do-iptu-2020/', array('escape' => false, 'target' => '_blank')); ?>
    </div>
</div>
