<?php

require_once './model/agiota.model.php';
require_once './service/agiota.service.php';
require_once './model/conexao.php';

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
if ($acao == 'buscarTodosAgiotas') {
    $agiota = new Agiota();
    $conexao = new Conexao();

    $agiotaService = new AgiotaService($conexao, $usuario);
    $listaAgiotas = $agiotaService->buscarTodosAgiotas();

    echo ($listaAgiotas[0]->nome);

}

?>