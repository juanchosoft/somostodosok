$(document).on('ready', initusuario);
var q, nombre, allFields, tips;

function initlideres() {
    q = {};
}

var return_page = 'lideres.php';
var LIDERES = {
    editData: function(id) {
        q = {};
        q.op = "pms_liderget";
        q.id = id;
        UTIL.callAjaxRqstPOST(q, this.editDataHandler);
    },
    editDataHandler: function(data) {
        UTIL.cursorNormal();
        if (data.output.valid) {
            var res = data.output.response[0];
            $("#id").val(res.id);
            $("#nombre").val(res.nombre);
            $("#apellido").val(res.apellido);
            $("#email").val(res.email);
            $("#telefono").val(res.telefono);
            $("#identificacion_tipo").val(res.identificacion_tipo);
            $("#identificacion_num").val(res.identificacion_num);
            $("#habilitado").val(res.habilitado);
            $("#tbl_departamento_id").val(res.tbl_departamento_id);
            $("#tbl_municipio_id").val(res.tbl_municipio_id);
            $("#tbl_vereda_id").val(res.tbl_vereda_id);
           
        } else {
            UTIL.mostrarMensajeError(data.output.response.content);
        }
    },
    validateData: function() {
        var bValid = true;
        var msj = "Falta ingresar información obligatoria, marcada con asterisco.";
        if (
            $("#tbl_departamento_id").val() == "seleccione" ||
            $("#tbl_municipio_id").val() == "seleccione" ||
            $("#tbl_vereda_id").val() == "seleccione" ||
            $("#nombre").val() == "" ||
            $("#apellido").val() == "" ||
            $("#telefono").val() == "" ||
            $("#email").val() == "" ||
            $("#habilitado").val() == "" ||
            $("#identificacion_tipo").val() == "" ||
           $("#identificacion_num").val() == ""
        ) {
            UTIL.mostrarMensajeValidacion(msj);
            bValid = false;
            return;
        }
       
        //Validamos el email que sea válido
        if ($("#email").val() != "") {
            var nickname = UTIL.isEmail($("#email").val());
            if (!nickname) {
                UTIL.mostrarMensajeValidacion('El email debe ser un email válido por favor verifique.');
                bValid = false;
                return;
            }
        }
        if (bValid) {
            LIDERES.savedata();
        }
    },
    /**
  
         

    /**
     * Método para enviar la petición AJAX para guardar o editar un usuario
     */
    sendDataSave() {
        q = {};
        q.op = "pms_lidersave";
        q.id = $("#id").val();
        q.nombre = $("#nombre").val();
        q.apellidos = $("#apellidos").val();
        q.telefono = $("#telefono").val();
        q.email = $("#email").val();
        q.identificacion_tipo = $("#identificacion_tipo").val();
        q.identificacion_num = $("#identificacion_num").val();
        q.habilitado = $("#habilitado").val();
        q.tbl_departamento_id = $("#tbl_departamento_id").val();
        q.tbl_municipio_id = $("#tbl_municipio_id").val();
        q.tbl_vereda_id = $("#tbl_municipio_id").val();
        q.habilitad = $("#habilitado").val();
        UTIL.callAjaxRqstPOST(q, LIDERES.savedatahandler);
    },
    savedatahandler: function(data) {
        UTIL.cursorNormal();
        if (data.output.valid) {
            UTIL.mostrarMensajeExitoso('Información guardada correctamente');
            setTimeout(function() {
                window.location = return_page;
            }, 1000);
        } else {
            UTIL.mostrarMensajeError(data.output.response.content);
        }
    },
   
};