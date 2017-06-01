
app.config( function($routeProvider){

	$routeProvider
		.when('/',{
			templateUrl: 'paginas/home.html',
			//controller: 'inicioCtrl'
		})
		.when('/clientes',{
			templateUrl: 'paginas/clientes.html',
			controller: 'clientesCtrl'
		})
		.when('/empleados',{
			templateUrl: 'paginas/empleados.html',
			//controller: 'profesoresCtrl'
		})
		.otherwise({
			redirectTo: '/'
		});


});