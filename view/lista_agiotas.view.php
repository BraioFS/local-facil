<?php
$acao = 'buscarTodosAgiotas';
require '../controller/agiota.controller.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Agiotas</title>

    <!-- Folha de Estilo do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Folha de Estilo do Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Estilo personalizado -->
    <link rel="stylesheet" href="estilo/estilo.css">
</head>

<body>
    <div class="container">
        <div class="row mt-2">
            <h1>Agiotas Virtuais</h1>
        </div>

        <div class="row mt-2">
            <table class="table table-striped table-sm">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Perfil</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Estrelas</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($listaAgiotas as $key => $agiota) {
                    ?>
                        <tr>
                            <td>
                                <img src="<?php echo $agiota->url; ?>" class="img-thumbnail" alt="Foto do Agiota" width="80">
                            </td>
                            <td class="align-middle">
                                <?php echo $agiota->nome; ?>
                            </td>

                            <td class="align-middle">
                                <?php
                                for ($i = 0; $i < $agiota->estrelas; $i++) {
                                    echo '<i class="fas fa-star"></i>';
                                }
                                ?>
                            </td>

                            <td>
                            </td>

                        </tr>
                    <?php

                    }
                    ?>
                    
                </tbody>
            </table>
        </div>

        <div class="row justify-content-start">
            <a href="./menu.view.php">
                <button type="button" class="btn btn-outline-secondary mb-2 ml-2">
                    <i class="fas fa-arrow-left mr-1"></i> Voltar
                </button>
            </a>
        </div>
    </div>
</body>

</html>