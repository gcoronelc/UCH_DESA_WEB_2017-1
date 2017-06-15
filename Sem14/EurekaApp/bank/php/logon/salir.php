<?php
session_start();


// =====================================================
// Valida el usuario y la clave del empleado.
// =====================================================

// Libreria
require '../db/AccesoDB.php';


// Proceso

$id =  $_SESSION["id_session"];

$sql = "update log_session 
        set fec_salida = FROM_UNIXTIME(:fecha_int) 
        where id = :id ";

$pdo = AccesoDB::getConnection();

$fecha_int = getdate()[0];
$stm = $pdo->prepare($sql);
$stm->bindParam(':fecha_int',$fecha_int,PDO::PARAM_INT);
$stm->bindParam(':id',$id,PDO::PARAM_INT);
$stm->execute();


// Finalizar sesión
session_unset();
session_destroy();

// Salida
$repo = array();
$repo["code"] = 1;
$repo["url"] = "../login/";

// Reporte
$textoJSON = json_encode($repo);
header('Content-Type: application/json;'); 
echo($textoJSON);

?>
