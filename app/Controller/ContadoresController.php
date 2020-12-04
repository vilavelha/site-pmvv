<?php

App::uses('AppController', 'Controller');

/**
 * Contadores Controller
 *
 * @property Contadore $Contadore
 */
class ContadoresController extends AppController {

    public $name = 'Contadores';
    public $uses = 'Contador';
    public $helpers = array('Js');

    public $components = array('Midias.Upload','Session');


    public function baixar() {
        $this->set('idDo', $this->params['named']['id']);
        $this->layout = "ajax";
    }

    public function download($id=null) {
        $this->layout = "ajax";
        if($this->Session->read("ContadorBaixarLicitacao.{$id}.ativo")){
            $this->loadModel('Licitacao');
            $this->Licitacao->recursive = -1;
            $licitacao = $this->Licitacao->read(null, $this->Session->read("ContadorBaixarLicitacao.{$id}.licitacao_id"));
            $link = 'https://' . $_SERVER['HTTP_HOST'] . $this->webroot . 'files' . DS . 'licitacoes' . DS . $licitacao['Licitacao']['edital'];
            $erro = false;
            $this->set(compact('licitacao', 'erro'));
            echo '<a href="' . $link . '" target="_blank" class="btn btn-danger col-md-12">Clique aqui para fazer o download do Edital</a>';
        }else{
            if(!empty($this->request->data)) {
                $this->Contador->create();
                if ($this->Contador->save($this->request->data)) {
                    $this->loadModel('Licitacao');
                    $this->Licitacao->recursive = -1;
                    $licitacao = $this->Licitacao->read(null, $this->request->data['Contador']['licitacao_id']);
                    $link = 'https://' . $_SERVER['HTTP_HOST'] . $this->webroot . 'files' . DS . 'licitacoes' . DS . $licitacao['Licitacao']['edital'];
                    $erro = false;
                    $this->set(compact('licitacao', 'erro'));
                    $this->Session->write("ContadorBaixarLicitacao.{$licitacao['Licitacao']['id']}.ativo",true);
                    $this->Session->write("ContadorBaixarLicitacao.{$licitacao['Licitacao']['id']}.licitacao_id", $licitacao['Licitacao']['id']);
                    echo '<a href="' . $link . '" target="_blank" class="btn btn-danger col-md-12">Clique aqui para fazer o download do Edital</a>';
                } else {
                    $this->loadModel('Licitacao');
                    $this->Licitacao->recursive = -1;
                    $licitacao = $this->Licitacao->read(null, $this->request->data['Contador']['licitacao_id']);
                    $erro = true;
                    $this->set(compact('licitacao', 'erro'));
                }
            }
        }
    }

    public function admin_index($id) {
        $this->Contador->recursive = 0;
        $this->paginate = array(
            'Contador' => array(
                'conditions' => array('Contador.licitacao_id' => $id),
                'order' => array('Contador.interessado' => 'ASC'),
                'fields' => array('DISTINCT Contador.email', 'count(*) as contagem', 'Contador.interessado', 'Contador.telefone'),
                'group' => array('Contador.email', 'Contador.interessado', 'Contador.telefone'),
                'limit' => 25
            )
        );
        $licitacao = $this->Contador->Licitacao->find('first', array(
            'conditions' => array('Licitacao.id' => $id),
            'fields' => array('Licitacao.id', 'Licitacao.objeto', 'Licitacao.recebimento', 'Licitacao.inicio_acolhimento', 'Licitacao.inicio_disputa', 'Licitacao.sessao_publica', 'Licitacao.resultado', 'Licitacao.modalidade', 'Licitacao.numero', 'Requisitante.nome'),
            'recursive' => 0));
        $this->set(compact('licitacao'));
        $this->set('contadores', $this->paginate('Contador'));
    }

    public function admin_view($licitacao_id, $palavra_chave){
        $this->layout = 'ajax';
        $this->Contador->recursive = 0;
        $this->paginate = array(
            'Contador' => array(
                'conditions' => array('Contador.licitacao_id' => $licitacao_id, 'Contador.email LIKE' => "%{$palavra_chave}%"),
                'order' => array('Contador.interessado' => 'ASC'),
                'limit' => 25
            )
        );
        $this->set('contadores', $this->paginate('Contador'));
    }
}
