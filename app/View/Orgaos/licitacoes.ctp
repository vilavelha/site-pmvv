<?php
/**
* @link          http://cakephp.org CakePHP(tm) Project
* @package       app.View.Pages
* @since         CakePHP(tm) v 0.10.0.1076
*/
?>
<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" id="divNoticiasAjax">
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
                <td colspan="6">
                    <a href="<?php echo $this->webroot.'licitacoes/view/'.$licitacao['Licitacao']['id'];?>">
                        <button type="button" class="btn btn-danger col-md-12">Visualizar Mais Informações</button>  </a> 
                        <hr/>
                    </td>
                </tr>
            </table>
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
                            'url' => array('controller' => 'secretaria', 'action' => $orgao['Orgao']['slug'], 'licitacoes')
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
    </div>