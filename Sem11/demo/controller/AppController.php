<?php

// Datos
$data = $_GET["json"];
//var_dump($data);

$data = json_decode($data,true);
//var_dump($data);

$data["suma"] = $data["n1"] + $data["n2"];

//var_dump($data);



// Reporte
//$data["su"] = $suma;
print_r(json_encode($data));

?>