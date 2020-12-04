<h2><?php echo 'Secretarias'; ?></h2>
<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
        <th><?php echo $this->Paginator->sort('orgaos_id', 'Secretaria'); ?></th>
        <th><?php echo $this->Paginator->sort('tipo_id'); ?></th>
        <th><?php echo $this->Paginator->sort('nome'); ?></th>
        <th><?php echo $this->Paginator->sort('sigla'); ?></th>
        <th><?php echo $this->Paginator->sort('nome_responsavel'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($orgaos as $orgao): ?>
            <tr>
                <td><?php echo h($orgao['Orgao']['id']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($orgao['Orgaos']['nome'], array('controller' => 'orgaos', 'action' => 'view', $orgao['Orgaos']['id'])); ?>
                </td>
                <td>
                    <?php echo $this->Html->link($orgao['Tipo']['nome'], array('controller' => 'tipos', 'action' => 'view', $orgao['Tipo']['id'])); ?>
                </td>
                <td><?php echo h($orgao['Orgao']['nome']); ?>&nbsp;</td>
                <td><?php echo h($orgao['Orgao']['sigla']); ?>&nbsp;</td>
                <td><?php echo h($orgao['Orgao']['nome_responsavel']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Visualizar'), array('action' => 'view', $orgao['Orgao']['id']), array('class' => 'btn btn-info')); ?>
                    <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $orgao['Orgao']['id']), array('class' => 'btn btn-warning')); ?>
                    <?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $orgao['Orgao']['id']),array('class' => 'btn btn-danger') , __('Tem certeza de que deseja excluir a secretaria # %s?', $orgao['Orgao']['id'])); ?>
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
