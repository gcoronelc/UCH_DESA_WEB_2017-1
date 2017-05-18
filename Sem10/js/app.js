angular.module('usuarios', [])
.controller('UsuariosController', function($scope, $http){

 $http.get('http://jsonplaceholder.typicode.com/users')
 .then(function(respuesta){
 
 	$scope.listaUsuarios = respuesta.data;

 })
})