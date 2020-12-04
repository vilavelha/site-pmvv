<?php

class MidiasController extends MidiasAppController {

    public $name = 'Midias';
    public $components = array('Midias.Upload', 'Midias.PImage', 'Midias.Im');
    public $helpers = array('Midias.Utils', 'Midias.Format', 'Js');

    public function beforeFilter() {
        parent::beforeFilter();
        if (!isset($this->passedArgs['page'])) {
            if ($this->Session->check('MediaMedia.aName')) {
                $this->Session->delete('MediaMedia.aName');
            }
        }
        $this->Auth->allow('admin_miniatura');
    }

    public function admin_galeria() {
        $this->layout = 'limpo';
        $this->request->params['named']['tipo'] = 'multiplo';
        $this->request->params['named']['iframe'] = true;
        $this->Midia->recursive = 0;
        $cond = '';
//        if (isset($this->request->data)) {
//            if ($this->request->data['Midia']['campo'] == 'nome') {
//                $cond = array('or' => array(
//                        "Midia.{$this->request->data['Midia']['campo']} LIKE" => "%{$this->request->data['Midia']['valor']}%"
//                        ));
//            }
//            if ($this->request->data['Midia']['campo'] == 'tags') {
//                $cond = array('or' => array(
//                        "Midia.{$this->request->data['Midia']['campo']} LIKE" => "%{$this->request->data['Midia']['valor']}%"
//                        ));
//            }
//        }
//Filtra midias por nome

        $cat = $this->Session->read('MediaMedia.aName');
        if (isset($this->request->data['Midia']['valor'])) {
            $category['campo'] = $this->request->data['Midia']['campo'];
            $category['valor'] = $this->request->data['Midia']['valor'];
            $this->Session->write('MediaMedia.aName', $category);
        } elseif (!empty($cat)) {
            $category = $cat;
        } elseif (!isset($this->passedArgs['page'])) {
            if ($this->Session->check('MediaMedia.aName')) {
                $this->Session->delete('MediaMedia.aName');
            }
        }
        if (isset($category)) {
//$cond['conditions']['OR']['MediaGallery.name LIKE'] = "%{$category}%";
            $cond = array('or' => array(
                    "Midia.{$category['campo']} LIKE" => "%{$category['valor']}%"
            ));
            $this->Session->write('MediaMedia.aName', $category);
        }

        $this->paginate = array(
            'Midia' => array(
                'limit' => 20,
                'order' => array(
                    'Midia.modified' => 'DESC',
                    'Midia.created' => 'DESC',
                    'Midia.id' => 'DESC'
                ),
                'conditions' => $cond,
            )
        );
        $this->set('midias', $this->paginate());
    }

    public function admin_index() {
//        if (isset($this->params['named']['iframe'])) {
//            $this->layout = 'limpo';
//        }
        $this->Midia->recursive = 0;
        $cond = '';
//        if (isset($this->request->data)) {
//            if ($this->request->data['Midia']['campo'] == 'nome') {
//                $cond = array('or' => array(
//                        "Midia.{$this->request->data['Midia']['campo']} LIKE" => "%{$this->request->data['Midia']['valor']}%"
//                        ));
//            }
//            if ($this->request->data['Midia']['campo'] == 'tags') {
//                $cond = array('or' => array(
//                        "Midia.{$this->request->data['Midia']['campo']} LIKE" => "%{$this->request->data['Midia']['valor']}%"
//                        ));
//            }
//        }
//Filtra midias por nome

        $cat = $this->Session->read('MediaMedia.aName');
        if (isset($this->request->data['Midia']['valor'])) {
            $category['campo'] = $this->request->data['Midia']['campo'];
            $category['valor'] = $this->request->data['Midia']['valor'];
            $this->Session->write('MediaMedia.aName', $category);
        } elseif (!empty($cat)) {
            $category = $cat;
        } elseif (!isset($this->passedArgs['page'])) {
            if ($this->Session->check('MediaMedia.aName')) {
                $this->Session->delete('MediaMedia.aName');
            }
        }
        if (isset($category)) {
//$cond['conditions']['OR']['MediaGallery.name LIKE'] = "%{$category}%";
            $cond = array('or' => array(
                    "Midia.{$category['campo']} LIKE" => "%{$category['valor']}%"
            ));
            $this->Session->write('MediaMedia.aName', $category);
        }

        $this->paginate = array(
            'Midia' => array(
                'limit' => 20,
                'order' => array(
                    'Midia.modified' => 'DESC',
                    'Midia.created' => 'DESC',
                    'Midia.id' => 'DESC'
                ),
                'conditions' => $cond,
            )
        );
        $this->set('midias', $this->paginate());
    }

    public function admin_view($id = null) {
        if (!$id) {
            $this->Session->setFlash('Midia inválida.');
            $this->redirect(array('action' => 'index'));
        }
        $this->set('midia', $this->Midia->read(null, $id));
    }

    public function admin_add() {
        if (!empty($this->request->data)) {
            $this->Midia->create();

            $usuario = $categoria = $nome = $autor = $tags = null;
            if ($this->Auth->user('id')) {
                $usuario = $this->Auth->user('id');
            }
            if (!empty($this->request->data['Midia']['midias_categoria_id'])) {
                $categoria = $this->request->data['Midia']['midias_categoria_id'];
            }
            if (!empty($this->request->data['Midia']['nome'])) {
                $nome = $this->request->data['Midia']['nome'];
            }
            if (!empty($this->request->data['Midia']['autor'])) {
                $autor = $this->request->data['Midia']['autor'];
            }
            if (!empty($this->request->data['Midia']['tags'])) {
                $tags = $this->request->data['Midia']['tags'];
            }

            if ($this->request->data['Midia']['descompactar']) {
                $descompactados = $this->Upload->descompactarArquivos($this->request->data['Midia']['arquivo']);
                if (is_array($descompactados)) {
                    $this->request->data = null;
                    foreach ($descompactados as $item) {
                        $this->request->data['Midia'][] = array(
                            'usuario_id' => $usuario,
                            'midias_categoria_id' => $categoria,
                            'nome' => $nome,
                            'autor' => $autor,
                            //'pasta' => $item['pasta'],
                            'pasta' => str_replace(DIRECTORY_SEPARATOR, '/',$item['pasta']),
                            'arquivo' => $item['arquivo'],
                            'tags' => $tags
                        );
                    }
                    if ($this->Midia->saveAll($this->request->data['Midia'], array('validate' => 'first'))) {
                        $this->Session->setFlash('A midia foi salva.');
                        $this->redirect(array('action' => 'index', 'iframe' => true, 'tipo' => ' '));
                    } else {
                        $this->Session->setFlash('A midia não pode ser salva. Por favor, tente novamente.');
                    }
                } else {
                    $mensagem = $this->Upload->getMensagemValidacao($descompactados);
                    $this->Session->setFlash(__($mensagem, true));
                }
            } else {
                $novoNome = $this->Upload->uploadImagem($this->request->data['Midia']['arquivo']);
                if (is_array($novoNome)) {
                    $this->request->data['Midia']['usuario_id'] = $this->Auth->user('id');
                    //$this->request->data['Midia']['pasta'] = $novoNome['pasta'];
                    $this->request->data['Midia']['pasta'] = str_replace(DIRECTORY_SEPARATOR, '/',$novoNome['pasta']);                    
                    $this->request->data['Midia']['arquivo'] = $novoNome['arquivo'];
                    if ($this->Midia->save($this->request->data)) {
                        $this->Session->setFlash('A midia foi salva.');
                        $this->redirect(array('action' => 'index', 'iframe' => true, 'tipo' => ' '));
                    } else {
                        $this->Session->setFlash('A midia não pode ser salva. Por favor, tente novamente.');
                    }
                } else {
                    $mensagem = $this->Upload->getMensagemValidacao($novoNome);
                    $this->Session->setFlash(__($mensagem, true));
                }
            }
        }
        $midiasCategorias = $this->Midia->MidiasCategoria->find('list', array('fields' => 'nome', 'order' => array('nome' => 'ASC')));
        $midiasGalerias = $this->Midia->MidiasGaleria->find('list', array('fields' => 'nome'));
        $midiasTags = $this->Midia->MidiasTag->find('list', array('fields' => 'nome'));
        $this->set(compact('midiasCategorias', 'midiasGalerias', 'midiasTags'));
    }

    public function admin_copy($id = null) {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__('Invalid midia', true));
            $this->redirect(array('action' => 'index'));
        }
        $midia = $this->Midia->read(null, $id);
        if (!empty($this->request->data)) {
            $this->request->data['Midia']['id'] = null;
            $this->request->data['Midia']['usuario_id'] = $this->Auth->user('id');
            $novoNome = false;
            if (!$this->request->data['Midia']['arquivo']['error']) {
                $novoNome = $this->Upload->uploadImagem($this->request->data['Midia']['arquivo']);
                if (is_array($novoNome)) {
                    $this->request->data['Midia']['pasta'] = $novoNome['pasta'];
                    $this->request->data['Midia']['arquivo'] = $novoNome['arquivo'];
                } else {
                    $mensagem = $this->Upload->getMensagemValidacao($novoNome);
                    $this->Session->setFlash(__($mensagem, true));
                }
            } else {
                $this->request->data['Midia']['pasta'] = $midia['Midia']['pasta'];
                $this->request->data['Midia']['arquivo'] = $midia['Midia']['arquivo'];
//                echo $filename;
//                if (file_exists($filename)) {
//                    header('Content-Description: File Transfer');
//                    header('Content-Type: application/octet-stream');
//                    header('Content-Disposition: attachment; filename='.basename($filename));
//                    header('Content-Transfer-Encoding: binary');
//                    header('Expires: 0');
//                    header('Cache-Control: must-revalidate');
//                    header('Pragma: public');
//                    header('Content-Length: ' . filesize($filename));
//                    ob_clean();
//                    flush();
//                    readfile($filename);
//                    exit;
//                }else{
//                    echo 'nao exi';
//                }
                $novoNome = $this->Upload->nomeSlug($midia['Midia']['pasta'], $midia['Midia']['arquivo']);
                $filename = APP . "webroot/midia/{$midia['Midia']['caminho']}";
                $newfile = APP . "webroot/midia/{$midia['Midia']['pasta']}/{$novoNome}";
                if (!copy($filename, $newfile)) {
                    echo "falha ao copiar $filename...\n";
                }
                $this->request->data['Midia']['pasta'] = $midia['Midia']['pasta'];
                $this->request->data['Midia']['arquivo'] = $novoNome;
            }
            if ($this->Midia->save($this->request->data)) {
                $this->Session->setFlash('A midia foi salva.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('A midia não pode ser salva. Por favor, tente novamente.');
            }
        }
        if (empty($this->request->data)) {
            $this->request->data = $midia;
        }
        $midiasCategorias = $this->Midia->MidiasCategoria->find('list', array('fields' => 'nome'));
        $midiasGalerias = $this->Midia->MidiasGaleria->find('list', array('fields' => 'nome'));
        $midiasTags = $this->Midia->MidiasTag->find('list', array('fields' => 'nome'));
        $this->set(compact('midiasCategorias', 'midiasGalerias', 'midiasTags'));
    }

    public function admin_edit($id = null) {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash('Midia inválida.');
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            $this->request->data['Midia']['usuario_id'] = $this->Auth->user('id');
            $novoNome = false;
            if (!$this->request->data['Midia']['arquivo']['error']) {
                $novoNome = $this->Upload->uploadImagem($this->request->data['Midia']['arquivo']);
                if (is_array($novoNome)) {
                    $this->request->data['Midia']['pasta'] = $novoNome['pasta'];
                    $this->request->data['Midia']['arquivo'] = $novoNome['arquivo'];
                } else {
                    $mensagem = $this->Upload->getMensagemValidacao($novoNome);
                    $this->Session->setFlash(__($mensagem, true));
                }
            } else {
                unset($this->request->data['Midia']['pasta']);
                unset($this->request->data['Midia']['arquivo']);
            }
            if ($this->Midia->save($this->request->data)) {
                $this->Session->setFlash('A midia foi salva.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('A midia não pode ser salva. Por favor, tente novamente.');
            }
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->Midia->read(null, $id);
        }
        $midiasCategorias = $this->Midia->MidiasCategoria->find('list', array('fields' => 'nome'));
        $midiasGalerias = $this->Midia->MidiasGaleria->find('list', array('fields' => 'nome'));
        $midiasTags = $this->Midia->MidiasTag->find('list', array('fields' => 'nome'));
        $this->set(compact('midiasCategorias', 'midiasGalerias', 'midiasTags'));
    }

    public function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash('ID inválido para midia.');
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Midia->delete($id)) {
            $this->Session->setFlash('Midia excluída.');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Midia não pode ser excluída.');
        $this->redirect(array('action' => 'index'));
    }

    public function download($id = null, $arquivo = null) {
        if (!$id) {
            $this->Session->setFlash('Id inválido');
            $this->redirect(array('action' => 'index'));
        }
        $this->view = 'Media';
        if (!is_numeric($id)) {
            $midia = $this->Midia->find('first', array('conditions' => array('Midia.pasta' => str_replace(SEPARADOR, DS, $id), 'Midia.arquivo' => $arquivo)));
            $id = $midia['Midia']['id'];
        }
        $arquivo = $this->Midia->read(null, $id);
        $params = array(
            'id' => $arquivo['Midia']['arquivo'],
            'name' => $this->Upload->getNomeArquivo($arquivo['Midia']['arquivo']),
            'download' => true,
            'extension' => $this->Upload->getExtensaoArquivo($arquivo['Midia']['arquivo']),
            'path' => WWW_ROOT . MIDIA_URI . DS . $arquivo['Midia']['pasta'] . DS
        );
        $this->set($params);
    }

    public function admin_download($id = null, $arquivo = null) {
        $this->download($id, $arquivo);
    }

    public function admin_crop($id = null) {
        if (!$id) {
            $this->Session->setFlash('Id inválido');
            $this->redirect(array('action' => 'index'));
        }

        $arquivo = $this->Midia->read(null, $id);
        if (empty($this->request->data)) {
            $this->loadModel('MidiasTamanho');
            $modulos = $this->MidiasTamanho->find('all');
            $tamanhos = array();
            foreach ($modulos as $modulo) {
                $tamanhos[$modulo['MidiasTamanho']['largura'] . SEPARADOR . $modulo['MidiasTamanho']['altura']] = $modulo['MidiasTamanho']['modulo'];
            }
            $this->set('modulos', $tamanhos);
            $this->set('arquivo', $arquivo);
        } else {
            $largura = $this->request->data['Midia']['largura'];
            $altura = $this->request->data['Midia']['altura'];
            $qualidade = 100;

            $novoNome = $this->Upload->nomeSlug($arquivo['Midia']['pasta'], $arquivo['Midia']['arquivo']);

            $filename = APP . "webroot/midia/{$arquivo['Midia']['caminho']}";
            $newfile = APP . "webroot/midia/{$arquivo['Midia']['pasta']}/{$novoNome}";
            if (!copy($filename, $newfile)) {
                echo "falha ao copiar $filename...\n";
            }

            $this->request->data['Midia']['pasta'] = $arquivo['Midia']['pasta'];
            $this->request->data['Midia']['arquivo'] = $novoNome;

            $caminho = WWW_ROOT . MIDIA_URI . DS . $arquivo['Midia']['pasta'] . DS . $novoNome;
            $path = WWW_ROOT . MIDIA_URI . DS . $arquivo['Midia']['pasta'] . DS;

            //$this->PImage->resizeImage('resize', $novoNome, $path, false, $largura, false, 100);
            //debug($this->request->data['Midia']['oldw']);
            //die();
            $this->PImage->resizeImageNovo('resize', $novoNome, $path, false, $this->request->data['Midia']['oldw'], false, 100);
            //$this->Im->resize($novoNome, $path, $this->request->data['Midia']['oldw'], false, false);
            //die($this->request->data['Midia']['oldw']);
            switch ($this->Upload->getExtensaoArquivo($arquivo['Midia']['arquivo'])) {
                case 'gif':
                    $copiaImagem = imagecreatefromgif($caminho);
                    $novaImagem = imagecreatetruecolor($largura, $altura);
                    imagecopyresampled(
                            $novaImagem, $copiaImagem, 0, 0, $this->request->data['Midia']['x'], $this->request->data['Midia']['y'], $largura, $altura, $this->request->data['Midia']['w'], $this->request->data['Midia']['h']
                    );
                    imagegif($novaImagem, $caminho);
                    break;
                case 'jpeg':
                case 'jpg':
// Cria manipulador de imagem para a imagem do upload
                    $copiaImagem = imagecreatefromjpeg($caminho);
                    $novaImagem = imagecreatetruecolor($largura, $altura);
                    imagecopyresampled(
                            $novaImagem, $copiaImagem, 0, 0, $this->request->data['Midia']['x'], $this->request->data['Midia']['y'], $largura, $altura, $this->request->data['Midia']['w'], $this->request->data['Midia']['h']
                    );
                    imagejpeg($novaImagem, $caminho, $qualidade);
                    break;
                case 'png':
                    $copiaImagem = imagecreatefrompng($caminho);
                    $novaImagem = imagecreatetruecolor($largura, $altura);
                    imagealphablending($novaImagem, false);
                    imagecopyresampled(
                            $novaImagem, $copiaImagem, 0, 0, $this->request->data['Midia']['x'], $this->request->data['Midia']['y'], $largura, $altura, $this->request->data['Midia']['w'], $this->request->data['Midia']['h']
                    );
                    imagesavealpha($novaImagem, true);
                    imagepng($novaImagem, $caminho);
                    break;
                default :
                    debug('Não é permitido este tipo');
            }
            unset($copiaImagem);
            unset($novaImagem);
            $this->request->data['Midia']['id'] = null;
            $this->request->data['Midia']['created'] = null;
            if ($this->Midia->save($this->request->data)) {
                $this->Session->setFlash('Imagem alterada com sucesso');
                $this->redirect(array('action' => 'index', 'iframe' => true, 'tipo' => ' '));
            } else {
                $this->Session->setFlash('A midia não pode ser salva. Por favor, tente novamente.');
            }
        }
    }

    public function admin_cropall($id = null) {
        $this->layout = "midias";
        if (!$id) {
            $this->Session->setFlash('Id inválido');
            $this->redirect(array('action' => 'index'));
        }

        $arquivo = $this->Midia->read(null, $id);
        $this->set('arquivo', $arquivo);
        if (!empty($this->request->data)) {
            //$qualidade = 75;
            //$novoNome = $this->Upload->nomeSlug($arquivo['Midia']['pasta'], $arquivo['Midia']['arquivo']);
            $this->imagecreate(
                    $id, $arquivo, $this->request->data['Midia']['oldw'], $this->request->data['Midia']['x'], $this->request->data['Midia']['y'], $this->request->data['Midia']['largura'], $this->request->data['Midia']['altura'], $this->request->data['Midia']['w'], $this->request->data['Midia']['h']
            );
            $this->imagecreate(
                    $id, $arquivo, $this->request->data['Midia']['oldw2'], $this->request->data['Midia']['x2'], $this->request->data['Midia']['y2'], $this->request->data['Midia']['largura2'], $this->request->data['Midia']['altura2'], $this->request->data['Midia']['w2'], $this->request->data['Midia']['h2']
            );
            $this->imagecreate(
                    $id, $arquivo, $this->request->data['Midia']['oldw3'], $this->request->data['Midia']['x3'], $this->request->data['Midia']['y3'], $this->request->data['Midia']['largura3'], $this->request->data['Midia']['altura3'], $this->request->data['Midia']['w3'], $this->request->data['Midia']['h3']
            );
            $this->imagecreate(
                    $id, $arquivo, $this->request->data['Midia']['oldw4'], $this->request->data['Midia']['x4'], $this->request->data['Midia']['y4'], $this->request->data['Midia']['largura4'], $this->request->data['Midia']['altura4'], $this->request->data['Midia']['w4'], $this->request->data['Midia']['h4']
            );
            $this->Session->setFlash('Imagem alterada com sucesso');
            $this->redirect(array('action' => 'index', 'iframe' => true, 'tipo' => ' '));
        }
    }

    public function imagecreate($id, $arquivo, $oldw, $x, $y, $largura, $altura, $w, $h) {
        $qualidade = 100;
        $extensao = $this->Upload->getExtensaoArquivo($arquivo['Midia']['arquivo']);
//        $dia = date('d');
//        $mes = date('m');
//        $ano = date('Y');
        $dia = date('d', strtotime($arquivo['Midia']['created']));
        $mes = date('m', strtotime($arquivo['Midia']['created']));
        $ano = date('Y', strtotime($arquivo['Midia']['created']));

        $novoNome = "{$id}_{$dia}{$mes}{$ano}_{$largura}x{$altura}.{$extensao}";
        $caminho = WWW_ROOT . MIDIA_URI . DS . $arquivo['Midia']['pasta'] . DS . $novoNome;

        $filename = APP . "webroot/midia/{$arquivo['Midia']['caminho']}";
        $newfile = APP . "webroot/midia/{$arquivo['Midia']['pasta']}/{$novoNome}";

        if (!copy($filename, $newfile)) {
            echo "falha ao copiar $filename...\n";
        }
        $path = WWW_ROOT . MIDIA_URI . DS . $arquivo['Midia']['pasta'] . DS;
        $this->PImage->resizeImageNovo('resize', $novoNome, $path, false, $oldw, false, $qualidade, false, $w);
        switch ($this->Upload->getExtensaoArquivo($arquivo['Midia']['arquivo'])) {
            case 'gif':
                $copiaImagem = imagecreatefromgif($caminho);
                $novaImagem = imagecreatetruecolor($largura, $altura);
                imagecopyresampled(
                        $novaImagem, $copiaImagem, 0, 0, $x, $y, $largura, $altura, $w, $h
                );
                imagegif($novaImagem, $caminho);
                break;
            case 'jpeg':
            case 'jpg':
                // Cria manipulador de imagem para a imagem do upload
                $copiaImagem = imagecreatefromjpeg($caminho);
                $novaImagem = imagecreatetruecolor($largura, $altura);
                imagecopyresampled(
                        $novaImagem, $copiaImagem, 0, 0, $x, $y, $largura, $altura, $w, $h
                );
                imagejpeg($novaImagem, $caminho, $qualidade);
                break;
            case 'png':
                $copiaImagem = imagecreatefrompng($caminho);
                $novaImagem = imagecreatetruecolor($largura, $altura);
                imagealphablending($novaImagem, false);
                imagecopyresampled(
                        $novaImagem, $copiaImagem, 0, 0, $x, $y, $largura, $altura, $w, $h
                );
                imagesavealpha($novaImagem, true);
                imagepng($novaImagem, $caminho);
                break;
            default :
                debug('Não é permitido este tipo');
        }
        unset($copiaImagem);
        unset($novaImagem);
        unset($newfile);
    }

    public function admin_selecionar_uma() {
        $this->layout = 'limpo';
        $this->Midia->recursive = 0;
        $this->paginate = array(
            'Midia' => array(
                'limit' => 20,
                'order' => array(
                    'Midia.modified' => 'DESC',
                    'Midia.created' => 'DESC',
                    'Midia.id' => 'DESC')
            )
        );
        $this->set('midias', $this->paginate());
    }

    public function admin_selecionar_muitas() {
        $this->layout = 'limpo';
        $this->Midia->recursive = 0;
        $this->paginate = array(
            'Midia' => array(
                'limit' => 20,
                'order' => array(
                    'Midia.modified' => 'DESC',
                    'Midia.created' => 'DESC',
                    'Midia.id' => 'DESC')
            )
        );
        $this->set('midias', $this->paginate());
    }

    public function admin_miniatura($pasta, $nome, $largura = null, $altura = null) {
        $this->layout = null;
        $this->autoRender = false;
        $quality = 100;
        $filename = ROOT . DS . str_replace(SEPARADOR, DS, $pasta) . DS . $nome;
		
        if (!$this->isImage($nome)) {
            header('Content-type: image/jpeg');
            $erro = imagecreate(500, 25); /* Create a black image */
            $bgc = imagecolorallocate($erro, 255, 255, 255);
            $tc = imagecolorallocate($erro, 0, 0, 0);
            imagefilledrectangle($erro, 0, 0, 150, 30, $bgc);
            /* Output an errmsg */
            imagestring($erro, 2, 5, 5, "Erro ao carregar {$nome}", $tc);
            imagejpeg($erro);
            imagedestroy($erro);
            return;
        }
#pegando as dimensoes reais da imagem, largura e altura
        list($oldWidth, $oldHeight, $type) = getimagesize($filename);
        $ext = $this->image_type_to_extension($type);
//        $width = $oldWidth;
//        $height = $oldHeight;
#setando a largura da miniatura
        $new_width = $largura;
#setando a altura da miniatura
        $new_height = $altura;

        $widthScale = 2;
        $heightScale = 2;

        if ($new_width) {
            if ($new_width > $oldWidth)
                $new_width = $oldWidth;
            $widthScale = $new_width / $oldWidth;
        }
        if ($new_height) {
            if ($new_height > $oldHeight)
                $new_height = $oldHeight;
            $heightScale = $new_height / $oldHeight;
        }



//debug("W: $widthScale  H: $heightScale<br>");
        if ($widthScale < $heightScale) {
            $maxWidth = $new_width;
            $maxHeight = false;
        } elseif ($widthScale > $heightScale) {
            $maxHeight = $new_height;
            $maxWidth = false;
        } else {
            $maxHeight = $new_height;
            $maxWidth = $new_width;
        }

//        debug($new_width);debug($new_height);
//        debug($widthScale);debug($heightScale);
//        debug($maxWidth);debug($maxHeight);
//        debug($oldWidth);debug($oldHeight);die();

        if ($maxWidth > $maxHeight) {
            $applyWidth = $maxWidth;
            $applyHeight = ($oldHeight * $applyWidth) / $oldWidth;
        } elseif ($maxHeight > $maxWidth) {
            $applyHeight = $maxHeight;
            $applyWidth = ($applyHeight * $oldWidth) / $oldHeight;
        } else {
            $applyWidth = $maxWidth;
            $applyHeight = $maxHeight;
        }



        $image_p = imagecreatetruecolor($applyWidth, $applyHeight);

        switch ($ext) {
            case 'gif' :
                $image = imagecreatefromgif($filename);
                break;
            case 'png' :
                $image = imagecreatefrompng($filename);
                imagealphablending($image_p, false);
                break;
            case 'jpg' :
            case 'jpeg' :
                $image = imagecreatefromjpeg($filename);
                break;
            default :
                header('Content-type: image/jpeg');
                $erro = imagecreate(500, 25); /* Create a black image */
                $bgc = imagecolorallocate($erro, 255, 255, 255);
                $tc = imagecolorallocate($erro, 0, 0, 0);
                imagefilledrectangle($erro, 0, 0, 150, 30, $bgc);
                /* Output an errmsg */
                imagestring($erro, 2, 5, 5, "Erro ao carregar {$nome}", $tc);
                imagejpeg($erro);
                imagedestroy($erro);
                break;
        }
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $applyWidth, $applyHeight, $oldWidth, $oldHeight);

        switch ($ext) {
            case 'gif' :
                header('Content-type: image/gif');
                imagegif($image_p, null, $quality);
                break;
            case 'png' :
                header('Content-type: image/png');
                imagesavealpha($image_p, true);
                imagepng($image_p, null, round(($quality / 10) - 1));
                break;
            case 'jpg' :
            case 'jpeg' :
                header('Content-type: image/jpeg');
                imagejpeg($image_p, null, $quality);
                break;
            default :
                header('Content-type: image/jpeg');
                $erro = imagecreate(500, 25); /* Create a black image */
                $bgc = imagecolorallocate($erro, 255, 255, 255);
                $tc = imagecolorallocate($erro, 0, 0, 0);
                imagefilledrectangle($erro, 0, 0, 150, 30, $bgc);
                /* Output an errmsg */
                imagestring($erro, 2, 5, 5, "Erro ao carregar {$nome}", $tc);
                imagejpeg($erro);
                imagedestroy($erro);
                break;
        }
        imagedestroy($image_p);
        imagedestroy($image);
    }

    public function image_type_to_extension($imagetype) {
        if (empty($imagetype))
            return false;
        switch ($imagetype) {
            case IMAGETYPE_GIF : return 'gif';
            case IMAGETYPE_JPEG : return 'jpg';
            case IMAGETYPE_PNG : return 'png';
            case IMAGETYPE_SWF : return 'swf';
            case IMAGETYPE_PSD : return 'psd';
            case IMAGETYPE_BMP : return 'bmp';
            case IMAGETYPE_TIFF_II : return 'tiff';
            case IMAGETYPE_TIFF_MM : return 'tiff';
            case IMAGETYPE_JPC : return 'jpc';
            case IMAGETYPE_JP2 : return 'jp2';
            case IMAGETYPE_JPX : return 'jpf';
            case IMAGETYPE_JB2 : return 'jb2';
            case IMAGETYPE_SWC : return 'swc';
            case IMAGETYPE_IFF : return 'aiff';
            case IMAGETYPE_WBMP : return 'wbmp';
            case IMAGETYPE_XBM : return 'xbm';
            default : return false;
        }
    }

}

?>
