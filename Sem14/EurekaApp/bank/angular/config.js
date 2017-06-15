
app.config( function($routeProvider){

	$routeProvider
		.when('/',{
			templateUrl: 'page/home.html',
			controller:  'homeCtrl'
		})
		.when('/clientes',{
			templateUrl: 'page/clientes.html',
			controller:  'clientesCtrl'
		})
		.when('/empleados',{
			templateUrl: 'page/empleados.html',
			controller:  'empleadosCtrl'
		})
		.when('/empleado/:codigo',{
			templateUrl: 'page/empleado.html',
			controller: 'empleadoCtrl'
		})
		.otherwise({
			redirectTo: '/'
		});


});