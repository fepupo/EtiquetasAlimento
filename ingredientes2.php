<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Receita</title>

    <meta name="description" content="Sistema de geração de etiquetas nutricionais">
    <meta name="author" content="Felipe Fonseca">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <link rel="stylesheet" href="./css/style.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/retornoIngrediente.js"></script>

</head>

<body>
    <?php  
		// Definindo ID único para o cardápio
		$uid = md5(time() . mt_rand(1,1000000));
		//definindo as variaveis globais
		$_SESSION["uid"] = $uid;
		//conexão com o banco de dados
		include_once("./config/connection.php");
		//$lista = $_GET['lista']; 
	?>

    <div class="container-fluid">

        <!-- PRINCIPAL -->
        <div class="col-sm-10">
            <form role="form" action="./tabela.php" method="POST" class="inline-form">
                <div class="row" id="form_alimento">
                    <div class='alimentos row col-sm-12'>
                        <div class="col-sm-2">
                            <input type='number' class='form-control boxQtd' id='qntdIngrediente'
                                name='qntdIngrediente[]' placeholder='Qntd. (g)' size='10' autocomplete='on' required />
                        </div>
                        <div class="col-sm-7">
                            <input type='text' class='form-control box ui-autocomplete-input' id='txtIngredientes' name='txtIngredientes[]'
                                placeholder='Nome do Alimento' required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button type='button' id='addCampo' class='btn btn-primary botao'> <i class="fas fa-plus"> </i>
                            Adicionar Item
                        </button>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12">
                        <div class="form-group">
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
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary botao">
                            Próximo
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="./js/scripts.js"></script>
</body>

</html>