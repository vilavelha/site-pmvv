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
            <div class="col-md-12 col-lg-12 text-center">
                <h2 class="description">LICITAÇÕES</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="https://www.licitacoes-e.com.br/aop/index.jsp?codSite=034665&URL=www.vilavelha.es.gov.br">
                    <button type="button" class="btn btn-danger col-md-12">Caso deseje conferir os Pregões Eletrônicos, clique aqui.</button>
                </a>
            </div>
        </div>
        <br/>
        <div id="accordion">
            <div class="row">
                <div class="col-md-12 text-right">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Filtro <span class="glyphicon glyphicon-search"></span></button>
                    </span>
                    </a>
                </div>
            </div>
            
            <div id="collapseOne" class="panel-collapse <?php if(!isset($BuscaLicitacoesCat)){echo 'collapse';}?>">
            <?php echo $this->Form->create('Licitacao', array('url' => array('controller' => 'licitacoes', 'action' => 'index', 'admin' => false, 'page' => 1))); ?>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Filtro</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo $this->Form->input('valor', array('label' => 'Valor da busca', 'div' => false, 'class' => 'form-control')); ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">Campo da Busca</label>
                        <?php echo $this->Form->input('campo', array('label' => false,
                            'before' => '<label class="radio-inline">',
                            'after' => '</label>',
                            'separator' => '</label><label class="radio-inline">',
                            'legend' => false, 'type' => 'radio', 'options' => array('objeto' => 'Objeto','numero' => 'Nº da Licitacao'),'default' => 'objeto')); ?>
                    </div>
                    <div class="col-md-5">
                        <label for="">Secretaria</label>
                        <?php echo $this->Form->input('secretaria', array('options' => $secretarias, 'empty' => 'Todas Secretarias', 'div' => false, 'label' => false, 'class' => 'form-control')); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-right">
                    <br/>
                        <?php echo $this->Html->link('Limpar Filtros', array('controller' => 'licitacoes', 'action' => 'index', 'admin' => false, 'limpar' => 1), array('class' => 'btn btn-warning')); ?>
                        <button type="submit" class="btn btn-success">Buscar</button>
                    </div>
                </div>
            <?php echo $this->Form->end(); ?>
            </div>
        </div>
        <br/>
            <?php foreach($licitacoes as $licitacao): ?>
                <table class="table table-bordered">
                <tr>
                    <th class="bg-primary" colspan="6"><?php echo $licitacao['Requisitante']['nome'];?> - <?php echo $licitacao['Licitacao']['numero']; ?></th>
                </tr>
                <tr>
                    <th class="active">Nº da Licitação:</th>
                    <td>
                        <p><?php echo $licitacao['Licitacao']['numero']; ?></p>
                    </td>
                    <th class="active">
                        Modalidade:
                    </th>
                    <td>
                        <p> <?php echo $licitacao['Licitacao']['modalidade']?>  </p>                                      
                    </td>
                    <th class="active">
                        Resultado da licitação:
                    </th>
                    <td>
                        <?php echo $licitacao['Licitacao']['resultado'];?>
                    </td>
                </tr>
                <tr>
                    <th class="active">
                        Início Acolhimento:
                    </th>
                    <td>
                        <?php if (!empty($licitacao['Licitacao']['inicio_acolhimento'])) { ?>
                        <p>
                            <?php echo $this->Time->format('d', $licitacao['Licitacao']['inicio_acolhimento']);?>/<?php echo $this->Time->format('m', $licitacao['Licitacao']['inicio_acolhimento']);?>/<?php echo $this->Time->format('Y', $licitacao['Licitacao']['inicio_acolhimento']);?> - <?php echo $this->Time->format('H:i', $licitacao['Licitacao']['inicio_acolhimento']);?> hrs
                        </p>
                        <?php } ?>
                    </td>
                    <th class="active">
                        Fim recebimento de Proposta:
                    </th>
                    <td>
                        <?php if (!empty($licitacao['Licitacao']['fim_recebimento'])) { ?>
                        <p>
                            <?php echo $this->Time->format('d', $licitacao['Licitacao']['fim_recebimento']);?>/<?php echo $this->Time->format('m', $licitacao['Licitacao']['fim_recebimento']);?>/<?php echo $this->Time->format('Y', $licitacao['Licitacao']['fim_recebimento']);?> - <?php echo $this->Time->format('H:i', $licitacao['Licitacao']['fim_recebimento']);?> hrs
                        </p>
                        <?php } ?>
                    </td>
                    <th class="active">
                        Data do Certame:
                    </th>
                    <td>
                        <?php if (!empty($licitacao['Licitacao']['inicio_disputa'])) { ?>
                        <p>
                            <?php echo $this->Time->format('d', $licitacao['Licitacao']['inicio_disputa']);?>/<?php echo $this->Time->format('m', $licitacao['Licitacao']['inicio_disputa']);?>/<?php echo $this->Time->format('Y', $licitacao['Licitacao']['inicio_disputa']);?> - <?php echo $this->Time->format('H:i', $licitacao['Licitacao']['inicio_disputa']);?> hrs
                        </p>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <th colspan="6" class="active">Objeto</th>     
                </tr>
                <tr>
                    <td colspan="6">
                        <p><?php echo $licitacao['Licitacao']['objeto']; ?></p>
                    </td>                                    
                </tr>
                <tr>
                <td colspan="6" class="text-center">
                    <a class="text-center" href="<?php echo $this->webroot.'licitacoes/view/'.$licitacao['Licitacao']['id'];?>">
                        <button type="button" class="btn btn-danger col-md-6 text-center" style="float: none !important">Visualizar Mais Informações</button>  </a> 
                        <hr/>
                    </td>
                </tr>
            </table>
			<br /><br />
            <?php endforeach; ?>
        <div clas="row">
            <div align="center">
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
    </section>
</div>