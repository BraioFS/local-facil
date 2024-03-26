<?php

require "../model/estabelecimento.model.php";
require "../service/estabelecimento.service.php";
require "../conexao.php";

$acao = isset ($_GET['acao']) ? $_GET['acao'] : $acao;
if ($acao == 'inserir') {
    $estabelecimento = new Estabelecimento();
    $estabelecimento->__set('estabelecimento', $_POST['estabelecimento']);

    $conexao = new Conexao();

    $estabelecimentoService = new EstabelecimentoService($conexao, $estabelecimento);
    $estabelecimentoService->inserir();

    header('Location: todas_tarefas.php');
} else if ($acao == 'recuperar') {
    $estabelecimento = new Estabelecimento();
    $conexao = new Conexao();

    $estabelecimentoService = new EstabelecimentoService($conexao, $estabelecimento);
    $tarefas = $estabelecimentoService->recuperar();

} else if ($acao == 'atualizar') {
    $estabelecimento = new Estabelecimento();
    $estabelecimento->__set('id', $_POST['id'])
        ->__set('estabelecimento', $_POST['estabelecimento']);

    $conexao = new Conexao();
    $estabelecimentoService = new EstabelecimentoService($conexao, $estabelecimento);
    $estabelecimentoService->atualizar();
    header('Location: index.php');

} else if ($acao == 'remover') {
    $estabelecimento = new Estabelecimento();
    $estabelecimento->__set('id', $_GET['id']);
    $conexao = new Conexao();

    $estabelecimentoService = new EstabelecimentoService($conexao, $estabelecimento);
    $estabelecimentoService->remover();

    header('Location: todas_tarefas.php');
}

?>