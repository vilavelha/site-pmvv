<?php

App::uses('AppModel', 'Model');

/**
 * Pagina Model
 *
 * @property Orgao $Orgao
 */
class Pagina extends AppModel {

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
        'tipo' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Escolha um tipo.',
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
        'conteudo' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Campo requerido.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'publicar' => array(
            'boolean' => array(
                'rule' => array('boolean'),
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
        'Orgao' => array(
            'className' => 'Orgao',
            'foreignKey' => 'orgao_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Coordenadoria' => array(
            'className' => 'Coordenadoria',
            'foreignKey' => 'coordenadoria_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
