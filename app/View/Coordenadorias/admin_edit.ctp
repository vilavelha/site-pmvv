<?php echo $this->Html->script('ckeditor/ckeditor', array('inline' => false)); ?>
<?php echo $this->Form->create('Coordenadoria'); ?>
<?php echo $this->Form->input('id'); ?>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('orgao_id', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('tipo_id', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('nome', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('descricao', array('class' => 'ckeditor')); ?>
    </div>
</div>
<br><br>
<br/><br/>
<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
</div>
<?php echo $this->Form->end(); ?>
<?php echo $this->Js->writeBuffer(); ?>