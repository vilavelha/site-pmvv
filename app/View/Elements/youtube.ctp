<div class="row" id="vilavelha-em-dia">
	<div class="servicosPara col-md-12 col-lg-12">
		<h3 class="titulo-capa">VILA VELHA EM DIA <i class="fa fa-television" aria-hidden="true"></i></h3>
	</div>
	<div class="col-md-12 col-lg-12">
		<?php $video = $this->requestAction(array('controller' => 'videos', 'action' => 'carrega_destaque')); ?>
		<?php if(empty($video)){?>
			<iframe width="100%" height="240" src="https://www.youtube.com/embed/6DhMYV_Gb0Y" frameborder="0" allowfullscreen></iframe>
		<?php }else{ ?>
			<iframe width="100%" height="240" src="https://www.youtube.com/embed/<?php echo $video['Video']['link'];?>" frameborder="0" allowfullscreen></iframe>
		<?php } ?>
	</div>
	<div class="col-md-12 col-lg-12 text-center">
		<?php echo $this->Html->link('Clique aqui para visualizar mais vídeos.', array('controller' => 'videos', 'action' => 'index')); ?>
	</div>
</div>