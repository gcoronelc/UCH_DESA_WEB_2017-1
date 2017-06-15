var app = angular.module('eurekaApp',['ngRoute']);

app.controller('eurekaCtrl',['$scope','$http',
	function($scope,$http){

	$scope.menuSuperior = 'page/menu.html';

	// Roles
	$scope.mod_planificar = false;
	$scope.mod_venta = false;
	$scope.mod_reporte = true;
	$scope.mod_seguridad = false;

	// Leer los roles
	


	$scope.setActive = function(Opcion){

		$scope.mHome       = "";
		$scope.mEmpleados  = "";
		$scope.mClientes   = "";


		$scope[Opcion] = "active";

	}

  $scope.fnSalir = function(){
  	
	var ruta = "php/logon/salir.php";
	
	$http.post(ruta).then(function(response){

		console.log(response);

		window.location = response.data.url;

	});


  }

}]);