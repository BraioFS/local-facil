<?php

session_start();

if (isset($_SESSION['usuario']) && is_object($_SESSION['usuario'])){
    $usuario = $_SESSION['usuario'];
    $_SESSION['id'] = $usuario->id;
} else {
    $_SESSION['id'] = null;
}

if (!isset($_SESSION['autenticar']) || $_SESSION['autenticar'] != "SIM"){
    header('Location: index.php?login=erro');
    exit;
}

?>