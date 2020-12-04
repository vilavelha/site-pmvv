<?php

App::uses('AppController', 'Controller');

/**
 * Orgaos Controller
 *
 * @property Orgao $Orgao
 */
class NoticiasController extends AppController
{

	public $components = array('RequestHandler');

	public function admin_edit($id = null)
	{
		if (!$this->Noticia->exists($id)) {
			throw new NotFoundException(__('Notícia Inválida.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Noticia->save($this->request->data)) {
				$this->Noticia->updateAll(array('Noticia.editor_id' => "'{$this->Session->read('Auth.User.id')}'"), array('Noticia.id' => $this->Noticia->id));
				$this->request->data['Noticia']['slug'] = strtolower(Inflector::slug($this->request->data['Noticia']['titulo'] . '-' . $this->Noticia->id, '-'));
				$this->Noticia->updateAll(array('Noticia.slug' => "'{$this->request->data['Noticia']['slug']}'"), array('Noticia.id' => $this->Noticia->id));
				if ($this->request->data['Noticia']['banner']) {
					$this->loadModel('Banner');
					$this->request->data['Noticia']['slug'] = strtolower(Inflector::slug($this->request->data['Noticia']['titulo'] . '-' . $this->Noticia->id, '-'));
					$this->request->data['Banner']['titulo'] = $this->request->data['Noticia']['titulo'];
					$this->request->data['Banner']['descricao'] = $this->request->data['Noticia']['texto_resumo'];
					$this->request->data['Banner']['created'] = $this->request->data['Noticia']['created'];
					$this->request->data['Banner']['data_inicial'] = $this->request->data['Noticia']['data_inicial'];
					$this->request->data['Banner']['data_final'] = $this->request->data['Noticia']['data_final'];
					$noticia = $this->Noticia->find('first', array('conditions' => array('Noticia.id' => $this->Noticia->id)));
					$y = date_format(new DateTime($noticia['Noticia']['created']), 'Y');
					$m = date_format(new DateTime($noticia['Noticia']['created']), 'm');
					$this->request->data['Banner']['link'] = "http://{$_SERVER['SERVER_NAME']}/noticias/{$y}/{$m}/{$this->request->data['Noticia']['slug']}";
					$this->request->data['Banner']['publicar'] = $this->request->data['Noticia']['publicar'];
					$this->request->data['Banner']['imagem_id'] = $this->request->data['Noticia']['imagem_grande_id'];
					$this->Banner->save($this->request->data['Banner']);
				}
				$this->Session->setFlash(__('A notícia foi salva com sucesso.'));
				$this->redirect(array('action' => 'index'));
			} else {
			}
		} else {
			$options = array('conditions' => array('Noticia.' . $this->Noticia->primaryKey => $id));
			$this->request->data = $this->Noticia->find('first', $options);
		}
		if (empty($this->request->data)) {
			$options = array('conditions' => array('Noticia.' . $this->Noticia->primaryKey => $id));
			$this->request->data = $this->Noticia->find('first', $options);
		}
		$imagemGrandes = $this->Noticia->ImagemGrande->find('superlist', array(
			'conditions' => array('ImagemGrande.id' => $this->request->data['Noticia']['imagem_grande_id']),
			'fields' => array('ImagemGrande.id', 'ImagemGrande.pasta', 'ImagemGrande.arquivo'),
			'separator' => DS
		));
		$galerias = $this->Noticia->Galeria->find('list', array('fields' => 'nome'));
		$orgaos = $this->Noticia->Orgao->find('list', array('fields' => 'nome'));
		$this->set(compact('imagemGrandes', 'galerias', 'orgaos'));
	}

	public function admin_view($id = null)
	{
		if (!$this->Noticia->exists($id)) {
			throw new NotFoundException(__('Notícia Inválida.'));
		}
		$options = array('conditions' => array('Noticia.' . $this->Noticia->primaryKey => $id));
		$this->set('noticia', $this->Noticia->find('first', $options));
	}

	public function admin_add()
	{
		if ($this->request->is('post')) {
			$this->Noticia->create();
			$this->request->data['Noticia']['usuario_id'] = $this->Session->read('Auth.User.id');
			$this->request->data['Noticia']['editor_id'] = $this->Session->read('Auth.User.id');
			if ($this->Noticia->save($this->request->data)) {
				$this->Session->setFlash(__('A notícia foi salva com sucesso.'));
				$this->request->data['Noticia']['slug'] = strtolower(Inflector::slug($this->request->data['Noticia']['titulo'] . '-' . $this->Noticia->id, '-'));
				$this->Noticia->updateAll(array('Noticia.slug' => "'{$this->request->data['Noticia']['slug']}'"), array('Noticia.id' => $this->Noticia->id));
				$this->Noticia->updateAll(array('Noticia.usuario_id' => "'{$this->Session->read('Auth.User.id')}'"), array('Noticia.id' => $this->Noticia->id));
				$this->Noticia->updateAll(array('Noticia.editor_id' => "'{$this->Session->read('Auth.User.id')}'"), array('Noticia.id' => $this->Noticia->id));
				if ($this->request->data['Noticia']['banner']) {
					$this->loadModel('Banner');
					$this->request->data['Banner']['titulo'] = $this->request->data['Noticia']['titulo'];
					$this->request->data['Banner']['descricao'] = $this->request->data['Noticia']['texto_resumo'];
					$this->request->data['Banner']['created'] = $this->request->data['Noticia']['created'];
					$this->request->data['Banner']['data_inicial'] = $this->request->data['Noticia']['data_inicial'];
					$this->request->data['Banner']['data_final'] = $this->request->data['Noticia']['data_final'];
					$noticia = $this->Noticia->find('first', array('conditions' => array('Noticia.id' => $this->Noticia->id)));
					$y = date_format(new DateTime($noticia['Noticia']['created']), 'Y');
					$m = date_format(new DateTime($noticia['Noticia']['created']), 'm');
					$this->request->data['Banner']['link'] = "http://{$_SERVER['SERVER_NAME']}/noticias/{$y}/{$m}/{$this->request->data['Noticia']['slug']}";
					$this->request->data['Banner']['publicar'] = $this->request->data['Noticia']['publicar'];
					$this->request->data['Banner']['imagem_id'] = $this->request->data['Noticia']['imagem_grande_id'];
					$this->Banner->save($this->request->data['Banner']);
				}
				$this->Session->setFlash(__('A notícia foi salva com sucesso.'));
				$this->redirect(array('action' => 'index'));
			} else {
			}
		}
		//$imagemMiniaturas = $this->Noticia->ImagemMiniatura->find('list', array('fields' => 'nome'));
		//$imagemGrandes = $this->Noticia->ImagemGrande->find('list', array('fields' => 'nome'));
		$galerias = $this->Noticia->Galeria->find('list', array('fields' => 'nome'));
		$orgaos = $this->Noticia->Orgao->find('list', array('fields' => 'nome'));
		$this->set(compact('galerias', 'orgaos'));
		//$this->set(compact('imagemMiniaturas', 'imagemGrandes', 'galerias', 'orgaos'));
	}

	public function admin_index()
	{
		$this->Noticia->recursive = 0;

		//        $this->paginate = array(
		//            'Noticia' => array(
		//                'order' => array('Noticia.created' => 'DESC', 'Noticia.id' => 'DESC'),
		//                'conditions' => $cond,
		//        ));
		//Busca Administrativa
		$cond = '';
		$BuscaAdmNoticias = $this->Session->read('BuscaAdm.Not');
		if (isset($this->data['Noticia']['valor'])) {
			$BuscaAdmNoticiasCat['campo'] = $this->data['Noticia']['campo'];
			$BuscaAdmNoticiasCat['valor'] = $this->data['Noticia']['valor'];
			$BuscaAdmNoticiasCat['publicar'] = $this->request->data['Noticia']['publicar'];
			$this->Session->write('BuscaAdm.Not', $BuscaAdmNoticiasCat);
		} elseif (!empty($BuscaAdmNoticias)) {
			$BuscaAdmNoticiasCat = $BuscaAdmNoticias;
		} elseif (!isset($this->passedArgs['page'])) {
			if ($this->Session->check('BuscaAdm.Not')) {
				$this->Session->delete('BuscaAdm.Not');
			}
		}
		if (isset($BuscaAdmNoticiasCat)) {
			$cond = array('or' => array(
				"Noticia.{$BuscaAdmNoticiasCat['campo']} LIKE" => "%{$BuscaAdmNoticiasCat['valor']}%"
			));
			$cond['Noticia.publicar'] = $BuscaAdmNoticiasCat['publicar'];
			$this->Session->write('BuscaAdm.Not', $BuscaAdmNoticiasCat);
		}

		if (isset($this->request->params['named']['limpar'])) {
			$this->Session->delete('BuscaAdm.Not');
			$this->redirect(array('action' => 'index'));
		}


		$this->paginate = array(
			'Noticia' => array(
				'limit' => 5,
				'order' => array(
					'Noticia.created' => 'DESC',
					'Noticia.id' => 'DESC'
				),
				'conditions' => $cond,
			)
		);

		$this->set('noticias', $this->paginate());
		$this->set(compact('BuscaAdmNoticiasCat'));
	}


	public function view()
	{

		if (!isset($this->params['slug'])) {
			throw new NotFoundException(__('Notícia Inválida.'));
		}
		$this->Noticia->recursive = 0;
		$cond = '';
		$cond['Noticia.publicar'] = true;
		$cond['Noticia.noticia'] = true;
		$cond['Noticia.created <='] = date('Y-m-d H:i:s');

		$noticia = $this->Noticia->find('first', array(
			'conditions' =>
			array(
				'Noticia.slug' => $this->params['slug'], $cond
			),
			'fields' => array(
				'Noticia.id',
				'Noticia.redator',
				'Noticia.fotografo',
				'Noticia.titulo',
				'Noticia.texto',
				'Noticia.texto_resumo',
				'Noticia.created',
				'ImagemGrande.id',
				'ImagemGrande.pasta',
				'ImagemGrande.arquivo',
				'ImagemGrande.autor',
				'ImagemGrande.created',
				'ImagemMiniatura.id',
				'ImagemMiniatura.pasta',
				'ImagemMiniatura.created',
				'ImagemMiniatura.arquivo',
				'ImagemMiniatura.nome'
			),
			'recursive' => 1
		));

		if (empty($noticia)) {
			throw new NotFoundException(__('Notícia Inválida.'));
		}

		$title_for_layout = $noticia['Noticia']['titulo'];
		$this->set(compact('title_for_layout', 'noticia'));
	}
	public function index()
	{
		$this->Noticia->recursive = 1;
		$cond = '';
		$cond['Noticia.publicar'] = true;
		$cond['Noticia.noticia'] = true;
		$cond['Noticia.created <='] = date('Y-m-d H:i:s');

		if ((isset($this->params['ano'])) && (isset($this->params['mes']))) {
			if ($this->params['ano'] <= date('Y')) {
				if ($this->params['mes'] <= 12) {
					if ($this->params['ano'] == date('Y')) {
						if ($this->params['mes'] < date('m')) {
							if (($this->params['ano'] == date('Y')) && ($this->params['mes'] == date('m'))) {
								$atual = date('m-d H:i:s');
								$cond['Noticia.created >='] = "{$this->params['ano']}-{$this->params['mes']}-01 00:00:00";
								$cond['Noticia.created <='] = "{$this->params['ano']}-$atual";
							} else {
								$cond['Noticia.created >='] = "{$this->params['ano']}-{$this->params['mes']}-01 00:00:00";
								$cond['Noticia.created <='] = "{$this->params['ano']}-{$this->params['mes']}-31 00:00:00";
							}
						} else {
							throw new NotFoundException(__('Mês inválido para o filtro.'));
						}
					} else {
						if (($this->params['ano'] == date('Y')) && ($this->params['mes'] == date('m'))) {
							$atual = date('m-d H:i:s');
							$cond['Noticia.created >='] = "{$this->params['ano']}-{$this->params['mes']}-01 00:00:00";
							$cond['Noticia.created <='] = "{$this->params['ano']}-$atual";
						} else {
							$cond['Noticia.created >='] = "{$this->params['ano']}-{$this->params['mes']}-01 00:00:00";
							$cond['Noticia.created <='] = "{$this->params['ano']}-{$this->params['mes']}-31 00:00:00";
						}
					}
				} else {
					throw new NotFoundException(__('Mês inválido para o filtro.'));
				}
			} else {
				throw new NotFoundException(__('Ano inválido para o filtro.'));
			}
		}
		$this->paginate = array(
			'Noticia' => array(
				'conditions' => $cond,
				'order' => array('Noticia.created' => 'DESC', 'Noticia.id' => 'DESC'),
				'fields' => array('Noticia.id', 'Noticia.titulo', 'Noticia.texto_resumo', 'Noticia.imagem_grande_id', 'Noticia.posicao', 'Noticia.created', 'Noticia.slug', 'ImagemGrande.id', 'ImagemGrande.pasta', 'ImagemGrande.arquivo', 'ImagemGrande.created', 'ImagemMiniatura.id', 'ImagemMiniatura.pasta', 'ImagemMiniatura.created', 'ImagemMiniatura.arquivo', 'ImagemMiniatura.nome'),
				'limit' => 9,
			)
		);
		$this->set('noticias', $this->paginate('Noticia'));
	}


	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null)
	{
		$this->Noticia->id = $id;
		if (!$this->Noticia->exists()) {
			throw new NotFoundException(__('Notícia inválida.'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Noticia->delete()) {
			$this->Session->setFlash(__('Notícia excluída.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('A notícia não foi excluída.'));
		$this->redirect(array('action' => 'index'));
	}
}