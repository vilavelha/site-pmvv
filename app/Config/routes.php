<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
 
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	Router::connect('/executa/busca', array('controller' => 'executar', 'action' => 'busca', 'plugin' => 'busca'));
	Router::connect('/busca/:busca', array('controller' => 'executar', 'action' => 'index', 'plugin' => 'busca'));
	Router::connect('/busca/:modelo/:busca', array('controller' => 'executar', 'action' => 'index', 'plugin' => 'busca'));
	Router::connect('/busca/:modelo/:busca/*', array('controller' => 'executar', 'action' => 'index', 'plugin' => 'busca'));

	Router::connect(
	        '/noticias/:ano', array('controller' => 'noticias', 'action' => 'index'), array('ano' => '[0-9]+')
	);
	Router::connect(
	        '/noticias/:ano/:mes', array('controller' => 'noticias', 'action' => 'index'), array('ano' => '[0-9]+', 'mes' => '[0-9]+')
	);
	Router::connect(
	        '/noticias/:ano/:mes/:slug', array('controller' => 'noticias', 'action' => 'view'), array('ano' => '[0-9]+', 'mes' => '[0-9]+', 'slug')
	);
	Router::connect(
	        '/noticias/:slug', array('controller' => 'noticias', 'action' => 'view'), array('slug')
	);

	Router::connect("/secretaria/:slug", array('controller' => 'orgaos', 'action' => 'view'), array('pass' => array('slug')));
	Router::connect("/secretaria/:slug/:action/*", array('controller' => 'orgaos', 'action' => 'view'), array('pass' => array('slug','action')));
	
	Router::connect("/coordenadoria/:slug", array('controller' => 'coordenadorias', 'action' => 'view'), array('pass' => array('slug')));
	Router::connect("/setor/:secretaria/:slug", array('controller' => 'coordenadorias', 'action' => 'view'), array('pass' => array('secretaria', 'slug')));

	Router::connect("/paginas/:slug", array('controller' => 'paginas', 'action' => 'view'), array('pass' => array('slug')));
	Router::connect("/concursos/:slug", array('controller' => 'concursos', 'action' => 'view'), array('pass' => array('slug')));

	Router::connect('/desenhourbano', array('controller' => 'pages', 'action' => 'desenhourbano'));
	Router::connect('/nossahistoria', array('controller' => 'pages', 'action' => 'nossahistoria'));
	
	Router::redirect('/areasderisco', array('controller' => 'paginas', 'action' => 'obras-relacao-das-areas-de-risco-ambiental-no-municipio-de-vila-velha'));
	Router::redirect('/pesquisaprecomercado', array('controller' => 'paginas', 'action' => 'servicos-urbanos-pesquisa-de-preco-de-mercado'));
	Router::redirect('/listadeitensreciclaveis', 'http://www.vilavelha.es.gov.br/midia/paginas/reciclaveis_para portal.jpg');

	Router::connect('/admin', array('controller' => 'pages', 'action' => 'home', 'admin' => true));

	Router::parseExtensions('pdf');
/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
