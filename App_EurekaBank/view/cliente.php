<div class="container">
    <div class="row">
        <h4>Mantenimiento de cliente</h4>
    </div>
    <div class="row">
        <div class="nav-wrapper">
            <div class="input-field">
                <input id="search" type="search" required ng-model="search">
                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
            </div>
        </div>
    </div>


    <div class="row">
        <table class=""> 
            <thead>
                <tr>
                    <th>
                        NOMBRES 
                    </th>
                    <th>
                        DNI 
                    </th>
                    <th>
                        CIUDAD 
                    </th>
                    <th>
                        DIRECCION 
                    </th>
                    <th>
                        TELEFONO 
                    </th>
                    <th>
                        EMAIL 
                    </th>
                    <th>
                        ACCION 
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="cliente in clientes| filter:search">
                    <td>
                        {{cliente[3]}}  {{cliente[1]}}  {{cliente[2]}} 
                    </td>
                    <td>
                        {{cliente[4]}}
                    </td>
                    <td>
                        {{cliente[5]}}
                    </td>  
                    <td>
                        {{cliente[6]}}
                    </td>  
                    <td>
                        {{cliente[7]}}
                    </td>  
                    <td>
                        {{cliente[8]}}
                    </td>  
                    <td>
                        <button ng-click="updateCliente(cliente[0])" data-target="modal_update" class="btn_cliente" data-target="update"><i class="material-icons" style="color:#3667B5">mode_edit</i></button>
                        <button ng-click="deleteCliente(cliente[0], cliente[3], cliente[1], cliente[2])" data-target="modal_delete" class="btn_cliente btn_cliente_delete" data-target="delete"><i class="material-icons" style="color:#3667B5">delete</i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <div class="flotante">
        <button type="submit" class="btn-floating btn-large waves-effect waves-light red" ng-click="openModalCreate()">
            <i class="material-icons">add</i>
        </button>
    </div>



</div>




