<?php

require_once ('../databases/Conexion.php');

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

@$cuenta = $request->cuenta;

$resultado = findCuenta($cuenta[0]->value);

echo json_encode($resultado);

function findCuenta($cuenta) {
    $arreglo = null;
    $conexion = new Conexion();
    $cn = $conexion->getConexion();
    $sql = "SELECT concat_ws(' ', cl.vch_cliepaterno, cl.vch_cliematerno, cl.vch_clienombre) as nombre , c.chr_cuencodigo as cuenta, m.int_movinumero as movimiento, m.dtt_movifecha as fecha, tm.vch_tipodescripcion as descripcion, tm.vch_tipoaccion as accion, m.dec_moviimporte as importe,mo.vch_monedescripcion as moneda, c.dec_cuensaldo as saldo,c.vch_cuenestado as estado
            FROM movimiento AS m
            INNER JOIN cuenta AS c ON c.chr_cuencodigo = m.chr_cuencodigo
            INNER JOIN moneda AS mo ON mo.chr_monecodigo = c.chr_monecodigo
            INNER JOIN cliente AS cl ON cl.chr_cliecodigo = c.chr_cliecodigo
            INNER JOIN tipomovimiento AS tm ON tm.chr_tipocodigo = m.chr_tipocodigo
            WHERE c.chr_cuencodigo =:cuenta";
    $statement = $cn->prepare($sql);
    $statement->bindParam(":cuenta", $cuenta);
    if ($statement->execute()) {
        while ($resultado = $statement->fetch()) {
            $arreglo[] = $resultado;
        }
    }
    return $arreglo;
}

?>