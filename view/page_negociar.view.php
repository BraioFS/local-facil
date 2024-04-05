<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Dividas</title>

    <!-- Folha de Estilo do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Folha de Estilo do Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Estilo personalizado -->
    <link rel="stylesheet" href="estilo/estilo.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Incluindo jQuery -->
</head>

<body>
    <div class="container">
        <div class="row">
            <form id="formNegociar">
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <label for="valor">Valor:</label>
                <input type="text" id="valor" name="valor" class="form-control">
                <button type="button" id="btnNegociar" class="btn btn-primary">Negociar</button>
            </form>
        </div>

        <div class="row justify-content-start">
            <a href="./menu.view.php">
                <button type="button" class="btn btn-outline-secondary mb-2 ml-2">
                    <i class="fas fa-arrow-left mr-1"></i> Voltar
                </button>
            </a>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#btnNegociar").click(function() {
                var formData = $("#formNegociar").serialize();

                $.ajax({
                    type: "GET",
                    url: "../controller/agiota.controller.php?acao=negociar",
                    data: formData,
                    success: function(response) {
                        alert("Negociação realizada com sucesso!");
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>