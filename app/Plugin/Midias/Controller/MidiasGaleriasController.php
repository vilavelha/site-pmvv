<?php

class MidiasGaleriasController extends MidiasAppController {

    public $name = 'MidiasGalerias';
    public $helpers = array('Midias.Format');
    public $components = array('Midias.Utils');

    public function admin_index() {
        $this->MidiasGaleria->recursive = 0;
        $this->set('midiasGalerias', $this->paginate());
    }

    public function admin_view($id = null) {
        if (!$id) {
            $this->Session->setFlash('Galeria inválida.');
            $this->redirect(array('action' => 'index'));
        }
        $this->set('midiasGaleria', $this->MidiasGaleria->read(null, $id));
    }

    public function admin_add() {
        if (!empty($this->request->data)) {
            $this->MidiasGaleria->create();
            if ($this->MidiasGaleria->save($this->request->data)) {
                $this->Session->setFlash('A galeria foi salva.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('A galeria não pode ser salva. Por favor, tente novamente.');
            }
        }
        $this->set(compact('midias'));
    }

    public function admin_copy($id = null) {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash('Galeria inválida.');
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            $this->request->data['MidiasGaleria']['id'] = null;
            if ($this->MidiasGaleria->save($this->request->data)) {
                $this->Session->setFlash('A galeria foi salva.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('A galeria não pode ser salva. Por favor, tente novamente.');
            }
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->MidiasGaleria->read(null, $id);
        }
        $midias = $this->MidiasGaleria->Midia->find('superlist', array(
            'fields' => array('Midia.id', 'Midia.pasta', 'Midia.arquivo'),
            'separator' => DS));
        $this->set(compact('midias'));
    }

    public function admin_edit($id = null) {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash('Galeria inválida.');
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            if ($this->MidiasGaleria->save($this->request->data)) {
                $this->Session->setFlash('A galeria foi salva.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('A midia não pode ser salva. Por favor, tente novamente.');
            }
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->MidiasGaleria->read(null, $id);
        }
        $midias = $this->MidiasGaleria->Midia->find('superlist', array(
            'fields' => array('Midia.id', 'Midia.pasta', 'Midia.arquivo'),
            'separator' => DS));
        $this->set(compact('midias'));
    }

    public function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash('Galeria inválida.');
            $this->redirect(array('action' => 'index'));
        }
        if ($this->MidiasGaleria->delete($id)) {
            $this->Session->setFlash('Galeria excluída.');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('A galeria não pode ser excluída.');
        $this->redirect(array('action' => 'index'));
    }

}

?>