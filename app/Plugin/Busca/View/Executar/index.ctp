<nav class="navbar-secretaria navbar-secretaria-default">
    <div class="container">
        <div class="navbar-header">
            <div class="navbar-brand visible-xs">MENU SECRETARIA</div>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-secretaria" aria-expanded="false" aria-controls="navbar-secretaria">
                <span class="sr-only">Abrir Navegação</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar-secretaria" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><?php echo $this->Html->link('Notícias (' . $count2['Noticia'] . ')', array('controller' => 'busca', 'action' => "noticias/".utf8_encode($this->params['busca']), 'plugin' => false)); ?> </li>
                <li><?php echo $this->Html->link('Servicos (' . $count2['Servicos'] . ')', array('controller' => 'busca', 'action' => "servicos/{$this->params['busca']}", 'plugin' => false)); ?> </li>
                <li><?php echo $this->Html->link('Páginas (' . $count2['Pagina'] . ')', array('controller' => 'busca', 'action' => "paginas/{$this->params['busca']}", 'plugin' => false)); ?> </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container" style="padding-top: 20px;clear:both; min-height: 700px;">
    <div class="divisor_20"></div>
    <!-- Início resultado-busca-noticia -->
    <div id="diego-manero">
        <?php
        if (!empty($modelo)) {
            $total = $count2[$modelo];
        } else {
            $total = 0;
            foreach ($count2 as $count2t => $key):
                $total += $key;
            endforeach;
        }
        ?>
        <?php if(!isset($this->params['modelo'])){ ?>
        <div class="row"><div class="col-md-12 text-center"><span class="glyphicon glyphicon-search"></span> Foram encontrados <b><h3><?php echo $total; ?></h3></b> resultados de busca para: <span> <b><h3>"<?php echo utf8_encode($texto); ?>"</h3></b></span><br/>Clique em uma das abas acima para navegar na busca.</div></div>
        <?php } ?>
        </div>
        <div class="mydiv">
            <?php if($this->params['modelo'] == 'noticias'){ ?>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" id="divNoticiasAjax">
                    <?php if (isset($resultados['Noticia'])): foreach ($resultados['Noticia'] as $noticia): ?>
                        <div class="col-xs-12 col-sm-12 col-md-4" style="min-height:310px">
                            <a href="<?php echo $this->webroot . "noticias/{$this->Time->format('Y', $noticia['Noticia']['created'])}/{$this->Time->format('m', $noticia['Noticia']['created'])}/{$noticia['Noticia']['slug']}"; ?>" onClick="ga('send','event', '4 Noticias', 'click', 'Cliques contabilizados nas 4 noticias abaixo do banner do topo');">
                                <div class="thumbnail">
                                    <div class="img-mais-noticias">
                                        <?php
                                        if ($noticia['Noticia']['created'] < "2013-11-01 00:00:00") {
                                            if ($noticia['ImagemGrande']['id'] != NULL) {
                                                echo $this->Utils->imagemMidia($noticia['ImagemGrande'], array('height' => '290'));
                                            } else {
                                                echo $this->Utils->imagemMidia($noticia['ImagemMiniatura'], array('height' => '290'));
                                            }
                                        } else {
                                            if (!empty($noticia['ImagemGrande'])): echo $this->Html->image('http://www.vilavelha.es.gov.br/' . MIDIA_URI . '/' . $noticia['ImagemGrande']['pasta'] . '/' . $noticia['ImagemGrande']['id'] . '_' . $this->Time->format('d', $noticia['ImagemGrande']['created']) . $this->Time->format('m', $noticia['ImagemGrande']['created']) . $this->Time->format('Y', $noticia['ImagemGrande']['created']) . '_326x290.jpg');
                                            endif;
                                        }
                                        ?>
                                    </div>
                                    <div class="caption">
                                        <h4 class="text-capitalize"><?php echo h($noticia['Noticia']['titulo']); ?></h4>
                                        <p class="text-capitalize"><?php echo h($noticia['Noticia']['texto_resumo']); ?></p>
                                        <!--<a href="#" class="btn btn-info btn-xs" role="button">Leia Mais</a>-->
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
            <?php } ?>
                <!-- Fim resultado-busca-noticia -->
                <?php if($this->params['modelo'] == 'servicos'){ ?>
                <?php
                if (!empty($resultados['Servicos'])):
                    foreach ($resultados['Servicos'] as $data):
                        ?>
                    <a href="<?php echo $data['Servicos']['link']; ?>">
                        <div class="resultado-busca-servicos">
                            <div id="coluna-esquerda">
                                <div class="titulo"><?php echo $data['Servicos']['nome']; ?></div>
                                <br/>
                            </div>
                            <div style="clear:both;">
                            </div>
                            <div class="divisor_20"></div>
                        </div>
                    </a>
                    <?php
                    endforeach;
                    endif;
                    ?>
                    <?php } ?>
                    <?php if($this->params['modelo'] == 'paginas'){ ?>
                    <style>
                        a.list-group-item {
                            height:auto;
                            min-height:200px;
                        }
                    </style>
                    <?php
                    if (!empty($resultados['Pagina'])):
                        foreach ($resultados['Pagina'] as $data):
                            ?>
                        <div class="row">
                            <div class="list-group">
                                <a href="<?php echo $this->webroot . 'paginas' . DS . $data['Pagina']['slug']; ?>" class="list-group-item active">
                                    <div class="col-md-9">
                                        <h4 class="list-group-item-heading"> <?php echo $data['Pagina']['nome']; ?> </h4>
                                        <?php
                                        $bodyText = $data['Pagina']['conteudo'];
                                            // Remove & escape any HTML to make sure the feed content will validate.
                                        $bodyText = strip_tags($bodyText);
                                        $bodyText = $this->Text->truncate($bodyText, 400, array(
                                            'ending' => '...',
                                            'exact' => true,
                                            'html' => true,
                                            ));
                                            ?>
                                            <p class="list-group-item-text"> <?php echo $bodyText; ?></p>
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <button type="button" class="btn btn-default btn-lg btn-block"> Visitar Página </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php
                            endforeach;
                            endif;
                            ?>
                            <?php } ?>
                            <div style="clear:both;"></div>
                            <div class="divisor_20"></div>
                        </div>
                        <?php if(isset($this->params['modelo'])): ?>
                        <div clas="row">
                            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 text-center">
                                <div class="pagination pagination-large">
                                    <ul class="pagination">
                                        <?php
                                            $this->Paginator->options(array(
                                                'update' => '#mydiv',
                                                'evalScripts' => true,
                                                'before' => $this->Js->get('#busy-indicator')->effect('fadeIn', array('buffer' => false)),
                                                'complete' => $this->Js->get('#busy-indicator')->effect('fadeOut', array('buffer' => false)),
                                                'url' => array('controller' => 'busca', 'action' => $this->params['modelo'], $this->params['busca'], 'plugin' => false)
                                                ));

                                            echo $this->Paginator->prev('anterior', array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                                            echo $this->Paginator->numbers(array('separator' => '', 'ellipsis' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                                            echo $this->Paginator->next('próxima', array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
        </div>