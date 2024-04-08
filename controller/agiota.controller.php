<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../model/agiota.model.php';
require '../service/agiota.service.php';
require '../model/conexao.php';

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if ($acao == 'buscarTodosAgiotas') {
    $conexao = new Conexao();

    $agiotaService = new AgiotaService($conexao);
    $listaAgiotas = $agiotaService->buscarTodosAgiotas();

    $listaUrls = array();
    $agiotaData = [];
    foreach ($listaAgiotas as $agiota) {
        $agiotaData[] = [
            'id' => $agiota->id,
            'url' => $agiota->url,
            'nome' => $agiota->nome,
            'favorito' => $agiota->favorito,
            'mortes' => $agiota->mortes
        ];
    }
} else if ($acao == 'buscarAgiotasRecomenados') {
    $conexao = new Conexao();

    $agiotaService = new AgiotaService($conexao);
    $listaAgiotas = $agiotaService->buscarAgiotasRecomenados();

    $listaUrls = array();
    $agiotaData = [];
    foreach ($listaAgiotas as $agiota) {
        $agiotaData[] = [
            'id' => $agiota->id,
            'url' => $agiota->url,
            'nome' => $agiota->nome,
            'favorito' => $agiota->favorito,
            'mortes' => $agiota->mortes
        ];
    }
} else if ($acao == 'favoritarAgiota') {
    $conexao = new Conexao();
    $agiotaService = new AgiotaService($conexao);

    $id = $_GET['id'];
    $agiotaService->favoritarAgiota($id);
} else if ($acao == 'desfavoritarAgiota') {
    $conexao = new Conexao();
    $agiotaService = new AgiotaService($conexao);

    $id = $_GET['id'];
    $agiotaService->desfavoritarAgiota($id);
} else if ($acao = 'buscarAgiotasFavoritos') {
    $conexao = new Conexao();

    $agiotaService = new AgiotaService($conexao);
    $listaFavoritos = $agiotaService->buscarAgiotasFavoritos();
} else if ($acao == 'negociar') {
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $valor = isset($_GET['valor']) ? $_GET['valor'] : null;

    $conexao = new Conexao();

    $agiotaService = new AgiotaService($conexao);
    $agiotaService->negociar($id, $valor);
}
