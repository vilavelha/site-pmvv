<?php
App::uses('AppController', 'Controller');
/**
 * Coordenadorias Controller
 *
 * @property Coordenadoria $Coordenadoria
 * @property PaginatorComponent $Paginator
 */
class CoordenadoriasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','RequestHandler');

	public function ver() {
        $this->loadModel('Orgao');
        $this->Orgao->recursive = 0;
        $this->Coordenadoria->recursive = 1;

        if (!isset($this->params['slug'])) {
            throw new NotFoundException(__('Coordenadoria Inválida.'));
        }
        
        $orgaoid = $this->Orgao->find('first', array('conditions' => array('Orgao.slug' => $this->params['secretaria'])));
        $coordenadoria_main = $this->Coordenadoria->find('first', array('conditions' => array('Coordenadoria.orgao_id' => $orgaoid['Orgao']['id'], 'Coordenadoria.slug' => $this->params['slug'])));
        //$coordenadoria_main['Pagina'] = $this->Coordenadoria->Pagina->find('all', array('conditions' => array('Pagina.coordenadoria_id' => $coordenadoria_main['Coordenadoria']['id'])));
        if (empty($coordenadoria_main)) {
            throw new NotFoundException(__('Coordenadoria Inválida.'));
        }

        $orgao = $this->Orgao->find('first', array('conditions' => array('Orgao.id' => $coordenadoria_main['Coordenadoria']['orgao_id'])));
        $servicos = $this->Orgao->Pagina->find('all', array('conditions' => array('Pagina.orgao_id' => $coordenadoria_main['Coordenadoria']['orgao_id'], 'Pagina.publicar' => true, 'Pagina.tipo' => '1'), 'limit' => 100));
        //$servicos = $this->Orgao->Servico->find('all', array('conditions' => array('Servico.orgao_id' => $coordenadoria_main['Coordenadoria']['orgao_id'])));
        $projetos = $this->Orgao->Pagina->find('all', array('conditions' => array('Pagina.orgao_id' => $coordenadoria_main['Coordenadoria']['orgao_id'], 'Pagina.tipo' => '2', 'Pagina.publicar' => true), 'limit' => 100));
        $planejamentos = $this->Orgao->Pagina->find('all', array('conditions' => array('Pagina.orgao_id' => $coordenadoria_main['Coordenadoria']['orgao_id'], 'Pagina.tipo' => '3', 'Pagina.publicar' => true), 'limit' => 100));
        //Controladoria Geral
        if ($orgao['Orgao']['id'] == '25') {
            $coordenadorias = $this->Orgao->Coordenadoria->find('all', array('conditions' => array('Coordenadoria.orgao_id' => $coordenadoria_main['Coordenadoria']['orgao_id'], 'NOT' => array('Coordenadoria.tipo_id' => 11), 'limit' => 100)));
            $normas = $this->Orgao->Coordenadoria->find('all', array('conditions' => array('Coordenadoria.orgao_id' => $coordenadoria_main['Coordenadoria']['orgao_id'], 'Coordenadoria.tipo_id' => 11), 'limit' => 100));
            $this->set(compact('normas'));
        } else {
            $coordenadorias = $this->Orgao->Coordenadoria->find('all', array('conditions' => array('Coordenadoria.orgao_id' => $coordenadoria_main['Coordenadoria']['orgao_id']), 'limit' => 100));
        }
        
        $title_for_layout = $coordenadoria_main['Coordenadoria']['nome'];
        $this->set(compact('orgao', 'title_for_layout', 'coordenadorias', 'planejamentos', 'servicos', 'projetos', 'coordenadoria_main'));
    }



	public function admin_listarCoordenadorias() {
        if (!empty($this->request->data['Coordenadoria']['orgao_id'])) {
        	$this->autoRender = false;
        	$coordenadoria = $this->Coordenadoria->find('all', array(
                'conditions' => array(
                    'Coordenadoria.orgao_id' => $this->request->data['Coordenadoria']['orgao_id']
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
        	$coordenadoria = $this->Coordenadoria->find('all', array(
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



    public function carregaOutrosOrgaos() {
        $this->Coordenadoria->recursive = 0;
        $conditions = array(
            'NOT' => array(
              'Coordenadoria.tipo_id' => 13
        ));
        return $this->Coordenadoria->find('all', array('conditions' => $conditions, 'order' => 'Coordenadoria.nome ASC', 'fields' => array('Coordenadoria.id', 'Coordenadoria.tipo_id', 'Coordenadoria.nome', 'Coordenadoria.slug', 'Orgao.slug')));
    }

    public function view() {

        if (!isset($this->params['slug'])) {
            throw new NotFoundException(__('Coordenadoria Inválida.'));
        }
        $this->Coordenadoria->recursive = 1;
        $this->loadModel('Orgao');
        $this->Orgao->recursive = 0;
        $orgaoid = $this->Orgao->find('first', array('conditions' => array('Orgao.slug' => $this->params['secretaria'])));
        $coordenadoria = $this->Coordenadoria->find('first', array('conditions' => array('Coordenadoria.orgao_id' => $orgaoid['Orgao']['id'], 'Coordenadoria.slug' => $this->params['slug'])));
        if (empty($coordenadoria)) {
            throw new NotFoundException(__('Coordenadoria Inválida.'));
        }

        $this->set(compact('coordenadoria'));
    }

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Coordenadoria->recursive = 0;
        $this->paginate = array(
            'Coordenadoria' => array(
                'limit' => 15,
                'order' => array(
                'Coordenadoria.created' => 'DESC',
                'Coordenadoria.id' => 'DESC'
                )
            )
        );
		$this->set('coordenadorias', $this->Paginator->paginate('Coordenadoria'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Coordenadoria->exists($id)) {
			throw new NotFoundException(__('Invalid coordenadoria'));
		}
		$options = array('conditions' => array('Coordenadoria.' . $this->Coordenadoria->primaryKey => $id));
		$this->set('coordenadoria', $this->Coordenadoria->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Coordenadoria->create();
			if ($this->Coordenadoria->save($this->request->data)) {
				$this->request->data['Coordenadoria']['slug'] = strtolower(Inflector::slug($this->request->data['Coordenadoria']['nome'], '-'));
                $this->Coordenadoria->updateAll(array('Coordenadoria.slug' => "'{$this->request->data['Coordenadoria']['slug']}'"), array('Coordenadoria.id' => $this->Coordenadoria->id));
				$this->Flash->success(__('The coordenadoria has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The coordenadoria could not be saved. Please, try again.'));
			}
		}
		$orgaos = $this->Coordenadoria->Orgao->find('list', array('fields' => 'nome'));
		$tipos = $this->Coordenadoria->Tipo->find('list', array('fields' => 'nome'));
		$this->set(compact('orgaos', 'tipos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Coordenadoria->exists($id)) {
			throw new NotFoundException(__('Invalid coordenadoria'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Coordenadoria->save($this->request->data)) {
				$this->request->data['Coordenadoria']['slug'] = strtolower(Inflector::slug($this->request->data['Coordenadoria']['nome'], '-'));
                $this->Coordenadoria->updateAll(array('Coordenadoria.slug' => "'{$this->request->data['Coordenadoria']['slug']}'"), array('Coordenadoria.id' => $this->request->data['Coordenadoria']['id']));
				$this->Flash->success(__('The coordenadoria has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The coordenadoria could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Coordenadoria.' . $this->Coordenadoria->primaryKey => $id));
			$this->request->data = $this->Coordenadoria->find('first', $options);
		}
		$orgaos = $this->Coordenadoria->Orgao->find('list', array('fields' => 'nome'));
		$tipos = $this->Coordenadoria->Tipo->find('list', array('fields' => 'nome'));
		$this->set(compact('orgaos', 'tipos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Coordenadoria->id = $id;
		if (!$this->Coordenadoria->exists()) {
			throw new NotFoundException(__('Invalid coordenadoria'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Coordenadoria->delete()) {
			$this->Flash->success(__('The coordenadoria has been deleted.'));
		} else {
			$this->Flash->error(__('The coordenadoria could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
