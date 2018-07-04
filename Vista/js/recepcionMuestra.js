


function buscarCliente() {
    var id = $('#txtCodigoCliente').val();

    if ($('#txtCodigoCliente').val() !== "") {

        $.ajax({
            url: "s_validarCodigo.php",
            type: 'POST',
            data: {'txtCodigo': id},
            dataType: 'JSON',
            success: function (response) {
                //console.log(response);
                if (response !== 0) {
                    $('#txtRutCliente').val(response.rut);
                    $('#txtNombreCliente').val(response.nombre);
                } else {
                    $('#txtCodigoCliente').val("");
                    swal('No existe Cliente con dicho código', '', 'warning');
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status + " \n" + xhr.responseText, "\n" + thrownError);
            }
        });
    } else {
        swal('No se ha indicado un código para buscar', '', 'info');
    }
}