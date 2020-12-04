<?php
App::uses('AppController', 'Controller');
/**
 * Paginas Controller
 *
 * @property Pagina $Pagina
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class PaginasController extends AppController {


	public function admin_listarCoordenadorias() {
        if (!empty($this->request->data['Pagina']['orgao_id'])) {
        	$this->autoRender = false;
        	$coordenadoria = $this->Pagina->Coordenadoria->find('all', array(
                'conditions' => array(
                    'Coordenadoria.orgao_id' => $this->request->data['Pagina']['orgao_id']
                ),
                'fields' => array(
                    'Coordenadoria.id', 'Coordenadoria.nome'
                ),
                'recursive' => 0
            ));
            $novo ='';
            foreach($coordenadoria as $item){
            	$novo.= '<option value='.$item['Coordenadoria']['id'].'>'.$item['Coordenadoria']['nome'].'</option>';
            }
            return $novo;
        } else {
        	$this->autoRender = false;
        	$coordenadoria = $this->Pagina->Coordenadoria->find('all', array(
                'fields' => array(
                    'Coordenadoria.id', 'Coordenadoria.nome'
                ),
                'recursive' => 0
            ));
            $novo ='';
            foreach($coordenadoria as $item){
            	$novo.= '<option value='.$item['Coordenadoria']['id'].'>'.$item['Coordenadoria']['nome'].'</option>';
            }
            return $novo;
        }
    }

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash', 'RequestHandler');

    public function view() {
        if (!isset($this->params['slug'])) {
            throw new NotFoundException(__('Página Inválida.'));
        }

        $cond['Pagina.publicar'] = true;
        $pagina = $this->Pagina->find('first', array('conditions' => array('Pagina.slug' => $this->params['slug'], $cond)));

        if (empty($pagina)) {
            throw new NotFoundException(__('Página Inválida.'));
        }
        $title_for_layout = $pagina['Pagina']['nome'];
        $this->set(compact('pagina', 'title_for_layout'));
    }

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Pagina->recursive = 0;
		$cond = '';
        $BuscaAdmPaginas = $this->Session->read('BuscaAdm.Pag');
        if (isset($this->data['Pagina']['valor'])) {
            $BuscaAdmPaginasCat['campo'] = $this->data['Pagina']['campo'];
            $BuscaAdmPaginasCat['valor'] = $this->data['Pagina']['valor'];
            $BuscaAdmPaginasCat['publicar'] = $this->request->data['Pagina']['publicar'];
            $this->Session->write('BuscaAdm.Pag', $BuscaAdmPaginasCat);
        } elseif (!empty($BuscaAdmPaginas)) {
            $BuscaAdmPaginasCat = $BuscaAdmPaginas;
        } elseif (!isset($this->passedArgs['page'])) {
            if ($this->Session->check('BuscaAdm.Pag')) {
                $this->Session->delete('BuscaAdm.Pag');
            }
        }
        if (isset($BuscaAdmPaginasCat)) {
            $cond = array('or' => array(
                    "Pagina.{$BuscaAdmPaginasCat['campo']} LIKE" => "%{$BuscaAdmPaginasCat['valor']}%"
            ));
            $cond['Pagina.publicar'] = $BuscaAdmPaginasCat['publicar'];
            $this->Session->write('BuscaAdm.Pag', $BuscaAdmPaginasCat);
        }

        if (isset($this->request->params['named']['limpar'])) {
            $this->Session->delete('BuscaAdm.Pag');
            $this->redirect(array('action' => 'index'));
        }


		$tipos = array('1' => 'Serviço', '2' => 'Projeto', '3' => 'Planjamento');
		$this->set(compact('tipos'));
		$this->paginate = array(
            'Pagina' => array(
                'limit' => 20,
                'order' => array(
                    'Pagina.created' => 'DESC',
                    'Pagina.id' => 'DESC'
                ),
                'conditions' => $cond
            )
        );
		$this->set('paginas', $this->Paginator->paginate());
		$this->set(compact('BuscaAdmPaginasCat'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Pagina->exists($id)) {
			throw new NotFoundException(__('Invalid pagina'));
		}
		$options = array('conditions' => array('Pagina.' . $this->Pagina->primaryKey => $id));
		$this->set('pagina', $this->Pagina->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Pagina->create();
			if ($this->Pagina->save($this->request->data)) {
				$this->loadModel('Orgao');
				$orgao = $this->Orgao->find('first', array('conditions' => array('Orgao.id' => $this->request->data['Pagina']['orgao_id']), 'recursive' => 0));
				$this->request->data['Pagina']['slug'] = strtolower(Inflector::slug($orgao['Orgao']['slug'] . '-' . $this->request->data['Pagina']['nome'], '-'));
                $this->Pagina->updateAll(array('Pagina.slug' => "'{$this->request->data['Pagina']['slug']}'"), array('Pagina.id' => $this->Pagina->id));
				$this->Flash->success(__('The pagina has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The pagina could not be saved. Please, try again.'));
			}
		}
		$orgaos = $this->Pagina->Orgao->find('list', array('fields' => 'nome'));
		$coordenadorias = $this->Pagina->Coordenadoria->find('list', array('fields' => 'nome'));
		$tipos = array('1' => 'Serviço', '2' => 'Projeto', '3' => 'Planejamento');
		$this->set(compact('orgaos', 'coordenadorias','tipos'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Pagina->exists($id)) {
			throw new NotFoundException(__('Invalid pagina'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Pagina->save($this->request->data)) {
				$this->loadModel('Orgao');
				$orgao = $this->Orgao->find('first', array('conditions' => array('Orgao.id' => $this->request->data['Pagina']['orgao_id']), 'recursive' => 0));
				$this->request->data['Pagina']['slug'] = strtolower(Inflector::slug($orgao['Orgao']['slug'] . '-' . $this->request->data['Pagina']['nome'], '-'));
                $this->Pagina->updateAll(array('Pagina.slug' => "'{$this->request->data['Pagina']['slug']}'"), array('Pagina.id' => $this->request->data['Pagina']['id']));
				$this->Flash->success(__('The pagina has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The pagina could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Pagina.' . $this->Pagina->primaryKey => $id));
			$this->request->data = $this->Pagina->find('first', $options);
		}
		$orgaos = $this->Pagina->Orgao->find('list', array('fields' => 'nome'));
		$coordenadorias = $this->Pagina->Coordenadoria->find('list', array('fields' => 'nome'));
		$tipos = array('1' => 'Serviço', '2' => 'Projeto', '3' => 'Planejamento');
		$this->set(compact('orgaos', 'coordenadorias','tipos'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Pagina->id = $id;
		if (!$this->Pagina->exists()) {
			throw new NotFoundException(__('Invalid pagina'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Pagina->delete()) {
			$this->Flash->success(__('The pagina has been deleted.'));
		} else {
			$this->Flash->error(__('The pagina could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
