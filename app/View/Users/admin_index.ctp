<?php ?>
<div class="users index">
    <h2><?php echo __('Usuários'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('grupo_id', 'Grupo'); ?></th>
            <th><?php echo $this->Paginator->sort('nome'); ?></th>
            <th><?php echo $this->Paginator->sort('email'); ?></th>
            <th><?php echo $this->Paginator->sort('username', 'Usuário'); ?></th>
            <th><?php echo $this->Paginator->sort('created', 'Criado'); ?></th>
            <th><?php echo $this->Paginator->sort('ativo'); ?></th>
            <th class="actions"><?php echo __('Ações'); ?></th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
                </td>
                <td><?php echo h($user['User']['nome']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Time->format($user['User']['created'], '%d/%m/%y'); ?>
                    <br/>
                    <?php echo $this->Time->format($user['User']['created'], '%H:%I'); ?>
                    &nbsp;
                </td>
                <td><?php
                    if ($user['User']['ativo'] == 1) {
                        echo 'Sim';
                    } else {
                        echo 'Não';
                    }
                    ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Visualizar'), array('action' => 'view', $user['User']['id'])); ?>
    <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $user['User']['id'])); ?>
            <?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $user['User']['id']), null, __('Tem certeza de que deseja excluir o usuário # %s?', $user['User']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Ações'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Novo Usuário'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Listar Grupos'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Novo Grupo'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
    </ul>
</div>
