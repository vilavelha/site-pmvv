<div class="resultado index">
    <br />
    <div id="titulo">
        <?php //echo $this->Html->image('boxes/icone_buscar.png'); ?>
        <p>Resultados de busca :</p>
    </div>
    <hr class="linha_h"/>
    <?php
    if (!empty($resultados)) {
        foreach ($resultados as $resultado) {
            $titulo = true;
            foreach ($resultado as $modelo) {
                foreach ($modelo as $chave => $m) {
                    if ($titulo) {
                        ?>
                        <ul class="resultado_busca">
                            <li>
                                <?php
                                if ($chave == 'Noticia') {
                                    $modelo_titulo = 'Notícia';
                                } elseif ($chave == 'Pagina') {
                                    $modelo_titulo = 'Página';
                                } elseif ($chave == 'Servicos') {
                                    $modelo_titulo = 'Serviço';
                                } elseif ($chave == 'Itinerarios') {
                                    $modelo_titulo = 'Itinerário';
                                } elseif ($chave == 'Horarios') {
                                    $modelo_titulo = 'Horário';
                                } elseif ($chave == 'Taxis') {
                                    $modelo_titulo = 'Táxi';
                                } elseif ($chave == 'Eventos') {
                                    $modelo_titulo = 'Evento';
                                } elseif ($chave == 'Arquivos') {
                                    $modelo_titulo = 'Arquivo';
                                } elseif ($chave == 'Telefones') {
                                    $modelo_titulo = 'Telefone';
                                } else {
                                    $modelo_titulo = $chave;
                                }
                                echo '<br/><h3>Resultados em ' . Inflector::pluralize($modelo_titulo) . '</h3>';
                                $titulo = false;
                                ?>
                            </li>
                            <br />
                        <?php } ?>
                        <li>
                            <?php
                            foreach ($m as $c => $campo) {
                                if ($c != 'id') {
                                    if (isset($m['id']) && isset($links[$chave]) && $links[$chave]) {
                                        echo $this->Html->link($campo, array('plugin' => null,
                                            'controller' => Inflector::pluralize(strtolower($chave)),
                                            'action' => 'view', $m['id']
                                                )
                                        );
                                    } else {
                                        if ($c != 'slug') {
                                            if (isset($m['slug']) && isset($links[$chave]) && $links[$chave]) {
                                                echo $this->Html->link($campo, array('plugin' => null,
                                                    'controller' => Inflector::pluralize(strtolower($chave)),
                                                    'action' => $m['slug'],
                                                        )
                                                );
                                            } elseif ($c != 'link') {
                                                if (isset($m['link']) && isset($links[$chave]) && $links[$chave]) {
                                                    echo $this->Html->link($campo, $m['link']
                                                    );
                                                } elseif ($c != 'telefone') {
                                                    if (isset($m['telefone']) && isset($links[$chave]) && $links[$chave]) {
                                                        echo $campo . ' - ' . $m['telefone'];
                                                    } else {
                                                        echo $campo;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        ?>
                    </li>
                <?php } ?>
            </ul>
            <?php
        }
    } else {
        echo 'Não foram encontrados registros para a consulta';
    }
    ?>
</div>