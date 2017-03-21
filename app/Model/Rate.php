<?php
App::uses('AppModel', 'Model');
/**
 * Rate Model
 *
 * @property Zone $Zone
 */
class Rate extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'description';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Zone' => array(
			'className' => 'Zone',
			'foreignKey' => 'rate_id',
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
