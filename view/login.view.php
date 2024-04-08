<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Localizador de CEP</title>

	<!-- Folha de Estilo do Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
		integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!-- Folha de Estilo do Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
		integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!-- Estilo personalizado -->
	<link rel="stylesheet" href="estilo/estilo.css">
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

		.card-login {
			width: 400px;
			padding: 20px;
			border-radius: 10px;
		}

		.card-login .card-header {
			font-size: 20px;
		}
	</style>
</head>

<body class="bg-light">
	<div class="card-login">
		<div class="card">
			<div class="card-header bg-light">
				Login
			</div>
			<div class="card-body bg-white">
				<form action="../valida_login.php" method="post">
					<div class="form-group">
						<input name="email" type="email" class="form-control w-100" placeholder="E-mail">
					</div> 
					<div class="form-group mt-1 mb-1">
						<input name="senha" type="password" class="form-control w-100" placeholder="Senha">
					</div>
					<?php if (isset($_GET['login']) && $_GET['login'] == 'erro') { ?>
						<div class="text-danger">
							Usuário ou senha inválido(s)
						</div>
					<?php } ?>
					<button class="btn btn-dark btn-block mt-3" type="submit">
						Entrar
					</button>
				</form>
			</div>
		</div>
	</div>
</body>

</html>