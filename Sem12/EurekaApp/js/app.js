var app = angular.module('eurekaApp',['ngRoute']);

app.controller('eurekaCtrl',['$scope','$http',
	function($scope,$http){

	$scope.menuSuperior = 'paginas/menu.html';

	$scope.setActive = function(Opcion){

		$scope.mInicio     = "";
		$scope.mEmpleados = "";
		$scope.mClientes    = "";

		$scope[Opcion] = "active";

	}


}]);