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
    foreach ($listaAgiotas as $agiota) {
        $listaUrls[] = $agiota->url;
    }
    
}

?>