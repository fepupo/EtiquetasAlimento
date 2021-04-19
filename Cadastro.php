<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="./css/cadastro.css">
	<meta charset="utf-8">
	<body>
		<div class="barra">	
		</div>

		<div class="linha"></div>

		<div class="menu">

		<a href="Home.php">
			<input type="button" name="" value="Home" class="bt">
		</a>


		</div>

		<div class="caixa">

			<form action="Cadastro.php" method="POST" class="box">

				<fieldset>
					<h6>
					<table>
						<tr>
						<td>Código do Alimento:</td>  
						<td><input type="text" name="codigo" required></td>
						<td>Nome do Alimento:</td>    
						<td><input type="text" name="descricao" required></td>
						</tr>
						<tr>
						<td>Energia (kcal):</td>
						<td><input type="text" name="energia_kcal" required></td>
						<td>Energia (kj):</td>
						<td><input type="text" name="energia_kj" required></td>
						</tr>
						<tr>
						<td>Proteína (g):</td>
						<td><input type="text" name="proteina" required></td>
						<td>Gorduras Totais (g):</td>
						<td><input type="text" name="gorduras_totais" required></td>
						</tr>
						<tr>
						<td>Carboidratos (g):</td>
						<td><input type="text" name="carboidratos" required></td>
						<td>Fibra Alimentar (g):</td>
						<td><input type="text" name="fibra_alimentar" required></td>
						</tr>
						<tr>
						<td>Sódio (mg):</td>
						<td><input type="text" name="sodio" required></td>
						<td>Gorduras Saturadas (g):</td>
						<td><input type="text" name="gorduras_saturadas" required></td>
						<tr>
						<tr>
						<td>Gorduras Trans (g):</td>
						<td><input type="text" name="gorduras_trans" required></td>
						<tr>
					</table>
					<table>
						<tr>
						<td><input type="submit" name="enviar" value="Enviar" class="bt1"></td>
						<td><input type="reset" name="limpar" value="Limpar" class="bt1"></td>
						<tr>
					</table>
					</h6>
				</fieldset>
			</form>
			<?php
				if (isset($_POST['enviar'])){
					$codigo = $_POST['codigo'];
					$descricao = $_POST['descricao'];
					$energia_kcal = $_POST['energia_kcal'];
					$energia_kj = $_POST['energia_kj'];
					$proteina = $_POST['proteina'];
					$gorduras_totais = $_POST['gorduras_totais'];
					$carboidratos = $_POST['carboidratos'];
					$fibra_alimentar = $_POST['fibra_alimentar'];
					$sodio = $_POST['sodio'];
					$gorduras_saturadas = $_POST['gorduras_saturadas'];
					$gorduras_trans = $_POST['gorduras_trans'];


					if(!$cone) {
						die("A conexão falhou.".mysqli_connect_error());
					}
			
					$sql = "INSERT INTO alimentos (codigo,descricao,energia(kcal),energia(kj),proteina(g),gorduras_totais(g),carboidratos(g),fibra_alimentar(g),sodio(mg),gorduras_saturadas(g),gorduras_trans(g)) VALUES (null,'$codigo','$descricao','$energia_kcal','energia_kj','proteina','gorduras_totais','carboidratos','fibra_alimentar','sodio','gorduras_saturadas','gorduras_trans')";

					if(mysqli_query($cone, $sql)){
						echo "Cadastro realizado com sucesso!";
					}
					else{
						echo "Há algo errado!!!";
					}
				}
			?>	
		</div>			
	</body>
</html>