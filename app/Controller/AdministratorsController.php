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

App::uses('AppController', 'Controller');
App::uses('Role','Model');
App::uses('Shipment','Model');
App::uses('ShipmentState','Model');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AdministratorsController extends AppController {

	public $components = array('RequestHandler');
	public $uses=array('User','Shipment');
	public function beforeFilter() {
	 	parent::beforeFilter();
	 	$this->layout="admin";
	 	$user=$this->User->find('first',array(
			'conditions' => array(
					'User.id' => $this->Auth->user('id')
			),
			'recursive' => -1,
			'fields' => array('User.name','User.last_name','User.token')
			));

		$this->set(compact('user'));
    }	


	public function index(){
		$this->set('title_for_layout', 'OMA Envios | Administrador');

		
	}

	public function listShipments(){
		$this->set('title_for_layout', 'OMA Envios | Envíos');

	}
	
	public function facturas(){
		$this->set('title_for_layout', 'OMA Envíos | Facturas');
		$role = $this->Auth->user('role_id');
		if ($role == Role::ADMINISTRADOR) {
          
        }else{
        	$this->Flash->danger('No tiene permisos para ver facturas', array(
			    'key' => 'positive'));
			$this->redirect(array('action' => 'index'));
        }
	}

	public function listar_facturas(){
		//http://localhost:8080/admin/listBills/2017-05-23/2017-05-23
		$this->set('title_for_layout', 'OMA Envíos | Facturas');
		$this->loadModel('Shipment');
		$this->loadModel('Company');
		$firstDate = $this->request->data['firstDate'];
		$secondDate = $this->request->data['secondDate'];

		$companies = $this->Shipment->find('all', array(
                    'conditions' => array(
		                    'Shipment.created >=' => $firstDate,
		                    'Shipment.created <=' => $secondDate
		            ),
		            'joins' => array(array(
                        	'table' => 'companies',
                        	'conditions' => array('Shipment.user_id = companies.user_id' ))),
                    'fields' =>  array('companies.company_name',
                    				   'SUM(Shipment.shipping_cost) as cost_sum'),
                    'group' =>  array('companies.company_name')           
                ));

		//echo json_encode($companies);

		$this->printWithFormat($companies);

		$this->set(compact('companies'));
		$this->set(compact('firstDate'));
		$this->set(compact('secondDate'));          
	}

	public function reportes(){
		$this->set('title_for_layout', 'OMA Envíos | Reportes');
		$role = $this->Auth->user('role_id');
		if ($role == Role::ADMINISTRADOR) {
          
        }else{
        	$this->Flash->danger('No tiene permisos para ver reportes', array(
			    'key' => 'positive'));
			$this->redirect(array('action' => 'index'));
        }
	}

	public function listar_reportes(){
		$this->set('title_for_layout', 'OMA Envíos | Reportes');
		$firstDate = $this->request->data['firstDate'];
		$secondDate = $this->request->data['secondDate'];
		$this->loadModel('Shipment');
		$envios_solicitados = sizeof($this->Shipment->find('all', array(
            'conditions' => array(
                    'shipment_state_id' => ShipmentState::SOLICITADO,
                    'created >=' => $firstDate,
                    'created <=' => $secondDate
            ),
            'recursive' => -1
            )));	

		$envios_enproceso = sizeof($this->Shipment->find('all', array(
            'conditions' => array(
                    'shipment_state_id' => ShipmentState::EN_PROCESO,
                    'created >=' => $firstDate,
                    'created <=' => $secondDate
            ),
            'recursive' => -1
            )));	

		$envios_enviados = sizeof($this->Shipment->find('all', array(
            'conditions' => array(
                    'shipment_state_id' => ShipmentState::ENVIADO,
                    'created >=' => $firstDate,
                    'created <=' => $secondDate
            ),
            'recursive' => -1
            )));

		$this->loadModel('User');
		$clientes = $this->Shipment->find('all', array(
            'conditions' => array(
                    'Shipment.created >=' => $firstDate,
                    'Shipment.created <=' => $secondDate
            ),
            'joins' => array(array(
                        	'table' => 'companies',
                        	'conditions' => array('Shipment.user_id = companies.user_id' ))),
            'recursive' => -1,
            'fields' => array(
 				'companies.company_name',
 				'companies.rif',
            	'COUNT(Shipment.id) as CantEnvios'),
            'group' =>  array('Shipment.user_id'),
            'order' => array('CantEnvios DESC')
            ));

		$this->set(compact('clientes'));
		$this->set(compact('envios_enviados'));
		$this->set(compact('envios_enproceso'));
		$this->set(compact('envios_solicitados'));
		$this->set(compact('firstDate'));
		$this->set(compact('secondDate'));
		//TODO: Falta facturas

	}
}