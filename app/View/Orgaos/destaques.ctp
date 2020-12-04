<?php
/**
* @link          http://cakephp.org CakePHP(tm) Project
* @package       app.View.Pages
* @since         CakePHP(tm) v 0.10.0.1076
*/
?>
<section class="team">
    <div class="row">
        <div class="col-md-12">
            <div class="col-lg-12">
                <h6 class="description">DESTAQUES</h6>
                <div class="row">
                    <div class="col-md-12 equipe-secretaria">
                        <div class="row">
                        <?php foreach($destaques as $destaque): ?>
                            <div class="col-xs-6 col-sm-6 col-md-4" style="min-height:204px; max-height:204px">
                                <?php if(!empty($destaque['Destaque']['link'])){
                                    echo $this->Html->link($this->Html->image('/files/destaques/'.$destaque['Destaque']['imagem'], array('class' => 'img-fluid img-thumbnail')), $destaque['Destaque']['link'], array('escape' => false));
                                }else{
                                    echo $this->Html->link($this->Html->image('/files/destaques/'.$destaque['Destaque']['imagem'], array('class' => 'img-fluid img-thumbnail')), '/files/destaques/'.$destaque['Destaque']['anexo'], array('target' => '_blank', 'escape' => false));
                                } ?>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                            'url' => array('controller' => 'secretaria', 'action' => $orgao['Orgao']['slug'], 'destaques')
                        ));

                        echo $this->Paginator->prev('anterior', array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                        echo $this->Paginator->numbers(array('separator' => '', 'ellipsis' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                        echo $this->Paginator->next('próxima', array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <?php echo $this->Js->writeBuffer(); ?>
</section>