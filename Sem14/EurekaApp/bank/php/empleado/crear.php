<?php

// =================================================================
// Programa que crea un nuevo empleado en la base de datos.
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

    // Leer datos del contador 
    $query = "select int_contitem cont, int_contlongitud size 
                from contador 
                where vch_conttabla='Empleado' 
                for update";
    $stm = $pdo->prepare($query); 
    $stm->execute();
    if( $stm->rowCount() == 0 ){
      throw new PDOException("No se tiene datos del contador."); 
    } 
    $row = $stm->fetch(); 
    $cont = $row['cont']; 
    $size = $row['size']; 

    // Actualizar contador
    $cont = $cont + 1; 
    $query = "update contador 
                set  int_contitem = :cont 
                where vch_conttabla='Empleado' "; 
    $stm = $pdo->prepare($query); 
    $stm->bindParam(':cont',$cont,PDO::PARAM_INT);
    $stm->execute(); 
    if( $stm->rowCount() == 0 ){
      throw new PDOException("No se puede actualizar los datos del contador."); 
    } 

    // Generar codigo del nuevo empleado.
    $codigo = str_pad("$cont", $size, "0", STR_PAD_LEFT);

    // Insertar nuevo empleado 
    $query = "insert into empleado( chr_emplcodigo, vch_emplpaterno, 
            vch_emplmaterno, vch_emplnombre, vch_emplciudad, vch_empldireccion) 
            values(:codigo,:paterno,:materno,:nombre,:ciudad,:direccion)"; 
    $stm = $pdo->prepare($query); 
    $stm->bindParam( ":codigo", $codigo, PDO::PARAM_STR ); 
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
    $repo["mensaje"] = "Código del empleado es $codigo.";

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