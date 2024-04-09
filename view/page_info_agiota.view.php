<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agiota</title>

    <!-- Folha de Estilo do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Folha de Estilo do Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Estilo personalizado -->
    <link rel="stylesheet" href="estilo/estilo.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery Mask Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>

<body class="bg-light">
    <div class="container">
        <?php
        // Verifica se o ID do agiota foi fornecido via URL
        if (isset($_GET['id'])) {
            // Inclui os arquivos necessários
            require '../model/agiota.model.php';
            require '../service/agiota.service.php';
            require '../model/conexao.php';

            // Obtém o ID do agiota da URL
            $id = $_GET['id'];

            // Cria uma instância de conexão
            $conexao = new Conexao();

            // Cria uma instância do serviço de agiota
            $agiotaService = new AgiotaService($conexao);

            // Busca as informações do agiota com o ID fornecido
            $agiota = $agiotaService->buscarAgiotaPorId($id);

            // Verifica se o agiota foi encontrado
            if ($agiota) {
        ?>
                <div class="row justify-content-center mt-4">
                    <!-- Imagem do agiota -->
                    <img src="<?php echo $agiota->url; ?>" class="bg-white shadow-sm rounded mx-auto d-block" alt="foto" width="200" height="200">
                </div>

                <div class="row mt-4">
                    <!-- Informações em formato de card -->
                    <div class="col">
                        <div class="card shadow-sm bg-white p-3 w-50 mx-auto rounded">
                            <div class="card-body">
                                <h4 class="card-title text-center"><b><?php echo $agiota->nome; ?></b></h4>
                                <p class="card-text"><b>Vítimas:</b> <?php echo $agiota->mortes; ?></p>
                                <p class="card-text"><b>Periculosidade:</b> <?php for ($i = 0; $i < $agiota->estrelas; $i++) {
                                                                                echo '<i class="fas fa-star"></i>';
                                                                            } ?></p>
                                <p class="card-text"><b>Empréstimos:</b> <?php echo $agiota->emprestimo; ?></p>
                                <p class="card-text">
                                    <b>Procurado:</b>
                                    <?php
                                    if ($agiota->procurado) {
                                        echo "Sim <i class='fas fa-exclamation-circle text-danger'></i>";
                                    } else {
                                        echo "Não";
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4 mx-auto w-50">
                    <!-- Botões "Sair" e "Negociar" -->
                    <div class="col">
                        <a href="./menu.view.php" type="button" class="btn btn-secondary"><i class="fas fa-angle-left mr-1"></i> Sair</a>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#negociarModal"><i class="fas fa-handshake mr-1"></i> Negociar</button>
                    </div>
                </div>
        <?php
            } else {
                // Se o agiota não for encontrado, exibe uma mensagem de erro
                echo "<p>Agiota não encontrado.</p>";
            }
        } else {
            // Se o ID do agiota não for fornecido, exibe uma mensagem de erro
            echo "<p>ID do agiota não fornecido.</p>";
        }
        ?>
    </div>

    <!-- Modal de Negociação -->
    <div class="modal fade" id="negociarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Negociar com o Agiota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row justify-content-center">
                    <input id="valorEmprestimo" type="text" class="form-control col-10" placeholder="Digite o valor do empréstimo">
                    <input id="dataPagamento" type="date" class="form-control col-10 mt-3" placeholder="Selecione a data de pagamento" min="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times mr-1"></i> Cancelar</button>
                    <button id="fecharNegocioBtn" type="button" class="btn btn-success"><i class="fas fa-handshake mr-1"></i> Fazer Oferta</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#valorEmprestimo').mask('000.000,00', {
                reverse: true
            });

            $('#fecharNegocioBtn').click(function() {
                var nome = "<?php echo $agiota->nome; ?>";
                var valorEmprestimo = $('#valorEmprestimo').val();
                var dataPagamento = $('#dataPagamento').val();

                $.ajax({
                    url: '../controller/divida.controller.php',
                    method: 'GET',
                    data: {
                        acao: 'fecharNegocio',
                        nome: nome,
                        valor: valorEmprestimo,
                        dataPagamento: dataPagamento
                    },
                    success: function(response) {
                        if (response === 'success') {
                            alert("Parabéns! negócio fechado com sucesso!.");
                            window.location.reload();
                        } else if (response === 'failed') {
                            alert("Infelizmente o Agiota recusou sua proposta! Tente novamente com outro valor.");
                            window.location.reload();
                        }
                    },
                    error: function(xhr, status, error) {
                        alert("Erro ao processar a requisição. Tente novamente mais tarde.");
                        console.error(error);
                    }
                });
            });
        });
    </script>


    <!-- Scripts do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+Ii0T6ft6EcFkYdAwx4J0tqriXty6UqztZ3+3so" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>