<?php
require 'C:\xampp\htdocs\local-facil\model\Login.php';

class loginController{
    protected $usuario;
    
    public function __construct(){
       
    }

    public function autenticar($email, $senha)
    {
        foreach($this->usuario as $usuario){
            if(($usuario->email == $email) && password_verify($senha, $usuario->senha)){

            }
        }
    }
}
?>