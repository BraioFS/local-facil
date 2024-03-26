<?php

require "../model/usuario.model.php";
require "../service/usuario.service.php";
require "../conexao.php";

$acao = isset ($_GET['acao']) ? $_GET['acao'] : $acao;
if ($acao == 'inserir') {
    $usuario = new Usuario();
    $usuario->__set('usuario', $_POST['usuario']);

    $conexao = new Conexao();

    $usuarioService = new UsuarioService($conexao, $usuario);
    $usuarioService->inserir();

    header('Location: todas_tarefas.php');
} else if ($acao == 'recuperar') {
    $usuario = new Usuario();
    $conexao = new Conexao();

    $usuarioService = new UsuarioService($conexao, $usuario);
    $tarefas = $usuarioService->recuperar();

} else if ($acao == 'recuperarPorEmail') {
    $usuario = new Usuario();
    $conexao = new Conexao();

    $usuario->__set('email', $_POST['email']);
    
    $usuarioService = new UsuarioService($conexao, $usuario);
    $tarefas = $usuarioService->recuperar();

} else if ($acao == 'atualizar') {
    $usuario = new Usuario();
    $usuario->__set('id', $_POST['id']);
    $usuario->__set('usuario', $_POST['usuario']);

    $conexao = new Conexao();
    $usuarioService = new UsuarioService($conexao, $usuario);
    $usuarioService->atualizarNome();
    header('Location: index.php');

} else if ($acao == 'remover') {
    $usuario = new Usuario();
    $usuario->__set('id', $_GET['id']);
    $conexao = new Conexao();

    $usuarioService = new UsuarioService($conexao, $usuario);
    $usuarioService->remover();

    header('Location: todas_tarefas.php');
}

?>