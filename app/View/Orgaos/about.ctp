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
                <h6 class="description">A SECRETARIA</h6>
                <div class="row">
                    <div class="col-md-12">
                        <p><?php echo $orgao['Orgao']['descricao']; ?></p>
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
                <h6 class="description"><?php echo $orgao['Orgao']['cargo_responsavel']; ?></h6>
                <div class="row">
                    <div class="col-md-3 text-center" style="margin-top:70px;">
                        <?php if (!empty($orgao['Orgao']['foto_responsavel'])): echo $this->Html->image("/midia/secretarias/{$orgao['Orgao']['foto_responsavel']}", array('alt' => '', 'border' => 0)); endif; ?>
                    </div>
                    <div class="col-md-9 equipe-secretaria" style="margin-top:70px;">
                        <div class="col-md-12">
                            <h1><b><?php echo $orgao['Orgao']['nome_responsavel']; ?></b></h1>
                            <p>
                                <b>E-mail: </b><?php echo $orgao['Orgao']['email_responsavel']; ?><br/>
                                <b>Telefone: </b><?php echo $orgao['Orgao']['telefone_responsavel']; ?><br/>
                                <?php echo $orgao['Orgao']['descricao_responsavel']; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php if($orgao['Orgao']['id'] == 19): ?>
                <div class="row">
                    <div class="col-md-3 text-center" style="margin-top:70px;">
                        <?php echo $this->Html->image("/midia/secretarias/vice.jpg", array('alt' => '', 'border' => 0)); ?>
                    </div>
                    <div class="col-md-9 equipe-secretaria" style="margin-top:70px;">
                        <div class="col-md-12">
                            <h1><b>Vice-Prefeito Jorge Carreta</b></h1>
                            <p>
                                <b>E-mail: </b>-<br/>
                                <b>Telefone: </b>+55 27 : 3149-7943 // 27 3149-7444<br/>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<section class="team">
    <div class="row">
        <div class="col-md-12">
            <div class="col-lg-12">
                <h6 class="description">NOSSA EQUIPE</h6>
                <div class="row">
                    <?php foreach ($cargos as $cargo): ?>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 equipe-secretaria">
                            <h1><?php echo $cargo['Cargo']['nome']; ?></h1>
                            <h2><?php echo $cargo['Cargo']['cargo']; ?></h2>
                            <p><?php echo $cargo['Cargo']['telefone']; ?><br/>
                                <?php echo $cargo['Cargo']['email']; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>