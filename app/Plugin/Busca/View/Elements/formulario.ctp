<?php
    echo $this->Form->create('file', array(
        'url' => "/executa/busca",
            )
    );
    $texto = 'Faça aqui a sua busca';
    if (isset($this->request->data['Busca']['texto'])) {
        $texto = $this->request->data['Busca']['texto'];
    }
    echo $this->Form->input('Busca.modelo', array(
        'type' => 'hidden',
        'value' => ''
    ));?>
    <div class="input-group">
        <?php
            echo $this->Form->input('Busca.texto', array(
                'class' => 'form-control',
                'label' => false,
                'value' => $texto,
                'onblur' => 'if(this.value == "") this.value = "Faça aqui a sua busca"',
                'onfocus' => 'this.value = ""'
                    )
            );
        ?>
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
        </span>
    </div>
    <?php echo $this->Form->end(); ?>