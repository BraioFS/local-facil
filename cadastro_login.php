<?php

session_start();

require 'controller/login.controller.php';
require_once 'model/conexao.php';

$conexao = new Conexao();
$loginController = new LoginController($conexao);

$loginController->cadastrar($_POST['nome'], $_POST['email'], $_POST['senha']);
