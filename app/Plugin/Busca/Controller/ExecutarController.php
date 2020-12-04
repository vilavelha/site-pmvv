<?php

class ExecutarController extends BuscaAppController {

    public $name = 'Executar';
    public $uses = array();
    public $components = array('Paginator', 'RequestHandler');

    public function busca() {
        $this->autoRender = false;
        if (!empty($this->request->data['Busca']['modelo'])) {
            $modelo = $this->request->data['Busca']['modelo'];
        }
        if (!empty($this->request->data['Busca']['texto'])) {
            $texto = $this->request->data['Busca']['texto'];
        }
        
        $busca = '';

        if (!empty($modelo)) {
            $busca = $modelo;
        }
        if (!empty($texto)) {
            $busca .= $texto;
        }

        $this->redirect(array('controller' => 'busca', 'action' => $busca, 'plugin' => false));
    }

    public function index() {
        $this->set('title_for_layout', 'Busca');
        $count = 0;
        $count2 = array();
        $modelos = Configure::read('Busca.modelos');
        $modelo = '';
        if ((empty($this->request->data)) && (empty($this->params['busca']))) {
            $this->Session->setFlash('Digite algo para a pesquisa');
            //$this->redirect(array('controller' => 'pages', 'action' => 'index', 'plugin' => false));
        } else {
            if (isset($this->params['modelo'])) {
                $this->request->data['Busca']['modelo'] = $this->params['modelo'];
            }
            if (isset($this->params['busca'])) {
                $this->request->data['Busca']['texto'] = $this->params['busca'];
            }
            $links = array();
            $resultados = array();
            $textoTranslate = iconv(iconv_get_encoding($this->request->data['Busca']['texto']), 'UTF-8//TRANSLIT', $this->request->data['Busca']['texto']);
            $palavras = split(' ', $textoTranslate);
            if (isset($this->params['modelo'])) {
                if ($this->request->data['Busca']['modelo'] == 'noticias') {
                    $modelo = 'Noticia';
                } elseif ($this->request->data['Busca']['modelo'] == 'servicos') {
                    $modelo = 'Servicos';
                } elseif ($this->request->data['Busca']['modelo'] == 'paginas') {
                    $modelo = 'Pagina';
                }
                if ($modelo == 'Noticia') {
                    foreach ($palavras as $p) {
                        if ($modelo == "Noticia") {
                            $this->loadModel($modelo);
                            
                            $cond[] = array(
                                'OR' => array(
                                    array("CONTAINS(Noticia.texto, '{$p}')"),
                                    //array('MATCH (Noticia.texto) AGAINST ("' . $p . '")'),
                                    array("{$modelo}.titulo LIKE" => "%{$p}%"),
                                    array("{$modelo}.tags LIKE" => "%{$p}%"),
                                )
                            );

                            $cond['Noticia.publicar'] = true;
                            $cond['Noticia.created <='] = date('Y-m-d H:i:s');
                        }
                    }

//                    $temp = ClassRegistry::init($modelo)->find('all', array(
//                        'order' => array("{$modelo}.id" => 'DESC'),
//                        'conditions' => array($cond, "{$modelo}.publicar" => true),
//                        'fields' => array('DISTINCT Noticia.id', '*', 'ImagemMiniatura.*'),
//                        'joins' => array(
//                            array(
//                                'table' => 'noticias_orgaos'
//                                , 'type' => 'INNER'
//                                , 'alias' => 'NoticiaOrgao'
//                                , 'conditions' => array(
//                                    'Noticia.id = NoticiaOrgao.noticia_id'
//                                )
//                            )
//                        )
//                            )
//                    );

                    if (!isset($this->params['named']['page'])) {
                        $page = '';
                    } else {
                        $page = $this->params['named']['page'];
                    }

                    $this->Paginator->settings = array(
                        "{$modelo}" => array(
                            'limit' => 15,
                            'conditions' => array($cond),
                            'order' => array("{$modelo}.id" => 'DESC'),
                            'page' => $page
                        )
                    );

                    $temp = $this->Paginator->paginate($modelo);
                } else {

                    $cond = array();
                    $this->loadModel("{$modelo}");

                    foreach ($palavras as $p) {
                        $cond[] = array("{$modelo}.{$modelos[$modelo]['campo']} LIKE" => "%{$p}%");
                    }

//                    $temp = ClassRegistry::init($modelo)->find('all', array(
//                        'order' => array("{$modelo}.id" => 'DESC'),
//                        'conditions' => array($cond),
//                            )
//                    );

                    if (!isset($this->params['named']['page'])) {
                        $page = '';
                    } else {
                        $page = $this->params['named']['page'];
                    }

                    $this->Paginator->settings = array(
                        "{$modelo}" => array(
                            'limit' => 15,
                            'conditions' => array($cond, "{$modelo}.publicar" => true),
                            'order' => array("{$modelo}.id" => 'DESC'),
                            'page' => $page
                        )
                    );

                    $temp = $this->Paginator->paginate($modelo);
                }

                foreach ($modelos as $chave => $m) {
                    $cond = array();

                    foreach ($palavras as $p) {
                        if ($chave == "Noticia") {

                            $cond[] = array(
                                'OR' => array(
                                    array("CONTAINS(Noticia.texto, '{$p}')"),
                                    //array('MATCH (Noticia.texto) AGAINST ("' . $p . '")'),
                                    array("{$chave}.titulo LIKE" => "%{$p}%"),
                                    array("{$chave}.tags LIKE" => "%{$p}%"),
                                )
                            );

                            $cond['Noticia.publicar'] = true;
                            $cond['Noticia.created <='] = date('Y-m-d H:i:s');
                        } else {
                            $cond[] = array("{$chave}.{$m['campo']} LIKE" => "%{$p}%");
                        }
                    }

                    ClassRegistry::init($chave)->recursive = 1;
                    $temp2 = ClassRegistry::init($chave)->find('count', array(
                        'order' => array("id" => 'DESC'),
                        'conditions' => array($cond, "{$chave}.publicar" => true),
                    ));

                    $count2[$chave] = $temp2;
                }

                if (!empty($temp)) {
                    $count+=count($temp);
                    //$resultados[] = $temp;
                    $resultados[$modelo] = $temp;
                    $temp = '';
                }

                $this->set('modelo', $modelo);
            } else {
                $modelos = Configure::read('Busca.modelos');
                foreach ($modelos as $chave => $m) {
                    $cond = array();
                    $links[$chave] = $m['mostrarLink'];
                    ClassRegistry::init($chave)->recursive = 1;
                    //if (!is_array($m['campo'])) {
                    foreach ($palavras as $p) {
                        if ($chave == "Noticia") {
                            $cond[] = array(
                                'OR' => array(
                                    array("CONTAINS(Noticia.texto, '{$p}')"),
                                    //array('MATCH (Noticia.texto) AGAINST ("' . $p . '")'),
                                    array("{$chave}.{$m['campo']} LIKE" => "%{$p}%"),
                                    array("{$chave}.tags LIKE" => "%{$p}%"),
                                )
                            );

                            $cond['Noticia.publicar'] = true;
                            $cond['Noticia.created <='] = date('Y-m-d H:i:s');
                        } else {
                            $cond[] = array("{$chave}.{$m['campo']} LIKE" => "%{$p}%");
                        }
                    }
                    if ($chave == "Noticia") {
                        $temp = ClassRegistry::init($chave)->find('all', array(
                            'order' => array("Noticia.id" => 'DESC'),
                            'limit' => 10,
                            'conditions' => array($cond, "{$chave}.publicar" => true),
                            //'fields' => array("id", 'slug', $m['campo'], 'texto_resumo', 'created', 'ImagemMiniatura.*', 'ImagemGrande.*', 'NoticiaOrgao.*'),
                            //'fields' => array('DISTINCT NoticiaOrgao.noticia_id', 'Noticia.*', 'ImagemGrande.*', 'ImagemMiniatura.*'),
                            'fields' => array('DISTINCT NoticiaOrgao.noticia_id','Noticia.id', 'Noticia.slug', 'Noticia.titulo', 'Noticia.texto_resumo', 'Noticia.created', 'ImagemGrande.id', 'ImagemGrande.pasta', 'ImagemGrande.created', 'ImagemGrande.arquivo', 'ImagemGrande.nome', 'ImagemMiniatura.id', 'ImagemMiniatura.pasta', 'ImagemMiniatura.created', 'ImagemMiniatura.arquivo', 'ImagemMiniatura.nome'),
                            'joins' => array(
                                array(
                                    'table' => 'noticias_orgaos'
                                    , 'type' => 'INNER'
                                    , 'alias' => 'NoticiaOrgao'
                                    , 'conditions' => array(
                                        'Noticia.id = NoticiaOrgao.noticia_id'
                                    )
                                )
                            )
                                )
                        );

                        $temp2 = ClassRegistry::init($chave)->find('count', array(
                            'order' => array("id" => 'DESC'),
                            'conditions' => array($cond, "{$chave}.publicar" => true),
                            'fields' => array("id")));
                    } elseif ($chave == "Servicos") {
                        $temp = ClassRegistry::init($chave)->find('all', array('conditions' => array($cond), 'order' => array('Servicos.id' => 'DESC'), 'limit' => 10));
                        $temp2 = ClassRegistry::init($chave)->find('count', array('conditions' => array($cond), 'order' => array('Servicos.id' => 'DESC'), 'limit' => 10, 'fields' => array("id")));
                    } elseif ($chave == "Pagina") {
                        $temp = ClassRegistry::init($chave)->find('all', array(
                            'order' => array("{$chave}.id" => 'DESC'),
                            'limit' => 10,
                            'conditions' => array($cond, "{$chave}.publicar" => true),
                            'fields' => array("id", 'slug', $m['campo'], 'created', 'conteudo')
                                )
                        );
                        $temp2 = ClassRegistry::init($chave)->find('count', array(
                            'order' => array("id" => 'DESC'),
                            'conditions' => array($cond, "{$chave}.publicar" => true),
                            'fields' => array("id")
                                )
                        );
                    } else {
                        $temp = ClassRegistry::init($chave)->find('all', array(
                            'order' => array("id" => 'DESC'),
                            'limit' => 10,
                            'conditions' => array($cond, "{$chave}.publicar" => true),
                            'fields' => array("id", 'slug', $m['campo'], 'created')
                                )
                        );
                        $temp2 = ClassRegistry::init($chave)->find('count', array(
                            'order' => array("id" => 'DESC'),
                            'conditions' => array($cond, "{$chave}.publicar" => true),
                            'fields' => array("id", 'slug', $m['campo'], 'created')
                                )
                        );
                    }
                    $count2[$chave] = $temp2;
                    if (!empty($temp)) {
                        //$resultados[] = $temp;
                        $resultados[$chave] = $temp;
                    }
                }

//                 else {
//                    foreach ($m['campo'] as $chave2 => $m2) {
//                        foreach ($m2 as $chave3 => $m3) {
//                            foreach ($palavras as $p) {
//                                $cond[] = array("{$chave3}.{$m3} LIKE" => "%{$p}%");
//                            }
//                        }
//                    }
//                    $temp = ClassRegistry::init($chave)->find('all', array(
//                        'order' => array("id" => 'DESC'),
//                        'limit' => 10,
//                        'conditions' => $cond,
//                        'fields' => array(
//                            "id",
//                            "{$chave}.{$chave2}",
//                            "{$chave3}.{$m3}"
//                        ),
//                            )
//                    );
//                    if (!empty($temp)) {
//                        $resultados[] = $temp;
//                    }
//                }
//            }
            }
            $this->set('links', $links);
            $this->set('resultados', $resultados);
            $this->set('count', $count);
            $this->set('count2', $count2);
            $this->set('texto', $this->request->data['Busca']['texto']);
            $this->set('isAjax', $this->RequestHandler->isAjax());
        }
    }

    public function modelo() {
        
    }

    public function modelos($indice = null) {
        $modelos = Configure::read('Busca.modelos', array('plugin' => 'busca'));
        if (!empty($modelos)) {
            $retorno = array();
            if (is_null($indice)) {
                foreach ($modelos as $chave => $m) {
                    $retorno[] = $chave;
                }
            } else {
                $contador = 0;
                foreach ($modelos as $chave => $m) {
                    if ($contador++ == $indice) {
                        return $chave;
                    }
                }
            }
            return $retorno;
        }
        //debug('Não foi configurado o array de modelos no core<br />Use o leia-me para orientações de como proceder.');
        return null;
    }

}

?>