<?php
    session_start();
    $uid = $_SESSION["uid"];
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <link rel="stylesheet" href="./css/style.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="./css/tabelacss.css">
    <link rel="stylesheet" href="./css/estilo.css">

    <title>Informações</title>
</head>

<body>



    <?php
            //conexão com o BD
            include_once('./config/connection.php');


            //atribuindo variaveis
            $onde               = "";
            $energiaKcalT       = floatval(0);
            $energiaKJT         = floatval(0);
            $proteinaT          = floatval(0);
            $gorduraTotalT      = floatval(0);
            $carboidratosT      = floatval(0);
            $fibraAlimentarT    = floatval(0);
            $sodioT             = floatval(0);
            $gorduraSaturadaT   = floatval(0);
            $gorduraTransT      = floatval(0);
            $quantidade         = $_POST["qntdIngrediente"];
            $nomeAlimento       = $_POST["txtIngredientes"];
            $cont               = sizeof($quantidade); // quantidade de alimentos  
        ?>

    <table class="">
        <thead>
            <tr>
                <th> Quantidade </th>
                <th> Nome Alimento </th>
            </tr>
        </thead>
        <tbody>
            <?php
                    for ($i=0; $i<$cont; $i++){
                        //if($quantidade = "") continue;
                        print "<tr>";
                            print "<td>" .$quantidade[$i]. "</td>";
                            print "<td>" .$nomeAlimento[$i]. "</td>";
                        print "</tr>";
                        //monta a condição para o select
                        if ($i != $cont-1){
                            $onde = $onde."descricao = '".$nomeAlimento[$i]."' OR ";
                        }
                        else{
                            $onde = $onde."descricao = '".$nomeAlimento[$i]."'";
                        }
                    }
                ?>
        </tbody>
    </table>

    <br>
    <br>
    <?php
            $porcao = $_POST['porcao'];
            // buscando as informacoes de porcao

            $sql = "SELECT * from tblPorcao where idporcao = '".$porcao."'";
            $query = mysqli_query($con,$sql);
            $registro = mysqli_fetch_array($query);
            $porcao = $registro['valorg'];
            $porDesc = $registro['descricao'];
            $porcao = floatval($porcao);
            
            
            $sql = "SELECT * FROM tblAlimentos where ".$onde;
            //print $sql;
            $query = mysqli_query($con,$sql);

            if (!$query) {
                die("Consulta Não Realizada");
            }
            else
            {
                print ("<table class='tabelaCardapio'>");
                print ("<thead>");
                print ("<tr align='center'>");
                //print ("<th>Código TACO</th>");
                print ("<th>Quantidade (g)</th>");
                print ("<th>Descrição</th>");
                print ("<th>Energia (Kcal)</th>");
                print ("<th>Energia (Kj)</th>");
                print ("<th>Proteina (g)</th>");
                print ("<th>Gorduras Totais (g)</th>");
                print ("<th>Carboidratos(g)</th>");
                print ("<th>Fibras Alimentares (g)</th>");
                print ("<th>Sódio (mg)</th>");
                print ("<th>Gorduras Saturadas(g)</th>");
                print ("<th>Gorduras Trans(g)</th>");
                print ("</tr>");
                print ("</thead>");
                print ("<tbody>");
                $i = 0;
                while ($registro = mysqli_fetch_array($query)) {
                    
                    //calculando os valores para a porção converte o valor de string para float
                    $energiaKcal = floatval(str_replace(",", ".",$registro['energiaKcal'])) * $quantidade[$i] / 100;
                    $energiaKj = floatval(str_replace(",", ".",$registro['energiaKj'])) * $quantidade[$i] / 100;
                    $proteina = floatval(str_replace(",", ".",$registro['proteina'])) * $quantidade[$i] / 100;                    
                    $gorduraTotal = floatval(str_replace(",", ".",$registro['gorduraTotal'])) * $quantidade[$i] / 100;
                    $carboidratos = floatval(str_replace(",", ".",$registro['carboidratos'])) * $quantidade[$i] / 100;
                    $fibraAlimentar = floatval(str_replace(",", ".",$registro['fibraAlimentar'])) * $quantidade[$i] / 100;
                    $sodio = floatval(str_replace(",", ".",$registro['sodio'])) * $quantidade[$i] / 1000;
                    $gorduraSaturada = floatval(str_replace(",", ".",$registro['gorduraSaturada'])) * $quantidade[$i] / 100;
                    $gorduraTrans = floatval(str_replace(",", ".",$registro['gorduraTrans'])) * $quantidade[$i] / 100;

                    
                    //exibindo os valores calculados
                    print ("<tr>");
                        //print ("<td>".$registro['codigoTACO']."</td>");
                        print ("<td>".$quantidade[$i]."</td>");
                        print ("<td>".$registro['descricao']."</td>");
                        print ("<td>".$energiaKcal."</td>");
                        print ("<td>".$energiaKj."</td>");
                        print ("<td>".$proteina."</td>");
                        print ("<td>".$gorduraTotal."</td>");
                        print ("<td>".$carboidratos."</td>");
                        print ("<td>".$fibraAlimentar."</td>");
                        print ("<td>".$sodio."</td>");
                        print ("<td>".$gorduraSaturada."</td>");
                        print ("<td>".$gorduraTrans."</td>");
                    print ("</tr>");
 
                    //Calculo dos totais
                    $proteinaT = $proteinaT + $proteina;
                    $gorduraTotalT = $gorduraTotalT + $gorduraTotal;
                    $carboidratosT = $carboidratosT + $carboidratos;
                    $fibraAlimentarT = $fibraAlimentarT + $fibraAlimentar;
                    $sodioT = $sodioT + $sodio;
                    $gorduraSaturadaT = $gorduraSaturadaT + $gorduraSaturada;
                    $energiaKJT = $energiaKJT + $energiaKj;
                    $energiaKcalT = $energiaKcalT + $energiaKcal;
                    $gorduraTransT = $gorduraTransT + $gorduraTrans;
                    $i++;
                }
            }
            


            //definindo as variaveis globais
                $_SESSION['alimentos']          = $onde;
                $_SESSION["proteinaT"]          = $proteinaT;
                $_SESSION["gorduraTotalT"]      = $gorduraTotalT;
                $_SESSION["carboidratosT"]      = $carboidratosT;
                $_SESSION["fibraAlimentarT"]    = $fibraAlimentarT;
                $_SESSION["sodioT"]             = $sodioT;
                $_SESSION["gorduraSaturadaT"]   = $gorduraSaturadaT;
                $_SESSION["gorduraTransT"]      = $gorduraTransT;
                $_SESSION["energiaKJT"]         = $energiaKJT;
                $_SESSION["energiaKcalT"]       = $energiaKcalT;
                $_SESSION["uid"]                = $uid;
                $_SESSION["porcao"]             = $porcao;
                $_SESSION["porcDesc"]           = $porDesc; //descricao da porcao
                $_SESSION["nomeAlimento"]       = $nomeAlimento;
            // fim das variaveis globais

                    print("<tr>");
                        print("<td colspan='2'> TOTAIS");
                        print("<td>".$energiaKcalT."</td>");
                        print("<td>".$energiaKJT."</td>");
                        print("<td>".$proteinaT."</td>");
                        print("<td>".$gorduraTotalT."</td>");
                        print("<td>".$carboidratosT."</td>");
                        print("<td>".$fibraAlimentarT."</td>");
                        print("<td>".$sodioT."</td>");
                        print("<td>".$gorduraSaturadaT."</td>");
                        print("<td>".$gorduraTransT."</td>");
                    print("</tr>");
                print ("</tbody>");
            print "</table>";
          
            print("<br>");

            //print("Valores Nutricionais<br>");

            print("<table>");
                print("<tr>");
                    print("<th colspan='2'> TOTAIS</th>");
                    print("<th>Energia (Kcal)</th>");
                    print("<th>Energia (Kj)</th>");
                    print("<th>Proteinas</th>");
                    print("<th> Gordura Total</th>");
                    print("<th> Carboidratos Totais</th>");
                    print("<th> Fibras Totais</th>");
                    print("<th>Sódio Total</th>");
                    print("<th> Gordura Saturada</th>");
                    print("<th> Gordura Trans</th>");
                print("</tr>");

                print("<tr>");
                    print("<td colspan='2'> TOTAIS"."</td>");
                    print("<td>".$energiaKcalT/ $porcao."</td>");
                    print("<td>".$energiaKJT / $porcao."</td>");
                    print("<td>".$proteinaT / $porcao."</td>");
                    print("<td>".$gorduraTotalT / $porcao."</td>");
                    print("<td>".$carboidratosT / $porcao."</td>");
                    print("<td>".$fibraAlimentarT / $porcao."</td>");
                    print("<td>".$sodioT / $porcao."</td>");
                    print("<td>".$gorduraSaturadaT / $porcao."</td>");
                    print("<td>".$gorduraTransT / $porcao."</td>");
                print("</tr>");
            print("</table>");
            

            $alimento = $_POST["txtIngredientes"];
            
            $i = 0;
            foreach ($alimento as $key => $value) {
                $sql = "INSERT INTO tbletiqueta (uid, nomeAlimento, qtdAlimento, porcao) values (";
                $sql = $sql."'".$uid."',";
                $sql = $sql."'".$alimento[$i]."',"; 
                $sql = $sql.$quantidade[$i].",";
                $sql = $sql.$porcao.")";
                //print($sql);
                print("<br>");
                mysqli_query($con,$sql);
                $i = $i + 1;
            }
            


    ?>
        
    </main>

    <footer class="footer">

        <button class='bt2' onclick='history.go(-1);'>Voltar</button>
            <div class=""> 
                <a href="etiqueta.php">
                    <button class="bt2">Próximo</button>
                </a>
            </div>
    </footer>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</body>

</html>