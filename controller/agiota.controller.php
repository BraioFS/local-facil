<?php

require '../model/agiota.model.php';
require '../service/agiota.service.php';
require '../model/conexao.php';

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
if ($acao == 'buscarTodosAgiotas') {
    $agiota = new Agiota('', '', '', '');
    $conexao = new Conexao();

    $agiotaService = new AgiotaService($conexao, $agiota);
    $listaAgiotas = $agiotaService->buscarTodosAgiotas();

    $listaUrls = array();
    $agiotaData = [];
    foreach ($listaAgiotas as $agiota) {
        $agiotaData[] = [
            'url' => $agiota->url,
            'nome' => $agiota->nome
        ];
    }
} else if ($acao == 'favoritarAgiota') {
    $agiota = new Agiota('', '', '', '');
    $conexao = new Conexao();

    $agiotaService = new AgiotaService($conexao, $agiota);
    $agiotaService->favoritarAgiota($id, $nome_agiota);
} else if ($acao = 'buscarAgiotasFavoritos') {
    $agiota = new Agiota('', '', '', '');
    $conexao = new Conexao();

    $agiotaService = new AgiotaService($conexao, $agiota);
    $listaFavoritos = $agiotaService->buscarAgiotasFavoritos();
}
