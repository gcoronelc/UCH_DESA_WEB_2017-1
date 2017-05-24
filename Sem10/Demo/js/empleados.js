angular.module('empleados', [])
.controller('EmpleadoController', function($scope, $http){

 $http.get('db/empleados.php')
 .then(function(respuesta){
 
 	$scope.listaEmpleados = respuesta.data;

 })
})