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
                <h6 class="description">PLANEJAMENTOS</h6>
                <div class="row">
                    <div class="col-md-12 equipe-secretaria">
                        <div class="row">
                        <?php foreach($planejamentos as $planejamento): ?>
                            <div class="col-md-4">
                                <h2><b><?php echo $this->Html->link($planejamento['Pagina']['nome'], array('controller' => 'paginas', 'action' => $planejamento['Pagina']['slug'])); ?></b></h2>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>