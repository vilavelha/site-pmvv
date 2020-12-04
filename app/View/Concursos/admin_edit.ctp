<?php echo $this->Html->script('ckeditor/ckeditor', array('inline' => false)); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#extra2").show("fast");
        $("#ConcursoCheckme").click(function() {
            // If checked
            if ($("#ConcursoCheckme").is(":checked")) {
                //show the hidden div
                $("#extra").show("fast");
                $("#ConcursoCheckme").val("true");
                $("#extra2").hide("fast");

            } else {
                //otherwise, hide it
                $("#extra").hide("fast");
                $("#ConcursoCheckme").val("false");
                $("#extra2").show("fast");
            }
        });
    });
</script>
<div class="concursos form">
<?php echo $this->Form->create('Concurso', array('type' => 'file')); ?>
<?php echo $this->Form->input('id'); ?>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('titulo', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('descricao', array('class' => 'form-control ckeditor', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('informacoes_adicionais', array('class' => 'form-control ckeditor', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('cargo', array('class' => 'form-control ckeditor', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('vagas', array('class' => 'form-control ckeditor', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('taxa', array('class' => 'form-control ckeditor', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('horario', array('class' => 'form-control ckeditor', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('links', array('class' => 'form-control ckeditor', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <?php echo $this->Form->input('situacao', array('class' => 'form-control', 'options' => $situacao , 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="checkbox">
            <label>
                <?php echo $this->Form->input('checkme', array('type' => 'checkbox', 'default' => false, 'label' => 'Formulário Online ?')); ?>
            </label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('link', array('class' => 'form-control', 'type' => 'text', 'div' => array('class' => 'form-group', 'style' => 'display:none', 'id' => 'extra'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('ficha', array('class' => 'form-control', 'type' => 'file', 'div' => array('class' => 'form-group', 'style' => 'display:none', 'id' => 'extra2'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
</div>
<?php echo $this->Form->end(); ?>
