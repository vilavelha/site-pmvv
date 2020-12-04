<?php

class Midia extends MidiasAppModel {

    public $name = 'Midia';
    public $displayField = 'caminho';
    public $virtualFields = array('caminho' => "CONCAT(Midia.pasta, '/', Midia.arquivo)");
    public $validate = array(
        'pasta' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Sua mensagem de validação aqui',
//'allowEmpty' => false,
//'required' => false,
//'last' => false, // Para a validação após esta regra
//'on' => 'create', // Limitar a validação para as operações 'create' ou 'update'
            ),
        ),
        'arquivo' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                //'message' => 'Sua mensagem de validação aqui',
//'allowEmpty' => false,
//'required' => false,
//'last' => false, // Para a validação após esta regra
                'on' => 'create', // Limitar a validação para as operações 'create' ou 'update'
            ),
            'file' => array(
                'rule' => array('extension', array(
                        'pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pps', 'ppsx', 'txt',
                        'mov', 'mpg', 'avi', 'mp4', 'wmv',
                        'jpeg', 'jpg', 'png', 'gif',
                        'zip', 'rar', 'gzip',
                        'mp3', 'wma',
                        'swf'
                    )
                ),
                'message' => 'Tipo de arquivo inválido',
                'required' => false,
                'allowEmpty' => true
            )
        )
    );
// As associações abaixo foram criadas com todas as chaves possíveis, então é possível remover as que não são necessárias
    public $belongsTo = array(
        'MidiasCategoria' => array(
            'className' => 'MidiasCategoria',
            'foreignKey' => 'midias_categoria_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    public $hasAndBelongsToMany = array(
        'MidiasGaleria' => array(
            'className' => 'MidiasGaleria',
            'joinTable' => 'midias_midias_galerias',
            'foreignKey' => 'midia_id',
            'associationForeignKey' => 'midias_galeria_id',
            'unique' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
            'deleteQuery' => '',
            'insertQuery' => ''
        ),
        'MidiasTag' => array(
            'className' => 'MidiasTag',
            'joinTable' => 'midias_midias_tags',
            'foreignKey' => 'midia_id',
            'associationForeignKey' => 'midias_tag_id',
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