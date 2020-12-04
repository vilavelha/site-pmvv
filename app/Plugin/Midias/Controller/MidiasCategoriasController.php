<?php

class MidiasCategoriasController extends MidiasAppController {

    public $name = 'MidiasCategorias';

    public function admin_index() {
        $this->MidiasCategoria->recursive = 0;
        $this->set('MidiasCategorias', $this->paginate());
    }

    public function admin_view($id = null) {
        if (!$id) {
            $this->Session->setFlash(sprintf(__('%s inválido.', true), 'MidiasCategoria'));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('MidiasCategoria', $this->MidiasCategoria->read(null, $id));
    }

    public function admin_add() {
        if (!empty($this->request->data)) {
            $this->MidiasCategoria->create();
            if ($this->MidiasCategoria->save($this->request->data)) {
                $this->Session->setFlash(sprintf(__('O %s foi salvo.', true), 'MidiasCategoria'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(__('O %s não pode ser salvo. Por favor, tente novamente.', true), 'MidiasCategoria'));
            }
        }
    }

    public function admin_copy($id = null) {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__('Invalid MidiasCategoria', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            $this->request->data['MidiasCategoria']['id'] = null;
            if ($this->MidiasCategoria->save($this->request->data)) {
                $this->Session->setFlash(__('The MidiasCategoria has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The MidiasCategoria could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->MidiasCategoria->read(null, $id);
        }
    }

    public function admin_edit($id = null) {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(sprintf(__('%s inválido.', true), 'MidiasCategoria'));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            if ($this->MidiasCategoria->save($this->request->data)) {
                $this->Session->setFlash(sprintf(__('O %s foi salvo.', true), 'MidiasCategoria'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(__('O %s não pode ser salvo. Por favor, tente novamente.', true), 'MidiasCategoria'));
            }
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->MidiasCategoria->read(null, $id);
        }
    }

    public function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(sprintf(__('ID inválido para %s.', true), 'MidiasCategoria'));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->MidiasCategoria->delete($id)) {
            $this->Session->setFlash(sprintf(__('%s excluído.', true), 'MidiasCategoria'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(sprintf(__('%s não pode ser excluído.', true), 'MidiasCategoria'));
        $this->redirect(array('action' => 'index'));
    }

}

?>