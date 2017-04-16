<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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


/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class ShipmentsController extends AppController {

public $components = array('RequestHandler');

    public function index() {
    	$this->autoRender = false;
        //El role del usuario logueado
        $role = $this->Auth->user('role_id');
        //Verificamos si el usuario es administrador o comercio
        if ($role == Role::ADMINISTRADOR) {
            $shipments = $this->Shipment->find('all');
        }else{
            //Obtenemos el id del usuario logueado
            echo $role;
            $auth = $this->Auth->user('id');
            $shipments = $this->Shipment->find('all',
                array('conditions'=>array('Shipment.user_id'=>$auth))/*, 
                'fields' => array('User.name','User.last_name')*/
                );
        }
        return json_encode($shipments);

    }    

    public function view($id) {
        $this->autoRender = false;
        $shipment = $this->Shipment->findById($id);
        return json_encode($shipment);
    }

    public function add() {
        $this->Shipment->create();
        if ($this->Shipment->save($this->request->data)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

    public function edit($id) {
        $this->Shipment->id = $id;
        if ($this->Shipment->save($this->request->data)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

    public function delete($id) {
        if ($this->Shipment->delete($id)) {
            $message = 'Deleted';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

    public function consultarTarifa(){
       // $this->autoRender=false;
         $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
}

