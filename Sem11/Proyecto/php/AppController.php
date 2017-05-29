<?php

// Datos
$postdata = file_get_contents("php://input");
$data = json_decode($postdata, true);

// Proceso
$data["suma"] = $data["num1"] + $data["num2"];

// Reporte
print_r(json_encode($data));

?>