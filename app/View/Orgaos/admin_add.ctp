<script type="text/javascript">
    var i=1;
    $( document ).on( "click", "#addCargo", function() {
        var content = $(".clone").eq(0).clone();
        content.find('input,select').each(function() {
            this.name = this.name.replace('[0]', '['+i+']');
        });
        content.find('input[type=hidden]').each(function() {
            this.value = '';
        });
        content.find('.valorInsert').after('<button class="btn btn-danger cloneRemove" type="button" style="margin-top:24px;"><i class="fa fa-remove" aria-hidden="true"></i></button>');
        i++;
        $(content).clone().appendTo('.newclone');
    });

    function remove(){
        $(this).parents(".clone").remove();
    }

    function removedados(){
        $.ajax({
          method: "POST",
          url: "/orgaos/removecargo/"+$( this ).siblings('input[type=hidden]').val(),
      });
        $(this).parents(".clone").remove();
    }

    $( document ).on( "click", ".cloneRemove", remove);
    $( document ).on( "click", ".cloneRemoveDados", removedados);


</script>
<?php echo $this->Form->create('Orgao', array('type' => 'file')); ?>
<?php echo $this->Form->input('id'); ?>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('orgaos_id', array('class' => 'form-control', 'div' => array('class' => 'form-group'), 'label' => 'Órgão Pai', 'empty' => 'Nenhum')); ?>
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
        <?php echo $this->Form->input('sigla', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('endereco', array('class' => 'form-control', 'type' => 'textarea', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('nome_responsavel', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('cargo_responsavel', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('email_responsavel', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('telefone_responsavel', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('descricao_responsavel', array('class' => 'form-control', 'type' => 'textarea', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('foto_responsavel', array('class' => 'form-control', 'type' => 'file', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('descricao', array('class' => 'form-control', 'type' => 'textarea', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>
<section class="team">
<div class="row">
    <div class="col-md-12">
        <h6 class="description">EQUIPE</h6>
    </div>
</div>
<div class="form-group">
        <div class="clone" id="cargo-0">
            <div class="row">
                <div class="col-md-12">
                    <?php echo $this->Form->input("Cargo.0.cargo", array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php echo $this->Form->input("Cargo.0.nome", array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php echo $this->Form->input("Cargo.0.email", array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
                </div>
            </div>
            <div class="row valorInsert">
                <div class="col-md-12">
                    <?php echo $this->Form->input("Cargo.0.telefone", array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
                </div>
            </div>
            <hr/>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="newclone">
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-md-12">
            <button id="addCargo" class="btn btn-danger" type="button" style="margin-top:24px;">Adicionar Cargo</button> 
        </div>
    </div>
</div>  
</section>
<br><br>
<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
</div>
<?php echo $this->Form->end(); ?>