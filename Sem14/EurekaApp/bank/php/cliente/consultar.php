<?php

// =====================================================
// Consulta de Clientes
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
		chr_cliecodigo     codigo,
		vch_cliepaterno    paterno,
		vch_cliematerno    materno,
		vch_clienombre     nombre,
		chr_cliedni        dni,
		vch_clieciudad     ciudad,
		vch_cliedireccion  direccion,
		vch_clietelefono   telefono,
		vch_clieemail      email 
		from cliente 
		where vch_cliepaterno  like :paterno 
		and   vch_cliematerno  like :materno 
    and   vch_clienombre   like :nombre ";
$stm = $pdo->prepare($sql);
$stm->bindParam(':paterno',$paterno,PDO::PARAM_STR);
$stm->bindParam(':materno',$materno,PDO::PARAM_STR);
$stm->bindParam(':nombre',$nombre,PDO::PARAM_STR);
$stm->execute();
$lista = $stm->fetchAll();

// Reporte
$textoJSON = json_encode($lista);
header('Content-Type: application/json;');
print_r($textoJSON);

?>
