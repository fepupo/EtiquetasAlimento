<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Ingredientes</title>

	<link rel="stylesheet" type="text/css" href="./css/ingredientes.css">
	<link rel="stylesheet" href="./css/estilo.css">
	<meta charset="utf-8">

	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


	<script type="text/javascript">
		$(document).ready(function () {

			// Captura o retorno do retornaIngrediente.php
			$.getJSON('retornaIngrediente.php', function (data) {
				let dados = [];

				// Armazena no array capturando somente o nome do cliente
				$(data).each(function (key, value) {
					dados.push(value.descricao);
				});

				// Chamo o Auto complete do JQuery ui setando o id do input, array 
				// com os dados e o mínimo de caracteres para disparar o AutoComplete
				$('input[type=text]').autocomplete({
					source: dados,
					minLength: 3
				});
			});
		});
	</script>
</head>


<body>

    <div class="grid-container">
    	<header class="header">
    		<br>
            <center>
                <img src="./img/logoIN.png" alt="InfoNutri" width="80" height="60">
                <img src="./img/IN.png" alt="InfoNutri" width="160" height="55">
            </center>
    	</header>
    
	    <nav class="nav">
	        <div class="btn-group">
	        	<br>
	            <a href="index.html">
	                <button>Home</button>
	            </a>
	        </div>
	    </nav>

        <main class="main">

	        <?php
				include("./config/connection.php");
			?>

			<!--envia a variável lista para outra página-->

			<form method="GET" action="Ingredientes2.php" class="box">

				<label for="lista"></label>
				<input class="box" type="number" name="lista" id="lista" placeholder="Qntd. Ingredientes" autocomplete="off" required>
				<input type="submit" class="bt2" value="Próximo"> 
			</form>
        </main>

        <footer class="footer"></footer>
    </div>

    <script type="text/javascript" src="./js/ingredientes.js"></script>

   
</body>

</html>