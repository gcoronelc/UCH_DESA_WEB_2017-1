app.controller('empleadoCtrl', ['$scope','$routeParams','$http', function($scope,$routeParams,$http){

  // Para activar el menú
  $scope.setActive("mEmpleados");

  // El codigo enviado como parámetro
  var codigo = $routeParams.codigo;

  // El registro con los datos del empleado
  $scope.empleado = {};

  // Si es true, se trata de un empleado nuevo
  $scope.creando = (codigo=='nuevo');

  // Acción a ejecutar: NUEVO o EDITAR
  $scope.accion = ($scope.creando?'NUEVO':'EDITAR');

  // Datos del mensaje
  $scope.hayError = false;
  $scope.sinError = false;
  $scope.mensaje = '';

  // Buscar datos del empleado
  if( ! $scope.creando ){
    var ruta = 'php/empleado/traer.php?codigo=' + codigo;
    $http.get(ruta).then(function(response){
      if( Object.keys(response.data).length == 0 ){
        window.location = "#!/empleados";
        return;
      } else {
        $scope.empleado = response.data;
      }
    });
  }

  // Función para procesar el registro de un nuevo empleado
  // o la midificación de uno existente.
  $scope.procesar = function(){

    var ruta = '';
    if( $scope.creando ){
      ruta = 'php/empleado/crear.php';
    } else {
      ruta = 'php/empleado/actualizar.php';
    }
    
    $http.post(ruta,$scope.empleado).then(function(response){

      $scope.hayError = (response.data.code == -1);
      $scope.sinError = (response.data.code == 1);
      $scope.mensaje  = response.data.mensaje;

      setTimeout(function(){
        $scope.hayError = false;
        $scope.sinError = false;
        if( $scope.creando ){
          $scope.empleado = {};
        }
        $scope.$apply();
      },3500);

    });

  }


  // Función que permite eliminar el empleado.
  $scope.eliminar = function(){

    var ruta = 'php/empleado/eliminar.php';
    
    $http.post(ruta,{"codigo":$scope.empleado.codigo}).then(function(response){

      $scope.hayError = (response.data.code == -1);
      $scope.sinError = (response.data.code == 1);
      $scope.mensaje  = response.data.mensaje;

      setTimeout(function(){
        $scope.hayError = false;
        $scope.sinError = false;
        $scope.$apply();
        if( response.data.code == 1 ){
          window.location = "#!/empleados";
        }
      },3500);

    });

  };

}]);