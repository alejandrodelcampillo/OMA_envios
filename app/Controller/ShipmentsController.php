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
App::uses('User','Model');
App::uses('ShipmentState','Model');


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

public $uses= array('Zone','Company','Shipment');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('calculateRate','returnRate');
        if ($this->Auth->user('id')){
            $this->loadModel('User');
            $user=$this->User->find('first',array(
            'conditions' => array(
                    'User.id' => $this->Auth->user('id')
            ),
            'recursive' => -1,
            'fields' => array('User.name','User.last_name', 'User.role_id')
            ));
            $this->set(compact('user'));
            $this->layout='admin';
        }
    }   

    public function index() {
    	$this->autoRender = false;
        //El role del usuario logueado
          $this->loadModel('Shipment');
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
        $this->loadModel('Shipment');
        $shipment = $this->Shipment->findById($id);
        return json_encode($shipment);
    }

    public function add() {
        $this->loadModel('Shipment');
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
        $this->loadModel('Shipment');
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
        $this->loadModel('Shipment');
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

    public function calculateRate(){
        $this->set('title_for_layout', 'OMA Envios | Calcular tarifa');
        if ($this->Auth->user('id')){
        $this->loadModel('Companie');
        $zip_code=$this->Companie->find('first',array(
            'conditions' => array(
                    'Companie.user_id' => $this->Auth->user('id')
            ),
            'recursive' => -1,
            'fields' => array('Companie.zip_code')
            ));
        $this->set(compact('zip_code'));
        }
    }


    public function returnRate(){
       // $this->printWithFormat($this->request->data);
        if ($this->request->is('post')){

            $origin=$this->request->data['origin'];
            $destiny=$this->request->data['destiny'];
            $weight=$this->request->data['weight'];
             $finalPrice = $this->calcTarif($origin, $destiny, $weight);
            if ($finalPrice > 0){
                 $this->set(compact('finalPrice'));
            }elseif ($finalPrice == -1){
                $this->Flash->danger('El peso menor de envío es de 100 gramos', array(
                'key' => 'positive'));
                $this->redirect(array('action' => 'calculateRate'));
            }elseif ($finalPrice == -2) {
               $this->Flash->danger('Uno de los códigos postales es muy corto o muy largo, verifique sus datos', array(
                    'key' => 'positive'));
                $this->redirect(array('action' => 'calculateRate'));
            }
        }elseif($this->request->is('get')){
            $this->autoRender=false;
            $origin= $this->request->params['origin'];
            $destiny=$this->request->params['destiny'];
            $weight=$this->request->params['weight'];
            
            $finalPrice = $this->calcTarif($origin, $destiny, $weight);
            if ($finalPrice > 0){
                return json_encode("{'monto_tarifa':'".$finalPrice."'}");
            }elseif ($finalPrice == -1){
                    return json_encode("{'msg':'El peso minimo para el paquete es de 100 gramos'}");                 
            }else
                return json_encode("{'msg':'Al menos uno de los codigos postales es muy corto o muy largo, verifique sus datos'}");
        }        
    }

    public function newDistribution(){

        $zip_code=$this->Company->find('first',array(
            'conditions' => array(
                    'Company.user_id' => $this->Auth->user('id')
            ),
            'recursive' => -1,
            'fields' => array('Company.zip_code')
            ));
        $this->set(compact('zip_code'));
        
    }

    public function requestDistribution(){
        $success=0;
        $this->autoRender=false;

        if ($this->request->is('post')){

            $name=$this->request->data['name'];
            $phone=$this->request->data['phone'];
            $quantity=$this->request->data['quantity'];
            $weight=$this->request->data['weight'];
            $origin=$this->request->data['origin'];
            $destiny=$this->request->data['destiny'];
            $address=$this->request->data['address'];
            $id=$this->Auth->user('id');
            
            $finalPrice = $this->calcTarif($origin, $destiny, $weight);

            if ($finalPrice > 0){
                

                $success=$this->createShipment($id,$name,$phone,$address,$quantity,$weight,$finalPrice);

                if ($success) {
                    $this->Flash->success('Su solicitud ha sido recibida. Le informaremos cuando sea procesada', array('key' => 'positive'));
                    $this->redirect(array('controller'=> 'administrators','action' => 'index'));
                }else{
                    $this->Flash->danger('Ha ocurrido un error, vuelva a intentarlo', array(
                    'key' => 'positive'));
                    $this->redirect(array('action' => 'newDistribution'));                    
                }

            }elseif ($finalPrice == -1){
                $this->Flash->danger('El peso menor de envío es de 100 gramos', array(
                'key' => 'positive'));
                $this->redirect(array('action' => 'newDistribution'));
            }elseif ($finalPrice == -2) {
               $this->Flash->danger('Uno de los códigos postales es muy corto o muy largo, verifique sus datos', array(
                    'key' => 'positive'));
                $this->redirect(array('action' => 'newDistribution'));
            }
        }elseif($this->request->is('get')){ 

            $token=$this->request->params['token'];
            $name=$this->request->params['name'];
            $phone=$this->request->params['phone'];
            $quantity=$this->request->params['quantity'];
            $weight=$this->request->params['weight'];
            $origin=$this->request->params['origin'];
            $destiny=$this->request->params['destiny'];
            $address=$this->request->params['address'];

            $user=array();
            $user=$this->User->find('first',array(
                'conditions' => array(
                    'User.token' =>$token
            ),
                'recursive' => -1,
                'fields' => array('User.id')
            ));

            if(!empty($user)){
            
            $finalPrice = $this->calcTarif($origin, $destiny, $weight);

            if ($finalPrice > 0){


                $success=$this->createShipment($user['User']['id'],$name,$phone,$address,$quantity,$weight,$finalPrice);

                $id=$this->Shipment->getLastInsertID();

                if ($success) {
                   return json_encode("{'id_envio:'".$id.",'monto_tarifa':'".$finalPrice."'}");
                }else{
                    return json_encode("{'msg':'Los parametros de entrada no estan completos'}");  
                }

                
            }elseif ($finalPrice == -1){
                    return json_encode("{'msg':'El peso minimo para el paquete es de 100 gramos'}");                 
            }else{
                return json_encode("{'msg':'Al menos uno de los codigos postales es muy corto o muy largo, verifique sus datos'}");
            }
        }else{
            return json_encode("{'msg':'Token invalido'}");
        }               
      }
    }
    
    
}

