<div class="actions">
    <h3><?php __('Ações'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link('Nova Midias Galeria', array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link('Listar Midias', array('controller' => 'midias', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link('Nova Midia', array('controller' => 'midias', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="midiasGalerias index">
    <h2><?php __('Midias Galerias'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('nome'); ?></th>
            <th><?php echo $this->Paginator->sort('descricao', 'Descrição'); ?></th>
            <th><?php echo $this->Paginator->sort('created', 'Criado'); ?></th>
            <th><?php echo $this->Paginator->sort('publicar', 'Publicar ?'); ?></th>
            <th class="actions"><?php __('Ações'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($midiasGalerias as $midiasGaleria):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td><?php echo $midiasGaleria['MidiasGaleria']['id']; ?>&nbsp;</td>
                <td><?php echo $midiasGaleria['MidiasGaleria']['nome']; ?>&nbsp;</td>
                <td><?php echo $midiasGaleria['MidiasGaleria']['descricao']; ?>&nbsp;</td>
                <td><?php echo $this->Format->date($midiasGaleria['MidiasGaleria']['created']); ?>&nbsp;</td>
                <td><?php echo $this->Format->boolean($midiasGaleria['MidiasGaleria']['publicar']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $midiasGaleria['MidiasGaleria']['id'])); ?>
                    <?php echo $this->Html->link(__('Copiar', true), array('action' => 'copy', $midiasGaleria['MidiasGaleria']['id'])); ?>
                    <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $midiasGaleria['MidiasGaleria']['id'])); ?>
                    <?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $midiasGaleria['MidiasGaleria']['id']), null, sprintf(__('Você tem certeza que deseja excluir o id #%s?', true), $midiasGaleria['MidiasGaleria']['id'])); ?>
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