<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

	/**
	 * This controller does not use a model
	 *
	 * @var array
	 */
	public $uses = array();

	/**
	 * Displays a view
	 *
	 * @return void
	 * @throws ForbiddenException When a directory traversal attempt.
	 * @throws NotFoundException When the view file could not be found
	 *   or MissingViewException in debug mode.
	 */

	public function admin_home()
	{
	}

	public function display()
	{
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		if (in_array('..', $path, true) || in_array('.', $path, true)) {
			throw new ForbiddenException();
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}

		$this->loadModel('Noticia');
		$this->Noticia->recursive = 1;
		$cond = '';
		$cond['Noticia.publicar'] = true;
		$cond['Noticia.noticia'] = true;
		$cond['Noticia.created <='] = date('Y-m-d H:i:s');

		$listaNoticias = array();
		for ($i = 1; $i <= 4; $i++) {
			$listaNoticias[$i] = $this->Noticia->find('first', array(
				'conditions' => array(
					'Noticia.posicao' => $i, 'Noticia.publicar' => true, 'Noticia.noticia' => true,
					'Noticia.data_inicial <=' => date('Y-m-d H:i:s'),
					'Noticia.data_final >=' => date('Y-m-d H:i:s'),
					'Noticia.created <=' => date('Y-m-d H:i:s'),
				),
				'fields' => array('Noticia.id', 'Noticia.titulo', 'Noticia.texto_resumo', 'Noticia.imagem_grande_id', 'Noticia.posicao', 'Noticia.created', 'Noticia.slug', 'ImagemGrande.id', 'ImagemGrande.pasta', 'ImagemGrande.arquivo', 'ImagemGrande.created'),
				'order' => array('Noticia.posicao' => 'ASC', 'Noticia.created' => 'DESC', 'Noticia.id' => 'DESC')
			));
		}
		$ids = array();
		foreach ($listaNoticias as $item) {
			if (!empty($item)) {
				$ids[] = $item['Noticia']['id'];
			}
		}
		if (!empty($ids)) :
			$cond['NOT'] = array('Noticia.id' => $ids);
		endif;

		$listaGeral = $this->Noticia->find('all', array(
			'conditions' => $cond,
			'order' => array('Noticia.posicao' => 'ASC', 'Noticia.created' => 'DESC'),
			'fields' => array('Noticia.id', 'Noticia.titulo', 'Noticia.texto_resumo', 'Noticia.imagem_grande_id', 'Noticia.posicao', 'Noticia.created', 'Noticia.slug', 'ImagemGrande.id', 'ImagemGrande.pasta', 'ImagemGrande.arquivo', 'ImagemGrande.created'),
			'limit' => 4
		));

		foreach ($listaNoticias as $key => $item) {
			if (empty($item)) {
				$listaNoticias[$key] = array_shift($listaGeral);
			}
		}

		$ultimas = $this->Noticia->find('all', array(
			'conditions' => $cond,
			'order' => array('Noticia.created' => 'DESC'),
			'fields' => array('Noticia.id', 'Noticia.titulo', 'Noticia.texto_resumo', 'Noticia.posicao', 'Noticia.created', 'Noticia.slug'),
			'limit' => 10
		));
		$this->set('noticias', $listaNoticias);
		$this->set('ultimasNoticias', $ultimas);

		$this->LoadModel('Banner');
		$condBanner['Banner.created <='] = date('Y-m-d H:i:s');
		$condBanner['Banner.publicar'] = true;

		$listaBanner = $this->Banner->find('all', array(
			'conditions' => array(
				'Banner.data_inicial <=' => date('Y-m-d H:i:s'),
				'Banner.data_final >=' => date('Y-m-d H:i:s'),
				'Banner.created <=' => date('Y-m-d H:i:s'),
				'Banner.publicar' => true
			),
			'order' => array('Banner.created' => 'DESC', 'Banner.id' => 'DESC'), 'limit' => 7
		));


		for ($i = 1; $i <= 7; $i++) {
			if (!empty($listaBanner[$i])) {
				$listaBanner[$i] = $listaBanner[$i];
			} else {
				$listaBanner[$i] = '';
			}
		}


		$ids = array();
		foreach ($listaBanner as $item) {
			if (!empty($item)) {
				$ids[] = $item['Banner']['id'];
			}
		}

		if (!empty($ids)) :
			$condBanner['NOT'] = array('Banner.id' => $ids);
		endif;

		$listaGeral = $this->Banner->find('all', array(
			'conditions' => $condBanner,
			'order' => array('Banner.created' => 'DESC'),
			'limit' => 7
		));

		foreach ($listaBanner as $key => $item) {
			if (empty($item)) {
				$listaBanner[$key] = array_shift($listaGeral);
			}
		}
		$this->set('banners', $listaBanner);

		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
}