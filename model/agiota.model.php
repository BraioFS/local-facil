<?php

class Agiota
{
    private $id;
    private $nome;
    private $url;
    private $estrelas;
    private $favorito;
    private $mortes;
    private $emprestimo;
    private $procurado;

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