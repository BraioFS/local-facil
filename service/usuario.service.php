<?php

class UsuarioService
{
    private $conexao;
    private $usuario;

    public function __construct(Conexao $conexao, Usuario $usuario)
    {
        $this->conexao = $conexao->conectar();
        $this->usuario = $usuario;
    }

    public function inserir()
    {
        $query = 'insert into usuario(nome, email, senha)values(:nome, :email, :senha)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':nome', $this->usuario->__get('nome'));
        $stmt->bindValue(':email', $this->usuario->__get('email'));
        $stmt->bindValue(':senha', $this->usuario->__get('senha'));
        $stmt->execute();
    }

    public function recuperar()
    {
        //R - read
        $query = '
            select
                usuario.id, 
                usuario.nome, 
                usuario.email
            from
                usuario 
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function recuperarPorEmail()
    {

        $query = '
            select
                usuario.id, 
                usuario.nome, 
                usuario.email,
                usuario.senha
            from
                usuario
            where usuario.email = :email
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':email', $this->usuario->__get('email'));
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function atualizarNome()
    {
        //U - update
        $query = "
        update 
            usuario 
        set 
            nome = ? 
        where 
            id = ?";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->usuario->__get('nome'));
        $stmt->bindValue(2, $this->usuario->__get('id'));
        return $stmt->execute();
    }

    public function atualizarEmail()
    {
        //U - update
        $query = "
        update 
            usuario 
        set 
            email = ? 
        where 
            id = ?";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->usuario->__get('email'));
        $stmt->bindValue(2, $this->usuario->__get('id'));
        return $stmt->execute();
    }

    public function remover()
    {
        //D - delete
        $query = '
        delete from 
            usuario
        where
            id= :id 
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $this->usuario->__get('id'));
        $stmt->execute();
    }
}



?>