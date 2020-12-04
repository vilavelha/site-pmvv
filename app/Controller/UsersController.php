<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

     public function beforeFilter() {
        $this->Auth->allow('login');
    }
    
    public function rebuildARO() {
        $this->loadModel("Group");
        $this->loadModel("User");
        // Build the groups.
        $groups = $this->Group->find('all');
        $aro = new Aro();
        foreach ($groups as $group) {
            $aro->create();
            $aro->save(array(
                'alias' => $group['Group']['name'],
                'foreign_key' => $group['Group']['id'],
                'model' => 'Group',
                'parent_id' => null
            ));
        }

        // Build the users.
        $users = $this->User->find('all');
        $i = 0;
        foreach ($users as $user) {
            $aroList[$i++] = array(
                'alias' => $user['User']['nome'],
                'foreign_key' => $user['User']['id'],
                'model' => 'User',
                'parent_id' => $user['User']['grupo_id']
            );
        }
        foreach ($aroList as $data) {
            $aro->create();
            $aro->save($data);
        }

        echo "AROs rebuilt!";
        exit;
    }

    public function admin_senha() {
        $this->User->id = $this->Session->read('Auth.User.id');
        $id = $this->Session->read('Auth.User.id');
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido.'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('O usuário foi salvo.'));
                $this->redirect(array('controller' => 'pages', 'action' => 'home'));
            } else {
                $this->Session->setFlash(__('O usuário não foi salvo, tente novamente.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
        }
        $grupos = $this->User->Group->find('list');
        $this->set(compact('grupos'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function login() {
        //$this->layout = 'admin';
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash('O usuário ou senha informado está incorreto.');
            }
        }
    }

    public function logout() {
        $this->Session->setFlash('Good-Bye');
        $this->redirect($this->Auth->logout());
    }

    public function admin_index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido.'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('O usuário foi salvo.'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('O usuário não foi salvo, tente novamente.'));
            }
        }
        $grupos = $this->User->Group->find('list');
        $this->set(compact('grupos'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido.'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $usuario = $this->User->read(null, $id);
            if ($this->User->save($this->request->data)) {
                if (empty($this->request->data['User']['password'])) {
                    $this->User->updateAll(array('User.password' => "'{$usuario['User']['password']}'"), array('User.id' => $id));
                }
                $this->Session->setFlash(__('O usuário foi salvo.'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('O usuário não foi salvo, tente novamente.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
        }
        $grupos = $this->User->Group->find('list');
        $this->set(compact('grupos'));
    }

    /**
     * delete method
     *
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido.'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('Usuário excluído.'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('O usuário não foi excluído.'));
        $this->redirect(array('action' => 'index'));
    }

}
