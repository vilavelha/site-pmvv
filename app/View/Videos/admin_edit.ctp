<?php echo $this->Form->create('Video'); ?>
<legend>Editar Vídeo</legend>
<div class="row">
    <div class="col-md-12">
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('titulo', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
        ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php
        echo $this->Form->input('link', array('class' => 'form-control', 'type' => 'text', 'div' => array('class' => 'form-group')));
        ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="checkbox">
            <label>
                <?php echo $this->Form->input('destaque', array('type' => 'checkbox', 'default' => false)); ?>
            </label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
</div>

