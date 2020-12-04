<div class="container" style="padding-top: 20px;clear:both">
    <div class="users">
        <?php echo $this->Form->create('User'); ?>
        <fieldset>
            <legend><?php echo __('Adicionar Usuário'); ?></legend>
            <?php
            echo $this->Form->input('grupo_id');
            echo $this->Form->input('nome');
            echo $this->Form->input('email');
            echo $this->Form->input('username', array('label' => 'Usuário'));
            echo $this->Form->input('password', array('label' => 'Senha'));
            echo $this->Form->input('ativo', array('type' => 'checkbox'));
            ?>
        </fieldset>
        <?php echo $this->Form->end(__('Submit')); ?>
    </div>
    <div class="actions">
        <h3><?php echo __('Ações'); ?></h3>
        <ul>
            <li><?php echo $this->Html->link(__('Listar Usuários'), array('action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('Listar Grupos'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('Novo Grupo'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>
