var app = angular.module('appsuma', []);

app.controller('AppController', function($scope, $http){

  $scope.mostrar = false;
  $scope.datos = {"num1":0, "num2":0};
  $scope.repo = {};
    
  $scope.procesar = function(){  

    $http.post('php/AppController.php', $scope.datos)
    .then(function(response){
        console.log(response.data);
        $scope.repo = response.data;
        $scope.mostrar = true;
    });
    
  }


})