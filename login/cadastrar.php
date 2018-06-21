<?php
    include "conexao.php";

    $nome = $_POST['nome_app'];
    $celular = $_POST['celular_app'];
    $senha = $_POST['senha_app'];
    //$telefone =$_POST["telefone_app"];

    $sql_verifica = 'SELECT * FROM Login WHERE celular = :CELULAR';
    $stmt = $PDO->prepare($sql_verifica);
    $stmt->bindParam(':CELULAR',$celular);
    $stmt->execute();

    if($stmt->rowCount()> 0){
        //CELULAR ja cadastrado
        $retornoApp = array("CADASTRO"=>"CELULAR_ERRO");
    }else{

        $sql_insert = "INSERT INTO Login(nome,celular,senha) VALUES (:NOME, :CELULAR, :SENHA); ";
        $stmt = $PDO->prepare($sql_insert);

        $stmt->bindParam(':NOME',$nome);
        $stmt->bindParam(':CELULAR',$celular);
        $stmt->bindParam(':SENHA',$senha);
        //$stmt->bindParam(':TELEFONE',$telefone);

        if($stmt->execute()){
            $retornoApp = array("CADASTRO"=>"SUCESSO");
        }else{
            $retornoApp = array("CADASTRO"=>"ERRO");
        }


    }

    echo json_encode($retornoApp);
?>