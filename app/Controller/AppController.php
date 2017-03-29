<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array(
        'Session',
        'Flash',
        'Paginator',
        'Cookie',
        'Auth' => array(
  			'loginRedirect' => '/',
			'logoutRedirect' => '/',
			'authorize' => 'Controller'
        )
    );

    public function beforeFilter() {
        // $this->printWithFormat("beforeFilter", true);
        date_default_timezone_set('America/Caracas');

        $controllerName = $this->request->params["controller"];
        $actionName = $this->request->params["action"];

        $prefixOfDefaultMenu = '/';
        if($controllerName == 'home' && $actionName == 'index')
            $prefixOfDefaultMenu = '';

        $this->set(compact('prefixOfDefaultMenu'));

        $this->Auth->loginAction = array('controller'=>'home', 'action'=>'login', 'admin' => false);
        $this->Auth->logoutAction = array('controller'=>'home', 'action'=>'index', 'admin' => false);
        $this->Auth->authError = 'Usted no tiene permisos para acceder al sistema.';

        $user = $this->Auth->user();
        $isLogin = false;
        $isAdmin = false;
        $userLogin = array();
        if($user != NULL && is_array($user) && count($user) > 0) {
            $isLogin = true;
            $userLogin = $user;

            // $this->printWithFormat($userLogin,true);

            if(array_key_exists("role_id", $userLogin) && isset($userLogin["role_id"]) && (intval($userLogin["role_id"]) == 1)) {
                $isAdmin = true;
            }
        }

        $this->set(compact('isLogin', 'isAdmin', 'userLogin'));

        if(isset($this->params['prefix']) && ($this->params['prefix'] == 'admin')) {
            $this->layout = 'admin';

            $this->Auth->loginAction = array('controller'=>'administrator', 'action'=>'index', 'admin' => false);
            $this->Auth->logoutAction = array('controller'=>'home', 'action'=>'index', 'admin' => false);
        }        

    }

    public function isAuthorized($userLogin) {
        $isAuthorized = false;
        // $this->printWithFormat("isAuthorized");
        if($userLogin != NULL && is_array($userLogin) && count($userLogin) > 0) {
            if(isset($this->params['prefix']) && ($this->params['prefix'] == 'admin')) {
                if(array_key_exists("role_id", $userLogin) && isset($userLogin["role_id"]) && ($userLogin["role_id"] == 1)) {
                    $isAuthorized = true;
                }
            } else {
                $isAuthorized = true;
            }
        }
        // $this->printWithFormat($isAuthorized, true);

        return $isAuthorized;
    }    	

	public function printWithFormat($prin,$va=false) {
        echo '<pre>';
        var_dump($prin);
        echo '</pre>';
        
        if($va) {
            die();
        }
    }
}
