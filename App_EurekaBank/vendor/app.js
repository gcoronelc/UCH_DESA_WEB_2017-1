var app = angular.module("MyApp", ["ngRoute","ngAnimate","ngMaterialize"]);

app.config(function ($routeProvider) {
    $routeProvider
            .when("/", {
                templateUrl: "view/inicio.php"
            })
            .when("/consulta", {
                templateUrl: "view/consulta.php",
                controller: 'consultacontroller'
            })
            .when("/cliente", {
                templateUrl: "view/cliente.php",
                controller: 'controllercliente'
            }).when("/404", {
        templateUrl: "view/404.php"
    });
    $routeProvider.otherwise({redirectTo: '/404'});
});
