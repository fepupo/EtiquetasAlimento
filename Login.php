<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="Logincss.css">
	<meta charset="utf-8">
<body>
		<div class="barra">	
		</div>

		<div class="linha"></div>
		
		<div class="menu">
			<img src="melalalancia.psd">
		</div>
		<div class="caixa">
			<form class="box" action="Login.php" method="post">

				<h1>Login</h1>
					<input type="password" name="senha" id="senha" placeholder="Senha">


				<?php
					if(isset($_POST['senha'])){
		    			$senha = $_POST['senha'];
					}
					if ($senha = 'infonutri123') { 
				
						print("<a href='Cadastro.php'>");
						print("<input type='button' name='entrar' value='Entrar' class='bt'>");
						print("</a>");	
					} 
					else { 
						print ("sua senha esta incorreta");
					} 
				?>	
			</form>
			<br>
			<br>
			<br>
			<br>
			<br>
			<a href="Home.php">
				<button class="bt2"><strong>Voltar</strong></button>
			</a>
			<a href="Cadastro.php">
				<button class="bt2">cad</button>
			</a>
		</div>
</body>
</html>
