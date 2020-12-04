<div class="row">
    <div class="col-md-12">
        <?php if (isset($BuscaAdmNoticiasCat)) {?>
        Critérios de Busca Atuais:<br/>
        <b>Campo:</b> <?php echo ucwords($BuscaAdmNoticiasCat['campo']); ?><br/>
        <b>Valor:</b> <?php echo $BuscaAdmNoticiasCat['valor']; ?><br/>
        <b>Publicar:</b> <?php echo ($BuscaAdmNoticiasCat['publicar']) ? 'Sim' : 'Não'; ?><br/>
        <?php } ?>
    </div>
</div>
<?php echo $this->Form->create('Noticia'); ?>
<div class="row">
    <div class="col-md-12">
        <h4>Filtros:</h4>
    </div>
</div>
    <div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <?php echo $this->Form->input('valor', array('label' => 'Valor da busca', 'div' => false, 'class' => 'form-control')); ?>
        </div>
    </div>
    <div class="col-md-2">
        <?php $itens = array('titulo' => 'Titulo','texto_resumo' => 'Text Resumo','tags' => 'Tags','redator' => 'Redator',); ?>
            <label for="">Campos</label>
            <?php echo $this->Form->input('campo', array('options' => $itens, 'div' => false, 'label' => false, 'class' => 'form-control')); ?>
        </div>
        <div class="col-md-2">
            <div class="checkbox">
                <label>
                    <?php echo $this->Form->input('publicar', array('type' => 'checkbox', 'default' => true)); ?>
                </label>
            </div>
        </div>
        <div class="col-md-2">
            <br/>
            <?php echo $this->Html->link('Limpar Filtros', array('controller' => 'noticias', 'action' => 'index', 'admin' => true, 'limpar' => 1), array('class' => 'btn btn-warning')); ?>
        </div>
        <div class="col-md-2">
            <br/>
            <button type="submit" class="btn btn-success">Buscar</button>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
    <h2><?php echo __('Noticias'); ?></h2>
    <table class="table table-striped">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('redator'); ?></th>
            <th><?php echo $this->Paginator->sort('titulo'); ?></th>
            <th><?php echo $this->Paginator->sort('created', 'Criado em'); ?></th>
            <th><?php echo $this->Paginator->sort('usuario_id', 'Publicado por'); ?></th>
            <th><?php echo $this->Paginator->sort('publicar'); ?></th>
            <th class="actions"><?php echo __('Ações'); ?></th>
        </tr>
        <?php foreach ($noticias as $noticia): ?>
            <tr>
                <td><?php echo h($noticia['Noticia']['id']); ?>&nbsp;</td>
                <td><?php echo h($noticia['Noticia']['redator']); ?>&nbsp;</td>
                <td><?php echo h($noticia['Noticia']['titulo']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Time->format($noticia['Noticia']['created'], '%d/%m/%y'); ?>
                    <br/>
                    <?php echo $this->Time->format($noticia['Noticia']['created'], '%H:%M'); ?>
                    &nbsp;
                </td>
                <td>
                    <?php echo $this->Html->link($noticia['Usuario']['nome'], array('controller' => 'usuarios', 'action' => 'view', $noticia['Usuario']['id'])); ?>
                </td>
                <td><?php
                    if ($noticia['Noticia']['publicar']) {
                        echo 'Sim';
                    } else {
                        echo 'Não';
                    }
                    ?>&nbsp;</td>

                    <td class="actions">
                        <?php echo $this->Html->link('Visualizar', array('action' => 'view', $noticia['Noticia']['id']), array('class' => 'btn btn-info')); ?>
                        <?php echo $this->Html->link('Editar', array('action' => 'edit', $noticia['Noticia']['id']), array('class' => 'btn btn-warning')); ?>
                        <?php
                        if ($this->Session->read('Auth.User.grupo_id') == '1') {
                            echo $this->Form->postLink('Excluir', array('action' => 'delete', $noticia['Noticia']['id']), array('class' => 'btn btn-danger'), __('Tem certeza de que deseja excluir a notícia # %s?', $noticia['Noticia']['id']));
                        }
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