<?php 
// echo '<h2>Arreglo PHP</h2>';
$datos = array(20, 30, 15, 50);
// var_dump($datos);

//echo '<h2>Arreglo en JSON</h2>';
$json = json_encode($datos);
// var_dump($json); 

print_r($json);
?>
