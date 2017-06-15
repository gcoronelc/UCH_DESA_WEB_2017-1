<div class="container">
    <div class="row">
        <h4>Consulta</h4>
    </div>
    <div class="row">
        <form id="formulario_consulta">
            <div class="gr">
                <div class="input-field col s6">
                    <input id="cuenta" type="number" name="cuenta" class="validate">
                    <label for="cuenta">Cuenta</label>
                </div>
                <div class="flotante">
                    <button type="submit" class="btn-floating btn-large waves-effect waves-light red">
                        <i class="material-icons">add</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div ng-show="mostrar_resultado">
        <div class="row">
            <div class="input-field col s6">
                <input value="{{cuenta}}" id="first_name2" type="text" class="validate">
                <label class="active" for="first_name2">Cuenta</label>
            </div>
            <div class="input-field col s6">
                <input value="{{moneda}}" id="first_name2" type="text" class="validate">
                <label class="active" for="first_name2">Moneda</label>
            </div>
            <div class="input-field col s6">
                <input value="{{saldo}}" id="first_name2" type="text" class="validate">
                <label class="active" for="first_name2">Saldo</label>
            </div>
            <div class="input-field col s6">
                <input value="{{estado}}" id="first_name2" type="text" class="validate">
                <label class="active" for="first_name2">Estado</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input value="{{cliente}}" id="first_name2" type="text" class="validate">
                <label class="active" for="first_name2">Cliente</label>
            </div>
        </div>
        <div class="row">
            <table class="striped">
                <thead>
                    <tr>
                        <th>
                            NRO. MOV
                        </th>
                        <th>
                            FECHA
                        </th>
                        <th>
                            TIPO
                        </th>
                        <th>
                            ACCION
                        </th>
                        <th>
                            IMPORTE
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="data1 in data">
                        <td>
                            {{data1[2]}}
                        </td>
                        <td>
                            {{data1[3]}}
                        </td>
                        <td>
                            {{data1[4]}}
                        </td>
                        <td>
                            {{data1[5]}}
                        </td>
                        <td>
                            {{data1[6]}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>