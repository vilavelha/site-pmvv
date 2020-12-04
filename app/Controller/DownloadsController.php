<?php
App::uses('AppController', 'Controller');
/**
 * Downloads Controller
 *
 * @property Download $Download
 * @property PaginatorComponent $Paginator
 */
class DownloadsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Midias.Upload');

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Download->recursive = 0;
		$tipos = array('1' => 'Editais, Comunicados e Informações', '2' => 'Provas e Gabaritos');
        $this->set(compact('tipos'));
        $cond = '';
        $this->paginate = array(
            'Download' => array(
                'order' => array('Download.id' => 'DESC'),
                'conditions' => $cond
            )
        );
        $tipos = array('1' => 'Editais, Comunicados e Informações', '2' => 'Provas e Gabaritos');
        $this->set(compact('tipos'));
		$this->set('downloads', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Download->exists($id)) {
			throw new NotFoundException(__('Invalid download'));
		}
		$options = array('conditions' => array('Download.' . $this->Download->primaryKey => $id));
		$this->set('download', $this->Download->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Download->create();
			$temp = $this->request->data['Download']['arquivo'];
            $this->request->data['Download']['arquivo'] = $temp['name'];
			if ($this->Download->save($this->request->data)) {
				$this->request->data['Download']['arquivo'] = $this->Download->id . '.' . $this->Upload->getExtensaoArquivo($temp['name']);
                $this->Download->save($this->request->data);
                $parametros = array(
                    'nome' => $this->request->data['Download']['arquivo'],
                    'arquivo' => $temp,
                    'pasta' => 'files|concursos|' . $this->request->data['Download']['concurso_id'] . '|outros'
                );
                $this->Upload->uploadArquivo($parametros);
				$this->Flash->success(__('The download has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The download could not be saved. Please, try again.'));
			}
		}
		$tipos = array('1' => 'Editais, Comunicados e Informações', '2' => 'Provas e Gabaritos');
        $concursos = $this->Download->Concurso->find('list', array('fields' => 'titulo'));
		$this->set(compact('tipos', 'concursos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Download->exists($id)) {
			throw new NotFoundException(__('Invalid download'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$temp = $this->request->data['Download']['arquivo'];
            $this->request->data['Download']['arquivo'] = $temp['name'];
            $this->request->data['Download']['arquivo'] = $this->request->data['Download']['id'] . '.' . $this->Upload->getExtensaoArquivo($temp['name']);
			if ($this->Download->save($this->request->data)) {
				$parametros = array(
                    'nome' => $this->request->data['Download']['arquivo'],
                    'arquivo' => $temp,
                    'pasta' => 'files|concursos|' . $this->request->data['Download']['concurso_id'] . '|outros'
                );
                $this->Upload->uploadArquivo($parametros);
				$this->Flash->success(__('The download has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The download could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Download.' . $this->Download->primaryKey => $id));
			$this->request->data = $this->Download->find('first', $options);
		}
		$tipos = array('1' => 'Editais, Comunicados e Informações', '2' => 'Provas e Gabaritos');
        $concursos = $this->Download->Concurso->find('list', array('fields' => 'titulo'));
		$this->set(compact('tipos', 'concursos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Download->id = $id;
		if (!$this->Download->exists()) {
			throw new NotFoundException(__('Invalid download'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Download->delete()) {
			$this->Flash->success(__('The download has been deleted.'));
		} else {
			$this->Flash->error(__('The download could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
