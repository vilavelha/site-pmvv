<div class="actions">
    <h3>Ações</h3>
    <ul>
        <li><?php echo $this->Html->link('Editar Midia', array('action' => 'edit', $midia['Midia']['id'])); ?> </li>
        <li><?php echo $this->Html->link('Excluir Midia', array('action' => 'delete', $midia['Midia']['id']), null, sprintf(__('Você tem certeza que deseja excluir o id #%s?', true), $midia['Midia']['id'])); ?> </li>
        <li><?php echo $this->Html->link('Listar Midias', array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link('Nova Midia', array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link('Listas Midias Categorias', array('controller' => 'midias_categorias', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link('Nova Midias Categoria', array('controller' => 'midias_categorias', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link('Listar Midias Galerias', array('controller' => 'midias_galerias', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link('Nova Midias Galeria', array('controller' => 'midias_galerias', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="midias view">
    <h2>Midia</h2>
    <dl>
        <dt>Id</dt>
        <dd>
            <?php echo h($midia['Midia']['id']); ?>
            &nbsp;
        </dd>
        <dt>Midias Categoria</dt>
        <dd>
            <?php echo $this->Html->link($midia['MidiasCategoria']['nome'], array('controller' => 'midias_categorias', 'action' => 'view', $midia['MidiasCategoria']['id'])); ?>
            &nbsp;
        </dd>
        <dt>Nome</dt>
        <dd>
            <?php echo h($midia['Midia']['nome']); ?>
            &nbsp;
        </dd>
        <dt>Autor</dt>
        <dd>
            <?php echo h($midia['Midia']['autor']); ?>
            &nbsp;
        </dd>
        <dt>Pasta</dt>
        <dd>
            <?php echo h($midia['Midia']['pasta']); ?>
            &nbsp;
        </dd>
        <dt>Arquivo</dt>
        <dd>
            <?php echo $this->Utils->linkImagemMidia($midia['Midia']); ?>
            &nbsp;
        </dd>
        <dt>Descrição</dt>
        <dd>
            <?php echo h($midia['Midia']['descricao']); ?>
            &nbsp;
        </dd>
        <dt>Criado</dt>
        <dd>
            <?php echo $this->Format->date($midia['Midia']['created']); ?>
            &nbsp;
        </dd>
        <dt>Modificado</dt>
        <dd>
            <?php echo $this->Format->date($midia['Midia']['modified']); ?>
            &nbsp;
        </dd>
    </dl>
    <?php echo $this->Html->image('/' . MIDIA_URI . '/' . $midia['Midia']['pasta'] . '/' . $midia['Midia']['id'] . '_' . $this->Time->format('d', $midia['Midia']['created']) . $this->Time->format('m', $midia['Midia']['created']) . $this->Time->format('Y', $midia['Midia']['created']) . '_146x160.jpg'); ?>
    <?php echo $this->Html->image('/' . MIDIA_URI . '/' . $midia['Midia']['pasta'] . '/' . $midia['Midia']['id'] . '_' . $this->Time->format('d', $midia['Midia']['created']) . $this->Time->format('m', $midia['Midia']['created']) . $this->Time->format('Y', $midia['Midia']['created']) . '_326x290.jpg'); ?>
    <?php echo $this->Html->image('/' . MIDIA_URI . '/' . $midia['Midia']['pasta'] . '/' . $midia['Midia']['id'] . '_' . $this->Time->format('d', $midia['Midia']['created']) . $this->Time->format('m', $midia['Midia']['created']) . $this->Time->format('Y', $midia['Midia']['created']) . '_1600x514.jpg'); ?>
</div>

<div class="related">
    <h3>Midias Galerias relacionadas</h3>
    <?php if (!empty($midia['MidiasGaleria'])): ?>
        <table cellpadding = "0" cellspacing = "0">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Criado</th>
                <th>Publicar ?</th>
                <th class="actions"><?php __('Ações'); ?></th>
            </tr>
            <?php
            $i = 0;
            foreach ($midia['MidiasGaleria'] as $midiasGaleria):
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
                ?>
                <tr<?php echo $class; ?>>
                    <td><?php echo $midiasGaleria['id']; ?></td>
                    <td><?php echo $midiasGaleria['nome']; ?></td>
                    <td><?php echo $midiasGaleria['descricao']; ?></td>
                    <td><?php echo $this->Format->date($midiasGaleria['created']); ?></td>
                    <td><?php echo $this->Format->boolean($midiasGaleria['publicar']); ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link('Ver', array('controller' => 'midias_galerias', 'action' => 'view', $midiasGaleria['id'])); ?>
                        <?php echo $this->Html->link('Editar', array('controller' => 'midias_galerias', 'action' => 'edit', $midiasGaleria['id'])); ?>
                        <?php echo $this->Html->link('Excluir', array('controller' => 'midias_galerias', 'action' => 'delete', $midiasGaleria['id']), null, sprintf(__('Você tem certeza que deseja excluir o id #%s?', true), $midiasGaleria['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link('Nova Midias Galeria', array('controller' => 'midias_galerias', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>