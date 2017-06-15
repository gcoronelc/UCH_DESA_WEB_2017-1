app.controller("consultacontroller", ["$scope", "$http", function ($scope, $http) {
        $scope.mostrar_resultado = false;
        $("#formulario_consulta").submit(function (e) {
            var datos=$(this).serializeArray();
            $http({
                method: "POST",
                url: "controller/controllermovimiento.php",
                headers: {
                    'Content-Type': undefined
                },
                data: {cuenta: datos}
            }).then(function succes(respuesta) {
                $scope.mostrar_resultado=true;
                $scope.cuenta = respuesta.data[0].cuenta;
                $scope.moneda = respuesta.data[0].moneda;
                $scope.saldo = respuesta.data[0].saldo;
                $scope.estado = respuesta.data[0].estado;
                $scope.cliente = respuesta.data[0].nombre;
                $scope.data = respuesta.data;
                console.log(respuesta.data);
            }, function error(respuesta) {
                alert("algo salio mal ")
            });
            e.preventDefault();
        });

    }]);