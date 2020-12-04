<?php echo $this->Form->create('Download', array('type' => 'file')); ?>
<div class="row">
    <div class="col-md-12">
    <?php echo $this->Form->input('concurso_id', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <?php echo $this->Form->input('tipo_id', array('class' => 'form-control', 'options' => $tipos , 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('nome', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('descricao', array('class' => 'form-control', 'type' => 'textarea', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('arquivo', array('class' => 'form-control', 'type' => 'file', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="checkbox">
            <label>
                <?php echo $this->Form->input('publicar', array('type' => 'checkbox', 'default' => false, 'label' => 'Publicar ?')); ?>
            </label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
</div>
<?php echo $this->Form->end(); ?>