<?php echo $this->Form->create('Destaque', array('type' => 'file')); ?>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('orgao_id', array('class' => 'form-control', 'div' => array('class' => 'form-group'), 'label' => array('text' => 'Secretaria', 'label' => true), 'empty' => 'Escolha uma secretaria')); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('imagem', array('type' => 'file', 'div' => false)); ?>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('link', array('type' => 'text', 'class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('anexo', array('type' => 'file', 'div' => false)); ?>
    </div>
</div>
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
                <?php echo $this->Form->input('capa', array('type' => 'checkbox', 'default' => false)); ?>
            </label>
        </div>
    </div>
</div>
<br/><br/>
<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
</div>
<?php echo $this->Form->end(); ?>
<?php echo $this->Js->writeBuffer(); ?>