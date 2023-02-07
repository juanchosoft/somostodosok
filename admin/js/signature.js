$(document).on('ready', init);
var q = {};
var departamento = '';
var municipio = '';
var vereda = '';
var pais = '';;
var socData;
$("#tbl_pais_id").val(27);

function init() {
    q = {};
}

var FIRMAS = {
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
                $("#acepto_terminos").val() == null ||
                $("#acepto_terminos").val() == "" ||
                $("#autorizo_comunicados").val() == null ||
                $("#autorizo_comunicados").val() == ""
            ) {
                UTIL.mostrarMensajeError(msj);
                bValid = false;
                return;
            }
        if (!$('#acepto_terminos').is(':checked')) {
            UTIL.mostrarMensajeError('Debes aceptar los términos de tratamiento de datos');
            bValid = false;
            return;
        }
        if (bValid) {
            FIRMAS.save();
        }
    },
    save: function() {
        q = {};
        q.op = "savefirmas";
        q.tbl_departamento_id = $("#tbl_departamento_id").val();
        q.tbl_municipio_id = $("#tbl_municipio_id").val();
        q.tbl_vereda_id = $("#tbl_vereda_id").val();
        q.tbl_barrio_id = $("#tbl_barrio_id").val();
        q.tbl_pais_id = $("#tbl_pais_id").val();
        q.nombre = $("#nombre").val();
        q.telefono = $("#telefono").val();
        q.cedula = $("#cedula").val();
        q.email = $("#email").val();
        q.dia = $("#dia").val();
        q.mes = $("#mes").val();
       q.acepto_terminos = $('input[name="acepto_terminos"]').is(':checked') ? 'si' : 'no';
        q.autorizo_comunicados = $('input[name="autorizo_comunicados"]').is(':checked') ? 'si' : 'no';
        // Mensaje
        departamento = $('select[name="tbl_departamento_id"] option:selected').text();
        municipio = $('select[name="tbl_municipio_id"] option:selected').text();
        vereda = $('select[name="tbl_vereda_id"] option:selected').text();
        pais = $('select[name="tbl_pais_id"] option:selected').text();
        var mensaje = `Hola señor(a) ${q.nombre} acaba de registrarse con nosotros ${departamento} en el municipio ${municipio} en la vereda ${vereda}. Muchas gracias por su interés.`;
        var mensajeSinVereda = `Hola señor(a) ${q.nombre} acaba de registrarse en el departamento   ${departamento} en el municipio ${municipio}. Muchas gracias por su interés.`;
        var mensajePais = `Hola señor(a) ${q.nombre}  Muchas gracias por su interés, en un momento recibiras via whatapp la planilla.`;

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
                    UTIL.mostrarMensajeExitoso(mensaje);
                    setTimeout(function() {
                        window.location = 'signature.php';
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

    },
};