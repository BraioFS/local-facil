<?php

class Divida
{
    private $id;
    private $nome;
    private $valor;
    private $data_pagamento;

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