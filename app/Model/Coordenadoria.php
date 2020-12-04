<?php
App::uses('AppModel', 'Model');
/**
 * Coordenadoria Model
 *
 * @property Orgao $Orgao
 * @property Tipo $Tipo
 * @property Pagina $Pagina
 * @property Servico $Servico
 */
class Coordenadoria extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'orgao_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tipo_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nome' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Orgao' => array(
			'className' => 'Orgao',
			'foreignKey' => 'orgao_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tipo' => array(
			'className' => 'Tipo',
			'foreignKey' => 'tipo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Pagina' => array(
			'className' => 'Pagina',
			'foreignKey' => 'coordenadoria_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'Pagina.nome ASC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Servico' => array(
			'className' => 'Servico',
			'foreignKey' => 'coordenadoria_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'Servico.nome ASC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
