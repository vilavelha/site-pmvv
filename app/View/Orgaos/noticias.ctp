<?php

/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */
?>
<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" id="divNoticiasAjax" style="">
    teste
    <?php foreach ($noticias as $noticia) : ?>
    <div class="col-xs-12 col-sm-12 col-md-4" style="min-height:310px">
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
    <?
php ec
ho $this->Js->writeBuffer(); ?>
</div>