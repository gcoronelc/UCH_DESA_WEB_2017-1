<?php
session_start();


// =====================================================
// Valida el usuario y la clave del empleado.
// =====================================================

// Libreria
require '../db/AccesoDB.php';


// Datos
$postdata = file_get_contents("php://input");
$datos = json_decode($postdata, true);

// Proceso
$pdo = AccesoDB::getConnection();
$sql = "select count(1) cont 
    from empleado 
    where vch_emplusuario  = :usuario 
    and   vch_emplclave  = :clave ";
$stm = $pdo->prepare($sql);
$stm->bindParam(':usuario',$datos["usuario"],PDO::PARAM_STR);
$stm->bindParam(':clave',$datos["clave"],PDO::PARAM_STR);
$stm->execute();
$row = $stm->fetch();

$repo = array();
if($row["cont"] == 1){
    $repo["code"] = 1;
    $repo["url"] = "../bank/";
    $_SESSION["usuario"] = $datos["usuario"];
} else {
    $repo["code"] = -1;
    $repo["mensaje"] = "Datos incorrectos.";
}

// Reporte
$textoJSON = json_encode($repo);
header('Content-Type: application/json;'); 
echo($textoJSON);

?>
