$(document).on('ready', init);
var q;

function init() {
    q = {};
}

var DEPARTAMENTO = {
    getMunicipios: function() {
        if ($("#tbl_departamento_id").val() != "seleccione") {
            q = {};
            q.op = "ciudadget";
            q.codigo_departamento = $("#tbl_departamento_id").val();
            UTIL.callAjaxRqstPOST(q, this.getMunicipiosHandler);
        } else {
            $("#tbl_municipio_id").empty().append('');
        }
    },
    getMunicipiosHandler: function(data) {
        var depto = $("#tbl_departamento_id").val();
        UTIL.cursorNormal();
        if (data.output.valid) {
            var res = data.output.response;
            var info = '';
            for (var j in res) {
                info += "<option value=" + res[j].codigo_muncipio + " >" + res[j].municipio + "</option>";
            }
            $("#tbl_municipio_id").empty().append(info);

            DEPARTAMENTO.getVeredasByMunicipioId();
        } else {
            UTIL.mostrarMensajeError(data.output.response.content);
        }
    },

    getVeredasByMunicipioId: function() {
        $("#tbl_vereda_id").empty().append('');
        if ($("#tbl_departamento_id").val() != "seleccione") {
            q = {};
            q.op = "veredaget";
            q.municipio_id = $("#tbl_municipio_id").val();
            UTIL.callAjaxRqstPOST(q, this.getVeredasByMunicipioIdHandler);
        }
        DEPARTAMENTO.getBarrios();
    },
    getVeredasByMunicipioIdHandler: function(data) {
        UTIL.cursorNormal();
        if (data.output.valid) {
            var res = data.output.response;
            var info = '';
            for (var j in res) {
                info += "<option value='" + res[j].id + "'>" + res[j].nombre_vereda + "</option>";
            }
            $("#tbl_vereda_id").empty().append(info);
        } else {
            UTIL.mostrarMensajeError(data.output.response.content);
        }
    },
    getBarrios: function() {
        q = {};
        q.op = "get_barrios";
        q.departamento_id = $("#tbl_departamento_id").val();
        q.municipio_id = $("#tbl_municipio_id").val();
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
                    var res = data.output.response;
                    var info = '';
                    for (var j in res) {
                        info += "<option value='" + res[j].id + "'>" + res[j].barrio + "</option>";
                    }
                    $("#tbl_barrio_id").empty().append(info);
                }
            },
        });
    },




};