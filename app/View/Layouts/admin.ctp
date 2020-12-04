<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

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
				)
			);

		echo $this->Html->script(
			array(
				'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js',
				'ie-emulation-modes-warning',
				'ie10-viewport-bug-workaround',
				'bootstrap.min',
				'bootstrap-select/js/bootstrap-select.min',
				'https://code.jquery.com/jquery-migrate-1.2.1.js'
			)
		);	
		echo $this->Html->scriptBlock('var webroot = "' . $this->webroot . '";');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div class="container-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                	<?php echo $this->Html->link($this->Html->image('logo_pmvv.png', array('style' => 'max-height:100%; max-width:100%;')), array('controller' => '/'), array('escape' => false));?>
                </div>
                <div class="col-md-6">
                    <div class="row text-center paddingTop30">
                        <div class="col-md-3">
                        	<?php //echo $this->Html->image('ouvidoria.png', array('style' => 'width:60%;max-width:60%;margin-top:-10px;','class' => 'img-responsive'));?>
                        </div>
                        <!-- <div class="col-md-4 text-right">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Buscar no site...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                                </span>
                            </div>
                        </div> -->
                        <div class="col-md-6 text-right icones-rapidos">
                            <a href="https://sistemas.vilavelha.es.gov.br/formulariosic" target="_blank"><?php echo $this->Html->image('social_informacao.png');?></a>
                            <a href="https://twitter.com/vilavelhaes" class="btn btn-social-icon btn-twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.facebook.com/vilavelha" class="btn btn-social-icon btn-facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://instagram.com/vilavelha_es" class="btn btn-social-icon btn-instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                            <a href="https://plus.google.com/+vilavelha" class="btn btn-social-icon btn-google-plus" target="_blank"><i class="fa fa-google-plus"></i></a>
                            <a href="https://www.youtube.com/user/vilavelhaemdia/videos" class="btn btn-social-icon btn-google-plus" target="_blank"><i class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<nav class="navbar navbar-default">
        <div class="container-fluid">
        	<div class="navbar-header">
        		<div class="navbar-brand visible-xs">MENU SITE</div>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Abrir Navegação</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
	        <div id="navbar" class="navbar-collapse collapse">
	        	<ul class="nav navbar-nav">
	        		<li class="dropdown">
	        			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Banners <span class="caret"></span></a>
	        			<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Listar', array('controller' => 'banners', 'action' => 'index', 'admin' => true, 'plugin' => false)); ?></li>
							<li><?php echo $this->Html->link('Adicionar', array('controller' => 'banners', 'action' => 'add', 'admin' => true, 'plugin' => false)); ?></li>
	        			</ul>
	        		</li>
	        		<li class="dropdown">
	        			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Concursos <span class="caret"></span></a>
	        			<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Listar', array('controller' => 'concursos', 'action' => 'index', 'admin' => true, 'plugin' => false)); ?></li>
							<li><?php echo $this->Html->link('Adicionar', array('controller' => 'concursos', 'action' => 'add', 'admin' => true, 'plugin' => false)); ?></li>
	        			</ul>
	        		</li>
					<li class="dropdown">
	        			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Downloads <span class="caret"></span></a>
	        			<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Listar', array('controller' => 'downloads', 'action' => 'index', 'admin' => true, 'plugin' => false)); ?></li>
							<li><?php echo $this->Html->link('Adicionar', array('controller' => 'downloads', 'action' => 'add', 'admin' => true, 'plugin' => false)); ?></li>
	        			</ul>
	        		</li>
	        		<li class="dropdown">
	        			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Destaques <span class="caret"></span></a>
	        			<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Listar', array('controller' => 'destaques', 'action' => 'index', 'admin' => true, 'plugin' => false)); ?></li>
							<li><?php echo $this->Html->link('Adicionar', array('controller' => 'destaques', 'action' => 'add', 'admin' => true, 'plugin' => false)); ?></li>
	        			</ul>
	        		</li>
	        		<li class="dropdown">
	        			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Licitações <span class="caret"></span></a>
	        			<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Listar', array('controller' => 'licitacoes', 'action' => 'index', 'admin' => true, 'plugin' => false)); ?></li>
							<li><?php echo $this->Html->link('Adicionar', array('controller' => 'licitacoes', 'action' => 'add', 'admin' => true, 'plugin' => false)); ?></li>
	        			</ul>
	        		</li>
	        		<li class="dropdown">
	        			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mídias <span class="caret"></span></a>
	        			<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Listar', array('controller' => 'midias', 'action' => 'index', 'admin' => true, 'plugin' => false)); ?></li>
							<li><?php echo $this->Html->link('Adicionar', array('controller' => 'midias', 'action' => 'add', 'admin' => true, 'plugin' => 'midias', 'iframe' => 1)); ?></li>
	        			</ul>
	        		</li>
	        		<li class="dropdown">
	        			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notícias <span class="caret"></span></a>
	        			<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Listar', array('controller' => 'noticias', 'action' => 'index', 'admin' => true, 'plugin' => false)); ?></li>
							<li><?php echo $this->Html->link('Adicionar', array('controller' => 'noticias', 'action' => 'add', 'admin' => true, 'plugin' => false)); ?></li>
	        			</ul>
	        		</li>
	        		<li class="dropdown">
	        			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Paginas <span class="caret"></span></a>
	        			<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Listar', array('controller' => 'paginas', 'action' => 'index', 'admin' => true, 'plugin' => false)); ?></li>
							<li><?php echo $this->Html->link('Adicionar', array('controller' => 'paginas', 'action' => 'add', 'admin' => true, 'plugin' => false)); ?></li>
	        			</ul>
	        		</li>
	        		<li class="dropdown">
	        			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Serviços <span class="caret"></span></a>
	        			<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Listar', array('controller' => 'servicos', 'action' => 'index', 'admin' => true, 'plugin' => false)); ?></li>
							<li><?php echo $this->Html->link('Adicionar', array('controller' => 'servicos', 'action' => 'add', 'admin' => true, 'plugin' => false)); ?></li>
	        			</ul>
	        		</li>
	        		<li class="dropdown">
	        			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Secretarias <span class="caret"></span></a>
	        			<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Listar', array('controller' => 'orgaos', 'action' => 'index', 'admin' => true, 'plugin' => false)); ?></li>
							<li><?php echo $this->Html->link('Adicionar', array('controller' => 'orgaos', 'action' => 'add', 'admin' => true, 'plugin' => false)); ?></li>
	        			</ul>
	        		</li>
	        		<li class="dropdown">
	        			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Setores <span class="caret"></span></a>
	        			<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Listar', array('controller' => 'coordenadorias', 'action' => 'index', 'admin' => true, 'plugin' => false)); ?></li>
							<li><?php echo $this->Html->link('Adicionar', array('controller' => 'coordenadorias', 'action' => 'add', 'admin' => true, 'plugin' => false)); ?></li>
	        			</ul>
	        		</li>
	        		<li class="dropdown">
	        			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Videos <span class="caret"></span></a>
	        			<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Listar', array('controller' => 'videos', 'action' => 'index', 'admin' => true, 'plugin' => false)); ?></li>
							<li><?php echo $this->Html->link('Adicionar', array('controller' => 'videos', 'action' => 'add', 'admin' => true, 'plugin' => false)); ?></li>
	        			</ul>
	        		</li>
					<li style="color: red; font-weight: bold">
						<?php echo $this->Html->link('Sair', array('controller' => 'users', 'action' => 'logout', 'admin' => false, 'plugin' => false)); ?>
	        		</li>
	        	</ul>
	        </div>
        </div>
    </nav>
    <div class="container-fluid" style="padding-top: 20px;clear:both">
	    <?php echo $this->Flash->render(); ?>
		<?php echo $this->fetch('content'); ?>
	</div>
	<div class="divisor-20"></div>
</body>
</html>