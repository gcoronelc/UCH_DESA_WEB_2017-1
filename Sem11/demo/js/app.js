angular.module('appsuma', [])
.controller('AppController', function($scope, $http){

  $scope.mostrar = false;
    
  $scope.procesar = function(){  

    //var data = 'n1=' + $scope.num1 + '&n2=' + $scope.num2;
    var dataJSON = {"n1":$scope.num1,"n2":$scope.num2};
    var data = "json=" + dataJSON;

    console.log(data);


    $http.get('controller/AppController.php', dataJSON)
        .then(function(respuesta){
            $scope.repo = respuesta.data;
            $scope.mostrar = true;
    })

  }


})