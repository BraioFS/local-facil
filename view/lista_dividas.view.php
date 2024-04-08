<?php
$acao = 'buscarAgiotasFavoritos';
require '../controller/agiota.controller.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Dívidas</title>

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
                <h4><b>Agiotas Favoritos</b></h4>
            </caption>
            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                        <th scope="col">Imagem</th>
                        <th scope="col">Nome</th>
                        <th scope="col" class="pl-5">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($listaFavoritos as $key => $agiota) {
                    ?>
                        <tr>
                            <td>
                                <img src="<?php echo $agiota->url; ?>" class="img-thumbnail" alt="Foto do Agiota" width="80">
                            </td>
                            <td class="align-middle">
                                <?php echo $agiota->nome; ?>
                            </td>
                            <td class="align-middle">
                                <button type="button" class="btn btn-danger" onclick="desfavoritar(<?php echo $agiota->id; ?>)"><i class="fas fa-times-circle"></i> Desfavoritar</button>
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

    <script>
        function desfavoritar(id) {
            $.ajax({
                url: '../controller/agiota.controller.php',
                type: 'GET',
                data: {
                    acao: 'desfavoritarAgiota',
                    id: id
                },
                success: function(response) {
                    alert('Agiota desfavoritado!');
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    alert('Erro ao desfavoritar o Agiota, por favor tente novamente mais tarde!.');
                    console.log(error);
                }
            });
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>