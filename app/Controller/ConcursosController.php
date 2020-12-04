<?php
App::uses('AppController', 'Controller');
/**
 * Concursos Controller
 *
 * @property Concurso $Concurso
 * @property PaginatorComponent $Paginator
 */
class ConcursosController extends AppController {

	public $components = array('RequestHandler', 'Midias.Upload');
	public $helpers = array('Js');

	public function view() {

		if (!isset($this->params['slug'])) {
			throw new NotFoundException(__('Concurso Inexistente.'));
		}

		$this->Concurso->recursive = 1;
		//$cond['Concurso.publicar'] = true;
		$options['Concurso.created <='] = date('Y-m-d H:i:s');

		//$concurso = $this->Concurso->find('first', array('conditions' => array('Concurso.slug' => $this->params['slug'], $cond)));

		$options = array('conditions' => array('Concurso.slug' => $this->params['slug']));
		$concurso = $this->Concurso->find('first', $options);

		if (empty($concurso)) {
			throw new NotFoundException(__('Concurso Inexistente.'));
		}

		$editais = $this->Concurso->Download->find('all', array('order' => array('Download.created' => 'DESC', 'Download.id' => 'DESC'), 'fields' => array('Download.id', 'Download.nome', 'Download.arquivo', 'Download.created'), 'conditions' => array('tipo_id' => 1, 'publicar' => true, 'concurso_id' => $concurso['Concurso']['id'])));
		$provas = $this->Concurso->Download->find('all', array('order' => array('Download.created' => 'DESC', 'Download.id' => 'DESC'), 'fields' => array('Download.id', 'Download.nome', 'Download.arquivo', 'Download.created'), 'conditions' => array('tipo_id' => 2, 'publicar' => true, 'concurso_id' => $concurso['Concurso']['id'])));
		$this->set(compact('editais', 'provas', 'concurso'));
	}

	public function index() {
		$this->Concurso->recursive = 0;
		$cond = '';
		$this->paginate = array(
			'Concurso' => array(
				'fields' => array('Concurso.id', 'Concurso.titulo', 'Concurso.slug'),
				'order' => array('Concurso.id' => 'DESC'),
				'conditions' => $cond,
				)
			);
		$this->set('concursos', $this->paginate('Concurso'));
	}

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Concurso->recursive = 0;
		$cond = '';
		$this->paginate = array(
			'Concurso' => array(
				'order' => array('Concurso.id' => 'DESC'),
				'conditions' => $cond,
				)
			);
		$this->set('concursos', $this->paginate('Concurso'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Concurso->exists($id)) {
			throw new NotFoundException(__('Invalid concurso'));
		}
		$options = array('conditions' => array('Concurso.' . $this->Concurso->primaryKey => $id));
		$this->set('concurso', $this->Concurso->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Concurso->create();

			if ($this->request->data['Concurso']['checkme'] == false) {
                $this->request->data['Concurso']['link'] = null;
                $temp = $this->request->data['Concurso']['ficha'];
                $this->request->data['Concurso']['ficha'] = $temp['name'];

                if ($temp['error'] == '4') {
                    unset($this->request->data['Concurso']['ficha']);
                    $this->request->data['Concurso']['ficha'] = null;
                }
            } else {
                unset($this->request->data['Concurso']['ficha']);
                $this->request->data['Concurso']['ficha'] = null;
            }
            $this->request->data['Concurso']['usuario_id'] = $this->Session->read('Auth.User.id');
			if ($this->Concurso->save($this->request->data)) {

				$this->request->data['Concurso']['slug'] = strtolower(Inflector::slug($this->request->data['Concurso']['titulo'] . '-' . $this->Concurso->id, '-'));
                $this->Concurso->updateAll(array('Concurso.slug' => "'{$this->request->data['Concurso']['slug']}'"), array('Concurso.id' => $this->Concurso->id));

				mkdir(WWW_ROOT . 'files' . DS . 'concursos' . DS . $this->Concurso->id, 0777);
                mkdir(WWW_ROOT . 'files' . DS . 'concursos' . DS . $this->Concurso->id . DS . 'outros', 0777);
                if ($this->request->data['Concurso']['checkme'] == false) {

                    if ($temp['error'] != '4') {
                        $this->request->data['Concurso']['ficha'] = $this->Concurso->id . '.' . $this->Upload->getExtensaoArquivo($temp['name']);
                        $this->Concurso->updateAll(array('Concurso.ficha' => "'{$this->request->data['Concurso']['ficha']}'"), array('Concurso.id' => $this->Concurso->id));

                        $parametros = array(
                            'arquivo' => $temp,
                            'nome' => $this->request->data['Concurso']['ficha'],
                            'pasta' => 'files|concursos|' . $this->Concurso->id
                        );
                        $this->Upload->uploadArquivo($parametros);
                    }
                    $this->Session->setFlash(__('O concurso foi salvo.'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('O concurso foi salvo.'));
                    $this->redirect(array('action' => 'index'));
                }
			} else {
				$this->Flash->error(__('The concurso could not be saved. Please, try again.'));
			}
		}
		$situacao = array('1' => 'Inscrições Abertas', '2' => 'Em Andamento', '3' => 'Cancelada', '4' => 'Encerrado', '5' => 'Homologado');
		$this->set(compact('situacao'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Concurso->exists($id)) {
			throw new NotFoundException(__('Invalid concurso'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->request->data['Concurso']['checkme'] == false) {
                $this->request->data['Concurso']['link'] = null;

                $temp = $this->request->data['Concurso']['ficha'];
                $this->request->data['Concurso']['ficha'] = $temp['name'];

                if ($temp['error'] == '4') {
                    $options = array('conditions' => array('Concurso.' . $this->Concurso->primaryKey => $id));
                    $concurso = $this->Concurso->find('first', $options);
                    $this->request->data['Concurso']['ficha'] = $concurso['Concurso']['ficha'];
                }
            } else {
                unset($this->request->data['Concurso']['ficha']);
                $this->request->data['Concurso']['ficha'] = null;
            }

            $this->request->data['Concurso']['usuario_id'] = $this->Session->read('Auth.User.id');
            $this->request->data['Concurso']['slug'] = strtolower(Inflector::slug($this->request->data['Concurso']['titulo'] . '-' . $this->request->data['Concurso']['id'], '-'));

			if ($this->Concurso->save($this->request->data)) {
				 if ($this->request->data['Concurso']['checkme'] == false) {
                    if ($temp['error'] != '4') {

                    	mkdir(WWW_ROOT . 'files' . DS . 'concursos' . DS . $this->Concurso->id, 0777);
                		mkdir(WWW_ROOT . 'files' . DS . 'concursos' . DS . $this->Concurso->id . DS . 'outros', 0777);

                        $this->request->data['Concurso']['slug'] = strtolower(Inflector::slug($this->request->data['Concurso']['titulo'] . '-' . $this->request->data['Concurso']['id'], '-'));
                        $this->request->data['Concurso']['ficha'] = $this->request->data['Concurso']['id'] . '.' . $this->Upload->getExtensaoArquivo($temp['name']);

                        $this->Concurso->updateAll(array('Concurso.slug' => "'{$this->request->data['Concurso']['slug']}'"), array('Concurso.id' => $this->request->data['Concurso']['id']));
                        $this->Concurso->updateAll(array('Concurso.ficha' => "'{$this->request->data['Concurso']['ficha']}'"), array('Concurso.id' => $this->request->data['Concurso']['id']));

                        $parametros = array(
                            'arquivo' => $temp,
                            'nome' => $this->request->data['Concurso']['ficha'],
                            'pasta' => 'files|concursos|' . $this->request->data['Concurso']['id']
                        );
                        $this->Upload->uploadArquivo($parametros);
                    }
                    $this->Session->setFlash(__('O concurso foi salvo.'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('O concurso foi salvo.'));
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('The concurso could not be saved. Please, try again.'));
            }
		} else {
			$options = array('conditions' => array('Concurso.' . $this->Concurso->primaryKey => $id));
			$this->request->data = $this->Concurso->find('first', $options);
		}
		$situacao = array('1' => 'Inscrições Abertas', '2' => 'Em Andamento', '3' => 'Cancelada', '4' => 'Encerrado', '5' => 'Homologado');
        $this->set(compact('situacao'));
        $usuarios = $this->Concurso->Usuario->find('list');
        $this->set(compact('usuarios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Concurso->id = $id;
		if (!$this->Concurso->exists()) {
			throw new NotFoundException(__('Invalid concurso'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Concurso->delete()) {
			$this->Flash->success(__('The concurso has been deleted.'));
		} else {
			$this->Flash->error(__('The concurso could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
