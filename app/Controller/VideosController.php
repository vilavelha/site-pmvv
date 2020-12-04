<?php
App::uses('AppController', 'Controller');
/**
 * Videos Controller
 *
 * @property Video $Video
 * @property PaginatorComponent $Paginator
 */
class VideosController extends AppController {

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
	public function carrega_destaque() {
		$cond = array('Video.destaque' => 1);
		return $this->Video->find('first', array('conditions'=> $cond,'order' => array('Video.id' => 'DESC'), 'recursive' => 0));
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Video->recursive = 0;
		$this->paginate = array(
            'Video' => array(
                'limit' => 9,
                'order' => array(
                'Video.created' => 'DESC',
                'Video.id' => 'DESC'
                )
            )
        );
		$this->set('videos', $this->Paginator->paginate('Video'));
	}

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Video->recursive = 0;
		$this->paginate = array(
            'Video' => array(
                'limit' => 15,
                'order' => array(
                'Video.created' => 'DESC',
                'Video.id' => 'DESC'
                )
            )
        );
		$this->set('videos', $this->Paginator->paginate('Video'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Video->exists($id)) {
			throw new NotFoundException(__('Invalid video'));
		}
		$options = array('conditions' => array('Video.' . $this->Video->primaryKey => $id));
		$this->set('video', $this->Video->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Video->create();
			if ($this->Video->save($this->request->data)) {
				$this->Flash->success(__('The video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The video could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Video->exists($id)) {
			throw new NotFoundException(__('Invalid video'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Video->save($this->request->data)) {
				$this->Flash->success(__('The video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The video could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Video.' . $this->Video->primaryKey => $id));
			$this->request->data = $this->Video->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Video->id = $id;
		if (!$this->Video->exists()) {
			throw new NotFoundException(__('Invalid video'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Video->delete()) {
			$this->Flash->success(__('The video has been deleted.'));
		} else {
			$this->Flash->error(__('The video could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
