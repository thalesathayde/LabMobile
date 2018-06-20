<?php

    $dsn = "mysql:host = localhost;dbname=teste;charset=utf8";
    $usuario = "root";
    $senha = "";

    try{
        $PDO = new PDO($dsn,$usuario,$senha);
    }catch(PDOException $erro){
        echo "Erro ".$erro->getMessage();
        echo "conexao_erro";
        exit;
}
?>