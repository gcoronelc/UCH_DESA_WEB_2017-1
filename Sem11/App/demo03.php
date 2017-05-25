<?php 

$datos = (object) array(
    'codigo' => "123", 
    'nombre' => "TV", 
    'precio' => 4500.00, 
    'stock' => 500
    );

// var_dump($datos);

$json = json_encode($datos);

// var_dump($json); 


print_r($json);

?>