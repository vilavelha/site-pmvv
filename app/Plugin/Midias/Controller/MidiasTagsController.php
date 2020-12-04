<?php

class MidiasTagsController extends MidiasAppController {

    public $name = 'MidiasTags';
    public $helpers = array('Time', 'Js');
    public $components = array('RequestHandler');

    public function admin_index() {
        $this->MidiasTag->recursive = 0;
        $this->set('MidiasTags', $this->paginate());
    }

    public function admin_view($id = null) {
        if (!$id) {
            $this->Session->setFlash(sprintf(__('%s inválido.', true), 'MidiasTag'));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('MidiasTag', $this->MidiasTag->read(null, $id));
    }

    public function admin_adicionar() {
        $this->layout = "ajax";
        if (!empty($this->request->data)) {
            $this->MidiasTag->create();
            if ($this->MidiasTag->save($this->request->data)) {
                $this->Session->setFlash(sprintf(__('O %s foi salvo.', true), 'MidiasTag'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(__('O %s não pode ser salvo. Por favor, tente novamente.', true), 'MidiasTag'));
            }
        }
        $midias = $this->MidiasTag->Midia->find('list');
        $this->set(compact('midias'));
    }

    public function admin_add() {
        if (!empty($this->request->data)) {
            $this->MidiasTag->create();
            if ($this->MidiasTag->save($this->request->data)) {
                $this->Session->setFlash(sprintf(__('O %s foi salvo.', true), 'MidiasTag'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(__('O %s não pode ser salvo. Por favor, tente novamente.', true), 'MidiasTag'));
            }
        }
        $midias = $this->MidiasTag->Midia->find('list');
        $this->set(compact('midias'));
    }

    public function admin_copy($id = null) {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__('Invalid MidiasTag', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            $this->request->data['MidiasTag']['id'] = null;
            if ($this->MidiasTag->save($this->request->data)) {
                $this->Session->setFlash(__('The MidiasTag has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The MidiasTag could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->MidiasTag->read(null, $id);
        }
        $midias = $this->MidiasTag->Midia->find('list');
        $this->set(compact('midias'));
    }

    public function admin_edit($id = null) {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(sprintf(__('%s inválido.', true), 'MidiasTag'));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            if ($this->MidiasTag->save($this->request->data)) {
                $this->Session->setFlash(sprintf(__('O %s foi salvo.', true), 'MidiasTag'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(__('O %s não pode ser salvo. Por favor, tente novamente.', true), 'MidiasTag'));
            }
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->MidiasTag->read(null, $id);
        }
        $midias = $this->MidiasTag->Midia->find('list');
        $this->set(compact('midias'));
    }

    public function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(sprintf(__('ID inválido para %s.', true), 'MidiasTag'));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->MidiasTag->delete($id)) {
            $this->Session->setFlash(sprintf(__('%s excluído.', true), 'MidiasTag'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(sprintf(__('%s não pode ser excluído.', true), 'MidiasTag'));
        $this->redirect(array('action' => 'index'));
    }

}

?>