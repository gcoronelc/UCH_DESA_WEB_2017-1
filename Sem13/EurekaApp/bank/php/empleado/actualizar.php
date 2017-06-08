<?php

// =================================================================
// Programa que actualiza los datos de un empleado.
// =================================================================


// Libreria
require '../db/AccesoDB.php';

// Datos
$postdata = file_get_contents("php://input");
$datos = json_decode($postdata, true);

// Proceso
$pdo = null;
$repo = array();
try { 
    
    // Objeto Connection
    $pdo = AccesoDB::getConnection();
    
    // Iniciando la Tx
    $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);
    $pdo->beginTransaction(); 

    // Verificar si existe el empleado
    $query = "select count(*) cont from empleado where chr_emplcodigo = :codigo";
    $stm = $pdo->prepare($query); 
    $stm->bindParam( ':codigo', $datos["codigo"], PDO::PARAM_STR );
    $stm->execute();
    $row = $stm->fetch(); 
    $cont = $row['cont']; 
    if( $cont == 0 ){
      throw new PDOException("El codigo del empleado nio existe."); 
    }


    // Proceso
    $query = "update empleado set
                vch_emplpaterno    = :paterno, 
                vch_emplmaterno    = :materno, 
                vch_emplnombre     = :nombre, 
                vch_emplciudad     = :ciudad, 
                vch_empldireccion  = :direccion
            where chr_emplcodigo = :codigo ";
    $stm = $pdo->prepare($query);  
    $stm->bindParam( ":codigo", $datos["codigo"], PDO::PARAM_STR ); 
    $stm->bindParam( ":paterno", $datos["paterno"], PDO::PARAM_STR ); 
    $stm->bindParam( ":materno", $datos["materno"], PDO::PARAM_STR); 
    $stm->bindParam( ":nombre", $datos["nombre"], PDO::PARAM_STR); 
    $stm->bindParam( ":ciudad", $datos["ciudad"], PDO::PARAM_STR); 
    $stm->bindParam( ":direccion", $datos["direccion"], PDO::PARAM_STR); 
    $stm->execute(); 
 
 
    // Confirmar Transacción 
    $pdo->commit(); 

    // Reporte
    $repo["code"] = 1;
    $repo["mensaje"] = "Datos del empleado actualizado.";

} catch ( PDOException $e ) { 

    // Cancelar Transacción
    try { 
      $pdo->rollBack(); 
    } catch (Exception $e) {  }

    // Reporte
    $repo["code"] = -1;
    $repo["mensaje"] = $e->getMessage();

}


// Enviar reporte
$textoJSON = "{}";
if($repo){
    $textoJSON = json_encode($repo);
}
header('Content-Type: application/json;'); 
echo($textoJSON);

?>