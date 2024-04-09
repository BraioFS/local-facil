<?php

class DividaService
{
    private $conexao;

    public function __construct(Conexao $conexao)
    {
        $this->conexao = $conexao->conectar();
    }

    public function buscarTodasDividas()
    {
        $query = '
            SELECT
                nome,
                valor,
                data_pagamento
            FROM
                divida 
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function negociar($nome, $valor, $dataPagamento)
    {
        $query = 'INSERT INTO divida (nome, valor, data_pagamento) VALUES (:nome, :valor, :data_pagamento)';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':valor', $valor);
        $stmt->bindValue(':data_pagamento', $dataPagamento);
        $stmt->execute();
    }
}
