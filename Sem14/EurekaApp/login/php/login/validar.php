<?php
session_start();


// =====================================================
// Valida el usuario y la clave del empleado.
// =====================================================

// Libreria
require '../db/AccesoDB.php';


// Datos
$postdata = file_get_contents("php://input");
$datos = json_decode($postdata, true);

// Proceso
$pdo = AccesoDB::getConnection();

$sql = "select chr_emplcodigo codigo 
    from empleado 
    where vch_emplusuario  = :usuario 
    and   vch_emplclave  = :clave ";

$stm = $pdo->prepare($sql);
$stm->bindParam(':usuario',$datos["usuario"],PDO::PARAM_STR);
$stm->bindParam(':clave',$datos["clave"],PDO::PARAM_STR);
$stm->execute();

$row = $stm->fetch();
$repo = array();

if( $row ){

    $repo["code"] = 1;
    $repo["url"] = "../bank/";
    $_SESSION["usuario"] = $datos["usuario"];

    // Grabar datos de session

    $fecha_int = getdate()[0];
    $sql = "insert into log_session(chr_emplcodigo,fec_ingreso,ip)
    	values(:codigo,FROM_UNIXTIME(:fecha_int),'123456')";
	$stm = $pdo->prepare($sql);
	$stm->bindParam(':codigo',$row["codigo"],PDO::PARAM_STR);
	$stm->bindParam(':fecha_int',$fecha_int,PDO::PARAM_INT);
	$stm->execute();

	// Obtener el ID
	$sql = "select last_insert_id() as id";
	$stm = $pdo->prepare($sql);
	$stm->execute();
	$row = $stm->fetch();
	$_SESSION["id_session"] = $row["id"];

} else {

    $repo["code"] = -1;
    $repo["mensaje"] = "Datos incorrectos.";

}


// Reporte
$textoJSON = json_encode($repo);
header('Content-Type: application/json;'); 
echo($textoJSON);

?>
