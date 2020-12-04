<?php
App::uses('AppController', 'Controller');
/**
 * Licitacoes Controller
 *
 * @property Licitacao $Licitacao
 * @property PaginatorComponent $Paginator
 */
class LicitacoesController extends AppController {

	public $components = array('RequestHandler', 'Midias.Upload','Paginator', 'Session');
	public $helpers = array('Js');
	public $name = 'Licitacoes';
	public $uses = 'Licitacao';

	public function index(){
//$orgaos = $this->Licitacao->Orgao->find('all', array('fields' => array('Orgao.id', 'Orgao.nome', 'Orgao.slug'), 'recursive' => -1));
//$this->set(compact('orgaos'));
		$cond = '';
		$BuscaLicitacoes = $this->Session->read('BuscaLicitacoes.Licitacao');
        if ((isset($this->request->data['Licitacao']['valor'])) || (isset($this->request->data['Licitacao']['secretaria']))) {
            $BuscaLicitacoesCat['campo'] = $this->request->data['Licitacao']['campo'];
            $BuscaLicitacoesCat['valor'] = $this->request->data['Licitacao']['valor'];
            $BuscaLicitacoesCat['secretaria'] = $this->request->data['Licitacao']['secretaria'];
            $this->Session->write('BuscaLicitacoes.Licitacao', $BuscaLicitacoesCat);
        } elseif (!empty($BuscaLicitacoes)) {
            $BuscaLicitacoesCat = $BuscaLicitacoes;
        } elseif (!isset($this->passedArgs['page'])) {
            if ($this->Session->check('BuscaLicitacoes.Licitacao')) {
                $this->Session->delete('BuscaLicitacoes.Licitacao');
            }
        }
        if (isset($BuscaLicitacoesCat)) {
            $cond = array('or' => array(
                "Licitacao.{$BuscaLicitacoesCat['campo']} LIKE" => "%{$BuscaLicitacoesCat['valor']}%"
            ));
            if(!empty($BuscaLicitacoesCat['secretaria'])){
            	$cond['Licitacao.requisitante_id'] = $BuscaLicitacoesCat['secretaria'];
        	}
            $this->Session->write('BuscaLicitacoes.Licitacao', $BuscaLicitacoesCat);
        }
        if (isset($this->request->params['named']['limpar'])) {
            $this->Session->delete('BuscaLicitacoes.Licitacao');
            $this->redirect(array('action' => 'index'));
        }
		$cond['Licitacao.deletado'] = false;
		$this->paginate = array(
			'Licitacao' => array(
				'conditions' => $cond,
				'order' => array('Licitacao.created' => 'DESC', 'Licitacao.id' => 'DESC'),
				'fields' => array('Licitacao.id', 'Licitacao.objeto', 'Licitacao.recebimento', 'Licitacao.fim_recebimento', 'Licitacao.inicio_acolhimento', 'Licitacao.inicio_disputa', 'Licitacao.sessao_publica', 'Licitacao.resultado', 'Licitacao.modalidade', 'Licitacao.numero', 'Requisitante.nome'),
				'limit' => 10,
				'recursive' => 0
				)
			);
		$this->set('licitacoes', $this->paginate('Licitacao'));
		$this->set('secretarias', $this->Licitacao->Orgao->find('list', array('fields' => 'nome')));
		$this->set(compact('BuscaLicitacoesCat'));
	}

	public function view($id){
		$this->Licitacao->Orgao->recursive = 0;

		$options = array('conditions' => array('Licitacao.' . $this->Licitacao->primaryKey => $id), 'recursive' => 0);
		$licitacao = $this->Licitacao->find('first', $options);

		if (empty($licitacao)) {
			throw new NotFoundException(__('Licitação Inválida.'));
		}
		$licitacao['Licitacao']['requisitante_id'] = $this->Licitacao->Orgao->find('first', array('conditions' => array('Orgao.id' => $licitacao['Licitacao']['requisitante_id']), 'fields' => array('Orgao.id','Orgao.nome')));
		$ContadorBaixarLicitacao = $this->Session->read('ContadorBaixarLicitacao');
		$this->set(compact('licitacao','ContadorBaixarLicitacao'));
	}
	
	public function download($id){
		$this->viewClass = 'Media';
		$this->Licitacao->recursive = -1;
		$licitacao = $this->Licitacao->read(null, $id);
		$params = array(
			'id' => $licitacao['Licitacao']['edital'],
			'name' => $this->Upload->getNomeArquivo($licitacao['Licitacao']['edital']),
			'download' => true,
			'extension' => $this->Upload->getExtensaoArquivo($licitacao['Licitacao']['edital']),
			'path' => WWW_ROOT . 'files' . DS . 'licitacoes' . DS
			);
		$this->set($params);
	}
/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$cond = '';
		$BuscaLicitacoes = $this->Session->read('BuscaLicitacoes.Licitacao');
        if ((isset($this->request->data['Licitacao']['valor'])) || (isset($this->request->data['Licitacao']['secretaria']))) {
            $BuscaLicitacoesCat['campo'] = $this->request->data['Licitacao']['campo'];
            $BuscaLicitacoesCat['valor'] = $this->request->data['Licitacao']['valor'];
            $BuscaLicitacoesCat['secretaria'] = $this->request->data['Licitacao']['secretaria'];
            $this->Session->write('BuscaLicitacoes.Licitacao', $BuscaLicitacoesCat);
        } elseif (!empty($BuscaLicitacoes)) {
            $BuscaLicitacoesCat = $BuscaLicitacoes;
        } elseif (!isset($this->passedArgs['page'])) {
            if ($this->Session->check('BuscaLicitacoes.Licitacao')) {
                $this->Session->delete('BuscaLicitacoes.Licitacao');
            }
        }
        if (isset($BuscaLicitacoesCat)) {
            $cond = array('or' => array(
                "Licitacao.{$BuscaLicitacoesCat['campo']} LIKE" => "%{$BuscaLicitacoesCat['valor']}%"
            ));
            if(!empty($BuscaLicitacoesCat['secretaria'])){
            	$cond['Licitacao.requisitante_id'] = $BuscaLicitacoesCat['secretaria'];
        	}
            $this->Session->write('BuscaLicitacoes.Licitacao', $BuscaLicitacoesCat);
        }
        
        if (isset($this->request->params['named']['limpar'])) {
            $this->Session->delete('BuscaLicitacoes.Licitacao');
            $this->redirect(array('action' => 'index', 'admin' => true));
        }

		$this->paginate = array(
			'Licitacao' => array(
				'conditions' => $cond,
				'order' => array('Licitacao.created' => 'DESC', 'Licitacao.id' => 'DESC'),
				'fields' => array('Licitacao.id', 'Orgao.nome', 'Requisitante.nome', 'Licitacao.numero', 'Licitacao.processo', 'Licitacao.recebimento',  'Licitacao.abertura', 'Licitacao.responsavel', 'Licitacao.modalidade', 'Licitacao.resultado', 'Licitacao.deletado'),
				'limit' => 10,
				'recursive' => 0
			)
		);
		$this->set('licitacoes', $this->paginate('Licitacao'));
		$this->set('secretarias', $this->Licitacao->Orgao->find('list', array('fields' => 'nome')));
		$this->set(compact('BuscaLicitacoesCat'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Licitacao->Orgao->recursive = 0;

		$options = array('conditions' => array('Licitacao.' . $this->Licitacao->primaryKey => $id), 'recursive' => 0);
		$licitacao = $this->Licitacao->find('first', $options);

		if (empty($licitacao)) {
			throw new NotFoundException(__('Licitação Inválida.'));
		}
		$licitacao['Licitacao']['requisitante_id'] = $this->Licitacao->Orgao->find('first', array('conditions' => array('Orgao.id' => $licitacao['Licitacao']['requisitante_id']), 'fields' => array('Orgao.id','Orgao.nome')));
		$contadores = $this->Licitacao->Contador->find('count', array('conditions' => array('Contador.licitacao_id' => $id)));
		$this->set(compact('contadores'));
		$this->set(compact('licitacao'));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Licitacao->create();
			$temp = $this->request->data['Licitacao']['edital'];
            $this->request->data['Licitacao']['edital'] = $temp['name'];
            $this->request->data['Licitacao']['usuario_id'] = $this->Session->read('Auth.User.id');
			if ($this->Licitacao->save($this->request->data)) {
				if ($temp['error'] != 4) {

                    $this->request->data['Licitacao']['edital'] = 'edital_' . $this->Licitacao->id . '.' . $this->Upload->getExtensaoArquivo($temp['name']);
                    $this->Licitacao->save($this->request->data);
                
                    $parametros = array(
                        'nome' => $this->request->data['Licitacao']['edital'],
                        'arquivo' => $temp,
                        'pasta' => 'files|licitacoes'
                    );
                    $this->Upload->uploadArquivo($parametros);
                    
                }
				$this->Flash->success('A licitação foi salva com sucesso.');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error('Houve um erro ao salvar a Licitação, tente novamente.');
			}
		}
		$orgaos = array(
            '2' => 'Administração',
            '8' => 'Educação',
            '14' => 'Infraestrutura, Obras e Projetos Especiais',
            '11' => 'Governo e Articulação Institucional',
            '16' => 'Saúde',
        );
		$requisitantes = $this->Licitacao->Orgao->find('list', array('fields' => 'nome'));
        $usuarios = $this->Licitacao->Usuario->find('list', array('fields' => 'nome'));
		$this->set(compact('orgaos', 'requisitantes', 'usuarios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Licitacao->exists($id)) {
			throw new NotFoundException('Licitação Inválida.');
		}
		if ($this->request->is(array('post', 'put'))) {
			
			$temp = $this->request->data['Licitacao']['edital'];
            $this->request->data['Licitacao']['edital'] = $temp['name'];


			if ($this->request->data['Licitacao']['edital'] != '') {

			$this->request->data['Licitacao']['edital'] = 'edital_' . $id . '.' . $this->Upload->getExtensaoArquivo($temp['name']);

			if ($this->Licitacao->save($this->request->data)) {
					$parametros = array(
                        'nome' => $this->request->data['Licitacao']['edital'],
                        'arquivo' => $temp,
                        'pasta' => 'files|licitacoes'
                    );
                    $this->Upload->uploadArquivo($parametros);
                    $this->Session->setFlash('A licitação foi salva.');
                    $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error('Houve um erro ao salvar a Licitação, tente novamente.');
			}

			} else {
                $options = array('conditions' => array('Licitacao.' . $this->Licitacao->primaryKey => $id));
                $licitacao = $this->Licitacao->find('first', $options);
                $this->request->data['Licitacao']['edital'] = $licitacao['Licitacao']['edital'];
                if ($this->Licitacao->save($this->request->data)) {
                    $this->Session->setFlash('A licitação foi salva com sucesso.');
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash('Houve um erro ao salvar a Licitação, tente novamente.');
                }
            }
		} else {
			$options = array('conditions' => array('Licitacao.' . $this->Licitacao->primaryKey => $id));
			$this->request->data = $this->Licitacao->find('first', $options);
		}
		$orgaos = array(
            '2' => 'Administração',
            '8' => 'Educação',
            '14' => 'Infraestrutura, Obras e Projetos Especiais',
            '11' => 'Governo e Articulação Institucional',
            '16' => 'Saúde',
        );
        $requisitantes = $this->Licitacao->Orgao->find('list', array('fields' => 'nome'));
        $usuarios = $this->Licitacao->Usuario->find('list', array('fields' => 'nome'));
        $this->set(compact('orgaos', 'requisitantes', 'usuarios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Licitacao->id = $id;
		if (!$this->Licitacao->exists()) {
			throw new NotFoundException('Licitação Inválida.');
		}
		$this->request->allowMethod('post', 'delete');
		$this->Licitacao->updateAll(array('Licitacao.deletado' => '1'), array('Licitacao.id' => $id));
		/*if ($this->Licitacao->delete()) {
			$this->Flash->success(__('The licitacao has been deleted.'));
		} else {
			$this->Flash->error(__('The licitacao could not be deleted. Please, try again.'));
		}*/
        $this->Session->setFlash(__('Licitação excluída'));
		return $this->redirect(array('action' => 'index'));
	}
}
