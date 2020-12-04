<?php
/**
 * This file is loaded automatically by the app/webroot/index.php file after core.php
 *
 * This file should load/create any application wide configuration settings, such as
 * Caching, Logging, loading additional configuration files.
 *
 * You should also use this file to include any files that provide global functions/constants
 * that your application uses.
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
 * @since         CakePHP(tm) v 0.10.8.2117
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

// Setup a 'default' cache configuration for use in the application.
Cache::config('default', array('engine' => 'File'));

/**
 * The settings below can be used to set additional paths to models, views and controllers.
 *
 * App::build(array(
 *     'Model'                     => array('/path/to/models/', '/next/path/to/models/'),
 *     'Model/Behavior'            => array('/path/to/behaviors/', '/next/path/to/behaviors/'),
 *     'Model/Datasource'          => array('/path/to/datasources/', '/next/path/to/datasources/'),
 *     'Model/Datasource/Database' => array('/path/to/databases/', '/next/path/to/database/'),
 *     'Model/Datasource/Session'  => array('/path/to/sessions/', '/next/path/to/sessions/'),
 *     'Controller'                => array('/path/to/controllers/', '/next/path/to/controllers/'),
 *     'Controller/Component'      => array('/path/to/components/', '/next/path/to/components/'),
 *     'Controller/Component/Auth' => array('/path/to/auths/', '/next/path/to/auths/'),
 *     'Controller/Component/Acl'  => array('/path/to/acls/', '/next/path/to/acls/'),
 *     'View'                      => array('/path/to/views/', '/next/path/to/views/'),
 *     'View/Helper'               => array('/path/to/helpers/', '/next/path/to/helpers/'),
 *     'Console'                   => array('/path/to/consoles/', '/next/path/to/consoles/'),
 *     'Console/Command'           => array('/path/to/commands/', '/next/path/to/commands/'),
 *     'Console/Command/Task'      => array('/path/to/tasks/', '/next/path/to/tasks/'),
 *     'Lib'                       => array('/path/to/libs/', '/next/path/to/libs/'),
 *     'Locale'                    => array('/path/to/locales/', '/next/path/to/locales/'),
 *     'Vendor'                    => array('/path/to/vendors/', '/next/path/to/vendors/'),
 *     'Plugin'                    => array('/path/to/plugins/', '/next/path/to/plugins/'),
 * ));
 */

/**
 * Custom Inflector rules can be set to correctly pluralize or singularize table, model, controller names or whatever other
 * string is passed to the inflection functions
 *
 * Inflector::rules('singular', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 * Inflector::rules('plural', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 */

/**
 * Plugins need to be loaded manually, you can either load them one by one or all of them in a single call
 * Uncomment one of the lines below, as you need. Make sure you read the documentation on CakePlugin to use more
 * advanced ways of loading plugins
 *
 * CakePlugin::loadAll(); // Loads all plugins at once
 * CakePlugin::load('DebugKit'); // Loads a single plugin named DebugKit
 */

/**
 * To prefer app translation over plugin translation, you can set
 *
 * Configure::write('I18n.preferApp', true);
 */

/**
 * You can attach event listeners to the request lifecycle as Dispatcher Filter. By default CakePHP bundles two filters:
 *
 * - AssetDispatcher filter will serve your asset files (css, images, js, etc) from your themes and plugins
 * - CacheDispatcher filter will read the Cache.check configure variable and try to serve cached content generated from controllers
 *
 * Feel free to remove or add filters as you see fit for your application. A few examples:
 *
 * Configure::write('Dispatcher.filters', array(
 *		'MyCacheFilter', //  will use MyCacheFilter class from the Routing/Filter package in your app.
 *		'MyCacheFilter' => array('prefix' => 'my_cache_'), //  will use MyCacheFilter class from the Routing/Filter package in your app with settings array.
 *		'MyPlugin.MyFilter', // will use MyFilter class from the Routing/Filter package in MyPlugin plugin.
 *		array('callable' => $aFunction, 'on' => 'before', 'priority' => 9), // A valid PHP callback type to be called on beforeDispatch
 *		array('callable' => $anotherMethod, 'on' => 'after'), // A valid PHP callback type to be called on afterDispatch
 *
 * ));
 */
Configure::write('Dispatcher.filters', array(
	'AssetDispatcher',
	'CacheDispatcher'
));

/**
 * Configures default file logging options
 */
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
	'engine' => 'File',
	'types' => array('notice', 'info', 'debug'),
	'file' => 'debug',
));
CakeLog::config('error', array(
	'engine' => 'File',
	'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
	'file' => 'error',
));

Inflector::rules('singular', array(
    'uninflected' => array('licitacoes'),
    'irregular' => array('licitacoes' => 'licitacao')
));

Inflector::rules('plural', array('irregular' => array('licitacao' => 'licitacoes')));

define('MIDIA_PLUGIN_PATH', APP . DS . 'Plugin' . DS . 'Midias' . DS);
CakePlugin::load('Midias', array('bootstrap' => true));

CakePlugin::load('Acl', array('bootstrap' => true));
CakePlugin::load('AclExtras');
CakePlugin::load('Tags');
CakePlugin::load('AuditLog');
Configure::write('Config.language', 'pt_br');

CakePlugin::load('Busca');
$modelos = array(
    'Noticia' => array('campo' => 'titulo', 'mostrarLink' => true),
    'Servicos' => array('campo' => 'nome', 'mostrarLink' => true),
    'Pagina' => array('campo' => 'nome', 'mostrarLink' => true)
);

Inflector::rules('singular', array(
    'uninflected' => array('licitacoes'),
    'irregular' => array('licitacoes' => 'licitacao')
));

Inflector::rules('plural', array('irregular' => array('licitacao' => 'licitacoes')));

Configure::write('Busca.modelos', $modelos);

App::uses('AclRouter', 'Acl.Lib');

/* -------------------------------------------------------------------
 * The settings below have to be loaded to make the acl plugin work.
 * -------------------------------------------------------------------
 *
 * See how to include these settings in the README file
 */

/*
 * The model name used for the user role (typically 'Role' or 'Group')
 */
Configure :: write('acl.aro.role.model', 'Group');

/*
 * The primary key of the role model
 *
 * (can be left empty if your primary key's name follows CakePHP conventions)('id')
 */
Configure :: write('acl.aro.role.primary_key', '');

/*
 * The foreign key's name for the roles
 *
 * (can be left empty if your foreign key's name follows CakePHP conventions)(e.g. 'role_id')
 */
Configure :: write('acl.aro.role.foreign_key', 'grupo_id');

/*
 * The model name used for the user (typically 'User')
 */
Configure :: write('acl.aro.user.model', 'User');

/*
 * The primary key of the user model
 *
 * (can be left empty if your primary key's name follows CakePHP conventions)('id')
 */
Configure :: write('acl.aro.user.primary_key', '');

/*
 * The name of the database field that can be used to display the role name
 */
Configure :: write('acl.aro.role.display_field', 'name');

/*
 * You can add here role id(s) that are always allowed to access the ACL plugin (by bypassing the ACL check)
 * (This may prevent a user from being rejected from the ACL plugin after a ACL permission update)
 */
Configure :: write('acl.role.access_plugin_role_ids', array());

/*
 * You can add here users id(s) that are always allowed to access the ACL plugin (by bypassing the ACL check)
 * (This may prevent a user from being rejected from the ACL plugin after a ACL permission update)
 */
Configure :: write('acl.role.access_plugin_user_ids', array(1));

/*
 * The users table field used as username in the views
 * It may be a table field or a SQL expression such as "CONCAT(User.lastname, ' ', User.firstname)" for MySQL or "User.lastname||' '||User.firstname" for PostgreSQL
 */
Configure :: write('acl.user.display_name', "User.username");

/*
 * Indicates whether the presence of the Acl behavior in the user and role models must be verified when the ACL plugin is accessed
 */
Configure :: write('acl.check_act_as_requester', true);

/*
 * Add the ACL plugin 'locale' folder to your application locales' folders
 */
App :: build(array('locales' => App :: pluginPath('Acl') . DS . 'locale'));

/*
 * Indicates whether the roles permissions page must load through Ajax
 */
Configure :: write('acl.gui.roles_permissions.ajax', true);

/*
 * Indicates whether the users permissions page must load through Ajax
 */
Configure :: write('acl.gui.users_permissions.ajax', true);