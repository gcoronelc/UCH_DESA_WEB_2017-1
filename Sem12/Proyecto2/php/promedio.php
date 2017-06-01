<?php

// Datos: nota1, nota2, nota3, nota4
// Los datos se reciben en formato JSON
$postdata = file_get_contents("php://input");

// Se convierten a arreglo asiciativo
$data = json_decode($postdata, true);

// Proceso
$data["prom"] = ($data["nota1"] + $data["nota2"]
	+ $data["nota3"] + $data["nota4"]) / 4;

// Reporte
// Se convierte el arreglo asociativo a json
print_r(json_encode($data));

?>