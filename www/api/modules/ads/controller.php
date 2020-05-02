<script class='controller'>
    var editingOrder = 0;
    $(document).ready(function() {

        /** MOSTRAR VENTAS */
        getAds();

        /** GUARDAR PUBLICIDAD */
        $(document).off('click', '#savenew_btn');
        $(document).on("click", "#savenew_btn", function(event) {
            event.preventDefault();
            var self, pass, confirmpass, rol;
            self = this;

            $("#plsWait").fadeIn("slow", function() {
                if ($("#newVentCli").val() == '' ||
                    $("#newVentVend").val() == '0' ||
                    $("#newVentDesc").val() == '' ||
                    $("#fechaVent").val() == '' ||
                    $("#newVentTot").val() == '') {
                    $("#plsWait").fadeOut("slow", function() {
                        $.growl.error({
                            message: "Debe llenar todos los campos para continuar"
                        });
                    });
                    return false;
                }

                var formData = new FormData();
                formData.append('meth', 'addnewVent');
                formData.append('cliente', $("#newVentCli").val());
                formData.append('vendedor', $('#newVentVend').val());
                formData.append('desc', $('#newVentDesc').val());
                formData.append('date', $('#fechaVent').val());
                formData.append('total', $('#newVentTot').val());
                apiCall(formData, apiURI, function(data) {
                    console.log(data);
                    if (data.status == 'added') {
                        getAds();
                        $("#newVentCli").val('');
                        $("#newVentVend").val('0');
                        $('#newVentVend').selectpicker('refresh');
                        $("#newVentDesc").val('');
                        $("#fechaVent").val('');
                        $("#newVentTot").val('');

                        $('#fechaVent').val(window.localStorage.getItem("hoyDate"));
                        $('#fechaVent').datepicker({
                            format: 'yyyy-mm-dd',
                            autoclose: true,
                            todayHighlight: true,
                            startView: 1
                        });
                        $("#plsWait").fadeOut("slow", function() {
                            $.growl.notice({
                                message: 'Venta cargada exitosamente'
                            });
                            return;
                        });
                    } else {
                        $("#plsWait").fadeOut("slow", function() {
                            $.growl.error({
                                message: 'Error creando la venta'
                            });
                        });
                        return;
                    }
                });
            });
        });

        /** ELIMINAR LA VENTA */
        $(document).off('click', '.deleteThisBtn');
        $(document).on("click", ".deleteThisBtn", function(event) {
            event.preventDefault();
            var self = this;
            var idVenta = $(self).parent().parent().find('.idVentaCont').html();
            setTimeout(function() {
                var formData = new FormData();
                formData.append('meth', 'deleteVenta');
                formData.append('idVenta', idVenta);
                apiCall(formData, apiURI, function(data) {
                    console.log(data);
                    $.growl.notice({
                        message: "Se ha eliminado la publicidad exitosamente"
                    });
                    getAds();
                });
            }, 200);
        });

        /** CARGAMOS EL DATEPICKER */
        $('#fechaVent').val(window.localStorage.getItem("hoyDate"));
        $('#fechaVent').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
            startView: 1
        });
    });

    /** MOSTRAR PUBLICIDADES DEL SISTEMA */
    function getAds() {
        var formData = new FormData();
        formData.append('apiuri', apiURI);
        formData.append('meth', 'feedVentasTable');
        apiCall(formData, apiURI, function(data) {
            $('#ventasTable tbody').html(data.regs);
            console.log(data);

            $('#comisList_wrapper').remove();
            $('.comisListTablePanel').append('<table id="comisList" class="hover table-bordered "></table>');
            $(document).find('#comisList').html($('#comisListTemp').html());
            $('#comisList tbody').html(data.regsComi);
            $('.totaldeVentas').html(data.rowsPro);
            $('#comisList').DataTable({
                "iDisplayLength": 50
            });
        });

        /** CARGAMOS EL GRAFICO DE ORGANIGRAMA */
        var ds = {
            'name': 'Pedro Perez',
            'title': 'Gerente de Ventas',
            'children': [{
                'name': 'Juan Cruz',
                'title': 'Coordinador Zonal',
                'children': [{
                        'name': 'Luis Jimenez',
                        'title': 'Gerente de cuentas'
                    },
                    {
                        'name': 'Alison Vallejo',
                        'title': 'Gerente Proyectos',
                        'children': [{
                            'name': 'Maria Kanee',
                            'title': 'Mercaderista',
                            'children': [{
                                    'name': 'Andres Gomez',
                                    'title': 'asistente de Ventas'
                                },
                                {
                                    'name': 'Yesica Lopez',
                                    'title': 'asistente de ventas'
                                }
                            ]
                        }]
                    }
                ]
            }]
        };
        $('.vendeList').html('<div id="chart-container"></div>')
        var oc = $('#chart-container').orgchart({
            'data': ds,
            'nodeContent': 'title',
            'visibleLevel': 999
        });
    }
</script>