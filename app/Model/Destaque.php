<?php
App::uses('AppModel', 'Model');
/**
 * Destaque Model
 *
 */
class Destaque extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'publicar' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

    public $belongsTo = array(
        'Orgao' => array(
            'className' => 'Orgao',
            'foreignKey' => 'orgao_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}
