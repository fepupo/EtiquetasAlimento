<?php
    $pdo = new PDO("mysql:host=localhost; dbname=gororoba; charset=utf8;", "root", "root");
    $dados = $pdo->prepare("SELECT descricao FROM tblAlimentos");
    $dados->execute();
    echo json_encode($dados->fetchAll(PDO::FETCH_ASSOC));
?>