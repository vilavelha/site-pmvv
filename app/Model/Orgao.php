<?php

App::uses('AppModel', 'Model');

/**
 * Orgao Model
 *
 * @property Orgaos $Orgaos
 * @property Tipo $Tipo
 * @property Licitaco $Licitaco
 * @property Pagina $Pagina
 * @property Noticia $Noticia
 */
class Orgao extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
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
        'endereco' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        //		'mapa' => array(
        //			'notBlank' => array(
        //				'rule' => array('notBlank'),
        //				//'message' => 'Your custom message here',
        //				//'allowEmpty' => false,
        //				//'required' => false,
        //				//'last' => false, // Stop validation after this rule
        //				//'on' => 'create', // Limit validation to 'create' or 'update' operations
        //			),
        //		),
        'nome_responsavel' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'cargo_responsavel' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'email_responsavel' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'telefone_responsavel' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'descricao' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'slug' => array(
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

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Orgaos' => array(
            'className' => 'Orgaos',
            'foreignKey' => 'orgaos_id',
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
        'Coordenadoria' => array(
            'className' => 'Coordenadoria',
            'foreignKey' => 'orgao_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Cargo' => array(
            'className' => 'Cargo',
            'foreignKey' => 'orgao_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Servico' => array(
            'className' => 'Servico',
            'foreignKey' => 'orgao_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Pagina' => array(
            'className' => 'Pagina',
            'foreignKey' => 'orgao_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Licitacao' => array(
            'className' => 'Licitacao',
            'foreignKey' => 'orgao_id',
            'conditions' => array('Licitacao.deletado' => false),
            'fields' => '',
            'order' => 'Licitacao.id DESC'
        ),
        'Destaque' => array(
            'className' => 'Destaque',
            'foreignKey' => 'orgao_id',
            'conditions' => '',
            'fields' => '',
            'order' => 'Destaque.id DESC'
        )
    );
//	public $hasMany = array(
//		'Licitaco' => array(
//			'className' => 'Licitaco',
//			'foreignKey' => 'orgao_id',
//			'dependent' => false,
//			'conditions' => '',
//			'fields' => '',
//			'order' => '',
//			'limit' => '',
//			'offset' => '',
//			'exclusive' => '',
//			'finderQuery' => '',
//			'counterQuery' => ''
//		),
//		'Pagina' => array(
//			'className' => 'Pagina',
//			'foreignKey' => 'orgao_id',
//			'dependent' => false,
//			'conditions' => '',
//			'fields' => '',
//			'order' => '',
//			'limit' => '',
//			'offset' => '',
//			'exclusive' => '',
//			'finderQuery' => '',
//			'counterQuery' => ''
//		)
//	);

    /**
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array(
        'Noticia' => array(
            'className' => 'Noticia',
            'joinTable' => 'noticias_orgaos',
            'foreignKey' => 'orgao_id',
            'associationForeignKey' => 'noticia_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
            'deleteQuery' => '',
            'insertQuery' => ''
        )
    );

}
