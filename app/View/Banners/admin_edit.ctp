<?php
echo $this->element('Midias.window');
?>
<?php echo $this->Form->create('Banner'); ?>
<?php echo $this->Form->input('id'); ?>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('titulo', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('descricao', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('link', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<br><br>
<div class="row">
    <div class="col-md-12">
        <div class="imagemmidia">
            <?php
            //Imagem Grande
            echo $this->Html->link('Imagem', '#', array('id' => 'Imagem', 'class' => 'midiasLink'));
            echo $this->Form->input('imagem_id', array('id' => 'inputImagem', 'style' => 'display:none', 'label' => false));
            echo $this->Form->input('listaImagem', array('type' => 'hidden', 'id' => 'listaImagem'));
            ?>
            <small>Banner no site.</small>
            <div id="divImagem" class="imagens"></div>
        </div>
    </div>
</div>
<br><br>
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
                    <?php echo $this->Form->day('created', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Dia', 'value' => date('j'))); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $this->Form->month('created', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Mês', 'value' => date('n'))); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $this->Form->year('created', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Ano', 'value' => date('Y'))); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $this->Form->hour('created', true,array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Hora', 'value' => date('G'))); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $this->Form->minute('created', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Minuto', 'value' => date('i'))); ?>
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
                    <?php echo $this->Form->day('data_inicial', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Dia', 'value' => date('j'))); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $this->Form->month('data_inicial', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Mês', 'value' => date('n'))); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $this->Form->year('data_inicial', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Ano', 'value' => date('Y'))); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $this->Form->hour('data_inicial', true, array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Hora', 'value' => date('G'))); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $this->Form->minute('data_inicial', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Minuto', 'value' => date('i'))); ?>
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
                    <?php echo $this->Form->day('data_final', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Dia', 'value' => date('j'))); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $this->Form->month('data_final', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Mês', 'value' => date('n'))); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $this->Form->year('data_final', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Ano', 'value' => date('Y'))); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $this->Form->hour('data_final', true, array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Hora', 'value' => date('G'))); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $this->Form->minute('data_final', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Minuto', 'value' => date('i'))); ?>
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
                <?php echo $this->Form->input('publicar', array('type' => 'checkbox', 'default' => true)); ?>
            </label>
        </div>
    </div>
</div>
<?php } ?>
<br/><br/>
<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
</div>
<?php echo $this->Form->end(); ?>