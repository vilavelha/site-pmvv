<?php debug($this->request->data);?>

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
    <?php if(empty($this->request->data['Cargo'])): ?>
        <div class="clone" id="cargo-0">
            <div class="row">
                <div class="col-md-12">
                    <?php echo $this->Form->input("Cargo.0.Cargo.cargo", array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php echo $this->Form->input("Cargo.0.Cargo.nome", array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php echo $this->Form->input("Cargo.0.Cargo.email", array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
                </div>
            </div>
            <div class="row valorInsert">
                <div class="col-md-12">
                    <?php echo $this->Form->input("Cargo.0.Cargo.telefone", array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
                </div>
            </div>
            <hr/>
        </div>
    <?php endif; ?>
    <?php foreach($this->request->data['Cargo'] as $key => $cargo): ?>
        <?php if($key == 0){ ?>     
        <div class="clone" id="cargo-<?php echo $key;?>">
            <div class="row">
                <div class="col-md-12">
                    <?php echo $this->Form->input("Cargo.{$key}.Cargo.cargo", array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php echo $this->Form->input("Cargo.{$key}.Cargo.nome", array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php echo $this->Form->input("Cargo.{$key}.Cargo.email", array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php echo $this->Form->input("Cargo.{$key}.Cargo.telefone", array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php echo $this->Form->hidden("Cargo.{$key}.Cargo.id", array('label' => false, 'div' => false, 'value' => $cargo['Cargo']['id'])); ?>
                </div>
            </div>
            <hr/>
        </div>
        <?php }else{ ?>
        <div class="clone" id="cargo-<?php echo $key;?>">
            <div class="row">
                <div class="col-md-12">
                    <?php echo $this->Form->input("Cargo.{$key}.Cargo.cargo", array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php echo $this->Form->input("Cargo.{$key}.Cargo.nome", array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php echo $this->Form->input("Cargo.{$key}.Cargo.email", array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php echo $this->Form->input("Cargo.{$key}.Cargo.telefone", array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
                </div>
            </div>
            <div class="row valorInsert">
                <div class="col-md-12">
                    <?php echo $this->Form->hidden("Cargo.{$key}.Cargo.id", array('label' => false, 'div' => false, 'value' => $cargo['Cargo']['id'])); ?>
                    <button class="btn btn-danger cloneRemoveDados" type="button"><i class="fa fa-remove" aria-hidden="true"></i></button>
                </div>
            </div>
            <hr/>
        </div>
        <?php } ?>
    <?php endforeach; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="newclone">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button id="addCargo" class="btn btn-danger" type="button">Adicionar Cargo</button> 
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
<?php echo $this->Html->scriptBlock('var webroot = "' . $this->webroot . '";');?>
<script type="text/javascript">
    var i= $(".clone").length;
    $( document ).on( "click", "#addCargo", function() {
        var content = $(".clone").last().clone();
        content.find('input').each(function() {
            this.name = this.name.replace('['+(i-1)+']', '['+i+']');
            this.id = this.id.replace((i-1), i);
        });
        content.attr('id','cargo-'+i);
        content.find('input[type=hidden]').each(function() {
            this.value = '';
        });
        i++;
        $(content).clone().appendTo('.newclone');
    });

    function removedados(){
        $.ajax({
          method: "POST",
          url: webroot+"admin/orgaos/removecargo/"+$( this ).siblings('input[type=hidden]').val(),
        });
        $(this).parents(".clone").remove();
    }

    $( document ).on( "click", ".cloneRemoveDados", removedados);


</script>