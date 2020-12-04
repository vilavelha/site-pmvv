<?php

class MidiasGaleria extends MidiasAppModel {

    public $name = 'MidiasGaleria';
    public $validate = array(
        'nome' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Sua mensagem de validação aqui',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Para a validação após esta regra
            //'on' => 'create', // Limitar a validação para as operações 'create' ou 'update'
            ),
        ),
        'descricao' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Sua mensagem de validação aqui',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Para a validação após esta regra
            //'on' => 'create', // Limitar a validação para as operações 'create' ou 'update'
            ),
        ),
        'publicar' => array(
            'boolean' => array(
                'rule' => array('boolean'),
            //'message' => 'Sua mensagem de validação aqui',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Para a validação após esta regra
            //'on' => 'create', // Limitar a validação para as operações 'create' ou 'update'
            ),
        ),
    );
    // As associações abaixo foram criadas com todas as chaves possíveis, então é possível remover as que não são necessárias

    public $hasAndBelongsToMany = array(
        'Midia' => array(
            'className' => 'Midia',
            'joinTable' => 'midias_midias_galerias',
            'foreignKey' => 'midias_galeria_id',
            'associationForeignKey' => 'midia_id',
            'unique' => true,
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

?>