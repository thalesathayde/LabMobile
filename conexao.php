<?php

    $dsn = "mysql:host = mysql.reunir.net.br;dbname=db_thales_uff;charset=utf8";
    $usuario = "thales_uff";
    $senha = "99059888";

    try{
        $PDO = new PDO($dsn,$usuario,$senha);
    }catch(PDOException $erro){
        echo "Erro ".$erro->getMessage();
        echo "conexao_erro";
        exit;
}
?>