<?php

class AgiotaService
{
    private $conexao;
    private $agiota;

    public function __construct(Conexao $conexao)
    {
        $this->conexao = $conexao->conectar();
    }

    public function buscarTodosAgiotas()
    {
        $query = '
            select
                *
            from
                agiota 
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscarAgiotasRecomenados()
    {
        $query = '
        SELECT *
        FROM agiota
        ORDER BY RAND()
        LIMIT 4
    ';

        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function favoritarAgiota($id)
    {
        $query = 'UPDATE agiota
              SET favorito = 1
              WHERE id = :agiota_id';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':agiota_id', $id);
        $stmt->execute();
    }

    public function desfavoritarAgiota($id)
    {
        $query = 'UPDATE agiota
              SET favorito = 0
              WHERE id = :agiota_id';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':agiota_id', $id);
        $stmt->execute();
    }

    public function buscarAgiotasFavoritos()
    {
        $query = '
            select
                *
            from
                agiota 
            where favorito = 1
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscarAgiotaPorId($id)
    {
        $query = 'SELECT * FROM agiota WHERE id = :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
