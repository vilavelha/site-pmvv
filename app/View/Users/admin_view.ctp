<div id='content-geral'>
    <div class="users view">
        <h2><?php echo __('Usuário'); ?></h2>
        <dl>
            <dt><?php echo __('Id'); ?></dt>
            <dd>
                <?php echo h($user['User']['id']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Grupo'); ?></dt>
            <dd>
                <?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Nome'); ?></dt>
            <dd>
                <?php echo h($user['User']['nome']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Email'); ?></dt>
            <dd>
                <?php echo h($user['User']['email']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Usuário'); ?></dt>
            <dd>
                <?php echo h($user['User']['username']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Senha'); ?></dt>
            <dd>
                <?php echo h($user['User']['password']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Criado em'); ?></dt>
            <dd>
                <?php echo $this->Time->format($user['User']['created'], '%d/%m/%y'); ?>
                <br/>
                <?php echo $this->Time->format($user['User']['created'], '%H:%I'); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Ativo'); ?></dt>
            <dd>
                <?php
                if ($user['User']['ativo'] == 1) {
                    echo 'Sim';
                } else {
                    echo 'Não';
                }
                ?>
                &nbsp;
            </dd>
        </dl>
    </div>
    <div class="actions">
        <h3><?php echo __('Ações'); ?></h3>
        <ul>
            <li><?php echo $this->Html->link(__('Editar Usuário'), array('action' => 'edit', $user['User']['id'])); ?> </li>
            <li><?php echo $this->Form->postLink(__('Excluir Usuário'), array('action' => 'delete', $user['User']['id']), null, __('Tem certeza de que deseja excluir o usuário # %s?', $user['User']['id'])); ?> </li>
            <li><?php echo $this->Html->link(__('Listar Usuários'), array('action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('Novo Usuário'), array('action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('Listar Grupos'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('Novo Grupo'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>