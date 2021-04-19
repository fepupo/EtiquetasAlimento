<style>
    table, td, th{
        border: 1px solid black;
        border-collapse: collapse;
        padding: 3px 1.5px;
        
    }
    .valores{
        text-align: center;
        font-size: 15px;
    }
    .bt2 {
        border: 0;
        background: none;
        display: inline-block;
        margin: 20px auto;
        text-align: center;
        border: 2px solid #104439;
        padding: 10px 35px;
        width: 140px;
        outline: none;
        color: #104439;
        border-radius: 7px;
        transition: 0.25s;
        cursor: pointer;
    }

    .bt2:hover {
        background: #104439;
        color: white;
    }
</style>

<title>Tabela Nutricional</title>

    <link rel="stylesheet" type="text/css" href="./css/estilo.css">
    <!--<link rel="stylesheet" href="./css/ingredientes.css">!-->
    <meta charset="utf-8">

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


</head>

<body>


    <?php
        include('./config/connection.php');
    ?>

    <div class="grid-container">
        <main class="main">
            <?php
                session_start();


                //Leitura das variaveis globais
                $uid              = $_SESSION["uid"];
                $alimentos        = $_SESSION["alimentos"];
                $proteinaT        = $_SESSION["proteinaT"];
                $gorduraTotalT    = $_SESSION["gorduraTotalT"];
                $carboidratosT    = $_SESSION["carboidratosT"];
                $fibraAlimentarT  = $_SESSION["fibraAlimentarT"];
                $sodioT           = $_SESSION["sodioT"];
                $gorduraSaturadaT = $_SESSION["gorduraSaturadaT"];
                $gorduraTransT    = $_SESSION["gorduraTransT"];
                $energiaKJT       = $_SESSION["energiaKJT"];
                $energiaKcalT     = $_SESSION["energiaKcalT"];
                $porcao           = $_SESSION["porcao"];
                $nomeAlimento     = $_SESSION["nomeAlimento"];
                $porcao           = $_SESSION["porcao"];
                $porcDesc         = $_SESSION["porcDesc"];


                //print($alimentos."<br>");
                print("<table style='width:300px'>");
                    print("<tr>");
                        print("<td colspan='3'><center>Informação Nutricional</center></td>");
                    print("</tr>");
                    print("<tr>");
                        print("<td colspan='3'><center>Porção de ".$porcao." g (".$porcDesc.")</center></td>");
                    print("</tr>");
                    print("<tr>");
                        print("<td colspan='2'><center>Quantidade por porção</center></td>");
                        print("<td>%VD (*)</td>");
                    print("</tr>");
                    print("<tr>");
                        print("<td>Valor Energético</td>");
                        print("<td class='valores'>".$energiaKcalT/$porcao."Kcal = ".$energiaKJT/$porcao."Kj</td>");
                        print("<td class='valores'>".intval($energiaKcalT*100/2000)."</td>");
                    print("</tr>");
                    print("<tr>");
                        print("<td>Carboidratos</td>");
                        print("<td class='valores'>".$carboidratosT/$porcao." g</td>");
                        print("<td class='valores'>".intval($carboidratosT*100/300)."</td>");
                    print("</tr>");
                    print("<tr>");
                        print("<td>Proteínas</td>");
                        print("<td class='valores'>".$proteinaT/$porcao." g</td>");
                        print("<td class='valores'>".intval($proteinaT*100/75)."</td>");
                    print("</tr>");
                    print("<tr>");
                        print("<td>Gorduras Totais</td>");
                        print("<td class='valores'>".$gorduraTotalT/$porcao." g</td>");
                        print("<td class='valores'>".intval($gorduraTotalT*100/55)."</td>");
                    print("</tr>");
                    print("<tr>");
                        print("<td>Gorduras Saturadas</td>");
                        print("<td class='valores'>".$gorduraSaturadaT/$porcao." g</td>");
                        print("<td class='valores'>".intval($gorduraSaturadaT*100/22)."</td>");
                    print("</tr>");
                    print("<tr>");
                        print("<td>Gorduras Trans</td>");
                        print("<td class='valores'>".$gorduraTransT/$porcao." g</td>");
                        print("<td class='valores'> (**) </td>");
                    print("</tr>");
                    print("<tr>");
                        print("<td>Fibra Alimentar</td>");
                        print("<td class='valores'>".$fibraAlimentarT/$porcao." g</td>");
                        print("<td class='valores'>".intval($fibraAlimentarT*100/25)."</td>");
                    print("</tr>");
                    print("<tr>");
                        print("<td>Sódio</td>");
                        print("<td class='valores'>".$sodioT/$porcao." mg</td>");
                        print("<td class='valores'>".intval($sodioT*100/2400)."</td>");
                    print("</tr>");
                    print("<tr>");
                    print("<td colspan='3'>(*)% Valores diários de referência com base em uma dieta de 2.000
                    Kcal ou 8.400 Kj. Seus valores diários podem ser maiores ou menores dependendo de suas necessidades energéticas
                    <br>
                    (**) Valores diários não estabelecidos 
                    </td>");            
                    print("</tr>");
                    print("<tr>");
                        print("<td colspan='3'><b>Ingredientes: </b>");
                            $i = 0;
                            $cont = sizeof($nomeAlimento);
                            foreach ($nomeAlimento as $key => $value) {
                                $ingrediente = str_replace(","," ", $nomeAlimento[$i]);
                                if ($i < $cont-1){
                                    print($ingrediente.", ");
                                }
                                else {
                                    print($ingrediente.". ");
                                }
                                $i = $i + 1;
                            }
                        print("</td>");            
                    print("</tr>");
                print("</table>");

                //print $porcao;
                //print $porcDesc;
                //"<button class='bt2' onclick='history.go(-1);'>Voltar</button>";
            ?>
            <a href="gerar_pdf.php" target="_blank" >
                <button type="submit" class="bt2" >Gerar PDF</button>
            </a> 
        </main>
    </div>

    <script src="./js/ingredientes.js"></script>
    <script>

    </script>
</body>

</html>