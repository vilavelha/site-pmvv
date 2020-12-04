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
            <div class="col-md-12">
                <div class="col-lg-12">
                    <h6 class="description text-uppercase"><?php echo $coordenadoria['Coordenadoria']['nome']; ?></h6>
                    <div class="row">
                        <div class="col-md-12">
                            <p><?php echo $coordenadoria['Coordenadoria']['descricao']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="team">
        <div class="row">
            <div class="col-md-12">
                <div class="col-lg-12">
                    <h6 class="description">PÁGINAS</h6>
                    <div class="row">
                        <div class="col-md-10 equipe-secretaria">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php foreach ($coordenadoria['Pagina'] as $pagina): ;?>
                                        <h2><b><?php echo $this->Html->link($pagina['nome'], array('controller' => 'paginas', 'action' => $pagina['slug'])); ?></b></h2>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php if(!empty($coordenadoria['Servico'])): ?>
    <section class="team">
        <div class="row">
            <div class="col-md-12">
                <div class="col-lg-12">
                    <h6 class="description">SERVIÇOS</h6>
                    <div class="row">
                        <div class="col-md-10 equipe-secretaria">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php foreach ($coordenadoria['Servico'] as $servico): ;?>
                                        <h2><b><?php echo $this->Html->link($servico['nome'], $servico['link']); ?></b></h2>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
</div>