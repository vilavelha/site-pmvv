<div class="resultado index">

    <div id="titulo">
        <br/>
        <h2><?php if (!empty($this->data['Busca']['texto'])) echo $this->data['Busca']['texto']; ?> </h2>
        <p>
            <?php
            $modelos = $this->requestAction('/busca/executar/modelos');
            echo $this->Form->create('file', array(
                'url' => "/busca/executar/index"
                    //'url' => "/busca/executar/index"
                    )
            );
            foreach ($modelos as $modelo) {
                @$cond[$modelo] .= $modelo;
            }
            echo $this->Form->input('Busca.modelo', array(
                'type' => 'select',
                'multiple' => 'checkbox',
                'checked' => false,
                'options' => array(
                    $cond
                )
            ));
            $busca = '';
            if (!empty($this->data['Busca']['texto']))
                $busca = $this->data['Busca']['texto'];
            echo $this->Form->input('Busca.texto', array(
                'class' => 'input_field',
                'label' => false,
                'value' => $busca,
                'type' => 'hidden'
                    )
            );
            ?>
            <input type="submit" value="" class="input_bt"/>
            <?php echo $this->Form->end(); ?>
        </p>
    </div>
</div>