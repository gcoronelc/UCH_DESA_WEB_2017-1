<div class="modal-content">
    <div class="row">
        <div class="row">
            <div class="col s12">
            <span><i class="medium material-icons ">supervisor_account</i></span>
            </div>
        </div>
        <form class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <input value="" id="aPaterno" name="aPaterno" type="text" class="validate" ng-model="cliente.apaterno">
                    <label class="active" for="first_name2">Apellido Paterno</label>
                </div>
                <div class="input-field col s6">
                    <input value="" id="aMaterno" name="aMaterno" type="text" class="validate" ng-model="cliente.amaterno">
                    <label class="active" for="first_name2">Apellido Materno</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input value="" id="nombres" name="nombres" type="text" class="validate" ng-model="cliente.nombres">
                    <label class="active" for="first_name2">Nombres</label>
                </div>
                <div class="input-field col s6">
                    <input value="" id="dni" name="dni" type="text" class="validate" ng-model="cliente.dni">
                    <label class="active" for="first_name2">Dni</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input value="" id="ciudad" name="ciudad" type="text" class="validate" ng-model="cliente.ciudad">
                    <label class="active" for="first_name2">Ciudad</label>
                </div>
                <div class="input-field col s6">
                    <input value="" id="direccion" name="direccion" type="text" class="validate" ng-model="cliente.direccion">
                    <label class="active" for="first_name2">Direccion</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input value="" id="telefono" name="telefono" type="text" class="validate" ng-model="cliente.telefono">
                    <label class="active" for="first_name2">Telefono</label>
                </div>
                <div class="input-field col s6">
                    <input value="" id="email" name="email" type="text" class="validate" ng-model="cliente.email">
                    <label class="active" for="first_name2">Email</label>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn-flat" ng-click="guardar(cliente.nombres)">Guardar</button>
    <button type="button" class="btn-flat" ng-click="cancel()">Cancelar</button>
</div>