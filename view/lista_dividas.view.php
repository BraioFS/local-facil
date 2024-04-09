<?php
$acao = 'buscarTodasDividas';
require '../controller/divida.controller.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Negócios</title>

    <!-- Folha de Estilo do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Folha de Estilo do Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Estilo personalizado -->
    <link rel="stylesheet" href="estilo/estilo.css">
</head>

<body class="bg-light">
    <div class="container">
        <div class="row mt-3 shadow-sm bg-white table-responsive caption-top p-3 rounded">
            <caption>
                <h4><b>Negócios em Aberto</b></h4>
            </caption>
            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                        <th scope="col">Agiota</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Data para Pagamento</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($listaDividas as $key => $divida) {
                    ?>
                        <tr>
                            <td class="align-middle">
                                <?php echo $divida->nome; ?>
                            </td>
                            <td class="align-middle">
                                R$ <?php echo $divida->valor; ?>
                            </td>
                            <td class="align-middle">
                                <?php echo DateTime::createFromFormat('Y-m-d', $divida->data_pagamento)->format('d/m/Y'); ?>
                            </td>

                        </tr>
                    <?php

                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="row mt-3">
            <a href="./menu.view.php">
                <button type="button" class="btn btn-secondary mb-2">
                    <i class="fas fa-angle-left mr-1"></i> Voltar
                </button>
            </a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>