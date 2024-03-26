<?php

class Estabelecimento
{
    private $id;
    private $nome;
    private $quantidade_prisoes;
    private $horario_funcionamento;
    private $ativo;

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