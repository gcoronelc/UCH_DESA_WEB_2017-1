app.controller('empleadosCtrl', ['$scope','$http', function($scope,$http){

  
  $scope.setActive("mEmpleados");

  $scope.criterio  = {"paterno":"","materno":"","nombre":""};
  $scope.empleados = {};
  $scope.mostrar = false;


  $scope.consultar = function(){
    var ruta = "php/empleado/consultar.php";
    $http.get( ruta, {params:$scope.criterio} )
    .then(function(response){
      $scope.empleados = response.data;
      $scope.mostrar = (response.data.length>0);
    });    
  }

}]);