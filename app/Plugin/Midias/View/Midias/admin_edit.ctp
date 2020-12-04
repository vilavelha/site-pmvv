<div class="actions">
    <h3>Ações</h3>
    <ul>
        <li><?php echo $this->Html->link('Excluir', array('action' => 'delete', $this->Form->value('Midia.id')), null, sprintf(__('Você tem certeza que deseja excluir o id #%s?', true), $this->Form->value('Midia.id'))); ?></li>
        <li><?php echo $this->Html->link('Listar Midias', array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link('Listar Midias Categorias', array('controller' => 'midias_categorias', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link('Nova Midias Categoria', array('controller' => 'midias_categorias', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link('Listar Midias Galerias', array('controller' => 'midias_galerias', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link('Nova Midias Galeria', array('controller' => 'midias_galerias', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="midias form">
    <?php echo $this->Form->create('Midia', array('enctype' => 'multipart/form-data')); ?>
    <fieldset>
        <legend>Editar Midia</legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('midias_categoria_id');
        echo $this->Form->input('nome');
        echo $this->Form->input('autor');
        echo $this->Form->input('arquivo', array('type' => 'file'));
        echo $this->Form->input('descricao', array('label' => 'Descrição'));
        echo $this->Form->input('MidiasGaleria', array('empty' => 'Nenhuma'));
        echo $this->Form->input('tags');
//        echo $this->Form->input('MidiasTag');
        ?>
        <!--        <div id='testdiv'>-->
        <?php
//            echo $form->create('MidiasTag');
//            echo $form->input('nome', array('style' => 'width: 200px; float:left;', 'label' => 'Adicionar Tag'));
//            echo $ajax->submit('Adicionar', array('url' => array('controller' => 'Midias_tags', 'action' => 'adicionar'), 'success' => 'window.location.reload()', 'style' => 'float:left;'));
//            echo $form->end();
//            
        ?>
        <!--        </div>-->
        <br/><br/>
    </fieldset>
    <?php echo $this->Form->end(__('Enviar', true)); ?>
</div>