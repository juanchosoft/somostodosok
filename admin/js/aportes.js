$(document).on('ready', init);
var q = {};
var departamento = '';
var municipio = '';
var vereda = '';
var pais = '';;
var socData;
var col = '52';
$("#tbl_pais_id").val(col);

function init() {
    q = {};
}

var APORTES = {
    validateData: function() {
        var bValid = true;
        var response = grecaptcha.getResponse();
        if (response.length == 0) {
            var msj = "Debes validar que no eres un robot.";
            UTIL.mostrarMensajeError(msj);
            bValid = false;
            return;
        }
        var msj = "Falta ingresar información obligatoria, marcada con asterisco.";

        if ($('#tbl_pais_id').val() != col) {
            if (
                $("#nombre").val() == null ||
                $("#nombre").val() == "" ||
                $("#telefono").val() == null ||
                $("#telefono").val() == "" ||
                $("#cedula").val() == null ||
                $("#cedula").val() == "" ||
                $("#referido").val() == null ||
                $("#referido").val() == "" ||
                $("#acepto_terminos").val() == null ||
                $("#acepto_terminos").val() == "" ||
                $("#autorizo_comunicados").val() == null ||
                $("#autorizo_comunicados").val() == ""
            ) {
                UTIL.mostrarMensajeError(msj);
                bValid = false;
                return;
            }
        } else {
            if (
                $("#tbl_departamento_id").val() == "" ||
                $("#tbl_departamento_id").val() == null ||
                $("#tbl_municipio_id").val() == "" ||
                $("#tbl_municipio_id").val() == null ||
                $("#nombre").val() == null ||
                $("#nombre").val() == "" ||
                $("#telefono").val() == null ||
                $("#telefono").val() == "" ||
                $("#cedula").val() == null ||
                $("#cedula").val() == "" ||
                $("#referido").val() == null ||
                $("#referido").val() == "" ||
                $("#acepto_terminos").val() == null ||
                $("#acepto_terminos").val() == "" ||
                $("#autorizo_comunicados").val() == null ||
                $("#autorizo_comunicados").val() == ""
            ) {
                UTIL.mostrarMensajeError(msj);
                bValid = false;
                return;
            }
        }

        if (!$('#acepto_terminos').is(':checked')) {
            UTIL.mostrarMensajeError('Debes aceptar los términos de tratamiento de datos');
            bValid = false;
            return;
        }
        if (bValid) {
            APORTES.save();
        }
    },
    save: function() {
        q = {};
        q.op = "savecomentarios";
        q.tbl_departamento_id = $("#tbl_departamento_id").val();
        q.tbl_municipio_id = $("#tbl_municipio_id").val();
        q.tbl_vereda_id = $("#tbl_vereda_id").val();
        q.tbl_barrio_id = $("#tbl_barrio_id").val();
        q.tbl_pais_id = $("#tbl_pais_id").val();
        q.referido = $("#referido").val();
        q.nombre = $("#nombre").val();
        q.email = $("#email").val();
        q.sexo = $("#sexo").val();
        q.telefono = $("#telefono").val();
        q.comentario = $("#comentario").val();
        q.profesion = $("#profesion").val();
        q.cedula = $("#cedula").val();
        q.dia = $("#dia").val();
        q.mes = $("#mes").val();
        q.seguridad = $('input[name="seguridad"]').is(':checked') ? '1' : 'no';
        q.agricultura = $('input[name="agricultura"]').is(':checked') ? '1' : 'no';
        q.economia = $('input[name="economia"]').is(':checked') ? '1' : 'no';
        q.salud = $('input[name="salud"]').is(':checked') ? '1' : 'no';
        q.ambiente = $('input[name="ambiente"]').is(':checked') ? '1' : 'no';
        q.inclusion = $('input[name="inclusion"]').is(':checked') ? 'si' : 'no';
        q.infraestructura = $('input[name="infraestructura"]').is(':checked') ? 'si' : 'no';
        q.politica = $('input[name="politica"]').is(':checked') ? 'si' : 'no';
        q.corrupcion = $('input[name="corrupcion"]').is(':checked') ? 'si' : 'no';
        q.comunicaciones = $('input[name="acepto_terminos"]').is(':checked') ? 'si' : 'no';
        q.comunicaciones = $('input[name="acepto_terminos"]').is(':checked') ? 'si' : 'no';
        q.educacion = $('input[name="educacion"]').is(':checked') ? 'si' : 'no';
        q.familia = $('input[name="familia"]').is(':checked') ? 'si' : 'no';
        q.recreacion = $('input[name="recreacion"]').is(':checked') ? 'si' : 'no';
        q.acepto_terminos = $('input[name="acepto_terminos"]').is(':checked') ? 'si' : 'no';
        q.autorizo_comunicados = $('input[name="autorizo_comunicados"]').is(':checked') ? 'si' : 'no';
        // Mensaje
        departamento = $('select[name="tbl_departamento_id"] option:selected').text();
        municipio = $('select[name="tbl_municipio_id"] option:selected').text();
        vereda = $('select[name="tbl_vereda_id"] option:selected').text();
        pais = $('select[name="tbl_pais_id"] option:selected').text();
        var mensaje = `Hola señor(a) ${q.nombre} acaba de registrarse como apoyo en el departamento  ${departamento} en el municipio ${municipio} en la vereda ${vereda}. Muchas gracias por su interés, muy pronto comenzarás a recibir noticias de nosotros.`;
        var mensajeSinVereda = `Hola señor(a) ${q.nombre} acaba de registrarse como apoyo en el departamento  ${departamento} en el municipio ${municipio}. Muchas gracias por su interés, muy pronto comenzarás a recibir noticias de nosotros.`;
        var mensajePais = `Hola señor(a) ${q.nombre} acaba de registrarse como apoyo desde el pais ${pais}. Muchas gracias por su interés, muy pronto comenzarás a recibir noticias de nosotros.`;

        UTIL.cursorBusy();
        $.ajax({
            data: q,
            type: "GET",
            dataType: "json",
            url: "admin/ajax/rqst.php",
            success: function(data) {
                q = {};
                UTIL.cursorNormal();
                if (data.output.valid) {
                    if ($("#tbl_vereda_id").val() == null && $("#tbl_vereda_id").val() == "") {
                        mensaje = mensajeSinVereda;
                    }
                    if ($("#tbl_pais_id").val() != col) {
                        mensaje = mensajePais;
                    }
                    if ($("#tbl_pais_id").val() == col) {
                        mensaje = mensaje;
                    }
                    UTIL.mostrarMensajeExitoso(mensaje);
                    setTimeout(function() {
                        window.location = 'apoya.php';
                    }, 4000);
                } else {
                    UTIL.mostrarMensajeError(data.output.response.content);
                }
            },
        });
    },
    checkAll: function(formulario, nombreCheckbox) {
        if ($(`#${nombreCheckbox}`).is(":checked")) {
            $(`#${formulario} :input`).each(function() {
                this.checked = true;
            });
        } else {
            $(`#${formulario} :input`).each(function() {
                this.checked = false;
            });
        }
    },
    onchangePais: function() {
        console.log($('#tbl_pais_id').val());
        if ($('#tbl_pais_id').val() == col) {
            $("#divDep").show();
            $("#divMun").show();
            $("#divVer").show();
            $("#divBarr").show();
            return;
        }
        if ($('#tbl_pais_id').val() != col) {
            $("#divDep").hide();
            $("#divMun").hide();
            $("#divVer").hide();
            $("#divBarr").hide();
            return;
        }
    },
};