<div class="actions">
    <h3><?php __('Ações'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link('Novo Midias Tamanho', array('action' => 'add')); ?></li>
    </ul>
</div>
<div class="midiasTamanhos index">
    <h2>Midias Tamanhos</h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('modulo'); ?></th>
            <th><?php echo $this->Paginator->sort('largura'); ?></th>
            <th><?php echo $this->Paginator->sort('altura'); ?></th>
            <th class="actions"><?php __('Ações'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($midiasTamanhos as $midiasTamanho):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $midiasTamanho['MidiasTamanho']['id']; ?>&nbsp;</td>
                <td><?php echo $midiasTamanho['MidiasTamanho']['modulo']; ?>&nbsp;</td>
                <td><?php echo $midiasTamanho['MidiasTamanho']['largura']; ?>&nbsp;</td>
                <td><?php echo $midiasTamanho['MidiasTamanho']['altura']; ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $midiasTamanho['MidiasTamanho']['id'])); ?>
                    <?php echo $this->Html->link(__('Copiar', true), array('action' => 'copy', $midiasTamanho['MidiasTamanho']['id'])); ?>
                    <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $midiasTamanho['MidiasTamanho']['id'])); ?>
                    <?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $midiasTamanho['MidiasTamanho']['id']), null, sprintf(__('Você tem certeza que deseja excluir o id #%s?', true), $midiasTamanho['MidiasTamanho']['id'])); ?>
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