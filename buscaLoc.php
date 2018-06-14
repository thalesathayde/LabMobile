<?php
include "conexao.php";

$celular = $_POST['celular_app'];
//$latitude = $_POST['lat_app'];
//$longitude = $_POST["long_app"];
//$latitude = $_POST["lat_app"];

$sql_verifica = "SELECT latitude, longitude FROM Posicao WHERE celular = :CELULAR";
$stmt = $PDO->prepare($sql_verifica);
$stmt->bindParam(':CELULAR',$celular);
$stmt->execute();

if($stmt->rowCount()> 0){
    //ja tem posição anterior
    $sql_carrega = "SELECT latitude, longitude FROM Posicao celular = :CELULAR;";
    $stmt = $PDO->prepare($sql_insert);

    //$stmt->bindParam(':LATITUDE',$latitude);
    //$stmt->bindParam(':LONGITUDE',$longitude);
    $stmt->bindParam(':CELULAR',$tcelular);
	$stmt->execute();


	//$row = $stmt->fetch(PDO::FETCH_ASSOC);
	//$row2 = $stmt->fetch(PDO::FETCH_ASSOC);
	
//	$retornoApp = array("LATITUDE"=>row[latitude]);
//	$retornoApp = array("LONGITUDE"=>row[longitude])
    
}else{

    $stmt = NULL;
}

echo json_encode($stmt);
?>