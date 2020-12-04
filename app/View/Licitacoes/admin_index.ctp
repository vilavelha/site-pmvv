<div class="licitacoes index">
	<h2><?php echo __('Licitacões'); ?></h2>
	<div id="accordion">
            <div class="row">
                <div class="col-md-12 text-right">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                    </a>
                </div>
            </div>
            
            <div id="collapseOne" class="panel-collapse <?php if(!isset($BuscaLicitacoesCat)){echo 'collapse';}?>">
            <?php echo $this->Form->create('Licitacao', array('url' => array('controller' => 'licitacoes', 'action' => 'index', 'admin' => true, 'page' => 1))); ?>
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
                        <?php echo $this->Form->hidden('page', array('value' => 1));?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-right">
                    <br/>
                        <?php echo $this->Html->link('Limpar Filtros', array('controller' => 'licitacoes', 'action' => 'index', 'admin' => true, 'limpar' => 1), array('class' => 'btn btn-warning')); ?>
                        <button type="submit" class="btn btn-success">Buscar</button>
                    </div>
                </div>
            <?php echo $this->Form->end(); ?>
            </div>
        </div>
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<thead>
	<tr>
			
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('orgao_id'); ?></th>
			<th><?php echo $this->Paginator->sort('requisitante_id'); ?></th>
			<th><?php echo $this->Paginator->sort('número'); ?></th>
			<th><?php echo $this->Paginator->sort('processo'); ?></th>
			<th><?php echo $this->Paginator->sort('modalidade'); ?></th>
			<th><?php echo $this->Paginator->sort('responsável'); ?></th>
			<th><?php echo $this->Paginator->sort('resultado'); ?></th>
			<th><?php echo 'Deletado'; ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($licitacoes as $licitacao): ?>
	<tr>
		<td><?php echo h($licitacao['Licitacao']['id']); ?>&nbsp;</td>
		<td>
			<?php echo h($licitacao['Orgao']['nome']); ?>
		</td>
		<td><?php echo h($licitacao['Requisitante']['nome']); ?>&nbsp;</td>
		<td><?php echo h($licitacao['Licitacao']['numero']); ?>&nbsp;</td>
		<td><?php echo h($licitacao['Licitacao']['processo']); ?>&nbsp;</td>
		<td><?php echo h($licitacao['Licitacao']['modalidade']); ?>&nbsp;</td>
		<td><?php echo h($licitacao['Licitacao']['responsavel']); ?>&nbsp;</td>
		<td><?php echo h($licitacao['Licitacao']['resultado']); ?>&nbsp;</td>
		<td><?php echo ($licitacao['Licitacao']['deletado'])? 'Sim' : 'Não'; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link('Visualizar', array('action' => 'view', $licitacao['Licitacao']['id']), array('class' => 'btn btn-info')); ?>

			<?php echo $this->Html->link('Editar', array('action' => 'edit', $licitacao['Licitacao']['id']), array('class' => 'btn btn-warning')); ?><br>

			<?php echo $this->Form->postLink('Excluir', array('action' => 'delete', $licitacao['Licitacao']['id']),array('class' => 'btn btn-danger'), array('confirm' => __('Are you sure you want to delete # %s?', $licitacao['Licitacao']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	
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

