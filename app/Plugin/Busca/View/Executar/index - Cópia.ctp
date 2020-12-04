<div class="resultado index">
    <div id="titulo">
        <?php echo $this->Html->image('boxes/icone_buscar.png'); ?>
        <p>Resultados de busca para "<?php
            echo $texto . '"';
            if (isset($selecionado)) {
                echo ' em ' . $selecionado;
            }
            ?>
        </p>
    </div>
    <hr class="linha"/>
    <?php
    if (!empty($resultados)) {
        foreach ($resultados as $resultado) {
            $titulo = true;
            foreach ($resultado as $modelo) {
                foreach ($modelo as $chave => $m):
                    if ($titulo) {
                        ?>
                        <table>
                            <th colspan="2">
                                <?php
                                echo 'Lista de ' . Inflector::pluralize($chave) . '';
                                $titulo = false;
                                ?>
                            </th>
                            <tr>
                            <?php } ?>
                            <td>
                                <?php
                                if ($chave == 'Link') {
                                    echo $this->Html->link($m['titulo'], array('plugin' => null,
                                        'controller' => strtolower($chave),
                                        //'controller' => Inflector::pluralize(strtolower($chave)),
                                        'action' => $m['link']
                                            )
                                    );
                                } elseif ($chave == "Jornal") {
                                    echo $this->Html->link($m['titulo'], array('plugin' => null,
                                        'controller' => strtolower('correnteza'),
                                        //'controller' => Inflector::pluralize(strtolower($chave)),
                                        'action' => $m['slug']
                                            )
                                    );
                                } else {
                                    echo $this->Html->link($m['titulo'], array('plugin' => null,
                                        'controller' => strtolower($chave),
                                        //'controller' => Inflector::pluralize(strtolower($chave)),
                                        'action' => $m['slug']
                                            )
                                    );
                                }
                            endforeach;
                            ?>
                    </tr>
                <?php } ?>
            </table>
            <?php
        }
    } else {
        echo 'Não foram encontrados registros para a consulta';
    }
    ?>
</div>


<div class="lista busca" id="content_intenterno">
    <div class="content_titulo">
        <h2 class="fl">2902 resultados de busca para:<span> "<?php echo $texto; ?>"</span></h2>
        <div class="cl"></div>
    </div>
    <ul>
        <li>
            <a class="titulo fl">TÍTULO PRINCIPAL DO JORNAL”</a></br>
            <a class="sub fl">“Nesta edição Pellentesque aliquet erat et quam molestie venenatis. Pellentesque aliquet erat et quam molestie venenatisPellentesque aliquet erat et quam molestie venenatis... ”</a></br>
            <div class="cl"></div>
        </li>
    </ul>
</div>