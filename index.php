<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Agiota na Mão</title>

	<!-- Folha de Estilo do Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!-- Folha de Estilo do Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!-- Estilo personalizado -->
	<link rel="stylesheet" href="view/estilo/estilo.css">
	<style>
		html,
		body {
			height: 100%;
			margin: 0;
			padding: 0;
		}

		body {
			display: flex;
			justify-content: center;
			align-items: center;
			text-align: center;
		}
	</style>
</head>

<body class="bg-light">
	<div class="container">
		<div class="row">
			<img src="tmp/img/logo-acordo.svg" class="bg-white shadow-sm rounded mx-auto d-block" alt="foto" width="300" height="300">
		</div>

		<div class="row mt-4">
			<div class="col text-center">
				<div class="shadow-sm bg-white p-3 w-50 mx-auto">
					<label class="mb-0">Pague em dia, para não perder uma perninha!</label>
				</div>
			</div>
		</div>
		<div class="row mt-4 text-center">
			<div class="col">
				<a href="view/cadastro.view.php" class="shadow-sm btn btn-dark w-25 ml-2 mx-auto">Cadastre-se</a>
				<a href="view/login.view.php" class="shadow-sm btn btn-info w-25 mx-auto">Logar</a>
			</div>
		</div>
	</div>
</body>

</html>