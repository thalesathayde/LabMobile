<?php
include "conexao.php";

$celular = $_POST['celular_app'];
//$latitude = $_POST['lat_app'];
//$longitude = $_POST["long_app"];
//$latitude = $_POST["lat_app"];

$sql_verifica = "SELECT longitude, time FROM Posicao WHERE celular = :CELULAR GROUP BY time ORDER BY time DESC";
$stmt = $PDO->prepare($sql_verifica);
$stmt->bindParam(':CELULAR',$celular);
$stmt->execute();

if($stmt->rowCount()>0){
    //ja tem posição anterior

    $result = $stmt->fetch();
    $retornoApp = array("LONGITUDE"=>$result["longitude"]);
    
}else{
    //não tem longitude salva
    $retornoApp = array("LONGITUDE"=>"ERRO");
}

echo json_encode($retornoApp);
?>