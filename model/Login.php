<?php
class Login{
    protected $nome;
    protected $email;
    protected $senha;
    protected $sexo;
    protected $idade;
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