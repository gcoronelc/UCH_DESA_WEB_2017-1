<?php



// echo '<h2>ARREGLO ASOCIATIVO EN PHP</h2>';
$datos = array(
    'codigo' => "123", 
    'nombre' => "TV", 
    'precio' => 4500.00, 
    'stock' => 500
);

// var_dump($datos);

// echo '<h2>OBJETO EN JSON</h2>';
$json = json_encode($datos);
// var_dump($json);

print_r($json);

?>