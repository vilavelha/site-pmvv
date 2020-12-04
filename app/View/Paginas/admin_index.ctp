<h2><?php echo __('Paginas'); ?></h2>
<div class="row">
    <div class="col-md-12">
        <?php if (isset($BuscaAdmPaginasCat)) { ?>
        Critérios de Busca Atuais:<br/>
        <b>Campo:</b> <?php echo ucwords($BuscaAdmPaginasCat['campo']); ?><br/>
        <b>Valor:</b> <?php echo $BuscaAdmPaginasCat['valor']; ?><br/>
        <b>Publicar:</b> <?php echo ($BuscaAdmPaginasCat['publicar']) ? 'Sim' : 'Não'; ?><br/>
        <?php } ?>
    </div>
</div>
<?php echo $this->Form->create('Pagina'); ?>
<div class="row">
    <div class="col-md-12">
        <h4>Filtros:</h4>
    </div>
</div>
    <div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <?php echo $this->Form->input('valor', array('label' => 'Valor da busca', 'div' => false, 'class' => 'form-control')); ?>
        </div>
    </div>
    <div class="col-md-2">
        <?php $itens = array('nome' => 'Nome'); ?>
            <label for="">Campos</label>
            <?php echo $this->Form->input('campo', array('options' => $itens, 'div' => false, 'label' => false, 'class' => 'form-control')); ?>
        </div>
        <div class="col-md-2">
            <div class="checkbox">
                <label>
                    <?php echo $this->Form->input('publicar', array('type' => 'checkbox', 'default' => true)); ?>
                </label>
            </div>
        </div>
        <div class="col-md-2">
            <br/>
            <?php echo $this->Html->link('Limpar Filtros', array('controller' => 'paginas', 'action' => 'index', 'admin' => true, 'limpar' => 1), array('class' => 'btn btn-warning')); ?>
        </div>
        <div class="col-md-2">
            <br/>
            <button type="submit" class="btn btn-success">Buscar</button>
        </div>
    </div>
<?php echo $this->Form->end(); ?>
<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('orgao_id'); ?></th>
		<th><?php echo $this->Paginator->sort('coordenadoria_id'); ?></th>
		<th><?php echo $this->Paginator->sort('tipo'); ?></th>
		<th><?php echo $this->Paginator->sort('nome'); ?></th>
		<th><?php echo $this->Paginator->sort('publicar'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($paginas as $pagina): ?>
		<tr>
			<td><?php echo h($pagina['Pagina']['id']); ?>&nbsp;</td>
			<td>
				<?php echo $this->Html->link($pagina['Orgao']['nome'], array('controller' => 'orgaos', 'action' => 'view', $pagina['Orgao']['id'])); ?>
			</td>
			<td>
				<?php echo $this->Html->link($pagina['Coordenadoria']['nome'], array('controller' => 'coordenadorias', 'action' => 'view', $pagina['Coordenadoria']['id'])); ?>
			</td>
			<td><?php if($pagina['Pagina']['tipo'] != 0){ echo h($tipos[$pagina['Pagina']['tipo']]); } ?>&nbsp;</td>
			<td><?php echo h($pagina['Pagina']['nome']); ?>&nbsp;</td>
			<td><?php if ($pagina['Pagina']['publicar']) { echo 'Sim'; } else { echo 'Não'; }?>&nbsp;</td>
			<td><?php echo $this->Time->format($pagina['Pagina']['created'], '%d/%m/%y');?><br/><?php echo $this->Time->format($pagina['Pagina']['created'], '%H:%M'); ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link('Visualizar', array('action' => 'view', $pagina['Pagina']['id']), array('class' => 'btn btn-info')); ?>
				<?php echo $this->Html->link('Editar', array('action' => 'edit', $pagina['Pagina']['id']), array('class' => 'btn btn-warning')); ?>
				<?php echo $this->Form->postLink('Excluir', array('action' => 'delete', $pagina['Pagina']['id']), array('class' => 'btn btn-danger'), array('confirm' => __('Are you sure you want to delete # %s?', $pagina['Pagina']['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
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
