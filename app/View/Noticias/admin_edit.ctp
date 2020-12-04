<?php
echo $this->element('Midias.window');
echo $this->Html->script('ckeditor/ckeditor', array('inline' => false));
?>
<?php echo $this->Form->create('Noticia'); ?>
<?php echo $this->Form->input('id'); ?>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('redator', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('fotografo', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('titulo', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('texto_resumo', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('texto', array('class' => 'ckeditor')); ?>
    </div>
</div>
<br><br>
<div class="row">
    <div class="col-md-12">
        <div class="imagemmidia">
            <?php
            //Imagem Grande
            echo $this->Html->link(__('Notícias - Foto Grande', true), '#', array('id' => 'ImagemGrande', 'class' => 'midiasLink'));
            echo $this->Form->input('imagem_grande_id', array('id' => 'inputImagemGrande', 'style' => 'display:none', 'label' => false));
            echo $this->Form->input('listaImagemGrande', array('type' => 'hidden', 'id' => 'listaImagemGrande'));
            ?>
            <small>Aparecerá dentro da página com destaque.</small>
            <div id="divImagemGrande" class="imagens"></div>
        </div>
    </div>
</div>
<br><br>
<div class="row">
    <div class="col-md-12">
        <?php
            $opcoes = array('0' => 'Nenhuma');
            for ($i = 1; $i <= 9; $i++) {
                $opcoes[] = (String) $i;
            }
        ?>
        <?php echo $this->Form->input('posicao', array('options' => $opcoes, 'div' => false, 'label' => 'Posição na página inicial', 'class' => 'form-control')); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <label>Criado</label>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    <?php echo $this->Form->day('created', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Dia')); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $this->Form->month('created', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Mês')); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $this->Form->year('created', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Ano')); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $this->Form->hour('created', true,array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Hora')); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $this->Form->minute('created', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Minuto')); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <label>Data Inicial</label>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    <?php echo $this->Form->day('data_inicial', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Dia')); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $this->Form->month('data_inicial', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Mês')); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $this->Form->year('data_inicial', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Ano')); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $this->Form->hour('data_inicial', true, array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Hora')); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $this->Form->minute('data_inicial', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Minuto')); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <label>Data Final</label>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    <?php echo $this->Form->day('data_final', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Dia')); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $this->Form->month('data_final', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Mês')); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $this->Form->year('data_final', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Ano')); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $this->Form->hour('data_final', true, array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Hora')); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $this->Form->minute('data_final', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Minuto')); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if ($this->Session->read('Auth.User.grupo_id') == '1') { ?>
<div class="row">
    <div class="col-md-12">
        <div class="checkbox">
            <label>
                <?php echo $this->Form->input('publicar', array('type' => 'checkbox', 'default' => false)); ?>
            </label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="checkbox">
            <label>
                <?php echo $this->Form->input('banner', array('type' => 'checkbox', 'default' => false, 'label' => 'Criar Banner ?')); ?>
            </label>
        </div>
    </div>
</div>
<?php } ?>
<div class="row">
    <div class="col-md-12">
        <div class="checkbox">
            <label>
                <?php echo $this->Form->input('noticia', array('type' => 'checkbox', 'default' => false)); ?>
            </label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('tags', array('class' => 'form-control', 'type' => 'textarea', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('galeria_id', array('div' => false, 'empty' => 'Escolha uma galeria', 'class' => 'form-control')); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('Orgao', array('div' => false, 'class' => 'form-control')); ?>
    </div>
</div>
<br/><br/>
<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
</div>
<?php echo $this->Form->end(); ?>

<div class="actions">
    <h3><?php echo __('Ações'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $this->Form->value('Noticia.id')), null, __('Tem certeza de que deseja excluir a notícia # %s?', $this->Form->value('Noticia.id'))); ?></li>
        <li><?php echo $this->Html->link(__('Listar Notícias'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Listar Mídias'), array('controller' => 'midias', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nova Mídia'), array('controller' => 'midias', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Galerias'), array('controller' => 'midias_galerias', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nova Galeria'), array('controller' => 'midias_galerias', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Secretarias'), array('controller' => 'orgaos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nova Secretaria'), array('controller' => 'orgaos', 'action' => 'add')); ?> </li>
    </ul>
</div>
