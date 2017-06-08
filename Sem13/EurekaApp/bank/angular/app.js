var app = angular.module('eurekaApp',['ngRoute']);

app.controller('eurekaCtrl',['$scope','$http',
	function($scope,$http){

	$scope.menuSuperior = 'page/menu.html';

	$scope.setActive = function(Opcion){

		$scope.mHome       = "";
		$scope.mEmpleados  = "";
		$scope.mClientes   = "";

		$scope[Opcion] = "active";

	}


}]);