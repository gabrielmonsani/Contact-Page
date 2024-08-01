<?php

namespace Entities;

class Mensagem {
    private $conteudo;
    private $remetente;
    private $destinatario;

    public function __construct($conteudo, $remetente, $destinatario) {
        $this->conteudo = $conteudo;
        $this->remetente = $remetente;
        $this->destinatario = $destinatario;
    }

    public function getConteudo() {
        return $this->conteudo;
    }

    public function setConteudo($conteudo) {
        $this->conteudo = $conteudo;
    }

    public function getRemetente() {
        return $this->remetente;
    }

    public function setRemetente($remetente) {
        $this->remetente = $remetente;
    }

    public function getDestinatario() {
        return $this->destinatario;
    }

    public function setDestinatario($destinatario) {
        $this->destinatario = $destinatario;
    }
}
