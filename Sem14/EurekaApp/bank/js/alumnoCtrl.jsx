app.controller('alumnoCtrl', ['$scope','$routeParams','$http', function($scope,$routeParams,$http){

  $scope.setActive("mAlumnos");

  var codigo = $routeParams.codigo;

  $scope.alumno = {};
  $scope.creando = false;

  $scope.actualizado = false;
  $scope.hayError = false;
  $scope.mensaje = '';

  if(codigo == "nuevo"){
    $scope.creando = true;
  } else {
    var ruta = 'php/servicios/alumnos.getAlumno.php?c=' + codigo;
    $http.get(ruta).success(function(data){
      if(data.err !== undefined){
        window.location = "#/alumnos";
        return;
      }
      $scope.alumno = data;
    });
  }
  

  $scope.guardarAlumno = function(){

    var ruta = '';
    if($scope.creando){
      ruta = 'php/servicios/alumnos.crear.php';
    } else {
      ruta = 'php/servicios/alumnos.guardar.php';
    }
    
    $http.post(ruta,$scope.alumno).success(function(data){

      $scope.hayError = data.err;
      $scope.actualizado = (data.err == false);
      $scope.mensaje = data.mensaje;

      setTimeout(function(){
        $scope.actualizado = false;
        $scope.heyError = false;
        $scope.$apply();
      },2500);

    });

  }

}]);