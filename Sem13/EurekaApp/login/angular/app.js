var app = angular.module('loginApp',[]);

app.controller('loginCtrl',['$scope','$http', function($scope,$http){

	$scope.datos = {};
	$scope.procesando = false;
	$scope.hayError = false;
	$scope.mensaje = "Datos incorrectos.";



	$scope.ingresar = function(){

		$scope.procesando = true;
		console.log($scope.datos);

		var ruta = "php/login/validar.php";
		$http.post(ruta,$scope.datos).then(function(response){

			console.log(response.data);

			$scope.hayError = false;

			if(response.data.code == 1){
				window.location = response.data.url;
			} else {
				$scope.hayError = true;
				$scope.mensaje = response.data.mensaje;
			}

			$scope.procesando = false;

			setInterval(function(){ 
				$scope.hayError = false;
				$scope.$apply();
			}, 3000);

		});


	}

}]);