<?php
    include "conexao.php";

    $celular = $_POST['celular_app'];
    $senha = $_POST['senha_app'];
    //$telefone =$_POST["telefone_app"];

    $sql_login = 'SELECT * FROM Login WHERE celular = :CELULAR AND senha=:SENHA';
    $stmt = $PDO->prepare($sql_login);
    $stmt->bindParam(':CELULAR',$celular);
    $stmt->bindParam(':SENHA',$senha);
    $stmt->execute();

    if($stmt->rowCount()> 0){
        //achou
        $retornoApp = array("LOGIN"=>"SUCESSO");
    }else{
		$retornoApp = array("LOGIN"=>"ERRO");
}
echo json_encode($retornoApp);   
?>