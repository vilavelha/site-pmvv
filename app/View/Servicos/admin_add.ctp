<?php echo $this->Form->create('Servico'); ?>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('orgao_id', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<?php 
$this->Js->get('#ServicoOrgaoId')->event('change',
$this->Js->request(
        array('controller' => 'servicos', 'action' => 'listarCoordenadorias'),
        array('update' => '#ServicoCoordenadoriaId','async' => true,'dataExpression' => true,'method' => 'post',
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
        <?php echo $this->Form->input('nome', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('texto', array('type' => 'textarea', 'class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('link', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('ServicosCategoria', array('div' => false, 'class' => 'form-control')); ?>
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
<div class="row">
    <div class="col-md-12">
        <div class="checkbox">
            <label>
                <?php echo $this->Form->input('nova_aba', array('type' => 'checkbox', 'default' => false)); ?>
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