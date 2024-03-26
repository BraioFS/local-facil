<?php

class EstabelecimentoService
{
    private $conexao;
    private $estabelecimento;

    public function __construct(Conexao $conexao, Estabelecimento $estabelecimento)
    {
        $this->conexao = $conexao->conectar();
        $this->estabelecimento = $estabelecimento;
    }

    public function inserir()
    {
        $query = 'insert into estabelecimento(nome, quantidade_prisoes, horario_funcionamento)values(:nome, :quantidade_prisoes, :horario_funcionamento)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':nome', $this->estabelecimento->__get('nome'));
        $stmt->bindValue(':quantidade_prisoes', $this->estabelecimento->__get('quantidade_prisoes'));
        $stmt->bindValue(':horario_funcionamento', $this->estabelecimento->__get('horario_funcionamento'));
        $stmt->execute();
    }

    public function recuperar()
    {
        //R - read
        $query = '
            select
                estabelecimento.id, 
                estabelecimento.nome, 
                estabelecimento.quantidade_prisoes,
                estabelecimento.horario_funcionamento
            from
                estabelecimento 
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function atualizar()
    {
        //U - update
        $query = "
        update 
            estabelecimento 
        set 
            nome = ? 
        where 
            id = ?";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->estabelecimento->__get('nome'));
        $stmt->bindValue(2, $this->estabelecimento->__get('id'));
        return $stmt->execute();
    }

    public function remover()
    {
        //D - delete
        $query = '
        delete from 
            estabelecimento
        where
            id= :id 
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $this->estabelecimento->__get('id'));
        $stmt->execute();
    }
}



?>