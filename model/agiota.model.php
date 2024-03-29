<?php

class Agiota
{
    private $id;
    private $nome;
    private $url;
    private $estrelas;

    
    public function __construct($nome, $url, $estrelas)
    {
        $this->nome = $nome;
        $this->url = $url;
        $this->estrelas = $estrelas;
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