<?php
App::uses('AppModel', 'Model');
/**
 * Shipment Model
 *
 * @property ShipmentState $ShipmentState
 * @property User $User
 * @property Zone $Zone
 */
class Shipment extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ShipmentState' => array(
			'className' => 'ShipmentState',
			'foreignKey' => 'shipment_state_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Zone' => array(
			'className' => 'Zone',
			'foreignKey' => 'zone_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
