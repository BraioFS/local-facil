<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../model/divida.model.php';
require '../service/divida.service.php';
require '../model/conexao.php';

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if ($acao == 'buscarTodasDividas') {
    $conexao = new Conexao();

    $dividaService = new DividaService($conexao);
    $listaDividas = $dividaService->buscarTodasDividas();
} else if ($acao == 'fecharNegocio') {
    $nome = isset($_GET['nome']) ? $_GET['nome'] : null;
    $valor = isset($_GET['valor']) ? $_GET['valor'] : null;
    $dataPagamento = isset($_GET['dataPagamento']) ? $_GET['dataPagamento'] : null;

    // Gerar um número aleatório entre 0 e 1
    $rand = rand(0, 2);

    // 50% de chance de sucesso, 50% de chance de falha
    if ($rand == 1) {
        $conexao = new Conexao();

        $dividaService = new DividaService($conexao);
        $dividaService->negociar($nome, $valor, $dataPagamento);

        echo "success";
    } else {
        echo "failed";
    }
} else {
    echo "Ação inválida.";
}
