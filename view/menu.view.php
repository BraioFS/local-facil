<?php

$acao = 'buscarTodosAgiotas';
require '../controller/agiota.controller.php';

?>

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

	<!-- Folha de Estilo do Leaflet -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

</head>

<body>
	<div id="map"></div>

	<div id="input-container">
		<form class="form-inline">
			<a href="./lista_favoritos.view.php">
				<button type="button" class="btn btn-danger mb-2">
					<i class="fas fa-star mr-1"></i> Favoritos
				</button>
			</a>
			<a href="./lista_agiotas.view.php">
				<button type="button" class="btn btn-info mb-2 ml-2">
					<i class="fas fa-male mr-1"></i> Agiotas
				</button>
			</a>
			<a href="./lista_dividas.view.php">
				<button type="button" class="btn btn-success mb-2 ml-2">
					<i class="fas fa-credit-card mr-1"></i> Dívidas
				</button>
			</a>

			<button type="button" class="btn btn-primary mb-2 ml-2" onclick="buscarCEP()"> <i
					class="fas fa-search mr-1"></i> Buscar</button>
		</form>
	</div>

	<!-- Biblioteca do Leaflet -->
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
	<!-- Biblioteca do jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<script>
		// Função para criar o popup com as informações desejadas
		function criarPopup(id, imagemUrl, nome, estrelas) {
			// Cria uma string HTML com as informações e os botões Favoritar e Emprestar
			var popupContent = '<img src="' + imagemUrl + '" style="max-width: 100px;"><br>';
			popupContent += 'Nome: ' + nome + '<br>';
			popupContent += 'Estrelas: ';
			// Adiciona as estrelas à string HTML
			for (var i = 0; i < estrelas; i++) {
				popupContent += '<i class="fas fa-star"></i>';
			}
			// Adiciona os botões Favoritar e Emprestar
			popupContent += '<div class="mt-2">';
			popupContent += '<button class="btn btn-danger btn-sm mr-2" onclick="favoritar(' + id + ', \'' + nome + '\')"><i class="fas fa-heart"></i></button>';
			popupContent += '<button class="btn btn-success btn-sm" onclick="emprestar()">Negociar</button>';
			popupContent += '</div>';
			// Cria e retorna o popup
			return L.popup().setContent(popupContent);
		}

		// Função para ser chamada ao clicar no botão Favoritar
		function favoritar() {

			alert('Item favoritado!');
		}

		var map;

		function buscarCEP() {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(function (position) {
					var lat = position.coords.latitude;
					var lon = position.coords.longitude;

					// Limpa o mapa e os marcadores antes de fazer uma nova busca
					if (map) {
						map.remove();
					}

					// Cria um novo mapa com o Leaflet
					map = L.map('map').setView([lat, lon], 15);
					L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
						maxZoom: 19,
					}).addTo(map);
					L.marker([lat, lon]).addTo(map).bindPopup('Você está aqui!');

					
					// Array de agiotas
					var agiotaData = <?php echo json_encode($agiotaData); ?>;
					// Embaralha os dados do array agiotaData
					agiotaData = shuffleArray(agiotaData);

					// Adiciona entre 1 e 5 marcadores com ícones personalizados
					var numMarkers = Math.floor(Math.random() * 5) + 1; // Entre 1 e 5 marcadores
					for (var i = 0; i < numMarkers; i++) {
						var agiota = agiotaData[i];
						var randomImageUrl = agiota.url;

						var randomLatOffset = (Math.random() - 0.5) / 111.2 * 5; // Aproximadamente 111.2 km por grau de latitude
						var randomLonOffset = (Math.random() - 0.5) / (111.2 * Math.cos(lat * Math.PI / 180)) * 5; // Aproximadamente 111.2 km por grau de longitude

						var icon = L.icon({
							iconUrl: randomImageUrl,
							iconSize: [50, 50], // Tamanho do ícone
							iconAnchor: [25, 50], // Ponto de ancoragem do ícone
							popupAnchor: [0, -50] // Ponto de ancoragem do popup
						});
						L.marker([lat + randomLatOffset, lon + randomLonOffset], {
							icon: icon
						}).addTo(map)
							.bindPopup(criarPopup(agiota.id, randomImageUrl, agiota.nome, Math.floor(Math.random() * 5) + 1));
					}
				});
			} else {
				alert('Seu navegador não suporta Geolocalização.');
			}
		}

		function shuffleArray(array) {
			for (let i = array.length - 1; i > 0; i--) {
				const j = Math.floor(Math.random() * (i + 1));
				[array[i], array[j]] = [array[j], array[i]];
			}
			return array;
		}
	</script>

</body>

</html>