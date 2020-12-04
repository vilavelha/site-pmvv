<?php
App::uses('AppController', 'Controller');
/**
 * Destaques Controller
 *
 * @property Destaque $Destaque
 * @property PaginatorComponent $Paginator
 */
class DestaquesController extends AppController {

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
		$this->Destaque->recursive = 0;
		$this->paginate = array(
			'Destaque' => array(
			'order' => array('Destaque.id' => 'DESC'),
		));
		$this->set('destaques', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Destaque->exists($id)) {
			throw new NotFoundException(__('Invalid destaque'));
		}
		$options = array('conditions' => array('Destaque.' . $this->Destaque->primaryKey => $id));
		$this->set('destaque', $this->Destaque->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Destaque->create();
			$temp = $this->request->data['Destaque']['anexo'];
            $this->request->data['Destaque']['anexo'] = $temp['name'];

            $tempimg = $this->request->data['Destaque']['imagem'];
            $this->request->data['Destaque']['imagem'] = $tempimg['name'];

			if ($this->Destaque->save($this->request->data)) {

				if ($temp['error'] != 4) {

                    $this->request->data['Destaque']['anexo'] = 'destaque_' . $this->Destaque->id . '.' . $this->Upload->getExtensaoArquivo($temp['name']);
                    $this->Destaque->save($this->request->data);
                
                    $parametros = array(
                        'nome' => $this->request->data['Destaque']['anexo'],
                        'arquivo' => $temp,
                        'pasta' => 'files|destaques'
                    );
                    $this->Upload->uploadArquivo($parametros);
                    
                }

				if ($tempimg['error'] != 4) {

                    $this->request->data['Destaque']['imagem'] = 'destaque_img_' . $this->Destaque->id . '.' . $this->Upload->getExtensaoArquivo($tempimg['name']);
                    $this->Destaque->save($this->request->data);
                
                    $parametros = array(
                        'nome' => $this->request->data['Destaque']['imagem'],
                        'arquivo' => $tempimg,
                        'pasta' => 'files|destaques'
                    );
                    $this->Upload->uploadArquivo($parametros);
                    
                }

				$this->Flash->success(__('The destaque has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The destaque could not be saved. Please, try again.'));
			}
		}
		$orgaos = $this->Destaque->Orgao->find('list', array('fields' => 'nome'));
		$this->set(compact('orgaos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Destaque->exists($id)) {
			throw new NotFoundException(__('Invalid destaque'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$temp = $this->request->data['Destaque']['anexo'];
            $this->request->data['Destaque']['anexo'] = $temp['name'];

            $tempimg = $this->request->data['Destaque']['imagem'];
            $this->request->data['Destaque']['imagem'] = $tempimg['name'];

			if ($temp['error'] != 4) {

                $this->request->data['Destaque']['anexo'] = 'destaque_' . $id . '.' . $this->Upload->getExtensaoArquivo($temp['name']);           
                $parametros = array(
                    'nome' => $this->request->data['Destaque']['anexo'],
                    'arquivo' => $temp,
                    'pasta' => 'files|destaques'
                );
                $this->Upload->uploadArquivo($parametros);
                
            }else{
            	unset($this->request->data['Destaque']['anexo']);
            }

			if ($tempimg['error'] != 4) {

                $this->request->data['Destaque']['imagem'] = 'destaque_img_' . $id . '.' . $this->Upload->getExtensaoArquivo($tempimg['name']);         
                $parametros = array(
                    'nome' => $this->request->data['Destaque']['imagem'],
                    'arquivo' => $tempimg,
                    'pasta' => 'files|destaques'
                );
                $this->Upload->uploadArquivo($parametros);
                
            }else{
            	unset($this->request->data['Destaque']['imagem']);
            }
            
			if ($this->Destaque->save($this->request->data)) {

				$this->Flash->success(__('The destaque has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The destaque could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Destaque.' . $this->Destaque->primaryKey => $id));
			$this->request->data = $this->Destaque->find('first', $options);
		}
		$orgaos = $this->Destaque->Orgao->find('list', array('fields' => 'nome'));
		$this->set(compact('orgaos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Destaque->id = $id;
		if (!$this->Destaque->exists()) {
			throw new NotFoundException(__('Invalid destaque'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Destaque->delete()) {
			$this->Flash->success(__('The destaque has been deleted.'));
		} else {
			$this->Flash->error(__('The destaque could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
