<?php
// Tema de seguridad
session_start();
unset($_SESSION["usuario"]);
?>
<!DOCTYPE html>
<html ng-app = "loginApp" ng-controller = "loginCtrl" >
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<!-- Angular -->
	<script src="angular/lib/angular.min.js" type="text/javascript"></script>

	<!-- Modulo -->
	<script src="angular/app.js" type="text/javascript"></script>


    <title>EUREKA - LOGIN</title>
</head>
<body>
    <h1>EUREKABANK</h1>
    <h2>Ingreso al sistema</h2>

    <form name="form1" ng-submit=" ingresar() ">
    	<table>
    		<tr>
    			<td>Usuario:</td>
    			<td><input type="text" 
    					   name="usuario" 
    					   ng-model="datos.usuario"
    					   placeholder="Usuario"
    					   required="required"/></td>
    		</tr>
    		<tr>
    			<td>Clave:</td>
    			<td><input type="password" 
    			           name="clave" 
    			           ng-model="datos.clave"
    			           placeholder="Contraseña"
    			           required="required" /></td>
    		</tr>
    		<tr>
    			<td><button style="margin: 10px; padding: 10px 15px;"
    						type="submit" 
    					    ng-disabled="form1.$invalid || procesando">
    					    Ingresar 
    			</button></td>
    		</tr>
    	</table>
    </form>
    <div style="color: red; margin: 10px; padding: 10px;" 
    	 ng-show="hayError">
    	{{mensaje}}
    </div>

</body>
</html>
