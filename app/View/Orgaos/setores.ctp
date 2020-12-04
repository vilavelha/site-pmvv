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
                <h6 class="description">SETORES</h6>
                <div class="row">
                    <div class="col-md-12 equipe-secretaria">
                        <div class="row">
                        <?php foreach($coordenadorias as $coordenadoria): ?>
                            <div class="col-md-4">
                                <h2><b><?php echo $this->Html->link($coordenadoria['Coordenadoria']['nome'], array('controller' => 'setor', 'action' => $coordenadoria['Orgao']['slug'], $coordenadoria['Coordenadoria']['slug'])); ?></b></h2>
                                <p><?php echo $coordenadoria['Tipo']['nome']; ?></p>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>