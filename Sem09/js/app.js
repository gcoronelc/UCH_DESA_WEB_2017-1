angular.module('enrutamiento',['ngRoute'])
.config(function($routeProvider){
	 $routeProvider
	 .when('/',{
		 templateUrl: 'paginas/inicio.html',
		 controller: 'MainController'
	 })
	 .when('/nosotros',{
		 templateUrl: 'paginas/nosotros.html',
		 controller: 'NosotrosController'
	 })
	 .when('/contactenos', {
		 templateUrl: 'paginas/contactenos.html',
		 controller: 'ContactenosController'
	 })
	 .otherwise({
	 	redirectTo: '/'
	 });
})
.controller('MainController', function($scope){
 	$scope.texto1 = "Esta es la pagina principal";
 	$scope.texto2 = "Bienvenidos al mundo de AngularJS.";
})
.controller('ContactenosController', function($scope){
 	$scope.texto = "Por favor envie sus datos al correo contacto@empresa.com";
})
.controller('NosotrosController', function($scope){
 	$scope.texto = "Esta es nuestra pagina!";
})