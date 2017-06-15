<?php

// =====================================================
// Consulta de Empleados en función a apellido 
// paterno, apellido materno, y nombre del empleado.
// =====================================================

// Libreria
require '../db/AccesoDB.php';

// Datos
$paterno = $_GET["paterno"] . "%";
$materno = $_GET["materno"] . "%";
$nombre  = $_GET["nombre"]  . "%";

// Proceso
$pdo = AccesoDB::getConnection();
$sql = "select
    chr_emplcodigo       codigo,   
    vch_emplpaterno      paterno,
    vch_emplmaterno      materno,
    vch_emplnombre       nombre,
    vch_emplciudad       ciudad,
    vch_empldireccion    direccion
    from empleado 
    where vch_emplpaterno  like :paterno 
    and   vch_emplmaterno  like :materno 
    and   vch_emplnombre   like :nombre ";
$stm = $pdo->prepare($sql);
$stm->bindParam(':paterno',$paterno,PDO::PARAM_STR);
$stm->bindParam(':materno',$materno,PDO::PARAM_STR);
$stm->bindParam(':nombre',$nombre,PDO::PARAM_STR);
$stm->execute();
$lista = $stm->fetchAll();

//print_r($lista);
//echo "<br/>----------<br/>";

// Reporte
$textoJSON = json_encode($lista);
header('Content-Type: application/json;'); 
echo($textoJSON);

?>
