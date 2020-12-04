<div class="interessados index">
	<h2><?php echo 'Interessados no edital ' . $licitacao['Licitacao']['numero']; ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-striped">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('interessado'); ?></th>
				<th><?php echo $this->Paginator->sort('telefone'); ?></th>
				<th><?php echo $this->Paginator->sort('email'); ?></th>
				<th><?php echo 'Solicitações'; ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($contadores as $contador): ?>
				<tr>
					<td><?php echo h($contador['Contador']['interessado']); ?></td>
					<td><?php echo h($contador['Contador']['telefone']); ?></td>
					<td><?php echo h($contador['Contador']['email']); ?></td>
					<td><?php echo h($contador['0']['contagem']); ?></td>
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

