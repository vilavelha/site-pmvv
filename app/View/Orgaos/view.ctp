<?php

/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */
?>
<nav class="navbar-secretaria navbar-secretaria-default">
    <div class="container">
        <div class="navbar-header">
            <div class="navbar-brand visible-xs">MENU SECRETARIA</div>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#navbar-secretaria" aria-expanded="false" aria-controls="navbar-secretaria">
                <span class="sr-only">Abrir Navegação</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar-secretaria" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    <?php echo $this->Js->link('NOTÍCIAS', '/secretaria/' . $orgao['Orgao']['slug'] . '/noticias', array('before' => $this->Js->get('#loading')->effect('fadeIn'), 'success' => $this->Js->get('#loading')->effect('fadeOut'), 'update' => '#mydiv', 'evalScripts' => true)); ?>
                </li>
                <li>
                    <?php echo $this->Js->link('A SECRETARIA', '/secretaria/' . $orgao['Orgao']['slug'] . '/about', array('before' => $this->Js->get('#loading')->effect('fadeIn'), 'success' => $this->Js->get('#loading')->effect('fadeOut'), 'update' => '#mydiv', 'evalScripts' => true)); ?>
                </li>
                <li><?php echo $this->Js->link('SETORES', '/secretaria/' . $orgao['Orgao']['slug'] . '/setores', array('before' => $this->Js->get('#loading')->effect('fadeIn'), 'success' => $this->Js->get('#loading')->effect('fadeOut'), 'update' => '#mydiv', 'evalScripts' => true)); ?>

                </li>
                <li><?php echo $this->Js->link('SERVIÇOS', '/secretaria/' . $orgao['Orgao']['slug'] . '/servicos', array('before' => $this->Js->get('#loading')->effect('fadeIn'), 'success' => $this->Js->get('#loading')->effect('fadeOut'), 'update' => '#mydiv', 'evalScripts' => true)); ?>
                </li>
                <li><?php echo $this->Js->link('PLANEJAMENTOS', '/secretaria/' . $orgao['Orgao']['slug'] . '/planejamentos', array('before' => $this->Js->get('#loading')->effect('fadeIn'), 'success' => $this->Js->get('#loading')->effect('fadeOut'), 'update' => '#mydiv', 'evalScripts' => true)); ?>
                </li>
                <li><?php echo $this->Js->link('PAGINAS', '/secretaria/' . $orgao['Orgao']['slug'] . '/paginas', array('before' => $this->Js->get('#loading')->effect('fadeIn'), 'success' => $this->Js->get('#loading')->effect('fadeOut'), 'update' => '#mydiv', 'evalScripts' => true)); ?>
                </li>
                <li><?php echo $this->Js->link('LICITAÇÕES', '/secretaria/' . $orgao['Orgao']['slug'] . '/licitacoes', array('before' => $this->Js->get('#loading')->effect('fadeIn'), 'success' => $this->Js->get('#loading')->effect('fadeOut'), 'update' => '#mydiv', 'evalScripts' => true)); ?>
                </li>
                <li><?php echo $this->Js->link('DESTAQUES', '/secretaria/' . $orgao['Orgao']['slug'] . '/destaques', array('before' => $this->Js->get('#loading')->effect('fadeIn'), 'success' => $this->Js->get('#loading')->effect('fadeOut'), 'update' => '#mydiv', 'evalScripts' => true)); ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container" style="padding-top: 20px;clear:both">
    <div class="row">
        <div class="col-md-12 col-lg-12 text-uppercase text-center">
            <h3><b>
                    <?php if (($orgao['Orgao']['id'] != '21') && ($orgao['Orgao']['id'] != '22')) { ?>
                    <?php if ($orgao['Orgao']['id'] == '19') { ?>
                    <?php echo $orgao['Orgao']['nome']; ?> do Prefeito
                    <?php } else { ?>
                    Secretaria de <?php echo $orgao['Orgao']['nome']; ?>
                    <?php } ?>
                    <?php } else { ?>
                    <?php echo $orgao['Orgao']['nome']; ?> <?php if (!empty($orgao['Orgao']['sigla'])) {
																	echo ' - ' . h($orgao['Orgao']['sigla']);
																} ?>
                    <?php } ?>
                </b></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center"><i class="fa fa-map-marker"></i><b> Endereço:</b>
            <?php echo $orgao['Orgao']['endereco']; ?></div>
    </div>
    <div class="divisor-20"></div>
    <div class="row" id="mydiv">
        <?php $tamanho_coluna = (!empty($destaques)) ? 'col-md-9 col-lg-9 col-xs-12 col-sm-12' : 'col-md-12 col-lg-12 col-xs-12 col-sm-12';  ?>
        <div class="<?php echo $tamanho_coluna; ?>" id="divNoticiasAjax">
            <?php foreach ($noticias as $noticia) : ?>
            <div class="col-xs-12 col-sm-12 col-md-4" style="min-height:333px">
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
									if (!empty($noticia['ImagemGrande'])) : echo $this->Html->image('http://www.vilavelha.es.gov.br/' . MIDIA_URI . '/' . $noticia['ImagemGrande']['pasta'] . '/' . $noticia['ImagemGrande']['id'] . '_' . $this->Time->format('d', $noticia['ImagemGrande']['created']) . $this->Time->format('m', $noticia['ImagemGrande']['created']) . $this->Time->format('Y', $noticia['ImagemGrande']['created']) . '_326x290.jpg');
									endif;
								}
								?>
                        </div>
                        <div class="caption">
                            <h4 class="text-capitalize"><?php echo h($noticia['Noticia']['titulo']); ?></h4>
                            <p class="text-capitalize"><?php echo h($noticia['Noticia']['texto_resumo']); ?></p>
                            <!--<a href="#" class="btn btn-info btn-xs" role="button">Leia Mais</a>-->
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
            <div clas="row">
                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 text-center">
                    <div class="pagination pagination-large">
                        <ul class="pagination">
                            <?php
							/*$this->Paginator->options(array(
                                  'url' =>
                                    array('controller' => 'noticias', 'action' => $this->params['ano'].'/'.$this->params['mes'])
                                ));*/
							$this->Paginator->options(array(
								'update' => '#mydiv',
								'evalScripts' => true,
								'before' => $this->Js->get('#busy-indicator')->effect('fadeIn', array('buffer' => false)),
								'complete' => $this->Js->get('#busy-indicator')->effect('fadeOut', array('buffer' => false)),
								'url' => array('controller' => 'secretaria', 'action' => $orgao['Orgao']['slug'], 'noticias')
							));

							echo $this->Paginator->prev('anterior', array('tag' => 'li'), null, array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a'));
							echo $this->Paginator->numbers(array('separator' => '', 'ellipsis' => '', 'currentTag' => 'a', 'currentClass' => 'active', 'tag' => 'li', 'first' => 1));
							echo $this->Paginator->next('próxima', array('tag' => 'li', 'currentClass' => 'disabled'), null, array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a'));
							?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php if (!empty($destaques)) : ?>
        <div class="col-md-3 col-sm-12">
            <ul class="ds-btn">
                <?php foreach ($destaques as $destaque) : ?>
                <li>
                    <?php if (!empty($destaque['Destaque']['link'])) {
								echo $this->Html->link($this->Html->image('/files/destaques/' . $destaque['Destaque']['imagem'], array('class' => 'img-fluid img-thumbnail')), $destaque['Destaque']['link'], array('escape' => false));
							} else {
								echo $this->Html->link($this->Html->image('/files/destaques/' . $destaque['Destaque']['imagem'], array('class' => 'img-fluid img-thumbnail')), '/files/destaques/' . $destaque['Destaque']['anexo'], array('target' => '_blank', 'escape' => false));
							} ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <?php endif; ?>
      
  <?php echo $this->Js->writeBuffer(); ?>
    </div>
</div>