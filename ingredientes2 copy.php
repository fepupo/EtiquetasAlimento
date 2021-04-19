<?php
    session_start();
?>
<!DOCTYPE html>

<head>
	<title>Receita</title>

	<link rel="stylesheet" type="text/css" href="./css/ingredientes.css">
	<link rel="stylesheet" href="./css/estilo.css">
	<meta charset="utf-8">

	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

	<script src="./js/retornoIngrediente.js"></script>

	<script>
		function reload_js(src) {
			$('script[src="' + src + '"]').remove();
			$('<script>').attr('src', src).appendTo('head');
		}
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
			<br>

			<!--cria lista de ingredientes-->
			<!--pega a variável lista da outra página-->

			<?php  
				// Definindo ID único para o cardápio
				$uid = md5(time() . mt_rand(1,1000000));
				//definindo as variaveis globais
				$_SESSION["uid"] = $uid;
				
				include_once("./config/connection.php");
				$lista = $_GET['lista']; 
			?>
			
			<!--cria os inputs-->
			<form action="./tabela.php" method="POST">
				<table>
					<?php 
					if ($lista > 0) { 
						for ($contador=0; $contador < $lista; $contador++) { 
						print "<tr>";
							print "<td class='box'><input type='number' id='qntdIngrediente' name='qntdIngrediente[]'
									placeholder='Qntd. (g)' size='10' autocomplete='on' required /></td>";

							print "<td class='box'><input type='text' id='txtIngredientes' name='txtIngredientes[]' size='50'
									placeholder='Nome do Alimento' class='ui-autocomplete-input' required /></td>";
						print "</tr>";
						}
					}
					?>
				</table>

				<!--<h2>Selecione o tipo de porcionamento</h2> !-->
				
				<select name='porcao' required>	
				<option value=''>Selecione uma porção</option>
				<?php
					$sql = 'Select * From tblporcao';
					$query = $con->query($sql);
					while ($dados=$query->fetch_array()) {
						echo "<option value=".$dados['idPorcao'].">".$dados['descricao'].'</option>';
					}
					
					
				
				?>
                </select>
				<table>
					<tr>
						<!--<td colspan='2'><button class="bt2" onclick="history.back();">Voltar</button>
						<button type="submit" name="Proximo" class="bt2">Próximo</button></td> !-->
						<center><input type="submit" class="bt2" value="Próximo"></center>
					</tr>
				</table>
			</form>
			<br>
			<br>
        </main>
        <footer class="footer"></footer>
    </div>

	<script src="./js/ingredientes.js"></script>
</body>

</html>