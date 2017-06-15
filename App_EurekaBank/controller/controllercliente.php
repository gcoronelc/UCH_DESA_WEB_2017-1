<?php

require_once ('../databases/Conexion.php');

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

@$codigo = $request->codigo;
@$accion = $request->accion;

switch ($accion) {
    case "listar":
        $respuesta = readAll();
        break;
    case "crear":
        $respuesta = create($codigo, $paterno, $materno, $nombre, $dni, $ciudad, $direccion, $telefono, $email);
        break;
    case "modificar":
        $respuesta = update($codigo, $paterno, $materno, $nombre, $dni, $ciudad, $direccion, $telefono, $email);
        break;
    case "eliminar":
        $respuesta = delete($codigo);
        break;
    default:
        break;
}

echo json_encode($respuesta);

function create($codigo, $paterno, $materno, $nombre, $dni, $ciudad, $direccion, $telefono, $email) {
    $arreglo = null;
    $conexion = new Conexion();
    $cn = $conexion->getConexion();

    //Si encuentra el codigo cliente

    if ($this->findDocente($codigo) == 1) {
        return alert("COdigo ya existe");
    } else {
        $sql = "SELECT chr_cliecodigo AS codigo, vch_cliepaterno AS paterno, vch_cliematerno AS materno,
        vch_clienombre AS nombre, chr_cliedni AS dni, vch_clieciudad AS ciudad, vch_cliedireccion AS direccion, vch_clietelefono AS telefono, vch_clieemail AS email
FROM cliente FROM cliente";
        $statement = $cn->prepare($sql);
        $statement->bindParam(":codigo", $codigo);
        $statement->bindParam(":paterno", $paterno);
        $statement->bindParam(":materno", $materno);
        $statement->bindParam(":nombre", $nombre);
        $statement->bindParam(":dni", $dni);
        $statement->bindParam(":ciudad", $ciudad);
        $statement->bindParam(":direccion", $direccion);
        $statement->bindParam(":telefono", $telefono);
        $statement->bindParam(":email", $email);
    }

    if ($statement->execute()) {
        while ($resultado = $statement->fetch()) {
            $arreglo[] = $resultado;
        }
    }
    return $arreglo;
}

function readAll() {
    $arreglo = null;
    $conexion = new Conexion();
    $cn = $conexion->getConexion();
    $sql = "SELECT chr_cliecodigo AS codigo, vch_cliepaterno AS paterno, vch_cliematerno AS materno, vch_clienombre AS nombre, 
        chr_cliedni AS dni, vch_clieciudad AS ciudad, vch_cliedireccion AS direccion, vch_clietelefono AS telefono, vch_clieemail AS email
FROM cliente";
    $statement = $cn->prepare($sql);
    $statement->bindParam(":codigo", $codigo);
    if ($statement->execute()) {
        while ($resultado = $statement->fetch()) {
            $arreglo[] = $resultado;
        }
    }
    return $arreglo;
}

function delete($codigo) {
    $rpt=0;
    $arreglo = null;
    $conexion = new Conexion();
    $cn = $conexion->getConexion();
    $sql = "DELETE FROM cliente WHERE chr_cliecodigo=:codigo";
    $statement = $cn->prepare($sql);
    $statement->bindParam(":codigo", $codigo);
    if ($statement->execute()) {
       $rpt=1;
    }
    return $rpt;
}

function update($codigo, $paterno, $materno, $nombre, $dni, $ciudad, $direccion, $telefono, $email) {
    $arreglo = null;
    $conexion = new Conexion();
    $cn = $conexion->getConexion();
    $sql = "UPDATE cliente SET chr_cliecodigo:codigo, vch_cliepaterno;paterno, vch_cliematerno:materno, vch_clienombre :nombre, 
        chr_cliedni :dni, vch_clieciudad:ciudad, vch_cliedireccion :direccion, vch_clietelefono:telefono, vch_clieemail :email
FROM cliente";
    $statement = $cn->prepare($sql);
    $statement->bindParam(":codigo", $codigo);
    $statement->bindParam(":vch_cliepaterno", $paterno);
    $statement->bindParam(":vch_cliematerno", $materno);
    $statement->bindParam(":vch_clienombre", $nombre);
    $statement->bindParam(":chr_cliedni", $dni);
    $statement->bindParam(":vch_clieciudad", $ciudad);
    $statement->bindParam(":vch_cliedireccion", $direccion);
    $statement->bindParam(":vch_clietelefono", $telefono);
    $statement->bindParam(":vch_clieemail", $email);
    if ($statement->execute()) {
        while ($resultado = $statement->fetch()) {
            $arreglo[] = $resultado;
        }
    }
    return $arreglo;
}

?>