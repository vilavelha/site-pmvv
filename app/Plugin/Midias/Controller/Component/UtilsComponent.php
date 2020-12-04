<?php

class UtilsComponent extends Component {

    public $components = array('QuatroPs.Email');
    public $Model = null;
    public $nameModel = 'Midia';

    public function email($para, $nome, $de, $assunto, $mensagem, $anexo = null) {
        $this->Email->delivery = 'mail'; //smtp ou mail (php)
        $this->Email->sendAs = 'both'; // html, text, both
        $this->Email->layout = 'default'; // views/layout/email/html/default.ctp
        $this->Email->template = 'default'; // views/elements/email/html/default.ctp
        $this->Email->to = $para;
        $this->Email->subject = $assunto;
        if (!is_null($anexo)) {
            $this->Email->attachments = $anexo; //deve ser array
        }
        $this->Email->replyTo = $de; //´ naoresponda@seusite.com.brEste e-mail está sendo protegido dos spam bots, você precisa ter o JavaScript habilitado para vê-lo ´;
        $this->Email->from = "{$nome} <{$de}>";
        if ($this->Email->send($mensagem)) {
            return true;
        }
        return false;
    }

    public function nomeSlug($nome = null) {
        if (!$nome) {
            return PARAMETRO_NAO_INFORMADO;
        }
        $novoNome = Inflector::slug($nome, '-');
        $this->Model = ClassRegistry::init($this->nameModel);
        $this->Model->recursive = -1;
        $lista = $this->Model->find('count', array('conditions' => array("{$this->nameModel}.slug LIKE" => "{$novoNome}%")));
        if ($lista > 0) {
            $novoNome .= "-{$lista}";
        }
        return strtolower($novoNome);
    }

    public function caminhoMidia($midia) {
        return $midia[$this->nameModel]['pasta'] . DS . $midia[$this->nameModel]['arquivo'];
    }

    public function listaCaminhoMidia($midias) {
        $retorno = array();
        foreach ($midias as $midia) {
            $retorno[$midia[$this->nameModel]['id']] = $midia[$this->nameModel]['pasta'] . DS . $midia[$this->nameModel]['arquivo'];
        }
        return $retorno;
    }

}
