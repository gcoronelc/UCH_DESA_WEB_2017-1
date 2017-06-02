<?php

// =================================================================
// Programa que permite eliminar un empleado de la base de datos.
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

    // Verificar si se encuentra asignado a una sucursal
    $query = "select count(*) cont from asignado where chr_emplcodigo = :codigo";
    $stm = $pdo->prepare($query); 
    $stm->bindParam( ':codigo', $datos["codigo"], PDO::PARAM_STR );
    $stm->execute();
    $row = $stm->fetch(); 
    $cont = $row['cont']; 
    if( $cont > 0 ){
      throw new PDOException("No se puede eliminar, tiene datos relacionados (ASIGNADO)."); 
    }

    // Verificar si tiene cuentas
    $query = "select count(*) cont from cuenta where chr_emplcreacuenta = :codigo";
    $stm = $pdo->prepare($query); 
    $stm->bindParam( ':codigo', $datos["codigo"], PDO::PARAM_STR );
    $stm->execute();
    $row = $stm->fetch(); 
    $cont = $row['cont']; 
    if( $cont > 0 ){
      throw new PDOException("No se puede eliminar, tiene datos relacionados (CUENTA)."); 
    } 

    // Verificar si tiene movimientos
    $query = "select count(*) cont from movimiento where chr_emplcodigo = :codigo";
    $stm = $pdo->prepare($query); 
    $stm->bindParam( ':codigo', $datos["codigo"], PDO::PARAM_STR );
    $stm->execute();
    $row = $stm->fetch(); 
    $cont = $row['cont']; 
    if( $cont > 0 ){
      throw new PDOException("No se puede eliminar, tiene datos relacionados (MOVIMIENTO)."); 
    } 

    // Eliminar registro
    $query = "delete from empleado where chr_emplcodigo=:codigo"; 
    $stm = $pdo->prepare($query); 
    $stm->bindParam( ':codigo', $datos["codigo"], PDO::PARAM_STR );
    $stm->execute(); 
    if( $stm->rowCount() == 0 ){
      throw new PDOException("Ya no existe el empleado."); 
    } 
 
    // Confirmar Transacción 
    $pdo->commit(); 

    // Reporte
    $repo["code"] = 1;
    $repo["mensaje"] = "El empleado ha sido eliminado de la base de datos.";

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
//header('Content-Type: application/json;'); 
echo($textoJSON);

?>