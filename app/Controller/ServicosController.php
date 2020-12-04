<?php
App::uses('AppController', 'Controller');
/**
 * Servicos Controller
 *
 * @property Servico $Servico
 * @property PaginatorComponent $Paginator
 */
class ServicosController extends AppController {

	public function admin_listarCoordenadorias() {
        if (!empty($this->request->data['Servico']['orgao_id'])) {
        	$this->autoRender = false;
        	$coordenadoria = $this->Servico->Coordenadoria->find('all', array(
                'conditions' => array(
                    'Coordenadoria.orgao_id' => $this->request->data['Servico']['orgao_id']
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


	public function carregaServico($id = null) {
        $cond = array('Servico.publicar' => true);
        if (empty($id)) {
            $servicos = $this->Servico->find('all', array('conditions' => $cond, 'order' => array('Servico.id' => 'DESC'), 'recursive' => 0));
        } else {
            $this->Servico->recursive = 0;
            $servicos = $this->Servico->find('all', array(
                'conditions' => array(
                    'ServicosCategoria.servicos_categoria_id' => $id,
                    $cond
                ),
                'order' => array('Servico.nome' => 'ASC'),
                'joins' => array(
                    array(
                        'table' => 'servicos_servicos_categorias'
                        , 'type' => 'INNER'
                        , 'alias' => 'ServicosCategoria'
                        , 'conditions' => array(
                            'Servico.publicar' => true,
                            'Servico.id = ServicosCategoria.servico_id',
                            "ServicosCategoria.servicos_categoria_id = {$id}"
                        )
                    )
                )
                    )
            );
        }
        return $servicos;
    }

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Servico->recursive = 0;
		$this->paginate = array(
            'Servico' => array(
                'limit' => 20,
                'order' => array(
                    'Servico.id' => 'DESC'
                )
            )
        );
		$this->set('servicos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Servico->exists($id)) {
			throw new NotFoundException(__('Invalid servico'));
		}
		$options = array('conditions' => array('Servico.' . $this->Servico->primaryKey => $id));
		$this->set('servico', $this->Servico->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Servico->create();
			if ($this->Servico->save($this->request->data)) {
				$this->Flash->success(__('The servico has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The servico could not be saved. Please, try again.'));
			}
		}
		$orgaos = $this->Servico->Orgao->find('list', array('fields' => 'nome'));
		$coordenadorias = $this->Servico->Coordenadoria->find('list', array('fields' => 'nome'));
		$servicosCategorias = $this->Servico->ServicosCategoria->find('list', array('fields' => 'nome'));
		$this->set(compact('orgaos', 'coordenadorias', 'servicosCategorias'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Servico->exists($id)) {
			throw new NotFoundException(__('Invalid servico'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Servico->save($this->request->data)) {
				$this->Flash->success(__('The servico has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The servico could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Servico.' . $this->Servico->primaryKey => $id));
			$this->request->data = $this->Servico->find('first', $options);
		}
		$orgaos = $this->Servico->Orgao->find('list', array('fields' => 'nome'));
		$coordenadorias = $this->Servico->Coordenadoria->find('list', array('fields' => 'nome'));
		$servicosCategorias = $this->Servico->ServicosCategoria->find('list', array('fields' => 'nome'));
		$this->set(compact('orgaos', 'coordenadorias', 'servicosCategorias'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Servico->id = $id;
		if (!$this->Servico->exists()) {
			throw new NotFoundException(__('Invalid servico'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Servico->delete()) {
			$this->Flash->success(__('The servico has been deleted.'));
		} else {
			$this->Flash->error(__('The servico could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

