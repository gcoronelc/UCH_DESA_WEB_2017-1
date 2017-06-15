app.controller("controllercliente", function ($scope, $http, $modal) {
    listar();
    $scope.openModalCreate = function ($event) {
        var create = $modal.open({
            templateUrl: 'view/section/cliente_create.php',
            anchorElement: $event ? angular.element($event.target) : undefined,
            controller: 'controllerCreateCliente',
            resolve: {
                newCliente: function () {
                    return newCliente;
                }
            }
        });
        create.result.then(function (respuesta) {
            $scope.modalResult = 'You selected ' + respuesta;
        }, function () {
            $scope.modalResult = 'You dismissed the modal';
        });
    };

    function listar() {
        $http({
            method: "POST",
            url: "controller/controllercliente.php",
            headers: {
                'Content-Type': undefined
            },
            data: {
                codigo: 0,
                accion: "listar"}
        }).then(function succes(respuesta) {
            $scope.clientes = respuesta.data;
            console.log(respuesta.data);

        }, function error(respuesta) {
            alert("algo salio mal ");
        });
    }

    $scope.deleteCliente = function (codigo, nombre, apaterno, amaterno, $event) {
        var delet = $modal.open({
            templateUrl: 'view/section/cliente_delete.php',
            anchorElement: $event ? angular.element($event.target) : undefined,
            controller: 'controllerDeleteCliente',
            windowClass: 'large-Modal',
            resolve: {
                codigo: function () {
                    return codigo;
                },
                nombre: function () {
                    return nombre;
                },
                apaterno: function () {
                    return apaterno;
                },
                amaterno: function () {
                    return amaterno;
                }
            }
        });
        delet.result.then(function (respuesta) {
            $scope.modalResult = 'Respiesta ' + respuesta;

            $http({
                method: "POST",
                url: "controller/controllercliente.php",
                headers: {
                    'Content-Type': undefined
                },
                data: {
                    codigo: codigo,
                    accion: "eliminar"}
            }).then(function succes(respuesta) {
                console.log(respuesta.data);
                listar();
            }, function error(respuesta) {
                alert("algo salio mal ");
            });


        }, function () {
            $scope.modalResult = 'You dismissed the modal';
        });

    };

});
app.controller('controllerCreateCliente', function ($scope, $modalInstance, newCliente) {
    $scope.dataCliente = newCliente;

    $scope.guardar = function (promesa) {
        $modalInstance.close(promesa);
    };

    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
});

app.controller('controllerDeleteCliente', function ($scope, $modalInstance, codigo, nombre, apaterno, amaterno) {
    $scope.codigo = codigo;
    $scope.nombre = nombre;
    $scope.apaterno = apaterno;
    $scope.amaterno = amaterno;
    $scope.guardar = function (promesa) {
        $modalInstance.close(promesa);
    };

    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
});