<?php
App::uses('AppController', 'Controller');
/**
 * Banners Controller
 *
 * @property Banner $Banner
 * @property PaginatorComponent $Paginator
 */
class BannersController extends AppController {

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
		$this->Banner->recursive = 0;

		$this->paginate = array(
            'Banner' => array(
                'limit' => 20,
                'order' => array(
                    'Banner.created' => 'DESC',
                    'Banner.id' => 'DESC'
                )
            )
        );

		$this->set('banners', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Banner->exists($id)) {
			throw new NotFoundException(__('Invalid banner'));
		}
		$options = array('conditions' => array('Banner.' . $this->Banner->primaryKey => $id));
		$this->set('banner', $this->Banner->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Banner->create();
			if ($this->Banner->save($this->request->data)) {
				$this->Flash->success(__('The banner has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The banner could not be saved. Please, try again.'));
			}
		}
		$imagems = $this->Banner->Imagem->find('list');
		$this->set(compact('imagems'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Banner->exists($id)) {
			throw new NotFoundException(__('Invalid banner'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Banner->save($this->request->data)) {
				$this->Flash->success(__('The banner has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The banner could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Banner.' . $this->Banner->primaryKey => $id));
			$this->request->data = $this->Banner->find('first', $options);
		}
		$imagems = $this->Banner->Imagem->find('superlist', array(
            'conditions' => array('Imagem.id' => $this->request->data['Banner']['imagem_id']),
            'fields' => array('Imagem.id', 'Imagem.pasta', 'Imagem.arquivo'),
            'separator' => DS));
		$this->set(compact('imagems'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Banner->id = $id;
		if (!$this->Banner->exists()) {
			throw new NotFoundException(__('Invalid banner'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Banner->delete()) {
			$this->Flash->success(__('The banner has been deleted.'));
		} else {
			$this->Flash->error(__('The banner could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
