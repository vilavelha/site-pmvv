<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://www.opensource.org/licenses/mit-license.php MIT License
 */
$secretarias = $this->requestAction(array('controller' => 'orgaos', 'action' => 'carregaSecretarias', 'admin' => false, 'plugin' => false));
$outrosOrgaos = $this->requestAction(array('controller' => 'coordenadorias', 'action' => 'carregaOutrosOrgaos', 'admin' => false, 'plugin' => false));
?>
<!DOCTYPE html>
<html>

<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo 'Prefeitura Municipal de Vila Velha' ?>:
        <?php echo $this->fetch('title'); ?>
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php
    echo $this->Html->meta('icon');

    echo $this->Html->css(array(
        'https://fonts.googleapis.com/css?family=Lato:400,900',
        'bootstrap.min',
        'ie10-viewport-bug-workaround',
        'styles',
        'docs',
        'midiassociais',
        'font-awesome-4.7.0/css/font-awesome.min',
        'bootstrap-select/css/bootstrap-select.min'
    ));

    echo $this->Html->script(
        array(
            'jquery.min',
            'ie-emulation-modes-warning',
            'ie10-viewport-bug-workaround',
            'bootstrap.min',
            'bootstrap-select/js/bootstrap-select.min'
        )
    );

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
    <script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-63690838-1', 'auto');
    ga('send', 'pageview');
    </script>
</head>

<body>
    <div class="container-header">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <?php echo $this->Html->link($this->Html->image('logo_pmvv.png', array('style' => 'max-height:100%; max-width:100%;')), array('controller' => '/', 'admin' => false, 'plugin' => false), array('escape' => false)); ?>
                </div>
                <div class="col-md-8">
                    <div class="row text-center paddingTop30">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-6 text-right">
                            <div><?php echo $this->element('Busca.formulario'); ?></div>
                        </div>
                        <div class="col-md-4 text-right icones-rapidos">
                            <a href="https://sistemas.vilavelha.es.gov.br/ouvidoria/CadastrarEvento.aspx?tipo_evento=7"
                                target="_blank"><?php echo $this->Html->image('social_informacao.png'); ?></a>
                            <a href="https://twitter.com/vilavelhaes" class="btn btn-social-icon btn-twitter"
                                target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.facebook.com/vilavelha" class="btn btn-social-icon btn-facebook"
                                target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://instagram.com/vilavelha_es" class="btn btn-social-icon btn-instagram"
                                target="_blank"><i class="fa fa-instagram"></i></a>
                            <a href="https://plus.google.com/+vilavelha" class="btn btn-social-icon btn-google-plus"
                                target="_blank"><i class="fa fa-google-plus"></i></a>
                            <a href="https://www.youtube.com/user/vilavelhaemdia/videos"
                                class="btn btn-social-icon btn-google-plus" target="_blank"><i
                                    class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <div class="navbar-brand visible-xs">MENU SITE</div>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Abrir Navegação</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li id="link-diariooficial"><a href="http://www.vilavelha.es.gov.br/diariooficial/"
                            target="_blank">Diário Oficial</a></li>
                    <li id="link-diariooficial"><a href="http://sistemas.vilavelha.es.gov.br/ouvidoria/"
                            target="_blank">Ouvidoria</a></li>
                    <li id="link-transparencia"><a href="http://transparencia.vilavelha.es.gov.br/transparenciaweb/"
                            target="_blank">Transparência</a></li>
                    <!--<li id="link-empreendedor"><a href="http://www.vilavelha.es.gov.br/setor/desenvolvimento-economico/centro-do-empreendedor">Centro Empreendedor</a></li>-->
                    <li id="link-licitacoes">
                        <?php echo $this->Html->link('Licitações', array('controller' => 'licitacoes', 'action' => 'index', 'admin' => false, 'plugin' => false)); ?>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">secretarias <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php foreach ($secretarias as $secretaria) : ?>
                            <li><?php echo $this->Html->link($secretaria['Orgao']['nome'], array('controller' => 'secretaria', 'action' => $secretaria['Orgao']['slug'], 'admin' => false, 'plugin' => false)); ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>

                    <li id="link-servicos"><a href="http://www.vilavelha.es.gov.br/cartaservico/"
                            target="_blank">SERVIÇOS</a></li>


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Atos Oficiais <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><?php echo $this->Html->link('Atos Oficiais - SEMGOV', 'https://www.vilavelha.es.gov.br/paginas/governo-e-coordenacao-institucional-atos-oficiais', array('target' => '_blank')); ?>
                            </li>
                            <li><?php echo $this->Html->link('Concursos e Seleções', 'https://www.vilavelha.es.gov.br/concursos/ ', array('target' => '_blank')); ?>
                            </li>
                            <!--<li><a href="https://www.vilavelha.es.gov.br/transparencia/ConselhosMunicipais.aspx" target="_blank">CONSELHOS MUNICIPAIS</a></li>-->
                            <li><?php echo $this->Html->link('Gabinete - Acesso a Informação ', 'https://www.vilavelha.es.gov.br/paginas/gabinete-informacoes-e-transparencia/', array('target' => '_blank')); ?>
                            </li>
                            <li><?php echo $this->Html->link('Instituto de Previdência de Vila Velha - IPVV', 'https://www.ipvv.es.gov.br/', array('target' => '_blank')); ?>
                            </li>
                            <li><?php echo $this->Html->link('Instruções Normativas - SEMCONT', 'https://www.vilavelha.es.gov.br/paginas/controle-e-transparencia-instrucoes-normativas-pmvv', array('target' => '_blank')); ?>
                            </li>
                            <li><a href="https://transparencia.vilavelha.es.gov.br/transparenciaweb/PrestacaoDeContas.aspx?c=1074"
                                    target="_blank">JUNTA DE IMPUGNAÇÃO FISCAL - JUIF</a></li>
                            <li><?php echo $this->Html->link('Legislação Online', 'https://www.vilavelha.es.gov.br/legislacao/', array('target' => '_blank')); ?>
                            </li>
                            <li><?php echo $this->Html->link('Licitações', 'https://www.vilavelha.es.gov.br/licitacoes/', array('target' => '_blank')); ?>
                            </li>
                        </ul>
                    </li>


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Processos <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><?php echo $this->Html->link('Cidadão', 'http://processos.vilavelha.es.gov.br', array('target' => '_self')); ?>
                            </li>
                            <li><?php echo $this->Html->link('Servidor', 'https://www.vilavelha.es.gov.br/processos_servidor_submenu/', array('target' => '_blank')); ?>
                            </li>

                        </ul>
                    </li>

                    <li id="link-turismo"><a href="https://www.vilavelha.es.gov.br/guiaturistico/"
                            target="_blank">Turismo</a></li>

                </ul>
            </div>
        </div>
    </nav>
    <?php echo $this->Flash->render();
    ?>
    <?php echo $this->fetch('content');
    ?>
    <div class="divisor-20"></div>
    <footer class="footer-static-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-6 footerleft">
                    <div class="logofooter"><?php echo $this->Html->image('logo.png'); ?></div>
                </div>
                <!-- <div class="col-md-2 col-sm-6 paddingtop-bottom">
					<br/>
	                <h6 class="heading7">LINKS ÚTEIS</h6>
	                <ul class="footer-ul">
	                    <li><a href="#">Link</a></li>
	                    <li><a href="#">Link</a></li>
	                    <li><a href="#">Link</a></li>
	                    <li><a href="#">Link</a></li>
	                </ul>
	            </div>
	            <div class="col-md-3 col-sm-6 paddingtop-bottom">
	            	<br/>
	                <h6 class="heading7">VILA VELHA PARA</h6>
	                <ul class="footer-ul">
	                    <li><a href="#">CIDADÃO</a></li>
	                    <li><a href="#">SERVIDOR</a></li>
	                    <li><a href="#">EMPRESA</a></li>
	                </ul>
	            </div> -->
                <div class="col-md-3 col-sm-6 paddingtop-bottom">
                    <br />
                    <h6 class="heading7">PREFEITURA</h6>
                    <select name="lista-secretarias" id="lista-secretarias" class="form-control">
                        <option disabled="disabled" selected="selected" value="Secretarias">Secretarias</option>
                        <?php foreach ($secretarias as $secretaria) : ?>
                        <option value="<?php echo $this->webroot . 'secretaria/' . $secretaria['Orgao']['slug']; ?>">
                            <?php echo $secretaria['Orgao']['nome']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br />
                    <select name="lista-orgaos" id="lista-orgaos" class="form-control">
                        <option disabled="disabled" selected="selected" value="Orgaos">Outros órgãos</option>
                        <?php foreach ($outrosOrgaos as $coordenadoria) : ?>
                        <option
                            value="<?php echo $this->webroot . 'setor/' . $coordenadoria['Orgao']['slug'] . '/' . $coordenadoria['Coordenadoria']['slug']; ?>">
                            <?php echo $coordenadoria['Coordenadoria']['nome']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 contato">
                    <span><i class="fa fa-clock-o"></i> <b>Horário de funcionamento:</b> 08 horas às 18
                        horas.</span><br />
                    <span><i class="fa fa-phone"></i> <b>Telefone:</b> (27) 3149-7200</span><br />
                    <span><i class="fa fa-map-marker"></i> <b>Endereço:</b> Avenida Santa Leopoldina, 840 - Coqueiral de
                        Itaparica, Vila Velha, ES - CEP: 29.102-375</span>
                </div>
            </div>
        </div>
    </footer>
    <script type="text/javascript">
    $(function() {
        // bind change event to select
        $('#lista-secretarias, #lista-orgaos').on('change', function() {
            var url = $(this).val(); // get selected value
            if (url) { // require a URL
                window.location = url; // redirect
            }
            return false;
        });
    });

    $('#tabServicos a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });


    $('#tabServicos a:first').tab('show');

    jQuery(document).ready(function($) {

        $('#myCarousel').carousel({
            interval: 5000
        });

        $('#carousel-example-generic').on('slid.bs.carousel', function() {
            $holder = $("ol li.active");
            $holder.removeClass('active');
            var idx = $('div.active').index('div.item');
            $('ol.carousel-indicators li[data-slide-to="' + idx + '"]').addClass('active');
        });





        $('ol.carousel-indicators  li').on("click", function() {
            $('ol.carousel-indicators li.active').removeClass("active");
            $(this).addClass("active");
        });
    });
    </script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha256-KM512VNnjElC30ehFwehXjx1YCHPiQkOPmqnrWtpccM=" crossorigin="anonymous"> -->
    </script>
   
   <!--  <script>
    $(function() {
        $("#dialog").dialog({
            width: 800,
            title: 'Comunicado - PMVV'
        });
    });
    </script>
	-->
</body>

</html>