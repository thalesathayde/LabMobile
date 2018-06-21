<?php
include "conexao.php";

$celular = $_POST['celular_app'];
$latitude = $_POST['lat_app'];
$longitude = $_POST["long_app"];
//$latitude = $_POST["lat_app"];

$sql_verifica = 'SELECT * FROM Posicao WHERE celular = :CELULAR';
$stmt = $PDO->prepare($sql_verifica);
$stmt->bindParam(':CELULAR',$celular);
$stmt->execute();

if($stmt->rowCount()> 0){
    //ja tem posição anterior
    $sql_update = "UPDATE Posicao SET latitude = :LATITUDE, longitude = :LONGITUDE WHERE celular = :CELULAR;";
    $stmt = $PDO->prepare($sql_insert);

    $stmt->bindParam(':LATITUDE',$latitude);
    $stmt->bindParam(':LONGITUDE',$longitude);
    $stmt->bindParam(':CELULAR',$tcelular);

    if($stmt->execute()){
        $retornoApp = array("DISTANCIA"=>"ATUALIZADO");
    }else{
        $retornoApp = array("DISTANCIA"=>"ERRO");
    }    
}else{

    $sql_insert = "INSERT INTO Posicao(celular,latitude,longitude) VALUES (:CELULAR, :LATITUDE, :LONGITUDE); ";
    $stmt = $PDO->prepare($sql_insert);

    $stmt->bindParam(':CELULAR',$celular);
    $stmt->bindParam(':LATITUDE',$latitude);
    $stmt->bindParam(':LONGITUDE',$longitude);

    if($stmt->execute()){
        $retornoApp = array("DISTANCIA"=>"ATUALIZADO");
    }else{
        $retornoApp = array("DISTANCIA"=>"ERRO");
    }
}

echo json_encode($retornoApp);
?>