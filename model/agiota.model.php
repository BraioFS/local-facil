<?php

class Agiota
{
    private $id;
    private $nome;
    private $url;
    private $estrelas;
    private $favorito;

    
    public function __construct($nome, $url, $estrelas, $favorito)
    {
        $this->nome = $nome;
        $this->url = $url;
        $this->estrelas = $estrelas;
        $this->favorito = $favorito;
    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
        return $this;
    }
}

?>