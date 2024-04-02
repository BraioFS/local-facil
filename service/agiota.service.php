<?php

class AgiotaService
{
    private $conexao;
    private $agiota;

    public function __construct(Conexao $conexao, Agiota $agiota)
    {
        $this->conexao = $conexao->conectar();
        $this->agiota = $agiota;
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

    public function favoritarAgiota($id, $nome_agiota)
    {
        $query = 'INSERT INTO favoritos (agiota_id, nome_agiota) VALUES (:agiota_id, :nome_agiota)';

        $params = array(
            ':agiota_id' => $id,
            ':nome_agiota' => $nome_agiota
        );
        
        $stmt = $this->conexao->prepare($query);
        $stmt->execute($params);
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


}
