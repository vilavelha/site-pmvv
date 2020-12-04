<?php

class MidiasTamanho extends MidiasAppModel {

    public $name = 'MidiasTamanho';
    public $validate = array(
        'modulo' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Sua mensagem de validação aqui',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Para a validação após esta regra
            //'on' => 'create', // Limitar a validação para as operações 'create' ou 'update'
            ),
        ),
        'largura' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Sua mensagem de validação aqui',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Para a validação após esta regra
            //'on' => 'create', // Limitar a validação para as operações 'create' ou 'update'
            ),
        ),
        'altura' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Sua mensagem de validação aqui',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Para a validação após esta regra
            //'on' => 'create', // Limitar a validação para as operações 'create' ou 'update'
            ),
        ),
    );

}

?>