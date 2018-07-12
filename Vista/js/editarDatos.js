function actualizarPass() {

    var rut = $('#txtRutEmpleado').val();
    var nueva = $('#txtNuevaPass').val();
    var confirmar = $('#txtConfirmarPass').val();

    $.ajax({
        url: "s_ActualizarPass.php",
        type: 'POST',
        data: {'rut': rut, 'nueva': nueva, 'confirmar': confirmar},
        dataType: 'JSON',
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status + " \n" + xhr.responseText, "\n" + thrownError);
        },
        success: function (response) {
            $('#txtNuevaPass').val("");
            $('#txtConfirmarPass').val("");
            
            if (response.d === '1') {
                swal({
                    title: "",
                    text: "Se ha actualizado la contraseña",
                    icon: "success",
                    button: null
                });
            }
            if (response.d === '0') {
                swal({
                    title: "",
                    text: "No se logro actualizar la contraseña",
                    icon: "error",
                    button: null
                });
            }
            if (response.d === '2') {
                swal({
                    title: "",
                    text: "Las contraseñas no coinciden",
                    icon: "warning",
                    button: null
                });
            }
        }

    });
}