<?php
    include "conexao.php";

    $celular = $_POST['celular_app'];
    //$senha = $_POST['senha_app'];
    //$telefone =$_POST["telefone_app"];

    $sql_login = 'SELECT * FROM posicao WHERE celular = :CELULAR';
    $stmt = $PDO->prepare($sql_login);

    $stmt->bindParam(':CELULAR',$celular);
    //$stmt->bindParam(':SENHA',$senha);
    $stmt->execute();

    if($stmt->rowCount()> 0){
        //achou
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        //print_r($user);
        $retornoApp = $user;
    }else{
		$retornoApp = array("latitude"=>"ERRO");
}
echo json_encode($retornoApp);   
?>