<?php

require '../model/agiota.model.php';
require '../service/agiota.service.php';
require '../model/conexao.php';

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
if ($acao == 'buscarTodosAgiotas') {
    $agiota = new Agiota('', '', '');
    $conexao = new Conexao();

    $agiotaService = new AgiotaService($conexao, $agiota);
    $listaAgiotas = $agiotaService->buscarTodosAgiotas();
    $listaUrls = array();
    // Converta a lista de agiotas para um formato adequado para enviar ao frontend
    $agiotaData = [];
    foreach ($listaAgiotas as $agiota) {
        // Supondo que $agiota->url contém a URL de cada agiota
        // e $agiota->nome contém o nome de cada agiota
        $agiotaData[] = [
            'url' => $agiota->url,
            'nome' => $agiota->nome
        ];
    }


}

?>