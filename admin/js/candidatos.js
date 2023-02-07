$(document).on('ready', init);
var q;

function init() {
    q = {};
}
var CANDIDATO = {
    validateData: function() {
        var bValid = true;
        var msj = "Falta ingresar información obligatoria, marcada con asterisco.";
        if (
            $("#nombre").val() == "" ||
            $("#email").val() == "" ||
            $("#celular").val() == "" ||
            $("#aspiracion").val() == "" ||
            $("#terminos").val() == ""
        ) {
            UTIL.mostrarMensajeError(msj);
            bValid = false;
            return;
        }

        if (!$('#terminos').is(':checked')) {
            UTIL.mostrarMensajeError('Debes aceptar los términos de tratamiento de datos');
            bValid = false;
            return;
        }

        if (bValid) {
            CANDIDATO.save();
        }
    },
    save: function() {
        q = {};
        q.op = "savecandidatos";
        q.nombre = $("#nombre").val();
        q.email = $("#email").val();
        q.celular = $("#celular").val();
        q.aspiracion = $("#aspiracion").val();
        q.comentarios = $("comentarios").val();
        q.termninos = $('input[name="terminos"]').is(':checked') ? 'si' : 'no';
       
       
        }

        // Mensaje

        var mensaje = `El señor(a) ${q.nombre} usted ha ingresado exitosamente su hoja de vida  muchas muy pronto lo contactaremos`;

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
                    UTIL.mostrarMensajeExitoso(mensaje);
                    socData = {};
                    setTimeout(function() {
                        window.location = 'aportes.php';
                    }, 5000);
                } else {
                    UTIL.mostrarMensajeError(data.output.response.content);
                }
            },
        });
    },
    
               
   
   
};