<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>My App</title>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="component/css/materialize.css">
        <link rel="stylesheet" type="text/css" href="component/css/ng-materialize.css">
        <link rel="stylesheet" type="text/css" href="component/css/waves.css">
        <link rel="stylesheet" type="text/css" href="component/css/angular-datatables.css">

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.css"/>

        <link rel="stylesheet" type="text/css" href="component/css/style.css">
    </head>
    <body ng-app="MyApp">
        <nav>
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo"><i class="material-icons">cloud</i> UCH</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="#!/consulta"><i class="material-icons">search</i></a></li>
                    <li><a href="#!/cliente"><i class="material-icons">person_pin</i></a></li>
                </ul>
            </div>
        </nav>
        <div ng-view="">
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="component/js/materialize.min.js"></script>
        <script src="component/js/angular.min.js"></script>
        <script src="vendor/angular-route.js"></script>
        <script src="vendor/angular-animate.js"></script>


        <script src="vendor/ng-materialize.js"></script>
        <script src="vendor/waves.js"></script>


        <script src="vendor/app.js"></script>
        <script src="vendor/controller/consultacontroller.js"></script>
        <script src="vendor/controller/controllercliente.js"></script>

        <script src="component/js/script.js"></script>
    </body>
</html>
