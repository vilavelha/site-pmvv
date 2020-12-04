<div class="actions">
    <h3><?php __('Ações'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link('Editar Midias Galeria', array('action' => 'edit', $midiasGaleria['MidiasGaleria']['id'])); ?> </li>
        <li><?php echo $this->Html->link('Excluir Midias Galeria', array('action' => 'delete', $midiasGaleria['MidiasGaleria']['id']), null, sprintf(__('Você tem certeza que deseja excluir o id #%s?', true), $midiasGaleria['MidiasGaleria']['id'])); ?> </li>
        <li><?php echo $this->Html->link('Listar Midias Galerias', array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link('Nova Midias Galeria', array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link('Listar Midias', array('controller' => 'midias', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link('Nova Midia', array('controller' => 'midias', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="midiasGalerias view">
    <h2><?php __('Midias Galeria'); ?></h2>
    <dl>
        <dt>Id</dt>
        <dd>
            <?php echo h($midiasGaleria['MidiasGaleria']['id']); ?>
            &nbsp;
        </dd>
        <dt>Nome</dt>
        <dd>
            <?php echo h($midiasGaleria['MidiasGaleria']['nome']); ?>
            &nbsp;
        </dd>
        <dt>Descrição</dt>
        <dd>
            <?php echo h($midiasGaleria['MidiasGaleria']['descricao']); ?>
            &nbsp;
        </dd>		
        <dt>Criado</dt>
        <dd>
            <?php echo h($midiasGaleria['MidiasGaleria']['created']); ?>
            &nbsp;
        </dd>
        <dt>Publicar ?</dt>
        <dd>
            <?php echo h($midiasGaleria['MidiasGaleria']['publicar']?'Sim':'Não'); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="related">
    <h3>Midias Relacionadas</h3>
    <?php if (!empty($midiasGaleria['Midia'])): ?>
        <table cellpadding = "0" cellspacing = "0">
            <tr>
                <th><?php __('Id'); ?></th>
                <th><?php __('Midias Categoria Id'); ?></th>
                <th><?php __('Nome'); ?></th>
                <th><?php __('Autor'); ?></th>
                <th><?php __('Pasta'); ?></th>
                <th><?php __('Arquivo'); ?></th>
                <th><?php __('Descrição'); ?></th>
                <th><?php __('Created'); ?></th>
                <th><?php __('Modified'); ?></th>
                <th class="actions"><?php __('Ações'); ?></th>
            </tr>
            <?php
            $i = 0;
            foreach ($midiasGaleria['Midia'] as $midia):
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
                ?>
                <tr<?php echo $class; ?>>
                    <td><?php echo $midia['id']; ?></td>
                    <td><?php echo $midia['midias_categoria_id']; ?></td>
                    <td><?php echo $midia['nome']; ?></td>
                    <td><?php echo $midia['autor']; ?></td>
                    <td><?php echo $midia['pasta']; ?></td>
                    <td><?php echo $midia['arquivo']; ?></td>
                    <td><?php echo $midia['descricao']; ?></td>
                    <td><?php echo $midia['created']; ?></td>
                    <td><?php echo $midia['modified']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Ver', true), array('controller' => 'midias', 'action' => 'view', $midia['id'])); ?>
                        <?php echo $this->Html->link(__('Editar', true), array('controller' => 'midias', 'action' => 'edit', $midia['id'])); ?>
                        <?php echo $this->Html->link(__('Excluir', true), array('controller' => 'midias', 'action' => 'delete', $midia['id']), null, sprintf(__('Você tem certeza que deseja excluir o id #%s?', true), $midia['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>


    <?php endif; ?>

    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(sprintf(__('Novo %s', true), __('Midia', true)), array('controller' => 'midias', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>
