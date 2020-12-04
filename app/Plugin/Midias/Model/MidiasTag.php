<?php

class MidiasTag extends MidiasAppModel {

    public $name = 'MidiasTag';
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
    );
    // As associações abaixo foram criadas com todas as chaves possíveis, então é possível remover as que não são necessárias

    public $hasAndBelongsToMany = array(
        'Midia' => array(
            'className' => 'Midia',
            'joinTable' => 'midias_midias_tags',
            'foreignKey' => 'midias_tag_id',
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