<div class="">
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Editar Senha'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('grupo_id', array('disabled' => true));
        echo $this->Form->input('nome', array('readonly' => true, 'disabled' => true));
        echo $this->Form->input('email');
        echo $this->Form->input('username', array('label' => 'Usuário', 'read only' => true, 'disabled' => true));
        echo $this->Form->input('password', array('label' => 'Senha', 'value' => ''));
        echo $this->Form->input('ativo', array('disabled' => true));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>