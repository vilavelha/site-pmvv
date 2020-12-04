<?php

/**
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */
echo $this->Html->css(
	array(
		'lightbox/lightbox.min',
	)
);

echo $this->Html->script(
	array(
		'lightbox/lightbox.min'
	)
);
?>
<div id="fb-root"></div>
<script>
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.8&appId=139224329595510";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div class="container" style="padding-top: 20px;clear:both">
    <!-- <div class="row" style="margin-bottom: 20px">
        <div class="col-md-12 col-lg-12 col-sm-12 text-center">
            <img src="https://www.vilavelha.es.gov.br/app/webroot/img/banners/comunicado_site.jpg" />
        </div>
	</div> -->
    <div class="container" style="padding-top: 20px;clear:both; display: block">
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php $i = 0;
						foreach ($banners as $key => $banner) : ?>
                        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" <?php if ($i == 0) {
																												echo ' class="active"';
																											};
																											$i++; ?>></li>
                        <?php endforeach; ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php $i = 0;
						foreach ($banners as $key => $banner) : ?>
                        <div class="item<?php if ($i == 0) {
												echo ' active';
											}; ?>">
                            <?php echo $this->Html->link($this->Html->image('/' . MIDIA_URI . '/' . $banner['Imagem']['pasta'] . '/' . $banner['Imagem']['id'] . '_' . $this->Time->format('d', $banner['Imagem']['created']) . $this->Time->format('m', $banner['Imagem']['created']) . $this->Time->format('Y', $banner['Imagem']['created']) . '_900x500.jpg'), $banner['Banner']['link'], array('escape' => false, 'onClick' => "ga('send','event', 'Banner', 'click', 'Cliques contabilizados no banner do topo');")); ?>
                            <div class="carousel-caption">
                                <h4><a href="<?php echo $banner['Banner']['link']; ?>"
                                        onClick="ga('send','event', 'Banner', 'click', 'Cliques contabilizados no banner do topo');"
                                        class="link-banner-topo"><?php echo h($banner['Banner']['titulo']); ?></a></h4>
                                <h6><?php echo $this->Time->format('d', $banner['Banner']['created']) . ' de ' . $meses[$this->Time->format('n', $banner['Banner']['created'])] . ' de ' . $this->Time->format('Y', $banner['Banner']['created']); ?>
                                </h6>
                            </div>
                        </div>
                        <?php $i++;
						endforeach; ?>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 btn-group">
                <?php echo $this->element('agenda_prefeito'); ?>
                <?php echo $this->element('lateral_servicos'); ?>
            </div>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-md-3 col-lg-3 col-sm-12 btn-group">
        </div>
        <div class="col-md-6 col-lg-6 col-sm-12 btn-group">
            <?php // echo $this->element('agenda_prefeito');
			?>
            <?php // echo $this->element('lateral_servicos');
			?>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-12 btn-group">
        </div>
    </div> -->
    <div class="row">
        <!-- <div class="col-md-3 col-lg-3 col-sm-12 btn-group">
        </div> -->
        <div class="col-md-12">
            <div id="mais-noticias" class="container" style="display: block">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <h3 class="titulo-capa">NOTÍCIAS <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                </h3>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach ($noticias as $noticia) : ?>
                            <div class="col-xs-12 col-sm-12 col-md-6" style="min-height:310px">
                                <a href="<?php echo $this->webroot . "noticias/{$this->Time->format('Y',$noticia['Noticia']['created'])}/{$this->Time->format('m',$noticia['Noticia']['created'])}/{$noticia['Noticia']['slug']}"; ?>"
                                    onClick="ga('send','event', '4 Noticias', 'click', 'Cliques contabilizados nas 4 noticias abaixo do banner do topo');">
                                    <div class="thumbnail">
                                        <div class="img-mais-noticias">
                                            <?php
												if ($noticia['Noticia']['created'] < "2013-11-01 00:00:00") {
													if ($noticia['ImagemGrande']['id'] != NULL) {
														echo $this->Utils->imagemMidia($noticia['ImagemGrande'], array('height' => '290'));
													} else {
														echo $this->Utils->imagemMidia($noticia['ImagemMiniatura'], array('height' => '290'));
													}
												} else {
													if (!empty($noticia['ImagemGrande'])) : echo $this->Html->image('https://www.vilavelha.es.gov.br/' . MIDIA_URI . '/' . $noticia['ImagemGrande']['pasta'] . '/' . $noticia['ImagemGrande']['id'] . '_' . $this->Time->format('d', $noticia['ImagemGrande']['created']) . $this->Time->format('m', $noticia['ImagemGrande']['created']) . $this->Time->format('Y', $noticia['ImagemGrande']['created']) . '_326x290.jpg');
													endif;
												}
												?>
                                        </div>
                                        <div class="caption">
                                            <h4><?php echo h($noticia['Noticia']['titulo']); ?></h4>
                                            <p><?php echo h($noticia['Noticia']['texto_resumo']); ?></p>
                                            <!--<a href="#" class="btn btn-info btn-xs" role="button">Leia Mais</a>-->
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- ULTIMAS NOTICIAS -->
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <h3 class="titulo-capa">ÚLTIMAS NOTÍCIAS <i class="fa fa-newspaper-o"
                                        aria-hidden="true"></i></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <ul class="lista-mais-noticias list-unstyled">
                                    <?php foreach ($ultimasNoticias as $ultima) : ?>
                                    <a href="<?php echo $this->webroot . "noticias/{$this->Time->format('Y',$ultima['Noticia']['created'])}/{$this->Time->format('m',$ultima['Noticia']['created'])}/{$ultima['Noticia']['slug']}"; ?>"
                                        onClick="ga('send','event', '7 Noticias', 'click', 'Cliques contabilizados nas 7 noticias abaixo do banner do topo');">
                                        <li class="list-group-item"><em>
                                                <?php echo $this->Time->format('d', $ultima['Noticia']['created']) . '/' . $this->Time->format('m', $ultima['Noticia']['created']) . '/' . $this->Time->format('Y', $ultima['Noticia']['created']); ?></em>
                                            <?php echo h($ultima['Noticia']['titulo']); ?></li>
                                    </a>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <h5 class="text-right">
                                    <?php echo $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> Leia mais Notícias', array('controller' => 'noticias', 'action' => 'index'), array('escape' => false)); ?>
                                </h5>
                            </div>
                        </div>
                        <!-- ULTIMAS NOTICIAS -->
                    </div>
                    <!-- <div class="col-lg-4 atalhos-coluna-direita">
                        <?php // echo $this->element('programacoes');
						?>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- <div class="col-md-3 col-lg-3 col-sm-12 btn-group">
        </div> -->
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 atalhos-coluna-direita">
            <?php echo $this->element('programacoes'); ?>
        </div>
    </div>
</div>



<!--comentado fmnbs-->
<!--<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="panel-title">FACEBOOK <i class="fa fa-facebook" aria-hidden="true"></i></h5>
                    <div class="fb-page" data-href="https://www.facebook.com/vilavelha" data-tabs="timeline"
                        data-height="350" data-small-header="false" data-adapt-container-width="false"
                        data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/vilavelha" class="fb-xfbml-parse-ignore"><a
                                href="https://www.facebook.com/vilavelha">Prefeitura de Vila Velha</a></blockquote>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="panel-title">TWITTER <i class="fa fa-twitter" aria-hidden="true"></i></h5>
                    <a class="twitter-timeline" data-lang="pt" data-height="337" data-tweet-limit="1"
                        href="https://twitter.com/vilavelhaes"></a>
                    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
                <div class="col-md-4">
                    <h5 class="panel-title">INSTAGRAM <i class="fa fa-instagram" aria-hidden="true"></i></h5>

                    <script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe
                        src="//lightwidget.com/widgets/743dada4060a5fa09d3d151ba2bfbead.html" scrolling="no"
                        allowtransparency="true" class="lightwidget-widget"
                        style="width:100%;border:0;overflow:hidden;"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>-->

<section class="sub-footer">
    <div class="container">
        <h3 class="heading-large">
            FOTOS DA VILA
        </h3>
        <div class="row">
            <div class="col-md-3">
                <div class="news-block">
                    <div class="news-media">
                        <a class="example-image-link" href="https://www.vilavelha.es.gov.br/img/portal.jpg"
                            data-lightbox="media-2" data-title="">
                            <img class="img-fluid example-image" src="https://www.vilavelha.es.gov.br/img/portal.jpg"
                                alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="news-block">
                    <div class="news-media">
                        <a class="example-image-link" href="https://www.vilavelha.es.gov.br/img/portal-1.jpg"
                            data-lightbox="media-2" data-title="">
                            <img class="img-fluid example-image" src="https://www.vilavelha.es.gov.br/img/portal-1.jpg"
                                alt="">
                        </a>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-3">
                <div class="news-block">
                    <div class="news-media">
                        <a class="example-image-link" href="https://www.vilavelha.es.gov.br/img/portal-2.jpg" data-lightbox="media-2" data-title="">
                            <img class="img-fluid example-image" src="https://www.vilavelha.es.gov.br/img/portal-2.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div> -->
            <div class="col-md-3">
                <div class="news-block">
                    <div class="news-media">
                        <a class="example-image-link" href="https://www.vilavelha.es.gov.br/img/portal-3.jpg"
                            data-lightbox="media-2" data-title="">
                            <img class="img-fluid example-image" src="https://www.vilavelha.es.gov.br/img/portal-3.jpg"
                                alt="">
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">


















                <div class="news-block">

          
          <div class="news-media">

                        <a class="example-image-link" href="https://www.vilavelha.es.gov.br/img/portal-4.jpg"
                            data-lightbox="media-2" data-title="">
                            <img class="img-fluid example-image" src="https://www.vilavelha.es.gov.br/img/portal-4.jpg"
                                alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</section>