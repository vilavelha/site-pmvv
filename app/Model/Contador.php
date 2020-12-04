<?php

App::uses('AppModel', 'Model');

/**
 * Contadore Model
 *
 * @property Licitacao $Licitacao
 */
class Contador extends AppModel {

    public $name = 'Contador';
    public $useTable = 'contadores';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'interessado' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'telefone' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'email' => array(
            'email' => array(
                'rule' => array('email'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        )
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Licitacao' => array(
            'className' => 'Licitacao',
            'foreignKey' => 'licitacao_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
