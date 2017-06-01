app.controller('clientesCtrl', ['$scope','$http', 
  function($scope,$http){

	
	$scope.setActive("mClientes");

  $scope.criterio  = "";
  $scope.clientes = {};

  $scope.consultar = function(){
    var ruta = "php/cliente/cliente.consultar.php?criterio=" + $scope.criterio;
    $http.get(ruta)
    .success(function(data){
      $scope.clientes = data;
    });    
  }


/*
  $scope.posicion = 5;

  $http.get('php/servicios/alumnos.listado.php')
    .success(function(data){
      $scope.alumnos = data;
  });

  $scope.fnSiguiente = function(){
    if($scope.alumnos.length > $scope.posicion){
      $scope.posicion += 5;
    }
  }

  $scope.fnAnterior = function(){
    if($scope.posicion > 5){
      $scope.posicion -= 5;
    }
  }
*/

}]);