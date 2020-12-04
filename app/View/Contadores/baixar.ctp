<?php
    echo $this->Html->script(
        array(
            'jquery.mask',
        )
    );
?>
<script type="text/javascript">
$(document).ready(function(){
var SPMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
  },
  spOptions = {
    onKeyPress: function(val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
      }
  };

  $('#ContadorTelefone').mask(SPMaskBehavior, spOptions);
});


</script>
<?php echo $this->Form->create('Contador', array('url' => array('controller' => 'contadores', 'action' => 'download'), 'update' => '#post')); ?>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('interessado', array('class' => 'form-control', 'label' => 'Nome/Razão Social')); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <?php echo $this->Form->input('telefone', array('class' => 'form-control', 'label' => 'Telefone')); ?>
    </div>
    <div class="col-md-9">
        <?php echo $this->Form->input('email', array('class' => 'form-control', 'label' => 'E-mail')); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->hidden('licitacao_id', array('class' => 'form-control', 'value' => $idDo)); ?>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-md-12">
    <?php echo $this->Js->submit('Cadastrar solicitação de anexos', array('url' => array('controller' => 'contadores', 'action' => 'download'), 'class' => 'btn btn-success col-md-12', 'update' => '#post')); ?>
    </div>
</div>
<?php echo $this->Form->end(); ?>
<?php echo $this->Js->writeBuffer(); ?>