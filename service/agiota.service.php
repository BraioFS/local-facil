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

}



?>