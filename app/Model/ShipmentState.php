<?php
App::uses('AppModel', 'Model');
/**
 * ShipmentState Model
 *
 * @property Shipment $Shipment
 */
class ShipmentState extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	const SOLICITADO=1;
	const EN_PROCESO=2;
	const ENVIADO=3;

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Shipment' => array(
			'className' => 'Shipment',
			'foreignKey' => 'shipment_state_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
