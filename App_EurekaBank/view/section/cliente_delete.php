<div class="modal-content">
    <div class="row">
        <div class="row">
            <div class="col s12">
            <span>Estas seguro de eliminar a {{nombre}} {{apaterno}} {{amaterno}}?</span>
            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn-flat" ng-click="guardar('si')">Si</button>
    <button type="button" class="btn-flat" ng-click="cancel()">No</button>
</div>