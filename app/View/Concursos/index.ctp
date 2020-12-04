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
                <h6 class="description">CONCURSOS E SELEÇÕES</h6>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <ul class="list-group">
                <div class="row">
                <?php foreach($concursos as $concurso): ?>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <?php echo $this->Html->link($concurso['Concurso']['titulo'], array('controller' => 'concursos', 'action' => $concurso['Concurso']['slug'])); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </ul>
        </div>
    </div>
    <div clas="row">
        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 text-center">
            <div class="pagination pagination-large">
                <ul class="pagination">
                    <?php
                    echo $this->Paginator->prev('anterior', array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                    echo $this->Paginator->numbers(array('separator' => '', 'ellipsis' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                    echo $this->Paginator->next('próxima', array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>