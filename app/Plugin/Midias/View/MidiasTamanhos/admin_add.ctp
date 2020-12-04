<div class="actions">
    <h3><?php __('Ações'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link('Listar Midias Tamanhos', array('action' => 'index')); ?></li>
    </ul>
</div>
<div class="midiasTamanhos form">
    <?php echo $this->Form->create('MidiasTamanho'); ?>
    <fieldset>
        <legend>Admin Add Midias Tamanho</legend>
        <?php
        echo $this->Form->input('modulo');
        echo $this->Form->input('largura');
        echo $this->Form->input('altura');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Enviar', true)); ?>
</div>