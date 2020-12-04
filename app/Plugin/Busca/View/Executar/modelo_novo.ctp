<div class="resultado index">
    <div class="banner_bg">
        <div class="buscar2">
            <h1><?php echo $this->data['Busca']['texto']; ?></h1>
            <p>Ol&aacute;, encontramos o que voc&ecirc; procura em algumas sess&otilde;es de nosso site. <br />
                Para uma busca mais objetiva, selecione a sess&atilde;o e clique em <em>Avan&ccedil;ar</em>.</p>
            <?php
            $modelos = $this->requestAction('/busca/executar/modelos');
            echo $this->Form->create('file', array(
                'url' => "/busca/executar/index"
                    )
            );
            $cond = '';
            foreach ($modelos as $modelo) {

                if ($modelo == 'Noticia') {
                    $modelo_titulo = 'Notícias';
                    @$cond[$modelo] .= $modelo_titulo;
                } elseif ($modelo == 'Pagina') {
                    $modelo_titulo = 'Páginas';
                    @$cond[$modelo] .= $modelo_titulo;
                } elseif ($modelo == 'Servicos') {
                    $modelo_titulo = 'Serviços';
                    @$cond[$modelo] .= $modelo_titulo;
                } elseif ($modelo == 'Itinerario') {
                    $modelo_titulo = 'Itinerários';
                    @$cond[$modelo] .= $modelo_titulo;
                } elseif ($modelo == 'Horario') {
                    $modelo_titulo = 'Horários';
                    @$cond[$modelo] .= $modelo_titulo;
                } elseif ($modelo == 'Taxi') {
                    $modelo_titulo = 'Táxis';
                    @$cond[$modelo] .= $modelo_titulo;
                } elseif ($modelo == 'Evento') {
                    $modelo_titulo = 'Eventos';
                    @$cond[$modelo] .= $modelo_titulo;
                } elseif ($modelo == 'Arquivo') {
                    $modelo_titulo = 'Arquivos';
                    @$cond[$modelo] .= $modelo_titulo;
                } elseif ($modelo == 'Telefone') {
                    $modelo_titulo = 'Telefones';
                    @$cond[$modelo] .= $modelo_titulo;
                } else {
                    @$cond[$modelo] .= $modelo;
                }
            }
            ?>
            <ul>
                <div>
                    <?php
                    echo $this->Form->input('Busca.modelo', array(
                        'type' => 'select',
                        'multiple' => 'checkbox',
                        'label' => false,
                        'class' => 'busca_opcao',
                        'checked' => false,
                        'options' => array(
                            $cond
                        )
                    ));
                    echo $this->Form->input('Busca.texto', array(
                        'class' => 'input_field',
                        'label' => false,
                        'value' => $this->data['Busca']['texto'],
                        'type' => 'hidden'
                            )
                    );
                    ?>
                </div>
            </ul>

            <div class="bt_avancar">
                <input type="submit" value=""/>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>

    </div>
</div>