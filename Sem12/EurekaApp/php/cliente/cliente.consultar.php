<?php

// Libreria
require '../db/AccesoDB.php';

// Datos
$criterio = $_GET["criterio"];

// Proceso
$criterio = "%$criterio%";
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
		where vch_cliepaterno   like :criterio 
		or vch_cliematerno   like :criterio 
        or vch_clienombre    like :criterio ";
$stm = $pdo->prepare($sql);
$stm->bindParam(':criterio',$criterio,PDO::PARAM_STR); 
$stm->execute();
$lista = $stm->fetchAll();

// Reporte
$textoJSON = json_encode($lista);
header('Content-Type: application/json;');
print_r($textoJSON);

?>
