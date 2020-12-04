<?php
echo $this->element('Midias.fancybox');
echo $this->element('Midias.window');
if (!isset($this->request->params['named']['tipo'])) {
    $this->request->params['named']['tipo'] = '';
}
?>

<div class="actions">
    <h3><?php __('Ações'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link('Nova Midia', array('action' => 'add', 'iframe' => true)); ?></li>
        <li><?php echo $this->Html->link('Listar Midias Categorias', array('controller' => 'midias_categorias', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link('Nova Midias Categoria', array('controller' => 'midias_categorias', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link('Listar Midias Galerias', array('controller' => 'midias_galerias', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link('Nova Midias Galeria', array('controller' => 'midias_galerias', 'action' => 'add')); ?> </li>
    </ul>
    <div class="busca">
        <br /><br />
        <h3><?php __('Filtrar'); ?></h3>
        <?php
        echo $this->Form->create('Midia', array('url' => array('iframe' => 1)));
        $itens = array(
            'nome' => 'Nome',
            'tags' => 'Tags',
        );
        echo $this->Form->input('campo', array('options' => $itens));
        echo $this->Form->input('valor', array('label' => 'Valor da busca'));
        echo $this->Form->end('Buscar');
        ?>
    </div>
</div>
<div class="midias index">
    <h2><?php __('Midias'); ?></h2>
    <table class="table table-striped">
        <tr>
            <?php
            if (isset($this->request->params['named']['iframe'])) {
                ?>
                <th>
                    <?php
                    if ($this->request->params['named']['tipo'] == 'multiplo') {
                        echo $this->Form->input('checkAll', array(
                            'rel' => 'checkAll',
                            'id' => 'checkAll',
                            'type' => 'checkbox',
                            'label' => false
                                )
                        );
                    }
                    ?>
                </th>
                <?php
            }
            ?>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('arquivo'); ?></th>
            <th><?php echo 'Tamanho'; ?></th>
            <th><?php echo $this->Paginator->sort('midias_categoria_id'); ?></th>
            <th><?php echo $this->Paginator->sort('nome'); ?></th>
            <th><?php echo $this->Paginator->sort('created', 'Criado'); ?></th>
            <th class="actions"><?php __('Ações'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($midias as $midia):
			//debug($this->Utils->urlMidia($midia['Midia']));
			//debug($this->Utils->fileMidia($midia['Midia']));
			//die();
			
            //$size = getimagesize($this->Utils->urlMidia($midia['Midia']));
            $size = getimagesize($this->Utils->fileMidia($midia['Midia']));
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <?php
                if (isset($this->request->params['named']['iframe'])) {
                    ?>
                    <td>
                        <?php
                        $value = $midia['Midia']['caminho'];
                        if ($this->request->params['named']['tipo'] == 'multiplo') {
                            echo $this->Form->input('midia' . $midia['Midia']['id'], array(
                                'rel' => $midia['Midia']['id'],
                                'value' => $value,
                                'type' => 'checkbox',
                                'label' => false
                                    )
                            );
                        } else {
                                echo "<input id='midia{$midia['Midia']['id']}' rel='{$midia['Midia']['id']}' name='midia' type='radio' value='{$value}'/>";
                        }
                        ?>
                    </td>
                    <?php
                }
                ?>
                <td><?php echo $midia['Midia']['id']; ?></td>
                <td><?php echo $this->Utils->linkImagemMidia($midia['Midia'], array('width' => '110px')); ?></td>
                <td><?php echo $size[0] . 'x' . $size[1]; ?></td>
                <td><?php echo $this->Html->link($midia['MidiasCategoria']['nome'], array('controller' => 'midias_categorias', 'action' => 'view', $midia['MidiasCategoria']['id'])); ?></td>
                <td><?php echo $midia['Midia']['nome']; ?></td>
                <td><?php echo $this->Format->date($midia['Midia']['created']); ?></td>
                <td class="actions">
                    <?php
                    echo $this->Html->link(__('Ver', true), array('action' => 'view', $midia['Midia']['id']));
                    echo $this->Html->link(__('Copiar', true), array('action' => 'copy', $midia['Midia']['id']));
                    echo $this->Html->link(__('Editar', true), array('action' => 'edit', $midia['Midia']['id']));
                    if ($this->Utils->tipoArquivo($midia['Midia']['arquivo']) == MIDIA_IMAGENS) {
                        echo $this->Html->link(__('Cortar', true), array('action' => 'crop', $midia['Midia']['id']));
                    }
                    echo $this->Html->link(__('Cortar Todas', true), array('action' => 'cropall', $midia['Midia']['id']));
                    echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $midia['Midia']['id']), null, sprintf(__('Você tem certeza que deseja excluir o id #%s?', true), $midia['Midia']['id']));
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div clas="row">
        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 text-center">
            <div class="pagination pagination-large">
                <ul class="pagination">
                    <?php
                    echo $this->Paginator->prev('anterior', array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                    echo $this->Paginator->numbers(array('separator' => '', 'ellipsis' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                    echo $this->Paginator->next('próxima', array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
echo $this->Html->scriptBlock("
    var retorno = $('#lista' + parent.idList, window.parent.document).val();
    if(retorno) {
        var lista = $.evalJSON(retorno);
        for(var i = 0; i < lista.length; i++) {
            $('#midia' + lista[i].id).attr('checked', true);
        }
    }
    ");
?>