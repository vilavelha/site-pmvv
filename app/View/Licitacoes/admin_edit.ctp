<?php
echo $this->element('Midias.window');
echo $this->Html->script('ckeditor/ckeditor', array('inline' => false));
?>

<?php echo $this->Form->create('Licitacao', array('type' => 'file')); ?>
<?php echo $this->Form->input('id');?>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('orgao_id', array('class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('requisitante_id', array('class' => 'form-control', 'div' => array('class' => 'form-group', 'label' => 'Setor Requisitante'))); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('numero', array('class' => 'form-control', 'div' => array('class' => 'form-group', 'label' => 'Número de Edital'))); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('processo', array('class' => 'form-control', 'div' => array('class' => 'form-group', 'label' => 'Número do Processo'))); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('modalidade', array('options' => array(
            'Pregão Presencial' => 'Pregão Presencial',
            'Pregão Eletrônico' => 'Pregão Eletrônico',
            'Carta Convite' => 'Carta Convite',
            'Concorrência Pública' => 'Concorrência Pública',
            'Tomada de Preços' => 'Tomada de Preços',
            'Leilão' => 'Leilão',
            'Chamada Pública' => 'Chamada Pública',
            'Chamamento Público' => 'Chamamento Público',
            'Contratação Emergencial' => 'Contratação Emergencial',
            	'Licitação Pública Internacional' => 'Licitação Pública Internacional',
			'Licitação Pública Nacional' => 'Licitação Pública Nacional'
            )
        ,'div' => false, 'empty' => 'Escolha uma modalidade', 'class' => 'form-control'));
        ?>
    </div>
</div>
<br/>

<div class="inicio_acolhimento">
    <div class="row">
        <div class="col-md-12">
            <label>Inicio Acolhimento</label>
        </div>
    </div>
    <?php echo $this->Form->hidden('inicio_acolhimento_ver', array('div' => false, 'label' => false, 'type' => 'checkbox', 'checked')); ?>
    <div class="row">
        <div class="col-md-2">
            <?php echo $this->Form->day('inicio_acolhimento', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Dia', 'value' => '')); ?>
        </div>
        <div class="col-md-2">
            <?php echo $this->Form->month('inicio_acolhimento', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Mês', 'value' => '')); ?>
        </div>
        <div class="col-md-2">
            <?php echo $this->Form->year('inicio_acolhimento', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Ano', 'value' => '')); ?>
        </div>
        <div class="col-md-2">
            <?php echo $this->Form->hour('inicio_acolhimento', true,array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Hora', 'value' => '')); ?>
        </div>
        <div class="col-md-2">
            <?php echo $this->Form->minute('inicio_acolhimento', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Minuto', 'value' => '')); ?>
        </div>
    </div>
</div>

<div class="fim_recebimento">
    <div class="row">
        <div class="col-md-12">
            <label>Fim recebimento de Proposta</label>
        </div>
    </div>
    <?php echo $this->Form->hidden('fim_recebimento_ver', array('div' => false, 'label' => false, 'type' => 'checkbox', 'checked')); ?>
    <div class="row">
        <div class="col-md-2">
            <?php echo $this->Form->day('fim_recebimento', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Dia', 'value' => '')); ?>
        </div>
        <div class="col-md-2">
            <?php echo $this->Form->month('fim_recebimento', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Mês', 'value' => '')); ?>
        </div>
        <div class="col-md-2">
            <?php echo $this->Form->year('fim_recebimento', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Ano', 'value' => '')); ?>
        </div>
        <div class="col-md-2">
            <?php echo $this->Form->hour('fim_recebimento', true,array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Hora', 'value' => '')); ?>
        </div>
        <div class="col-md-2">
            <?php echo $this->Form->minute('fim_recebimento', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Minuto', 'value' => '')); ?>
        </div>
    </div>
</div>

<div class="inicio_disputa">
    <div class="row">
        <div class="col-md-12">
            <label>Data do Certame</label>
        </div>
    </div>
    <?php echo $this->Form->hidden('inicio_disputa_ver', array('div' => false, 'label' => false, 'type' => 'checkbox', 'checked')); ?>
    <div class="row">
        <div class="col-md-2">
            <?php echo $this->Form->day('inicio_disputa', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Dia', 'value' => '')); ?>
        </div>
        <div class="col-md-2">
            <?php echo $this->Form->month('inicio_disputa', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Mês', 'value' => '')); ?>
        </div>
        <div class="col-md-2">
            <?php echo $this->Form->year('inicio_disputa', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Ano', 'value' => '')); ?>
        </div>
        <div class="col-md-2">
            <?php echo $this->Form->hour('inicio_disputa', true,array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Hora', 'value' => '')); ?>
        </div>
        <div class="col-md-2">
            <?php echo $this->Form->minute('inicio_disputa', array('class' => 'form-control', 'div' => false, 'label' => false, 'empty' => 'Minuto', 'value' => '')); ?>
        </div>
    </div>
</div>

<br/>

<div class="row">
    <div class="col-md-12">
        <?php
        echo $this->Form->input('responsavel', array('class' => 'form-control', 'div' => array('class' => 'form-group')), array('label' => 'Pregoeiro/Presidente/Equipe'));
        ?>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <?php
        echo $this->Form->input('objeto', array('class' => 'form-control', 'div' => array('class' => 'form-group')));
        ?>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <?php
        echo $this->Form->input('info', array('class' => 'ckeditor', 'label' => 'Informações'));
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php
        echo $this->Form->input('anexos', array('class' => 'ckeditor', 'label' => 'Anexos'));
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php
        echo $this->Form->input('edital', array('type' => 'file'));
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->input('resultado', array('options' => array(
            'Publicado' => 'Publicado',
            'Análise de Impugnação' => 'Análise de Impugnação',
            'Suspensa' => 'Suspensa',
            'Disputa encerrada' => 'Disputa encerrada',
            'Fracassada' => 'Fracassada',
            'Deserta' => 'Deserta',
            'Declarado Vencedor' => 'Declarado Vencedor',
            'Análise de Recurso' => 'Análise de Recurso',
            'Homologado' => 'Homologado',
            'Cancelada' => 'Cancelada',
            'Revogada' => 'Revogada',
            'Anulada' => 'Anulada'
            )
        ,'div' => false, 'empty' => 'Escolha um resultado', 'class' => 'form-control'));
        ?>
    </div>
</div>
<br/>
<br/>
<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
</div>

