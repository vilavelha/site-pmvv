<div class="actions">
    <h3><?php __('Ações'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link('Editar Midias Tamanho', array('action' => 'edit', $midiasTamanho['MidiasTamanho']['id'])); ?> </li>
        <li><?php echo $this->Html->link('Excluir Midias Tamanho', array('action' => 'delete', $midiasTamanho['MidiasTamanho']['id']), null, sprintf(__('Você tem certeza que deseja excluir o id #%s?', true), $midiasTamanho['MidiasTamanho']['id'])); ?> </li>
        <li><?php echo $this->Html->link('Listar Midias Tamanhos', array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link('Novo Midias Tamanho', array('action' => 'add')); ?> </li>
    </ul>
</div>
<div class="midiasTamanhos view">
    <h2>Midias Tamanho</h2>
    <dl><?php $i = 0;
$class = ' class="altrow"'; ?>
        <dt<?php if ($i % 2 == 0)
            echo $class; ?>><?php __('Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
                <?php echo $midiasTamanho['MidiasTamanho']['id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0)
                    echo $class; ?>><?php __('Modulo'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
                <?php echo $midiasTamanho['MidiasTamanho']['modulo']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0)
                    echo $class; ?>><?php __('Largura'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
                <?php echo $midiasTamanho['MidiasTamanho']['largura']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0)
                    echo $class; ?>><?php __('Altura'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
                <?php echo $midiasTamanho['MidiasTamanho']['altura']; ?>
            &nbsp;
        </dd>
    </dl>
</div>
