<?php 

$json = $_REQUEST["json"];
echo "<h2>CADENA RECIBIDA</h2>";
var_dump($json);

$datos = json_decode($json, true);
echo "<h2>EQUIVALENTE EN PHP</h2>";
var_dump($datos); 

$datos["suma"] = $datos["n1"] + $datos["n2"] + $datos["n3"] + $datos["n4"];

echo '<br/>';
echo "n1: {$datos["n1"]}<br/>";
echo "n2: {$datos["n2"]}<br/>";
echo "n3: {$datos["n3"]}<br/>";
echo "n4: {$datos["n4"]}<br/>";
echo "suma: {$datos["suma"]}<br/>";

?>