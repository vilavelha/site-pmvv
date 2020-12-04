<div style="text-align: left; color:black; font-size: 10px;">
    <h3>Licitação</h3>


    Número : <?php echo $licitacao['Licitacao']['numero']; ?><br/>
    Processo : <?php echo $licitacao['Licitacao']['processo']; ?><br/>
    Modalidade : <?php echo $licitacao['Licitacao']['modalidade']; ?><br/>
    Pregoeiro/Presidente : <?php echo $licitacao['Licitacao']['responsavel']; ?><br/>
    <?php
    if (
            ($licitacao['Licitacao']['modalidade'] == 'Pregão Presencial') ||
            ($licitacao['Licitacao']['modalidade'] == 'Carta Convite') ||
            ($licitacao['Licitacao']['modalidade'] == 'Concorrência Pública') ||
            ($licitacao['Licitacao']['modalidade'] == 'Tomada de Preços')) {

        if ((!empty($licitacao['Licitacao']['recebimento'])) && ($licitacao['Licitacao']['recebimento_ver'] == true)) {
            ?>


            Data e Horário de Recebimento dos Envelopes : <?php echo $this->Time->format('d/m/Y - H:i', $licitacao['Licitacao']['recebimento']); ?> hrs <br/>


        <?php
        }
    }
    ?>

    <?php
    if (($licitacao['Licitacao']['modalidade'] == 'Pregão Presencial')) {
        if ((!empty($licitacao['Licitacao']['abertura'])) && ($licitacao['Licitacao']['abertura_ver'] == true)) {
            ?>


            Data e Horário da Sessão de Disputa : <?php echo $this->Time->format('d/m/Y - H:i', $licitacao['Licitacao']['abertura']); ?> hrs <br/>


        <?php
        }
    }
    ?>

    <?php
    if (($licitacao['Licitacao']['modalidade'] == 'Pregão Eletrônico')) {
        if ((!empty($licitacao['Licitacao']['inicio_acolhimento'])) && ($licitacao['Licitacao']['inicio_acolhimento_ver'] == true)) {
            ?>


            Inicio acolhimento de proposta : <?php echo $this->Time->format('d/m/Y - H:i', $licitacao['Licitacao']['inicio_acolhimento']); ?> hrs <br/>


        <?php
        }
    }
    ?>

<?php
if (($licitacao['Licitacao']['modalidade'] == 'Pregão Eletrônico')) {
    if ((!empty($licitacao['Licitacao']['fim_recebimento'])) && ($licitacao['Licitacao']['fim_recebimento_ver'] == true)) {
        ?>


            Fim recebimento de Proposta : <?php echo $this->Time->format('d/m/Y - H:i', $licitacao['Licitacao']['fim_recebimento']); ?> hrs <br/>


        <?php
        }
    }
    ?>

<?php
if (($licitacao['Licitacao']['modalidade'] == 'Pregão Eletrônico') || ($licitacao['Licitacao']['modalidade'] == 'Leilão')) {
    if ((!empty($licitacao['Licitacao']['inicio_disputa'])) && ($licitacao['Licitacao']['inicio_disputa_ver'] == true)) {
        ?>


            Início da Sessão de Disputa de Preços : <?php echo $this->Time->format('d/m/Y - H:i', $licitacao['Licitacao']['inicio_disputa']); ?> hrs <br/>


        <?php
        }
    }
    ?>

    <?php
    if (
            ($licitacao['Licitacao']['modalidade'] == 'Carta Convite') ||
            ($licitacao['Licitacao']['modalidade'] == 'Concorrência Pública') ||
            ($licitacao['Licitacao']['modalidade'] == 'Tomada de Preços')) {
        if ((!empty($licitacao['Licitacao']['sessao_publica'])) && ($licitacao['Licitacao']['sessao_publica_ver'] == true)) {
            ?>


            Data e Horário da Sessão Pública: <?php echo $this->Time->format('d/m/Y - H:i', $licitacao['Licitacao']['sessao_publica']) . ' hrs'; ?> <br/>

    <?php
    }
}
?>
    <br/><hr/>
<?php foreach ($licitacao['Contador'] as $contador): ?>


        Interessado : <?php echo $contador['interessado']; ?><br/>
        CNPJ : <?php echo $contador['cnpj']; ?><br/>
        Contato : <?php echo $contador['contato']; ?><br/>
        Endereço : <?php echo $contador['endereco']; ?><br/>
        Telefone : <?php echo $contador['telefone']; ?><br/>
        E-mail : <?php echo $contador['email']; ?><br/>
        Baixado : <?php echo $this->Time->format('d/m/Y - H:i:s', $contador['created']); ?><br/>
        <hr/>

<?php endforeach; ?>
</div>