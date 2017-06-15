app.controller('clientesCtrl', ['$scope','$http', 
  function($scope,$http){

	
	$scope.setActive("mClientes");

  $scope.criterio  = {"paterno":"","materno":"","nombre":""};
  $scope.clientes = {};

  $scope.consultar = function(){
    var ruta = "php/cliente/consultar.php";
    $http.get( ruta, {params:$scope.criterio} )
    .then(function(response){
      $scope.clientes = response.data;
    });    
  }

}]);