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
	Router::connect('/', array('controller' => 'home', 'action' => 'index'));

	Router::connect('/admin', array('controller' => 'administrators', 'action' => 'index'));
	Router::connect('/admin/logs', array('controller' => 'administrators', 'action' => 'logs'));
	Router::connect('/admin/facturas', array('controller' => 'administrators', 'action' => 'facturas'));
	Router::connect('/admin/lista-facturas', array('controller' => 'administrators', 'action' => 'listar_facturas'));
	Router::connect('/admin/reportes', array('controller' => 'administrators', 'action' => 'reportes'));
	Router::connect('/admin/lista-reportes', array('controller' => 'administrators', 'action' => 'listar_reportes'));
	Router::connect('/admin/shipments', array('controller' => 'administrators', 'action' => 'listShipments'));
	Router::connect('/calculate-rate', array('controller' => 'shipments', 'action' => 'calculateRate'));
	Router::connect('/calcular-tarifa/:origin/:destiny/:weight', array('controller' => 'shipments', 'action' => 'returnRate'));
	Router::connect('/new-distribution', array('controller' => 'shipments', 'action' => 'newDistribution'));
	Router::connect('/solicitar-distribucion/:token/:name/:phone/:quantity/:weight/:origin/:destiny/:address', array('controller' => 'shipments', 'action' => 'requestDistribution'));

/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/*
	Ruta para controller del modelo Shipment
	By: Alvin Velazquez
	22/03/17 
*/
	Router::mapResources('shipments');
	Router::parseExtensions();
	Router::setExtensions(array('json', 'xml', 'rss', 'pdf'));

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
