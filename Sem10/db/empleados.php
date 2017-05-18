<?php

require_once 'BaseDatos.php';

$bd = new BaseDatos();
$query = "select * from empleado";
$lista = $bd->executeQuery($query);

$jsonText = json_encode($lista);

print_r($jsonText);

?>