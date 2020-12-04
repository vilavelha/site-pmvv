<?php echo $this->Html->script('ckeditor/ckeditor', array('inline' => false)); ?>
<?php echo $this->Form->create('Pagina'); ?>
<?php echo $this->Form->input('id'); ?>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('orgao_id', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<?php 
$this->Js->get('#PaginaOrgaoId')->event('change',
$this->Js->request(
        array('action' => 'listarCoordenadorias'),
        array('update' => '#PaginaCoordenadoriaId','async' => true,'dataExpression' => true,'method' => 'post',
            'data' => $this->Js->serializeForm(array('isForm' => false, 'inline' => true))
            )
        )
);
?>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('coordenadoria_id', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('tipo', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('nome', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('conteudo', array('class' => 'ckeditor')); ?>
    </div>
</div>
<br><br>

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
<?php } ?>
<br/><br/>
<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
</div>
<?php echo $this->Form->end(); ?>
<?php echo $this->Js->writeBuffer(); ?>