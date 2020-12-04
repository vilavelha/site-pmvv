<div class="actions">
    <h3><?php __('Ações'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(sprintf(__('Novo %s', true), __('Midias Categoria', true)), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(sprintf(__('Listar %s', true), __('Midias', true)), array('controller' => 'midias', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(sprintf(__('Nova %s', true), __('Midia', true)), array('controller' => 'midias', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="MidiasCategorias index">
    <h2><?php __('MidiasCategorias'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('nome'); ?></th>
            <th class="actions"><?php __('Ações'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($MidiasCategorias as $MidiasCategoria):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $MidiasCategoria['MidiasCategoria']['id']; ?>&nbsp;</td>
                <td><?php echo $MidiasCategoria['MidiasCategoria']['nome']; ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $MidiasCategoria['MidiasCategoria']['id'])); ?>
                    <?php echo $this->Html->link(__('Copiar', true), array('action' => 'copy', $MidiasCategoria['MidiasCategoria']['id'])); ?>
                    <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $MidiasCategoria['MidiasCategoria']['id'])); ?>
                    <?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $MidiasCategoria['MidiasCategoria']['id']), null, sprintf(__('Você tem certeza que deseja excluir o id #%s?', true), $MidiasCategoria['MidiasCategoria']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Página {:page} de {:pages}, mostrando {:current} resultados de {:count} total, começando em {:start}, terminando em {:end}')
        ));
        ?>	</p>

    <div class="paging">
        <?php echo $this->Paginator->prev('<< ' . __('anterior', true), array(), null, array('class' => 'disabled')); ?>
        | 	<?php echo $this->Paginator->numbers(); ?>
        |
        <?php echo $this->Paginator->next(__('próxima', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
    </div>
</div>