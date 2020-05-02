<ul class="breadcrumb">
    <li><a href="#">Inicio</a></li>
    <li>Ventas y Comisiones </li>
</ul>
<!-- FIN BREADCRUMB -->

<div class="page-title">
    <h2><i class="fas fa-sort-amount-up"></i> Ventas y comisiones</h2>
</div>
<div class="page-content-wrap">
    <div class="col-md-6 adlist_panel push-up-20 activePanel">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fas fa-users"></i> Equipo de Ventas</h3>
                <ul class="panel-controls" style="margin-top: 2px;">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>
            </div>
            <div class="panel-body vendeList panelSqBg">
                <div id="chart-container"></div>
            </div>
        </div>

    </div>
    <div class="col-md-6 adlist_panel push-up-20 activePanel">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fas fa-th-list"></i> Ventas del sistema</h3>
                <ul class="panel-controls" style="margin-top: 2px;">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>
            </div>
            <div class="panel-body adsList userPanelListBG">

                <div class="col-md-12  newad_panel push-up-20">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="#" class="form-horizontal">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <h3><i class="fas fa-pencil-alt"></i> Cargar venta</h3>
                                        <p>Ingrese los datos de la venta.</p>
                                    </div>
                                    <div class="panel-body form-group-separated">
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-5 control-label">Cliente</label>
                                            <div class="col-md-9 col-xs-7">
                                                <input id="newVentCli" type="text" value="" placeholder="Nombre del Cliente" maxlength="40" class="form-control" required="required" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-5 control-label">Vendedor</label>
                                            <div class="col-md-9 col-xs-7">
                                                <select id="newVentVend" class="form-control select" data-style="btn-success">
                                                    <option value="0">Seleccione</option>
                                                    <option value="1">Pedro Perez</option>
                                                    <option value="2">Juan Cruz</option>
                                                    <option value="3">Luis Jimenez</option>
                                                    <option value="4">Alison Vallejo</option>
                                                    <option value="5">Maria Kanee</option>
                                                    <option value="6">Andres Gomez</option>
                                                    <option value="7">Yesica Lopez</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-5 control-label">Concepto</label>
                                            <div class="col-md-9 col-xs-7">
                                                <input id="newVentDesc" type="text" value="" placeholder="Descripcion de los prodcutos vendidos" class="form-control" required="required" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-5 control-label">Fecha</label>
                                            <div class="col-md-9 col-xs-7">
                                                <input type="text" class="form-control fechaVent" id="fechaVent" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-5 control-label">Total</label>
                                            <div class="col-md-9 col-xs-7">
                                                <input id="newVentTot" type="number" value="" placeholder="Valor de la factura" class="form-control" required="required" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <span class="btn btn-info pull-right" id="savenew_btn"> <i class="fa fa-save"></i> Guardar venta</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12  newad_panel push-up-20">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="#" class="form-horizontal">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3><i class="fas fa-clipboard-list"></i> Ventas</h3>
                                        <p>Listado de ventas en el sistema.</p>
                                    </div>
                                    <div class="panel-body panel-body-table">
                                        <div class="table-responsive">
                                            <table class="table table-condensed table-bordered table-striped" id="ventasTable">
                                                <thead>
                                                    <tr>
                                                        <th width="10%">ID</th>
                                                        <th width="30%">Fecha</th>
                                                        <th width="20%">Vendedor</th>
                                                        <th width="30%">Total</th>
                                                        <th width="10%">Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="panel-footer">
                                        <span class="btn btn-success pull-right totaldeVentas"> Total: 123123</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <form action="#" class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3><i class="fas fa-money-bill-wave"></i> Comisiones</h3>
                        <p>Detalle de comisiones por ventas.</p>
                    </div>
                    <ul class="panel-controls" style="margin-top: 2px;">
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body panelSqBg comisListTablePanel">
                </div>
            </div>
        </form>
    </div>
</div>

<div class="message-box message-box-danger animated fadeIn" data-sound="alert" id="mb-deleteAd">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> Eliminar <strong>Publicidad</strong> ?</div>
            <div class="mb-content">
                <p>seguro que desea eliminar?</p>
                <p>Presione Si para eliminar la publicidad y todos sus datos.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="#" class="btn btn-success btn-lg deleteThisAdBtn mb-control-close">Si</a>
                    <button class="btn btn-primary btn-lg mb-control-close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<table id="comisListTemp" class=" hidethis">
    <thead>
        <tr>
            <th>ID Venta</th>
            <th>Vendido</th>
            <th>Vendedor</th>
            <th>Tipo</th>
            <th>Comision</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
    <tfoot>
        <tr>
            <th>ID Venta</th>
            <th>Vendido</th>
            <th>Vendedor</th>
            <th>Tipo</th>
            <th>Comision</th>
        </tr>
    </tfoot>
</table>