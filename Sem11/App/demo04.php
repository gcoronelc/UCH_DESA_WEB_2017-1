<?php 


$datos = array(
    array('codigo' => "P01", 'nombre' => "Gustavo Coronel"), 
    array('codigo' => "P02", 'nombre' => "Ricardo Marcelo"), 
    array('codigo' => "P03", 'nombre' => "Claudia Ramirez"), 
    array('codigo' => "P04", 'nombre' => "Alejandra Ramos")
);
    
// var_dump($datos);

$json = json_encode($datos);

// var_dump($json); 

print_r($json);


?>