function ExitoRegistrar() {
    swal({
        title: "",
        text: "Se ha registrado con exito",
        icon: "success",
        button: null
    });
}

function ErrorRegistrar() {
    swal({
        title: "",
        text: "Error al registarse.",
        icon: "error",
        button: null
    });
}

function checkRutEmpresa() {
    if (document.getElementById('txtRutEmpresa').value.length < 8) {
        $('#btnRegistrar').attr('disabled', true);
        $('#txtRutEmpresa').addClass('border-danger').removeClass('border-info');
    } else {
        $('#btnRegistrar').attr('disabled', false);
        $('#txtRutEmpresa').addClass('border-info').removeClass('border-danger');
    }
}
;
function checkRutContacto() {
    if (document.getElementById('txtRutContacto').value.length < 8)
    {
        $('#btnRegistrar').attr('disabled', true);
        $('#txtRutContacto').addClass('border-danger').removeClass('border-info');
    } else {
        $('#btnRegistrar').attr('disabled', false);
        $('#txtRutContacto').addClass('border-info').removeClass('border-danger');
    }
}
;

$(document).on('keyup', '#txtRutEmpresa', function () {
    var rut = $(this).val();
    if (rut !== "") {
        validarRut(rut);
    }
});

function validarRut(rut) {
    $.ajax({
        url: "s_ValidarRut.php",
        type: 'POST',
        data: {'txtRutEmpresa': rut},
        dataType: 'JSON',
        success: Respuestafunction,
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status + " \n" + xhr.responseText, "\n" + thrownError);
        }
    }
    );
}

function Respuestafunction(response) {
    if (response === 1) {
        swal('El rut ingresado ya existe!', '', 'warning');
    }
}

$(document).ready(function () {
    $('#btnRegistrar').attr('disabled', true);
});
function check() {
    //no desencadenar el aviso si el campo esta vacio
    if (document.getElementById('txtPassEmpresa').value !== "") {
        //validar que el largo de la contraseña no sea menor a 8
        if (document.getElementById('txtPassEmpresa').value.length < 8)
        {
            $('#txtPassEmpresa').addClass('border-danger').removeClass('border-info');
            $('#btnRegistrar').attr('disabled', true);
        } else {
            $('#txtPassEmpresa').addClass('border-info').removeClass('border-danger');
        }
        //validar claves iguales
        if (document.getElementById('txtPassEmpresa').value ===
                document.getElementById('txtPassConfirm').value) {
            $('#txtPassConfirm').addClass('border-info').removeClass('border-danger');
            $('#btnRegistrar').attr('disabled', false);
        } else {
            $('#txtPassConfirm').addClass('border-danger').removeClass('border-info');
            $('#btnRegistrar').attr('disabled', true);
        }
    }
}
;

