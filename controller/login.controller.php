<?php

require_once './model/usuario.model.php';
require_once './model/conexao.php';


class LoginController
{
    private $usuario;
    private $conexao;

    public function __construct(Conexao $conexao)
    {
        $this->conexao = $conexao->conectar();
    }

    public function autenticar($email, $senha)
    {
        $usuarios = $this->buscarUsuarioBanco();

        foreach ($usuarios as $usuario) {
            //TODO -Verificar senha: && password_verify($senha, $usuario->senha)
            if (($usuario->email == $email)) {
                $_SESSION['autenticar'] = 'SIM';
                $_SESSION['id'] = $usuario->id;
                header('Location: ./view/menu.view.php');
                exit;
            }
        }
        $this->error();
    }

    public function cadastrar($nome, $email, $senha)
    {
        $query = 'insert into usuario(nome, email, senha)values(:nome, :email, :senha)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();

        header('Location: ./view/login.view.php');
    }

    private function buscarUsuarioBanco()
    {
        try {
            $query = "SELECT * FROM usuario";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            $this->error();
        }
    }

    public function error()
    {
        $_SESSION['autenticar'] = 'NAO';
        header('Location: view/login.view.php?login=erro');
        exit;
    }
}
