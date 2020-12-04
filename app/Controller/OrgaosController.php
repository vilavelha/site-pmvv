<?php

App::uses('AppController', 'Controller');

/**
* Orgaos Controller
*
* @property Orgao $Orgao
*/
class OrgaosController extends AppController {

	public $components = array('RequestHandler', 'Midias.Upload');

	public function carregaSecretarias() {
		$this->Orgao->recursive = -1;
		$conditions = array('Orgao.tipo_id' => '3');
		return $this->Orgao->find('all', array('conditions' => $conditions, 'order' => 'Orgao.nome ASC', 'fields' => array('Orgao.id', 'Orgao.tipo_id', 'Orgao.nome', 'Orgao.slug')));
	}

	public function admin_index(){
		$this->Orgao->recursive = 0;
		$this->paginate = array(
			'Orgao' => array(
				'limit' => 15,
				'order' => array(
				'Orgao.created' => 'DESC',
				'Orgao.id' => 'DESC'
				)
			)
		);
        $this->set('orgaos', $this->paginate('Orgao'));
	}

	public function admin_view($id = null){
	 	if (!$this->Orgao->exists($id)) {
            throw new NotFoundException(__('Secretaria Inválida.'));
        }
        $options = array('conditions' => array('Orgao.' . $this->Orgao->primaryKey => $id));
        $this->set('orgao', $this->Orgao->find('first', $options));
	}

	public function admin_add(){
		if ($this->request->is('post')) {
			if ($this->request->data['Orgao']['foto_responsavel']['error'] != 4) {
                $arquivo = $this->request->data['Orgao']['foto_responsavel'];
                $this->request->data['Orgao']['foto_responsavel'] = '12';
                $errorfoto = true;
            } else {
                $this->request->data['Orgao']['foto_responsavel'] = '';
                $errorfoto = false;
            }

            $dsOrgao = $this->Orgao->getDataSource();
			$dsOrgao->begin();
			$this->request->data['Orgao']['mapa'] = ' ';
			$this->request->data['Orgao']['slug'] = strtolower(Inflector::slug($this->request->data['Orgao']['nome'], '-'));
			if ($this->Orgao->save($this->request->data)) {
                $this->Orgao->updateAll(array('Orgao.slug' => "'{$this->request->data['Orgao']['slug']}'"), array('Orgao.id' => $this->Orgao->id));
                if ($errorfoto) {
                    $this->Orgao->updateAll(array('Orgao.foto_responsavel' => "'{$this->Orgao->id}.{$this->Upload->getExtensaoArquivo($arquivo['name'])}'"), array('Orgao.id' => $this->Orgao->id));
                    $parametros = array(
                        'arquivo' => $arquivo,
                        'nome' => "{$this->Orgao->id}.{$this->Upload->getExtensaoArquivo($arquivo['name'])}",
                        'pasta' => 'midia|secretarias',
                    );
                    $this->Upload->uploadArquivo($parametros);
                }

                $dsCargo = $this->Orgao->Cargo->getDataSource();
            	if(!empty($this->request->data['Cargo'])):

            	endif;
				foreach($this->request->data['Cargo'] as $cargo):
					$dsCargo->begin();
	        		$cargo['orgao_id'] = $this->Orgao->id;
					$this->Orgao->Cargo->create();
					if($this->Orgao->Cargo->save($cargo)){
						$dsCargo->commit();
					}else{
						$dsCargo->rollback();
						$dsOrgao->rollback();
						$this->Flash->error(__('Cargo não cadastrado. Tente novamente.'));
						//return $this->redirect(array('action' => 'index', $this->request->data['Despesa']['escola_id']));
						return $this->redirect($this->referer());
					}
	        	endforeach;
        	 	$dsOrgao->commit();

                $this->Session->setFlash(__('Secretaria foi salva.'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Houve um erro ao salvar a secretaria, tente novamente.'));
            }
		}
		$orgaos = $this->Orgao->find('list', array('fields' => 'nome'));
        $tipos = $this->Orgao->Tipo->find('list', array('fields' => 'nome'));
        $this->set(compact('orgaos', 'tipos'));
	}

	public function admin_edit($id = null){
		//Configure::write('debug', 2);
		$this->Orgao->recursive = 0;
        if (!$this->Orgao->exists($id)) {
            throw new NotFoundException(__('Secretaria Inválida.'));
        }
        if ($this->request->is(array('post', 'put'))) {
        	
        	$dsOrgao = $this->Orgao->getDataSource();
			$dsOrgao->begin();

			$dsCargo = $this->Orgao->Cargo->getDataSource();
			$dsCargo->begin();

			if ($this->request->data['Orgao']['foto_responsavel']['error'] != 4) {
                $arquivo = $this->request->data['Orgao']['foto_responsavel'];
                $this->request->data['Orgao']['foto_responsavel'] = $this->request->data['Orgao']['id'] . '.' . $this->Upload->getExtensaoArquivo($arquivo['name']);
                $errorfoto = true;
            } else {
                $options = array('conditions' => array('Orgao.' . $this->Orgao->primaryKey => $id));
                $foto = $this->Orgao->find('first', $options);
                $this->request->data['Orgao']['foto_responsavel'] = $foto['Orgao']['foto_responsavel'];
                $errorfoto = false;
            }

            if ($this->Orgao->save($this->request->data)) {

            	$this->request->data['Orgao']['slug'] = strtolower(Inflector::slug($this->request->data['Orgao']['nome'], '-'));
                $this->Orgao->updateAll(array('Orgao.slug' => "'{$this->request->data['Orgao']['slug']}'"), array('Orgao.id' => $this->request->data['Orgao']['id']));
                if ($errorfoto) {
                    $parametros = array(
                        'arquivo' => $arquivo,
                        'nome' => $this->request->data['Orgao']['foto_responsavel'],
                        'pasta' => 'midia|secretarias',
                    );
                    $this->Upload->uploadArquivo($parametros);
                }

				foreach($this->request->data['Cargo'] as $key => $cargo):

					if(!empty($cargo['Cargo']['id'])){
						$busca = $this->Orgao->Cargo->find('first', array('conditions' => array('Cargo.id' => $cargo['Cargo']['id'])));
						$cargo['Cargo']['id'] = $busca['Cargo']['id'];
					}
	        		$cargo['Cargo']['cargo'] = $this->request->data['Cargo'][$key]['Cargo']['cargo'];
					$cargo['Cargo']['nome'] = $this->request->data['Cargo'][$key]['Cargo']['nome'];
	        		$cargo['Cargo']['email'] = $this->request->data['Cargo'][$key]['Cargo']['email'];
	        		$cargo['Cargo']['telefone'] = $this->request->data['Cargo'][$key]['Cargo']['telefone'];
	        		$cargo['Cargo']['orgao_id'] = $this->request->data['Orgao']['id'];
					
					if(empty($busca)){
		        		//die();
		        		$this->Orgao->Cargo->create();
						
					}

					if($this->Orgao->Cargo->save($cargo)){
						$dsCargo->commit();
					}else{
						$dsCargo->rollback();
						$dsOrgao->rollback();
						$this->Flash->error(__('Cargo não cadastrado. Tente novamente.'));
						//return $this->redirect(array('action' => 'index', $this->request->data['Despesa']['escola_id']));
						return $this->redirect($this->referer());
					}
	        	endforeach;
        	 	$dsOrgao->commit();

                $this->Session->setFlash(__('Secretaria foi salva.'));
                $this->redirect(array('action' => 'index'));
            } else {
				$dsOrgao->rollback();
                $this->Session->setFlash(__('Houve um erro ao salvar a secretaria, tente novamente.'));
            }
        } else {
            $options = array('conditions' => array('Orgao.' . $this->Orgao->primaryKey => $id));
            $this->request->data = $this->Orgao->find('first', $options);
            $options = array('conditions' => array('Cargo.orgao_id' => $id), 'recursive' => -1);
            $this->request->data['Cargo'] = $this->Orgao->Cargo->find('all', $options);
        }
        $orgaos = $this->Orgao->find('list', array('fields' => 'nome'));
        $tipos = $this->Orgao->Tipo->find('list', array('fields' => 'nome'));
        $this->set(compact('orgaos', 'tipos'));
	}

	public function admin_removecargo($id = null) {
		$this->request->allowMethod('post', 'delete');
		$this->autoRender = false;		
		$this->Orgao->Cargo->id = $id;

		if (!$this->Orgao->Cargo->exists()) {
			//throw new NotFoundException(__('Despesa inválida'));
		}
		if ($this->Orgao->Cargo->delete());
		//return $this->redirect(array('action' => 'index', $despesa['Despesa']['escola_id']));
	}

	public function view(){

		if (!isset($this->params['slug'])) {
			throw new NotFoundException(__('Secretaria Inválida.'));
		}


		$this->Orgao->recursive = 0;
		$orgao = $this->Orgao->find('first', array('conditions' => array('Orgao.slug' => $this->params['slug'])));

		if (empty($orgao)) {
			throw new NotFoundException(__('Secretaria Inválida.'));
		}
		$title_for_layout = $orgao['Orgao']['nome'];
		$this->set(compact('orgao'));

		$cond['Noticia.publicar'] = true;
		$cond['Noticia.created <='] = date('Y-m-d H:i:s');

		if (!isset($this->params['named']['page'])) {
			$page = '';
		} else {
			$page = $this->params['named']['page'];
		}

		$this->paginate = array(
			'Noticia' => array(
				'conditions' => $cond,
				'order' => array('Noticia.created' => 'DESC', 'Noticia.id' => 'DESC'),
				'page' => $page,
				'limit' => 9,
				'fields' => array('Noticia.id', 'Noticia.slug', 'Noticia.titulo', 'Noticia.texto_resumo', 'Noticia.created', 'ImagemGrande.id', 'ImagemGrande.pasta', 'ImagemGrande.created', 'ImagemGrande.arquivo', 'ImagemGrande.nome', 'ImagemMiniatura.id', 'ImagemMiniatura.pasta', 'ImagemMiniatura.created', 'ImagemMiniatura.arquivo', 'ImagemMiniatura.nome'),
				'joins' => array(
					array(
						'table' => 'noticias_orgaos'
						, 'type' => 'INNER'
						, 'alias' => 'NoticiaOrgao'
						, 'conditions' => array('Noticia.id = NoticiaOrgao.noticia_id', "NoticiaOrgao.orgao_id = {$orgao['Orgao']['id']}")
						)
					)
				)
			);
		$this->set('noticias', $this->paginate('Noticia')); // set the view variable

		$cond_destaque['Destaque.publicar'] = true;
		$cond_destaque['Destaque.capa'] = true;
		$cond_destaque['Destaque.orgao_id'] = $orgao['Orgao']['id'];
		$destaques = $this->Orgao->Destaque->find('all', array('conditions' => array($cond_destaque), 'limit' => 7, 'recursive' => -1));
		$this->set('destaques', $destaques); // set the view variable
	}    

	public function noticias($slug){

		$this->Orgao->recursive = 0;
		$orgao = $this->Orgao->find('first', array('conditions' => array('Orgao.slug' => $slug)));
		if (empty($orgao)) {
			throw new NotFoundException(__('Secretaria Inválida.'));
		}
		$this->set(compact('orgao'));

		$cond['Noticia.publicar'] = true;
		$cond['Noticia.created <='] = date('Y-m-d H:i:s');

		if (!isset($this->params['named']['page'])) {
			$page = '';
		} else {
			$page = $this->params['named']['page'];
		}

		$this->paginate = array(
			'Noticia' => array(
				'conditions' => $cond,
				'order' => array('Noticia.created' => 'DESC', 'Noticia.id' => 'DESC'),
				'page' => $page,
				'limit' => 9,
				'fields' => array('Noticia.id', 'Noticia.slug', 'Noticia.titulo', 'Noticia.texto_resumo', 'Noticia.created', 'ImagemGrande.id', 'ImagemGrande.pasta', 'ImagemGrande.created', 'ImagemGrande.arquivo', 'ImagemGrande.nome', 'ImagemMiniatura.id', 'ImagemMiniatura.pasta', 'ImagemMiniatura.created', 'ImagemMiniatura.arquivo', 'ImagemMiniatura.nome'),
				'joins' => array(
					array(
						'table' => 'noticias_orgaos'
						, 'type' => 'INNER'
						, 'alias' => 'NoticiaOrgao'
						, 'conditions' => array(
							'Noticia.id = NoticiaOrgao.noticia_id',
							"NoticiaOrgao.orgao_id = {$orgao['Orgao']['id']}"
							)
						)
					)
				)
			);

		$this->set('noticias', $this->paginate('Noticia')); // set the view variable
	}

	public function licitacoes($slug){

		$this->Orgao->recursive = 0;
		$orgao = $this->Orgao->find('first', array('conditions' => array('Orgao.slug' => $slug)));
		if (empty($orgao)) {
			throw new NotFoundException(__('Secretaria Inválida.'));
		}
		$this->set(compact('orgao'));



		$cond['Licitacao.deletado'] = false;
		$cond['Licitacao.requisitante_id'] = $orgao['Orgao']['id'];

		if (!isset($this->params['named']['page'])) {
			$page = '';
		} else {
			$page = $this->params['named']['page'];
		}

		$this->paginate = array(
			'Licitacao' => array(
				'conditions' => $cond,
				'order' => array('Licitacao.created' => 'DESC', 'Licitacao.id' => 'DESC'),
				'fields' => array('Licitacao.id', 'Licitacao.objeto', 'Licitacao.recebimento', 'Licitacao.fim_recebimento', 'Licitacao.inicio_acolhimento', 'Licitacao.inicio_disputa', 'Licitacao.sessao_publica', 'Licitacao.resultado', 'Licitacao.modalidade', 'Licitacao.numero', 'Requisitante.nome'),
				'limit' => 10,
				'recursive' => 0
			)
		);

		$this->set('licitacoes', $this->paginate('Licitacao')); // set the view variable

	}

	public function about($slug){
		$this->Orgao->recursive = 0;
		$orgao = $this->Orgao->find('first', array('conditions' => array('Orgao.slug' => $slug)));
		if (empty($orgao)) {
			throw new NotFoundException(__('Secretaria Inválida.'));
		}
		$cargos = $this->Orgao->Cargo->find('all', array('conditions' => array('Cargo.orgao_id' => $orgao['Orgao']['id']), 'recursive' => -1));
		$this->set(compact('orgao','cargos'));
	}

	public function setores($slug){
		$this->Orgao->recursive = 0;
		$orgao = $this->Orgao->find('first', array('conditions' => array('Orgao.slug' => $slug)));
		if (empty($orgao)) {
			throw new NotFoundException(__('Secretaria Inválida.'));
		}
		$coordenadorias = $this->Orgao->Coordenadoria->find('all', array('conditions' => array('Coordenadoria.orgao_id' => $orgao['Orgao']['id'])));
		$this->set(compact('orgao', 'coordenadorias'));
	}

	public function servicos($slug){
		$this->Orgao->recursive = 0;
		$orgao = $this->Orgao->find('first', array('conditions' => array('Orgao.slug' => $slug)));
		if (empty($orgao)) {
			throw new NotFoundException(__('Secretaria Inválida.'));
		}
		$servicos = $this->Orgao->Servico->find('all', array('conditions' => array('Servico.orgao_id' => $orgao['Orgao']['id'], 'Servico.publicar' => true), 'order' => 'Servico.nome ASC'));
		$this->set(compact('orgao', 'servicos'));
	}

	public function paginas($slug){
		$this->Orgao->recursive = 0;
		$orgao = $this->Orgao->find('first', array('conditions' => array('Orgao.slug' => $slug)));
		if (empty($orgao)) {
			throw new NotFoundException(__('Secretaria Inválida.'));
		}
		$paginas = $this->Orgao->Pagina->find('all', array('conditions' => array('Pagina.orgao_id' => $orgao['Orgao']['id'], 'Pagina.tipo' => '1'), 'order' => 'Pagina.nome ASC'));
		$this->set(compact('orgao', 'paginas'));
	}

	public function planejamentos($slug){
		$this->Orgao->recursive = 0;
		$orgao = $this->Orgao->find('first', array('conditions' => array('Orgao.slug' => $slug)));
		if (empty($orgao)) {
			throw new NotFoundException(__('Secretaria Inválida.'));
		}
		$planejamentos = $this->Orgao->Pagina->find('all', array('conditions' => array('Pagina.orgao_id' => $orgao['Orgao']['id'], 'Pagina.tipo' => '3')));
		$this->set(compact('orgao', 'planejamentos'));
	}

	public function destaques($slug){
		$this->Orgao->recursive = 0;
		$orgao = $this->Orgao->find('first', array('conditions' => array('Orgao.slug' => $slug)));
		if (empty($orgao)) {
			throw new NotFoundException(__('Secretaria Inválida.'));
		}
		

		$cond['Destaque.publicar'] = true;
		$cond['Destaque.orgao_id'] = $orgao['Orgao']['id'];

		if (!isset($this->params['named']['page'])) {
			$page = '';
		} else {
			$page = $this->params['named']['page'];
		}

		$this->paginate = array(
			'Destaque' => array(
				'conditions' => $cond,
				'order' => array('Destaque.id' => 'DESC'),
				'limit' => 10,
				'recursive' => 0
			)
		);

		$this->set('destaques', $this->paginate('Destaque'));
		$this->set(compact('orgao'));
	}



}
