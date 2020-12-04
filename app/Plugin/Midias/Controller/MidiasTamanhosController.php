<?php

class MidiasTamanhosController extends MidiasAppController {

    public $name = 'MidiasTamanhos';

    public function admin_index() {
        $this->MidiasTamanho->recursive = 0;
        $this->set('midiasTamanhos', $this->paginate());
    }

    public function admin_view($id = null) {
        if (!$id) {
            $this->Session->setFlash('Midias tamanho inválido.');
            $this->redirect(array('action' => 'index'));
        }
        $this->set('midiasTamanho', $this->MidiasTamanho->read(null, $id));
    }

    public function admin_add() {
        if (!empty($this->request->data)) {
            $this->MidiasTamanho->create();
            if ($this->MidiasTamanho->save($this->request->data)) {
                $this->Session->setFlash('O midias tamanho foi salvo.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('O midias tamanho não pode ser salvo. Por favor, tente novamente.');
            }
        }
    }

    public function admin_copy($id = null) {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash('Midias tamanho inválido');
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            $this->request->data['MidiasTamanho']['id'] = null;
            if ($this->MidiasTamanho->save($this->request->data)) {
                $this->Session->setFlash('O midias tamanho foi salvo.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('O midias tamanho não pode ser salvo. Por favor, tente novamente.');
            }
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->MidiasTamanho->read(null, $id);
        }
    }

    public function admin_edit($id = null) {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash('Midias tamanho inválido.');
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            if ($this->MidiasTamanho->save($this->request->data)) {
                $this->Session->setFlash('O midias tamanho foi salvo.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('O midias tamanho não pode ser salvo. Por favor, tente novamente.');
            }
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->MidiasTamanho->read(null, $id);
        }
    }

    public function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash('Midias tamanho inválido');
            $this->redirect(array('action' => 'index'));
        }
        if ($this->MidiasTamanho->delete($id)) {
            $this->Session->setFlash('Midias tamanho excluído.');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Midias tamanho não pode ser excluído.');
        $this->redirect(array('action' => 'index'));
    }

}

?>