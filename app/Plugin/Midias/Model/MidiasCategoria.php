<?php

class MidiasCategoria extends MidiasAppModel {

    public $name = 'MidiasCategoria';
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

    public $hasMany = array(
        'Midia' => array(
            'className' => 'Midia',
            'foreignKey' => 'midias_categoria_id',
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

?>