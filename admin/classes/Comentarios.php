<?php

class Comentarios
{

    public function __construct()
    {
    }

        public static function availableDocument($rqst){

        $cedula = isset($rqst['cedula']) ? ($rqst['cedula']) : '';


        if ($cedula != "") {

            $db = new DbConection();
            $pdo = $db->openConect();

            $q = "SELECT * FROM " . $db->getTable('comentarios') . " WHERE cedula = :cedula ";
            $result = $pdo->prepare($q);
            $arr = array();
            $arrparam = array(":cedula" => $cedula);
            if ($result->execute($arrparam)) {
                foreach ($result as $valor) {
                    $arr[] = $valor;
                }
                if (count($arr) > 0) {
                    $arrjson = Util::error_documentoduplicado($cedula);
                } else {
                    $arrjson = array('output' => array('valid' => true, 'response' => 'available'));
                }
            } else {
                $arrjson = Util::error_documentoduplicado($cedula);
            }

            $db->closeConect();
            return $arrjson;

        } else {
            return Util::error_missing_data('El documento es obligatorio');
        }
    }

    public static function save($rqst)
    {
        $id = isset($rqst['id']) ? intval($rqst['id']) : 0;
        $tbl_departamento_id = isset($rqst['tbl_departamento_id']) ? ($rqst['tbl_departamento_id']) : 0;
        $tbl_municipio_id =  isset($rqst['tbl_municipio_id']) ? intval($rqst['tbl_municipio_id']) : 0;
        $tbl_vereda_id = isset($rqst['tbl_vereda_id']) ? ($rqst['tbl_vereda_id']) : '';
        $tbl_barrio_id = isset($rqst['tbl_barrio_id']) ? ($rqst['tbl_barrio_id']) : '';
        $tbl_pais_id = isset($rqst['tbl_pais_id']) ? ($rqst['tbl_pais_id']) : '';
        $nombre = isset($rqst['nombre']) ? ($rqst['nombre']) : '';
        $email = isset($rqst['email']) ? ($rqst['email']) : '';
        $telefono = isset($rqst['telefono']) ? ($rqst['telefono']) : '';
        $cedula = isset($rqst['cedula']) ? intval($rqst['cedula']) : '';
        // $cumpleanos = isset($rqst['cumpleanos']) ? ($rqst['cumpleanos']) : '';
        $sexo = isset($rqst['sexo']) ? ($rqst['sexo']) : '';
        $profesion = isset($rqst['profesion']) ? ($rqst['profesion']) : '';
        $referido = isset($rqst['referido']) ? ($rqst['referido']) : '';
        $acepto_terminos = isset($rqst['acepto_terminos']) ? ($rqst['acepto_terminos']) : '';
        $seguridad = isset($rqst['seguridad']) ? ($rqst['seguridad']) : '';
        $agricultura = isset($rqst['agricultura']) ? ($rqst['agricultura']) : '';
        $economia = isset($rqst['economia']) ? ($rqst['economia']) : '';
        $salud = isset($rqst['salud']) ? ($rqst['salud']) : '';
        $infraestructura = isset($rqst['infraestructura']) ? ($rqst['infraestructura']) : '';
        $politica = isset($rqst['politica']) ? ($rqst['politica']) : '';
        $inclusion = isset($rqst['inclusion']) ? ($rqst['inclusion']) : '';
        $ambiente = isset($rqst['ambiente']) ? ($rqst['ambiente']) : '';
        $corrupcion = isset($rqst['corrupcion']) ? ($rqst['corrupcion']) : '';
        $comunicaciones = isset($rqst['comunicaciones']) ? ($rqst['comunicaciones']) : '';
        $educacion = isset($rqst['educacion']) ? ($rqst['educacion']) : '';
        $familia = isset($rqst['familia']) ? ($rqst['familia']) : '';
        $recreacion = isset($rqst['recreacion']) ? ($rqst['recreacion']) : '';
        $autorizo_comunicados = isset($rqst['autorizo_comunicados']) ? ($rqst['autorizo_comunicados']) : '';
        $comentario = isset($rqst['comentario']) ? ($rqst['comentario']) : '';

        $dia = isset($rqst['dia']) ? ($rqst['dia']) : '01';
        $mes = isset($rqst['mes']) ? ($rqst['mes']) : '01';

        if ($dia == "") {
            return Util::error_general('Debe seleccionar día del cumpleaños');
        }
        if ($mes == "") {
            return Util::error_general('Debe seleccionar mes del cumpleaños');
        }

        $cumpleanos = $dia . "-" . $mes;

        $tbl_barrio_id = intval( $tbl_barrio_id );
        $tbl_pais_id = intval( $tbl_pais_id );

        if ($email != "") {
            if (!Util::validate_email($email)) {
                return Util::error_general('El email no es correcto verifíquelo e ingréselo nuevamente');
            }
        }

        if ($acepto_terminos == "" || $acepto_terminos == "no") {
            return Util::error_general('Debe aceptar el tratamiento de datos');
        }

        if($cedula !="") {
            $p = array('cedula' => $cedula);
            $res = Comentarios::availableDocument($p);
            if( !$res['output']['valid'] ){
                return $res;
            }
        }

        $db = new DbConection();
        $pdo = $db->openConect();

        $q = "SELECT id, codigo_departamento, codigo_muncipio FROM " . $db->getTable('tbl_ciudades') . " 
        WHERE codigo_muncipio = " . $tbl_municipio_id;
        $result = $pdo->query($q);
        $arr = array();
        if ($result) {
            foreach ($result as $valor) {
                $tbl_municipio_id = $valor['id']; // Remplazamos el codigo del municpio y ponemos el Id
            }
        }

        $q0 = "SELECT id FROM " . $db->getTable('tbl_departamentos') . " WHERE codigo_departamento = " . $tbl_departamento_id;
        $result0 = $pdo->query($q0);
        if ($result0) {
            foreach ($result0 as $valor0) {
                $tbl_departamento_id = intval($valor0['id']); // Remplazamos el codigo del municpio y ponemos el Id
            }
        }

        if ($id > 0) {
            //actualiza la informacion
            $q = "SELECT id FROM " . $db->getTable('comentarios') . " WHERE id = " . $id;
            $result = $pdo->query($q);
            if ($result) {
                $table = $db->getTable('comentarios');
                $arrfieldscomma = array(
                    'nombre' => $nombre,
                    'tbl_municipio_id' => $tbl_municipio_id,
                    'tbl_vereda_id' => $tbl_vereda_id,
                    'tbl_barrio_id' => $tbl_barrio_id,
                    'tbl_pais_id' => $tbl_pais_id,
                    'acepto_terminos' => $acepto_terminos,
                    'telefono' => $telefono,
                    'autorizo_comunicados' => $autorizo_comunicados,
                    'email' => $email,
                    'cedula' => $cedula,
                    'cumpleanos' => $cumpleanos,
                    'sexo' => $sexo,
                    'profesion' => $profesion,
                    'referido' => $referido,
                    'seguridad' => $seguridad,
                    'agricultura' => $agricultura,
                    'inclusion' => $inclusion,
                    'ambiente' => $ambiente,
                    'economia' => $economia,
                    'salud' => $salud,
                    'infraestructura' => $infraestructura,
                    'politica' => $politica,
                    'corrupcion' => $corrupcion,
                    'comunicaciones' => $comunicaciones,
                    'educacion' => $educacion,
                    'familia' => $familia,
                    'recreacion' => $recreacion,
                    'tbl_departamento_id' => $tbl_departamento_id,
                    'comentario' => $comentario,
                    
                
                );
                $arrfieldsnocomma = array('dtcreate' => Util::date_now_server());
                $q = Util::make_query_update($table, "id = '$id'", $arrfieldscomma, $arrfieldsnocomma);
                $result = $pdo->query($q);
                if (!$result) {
                    $arrjson = Util::error_general();
                } else {
                    $arrjson = array('output' => array('valid' => true, 'id' => $id));
                }
            } else {
                $arrjson = Util::error_general();
            }
        } else {
            if ($nombre != "" ||  $autorizo_comunicados != "" || $tbl_municipio_id != "" || $tbl_vereda_id != "") {

                $q = "INSERT INTO " . $db->getTable('comentarios') . " (dtcreate_at, nombre, municipio_id, vereda_id, acepto_terminos, telefono, autorizo_comunicados, email, cumpleanos, sexo, cedula, profesion, referido, seguridad, agricultura, economia, salud, infraestructura, politica, corrupcion, comunicaciones, inclusion, ambiente, educacion, familia, recreacion, departamento_id, comentario, tbl_barrio_id, tbl_pais_id) VALUES 
                                                ( " . Util::date_now_server() . ", :nombre, :municipio_id, :vereda_id, :acepto_terminos, :telefono, :autorizo_comunicados, :email, :cumpleanos, :sexo, :cedula, :profesion, :referido, :seguridad, :agricultura, :economia, :salud, :infraestructura, :politica, :corrupcion, :comunicaciones, :inclusion, :ambiente, :educacion, :familia, :recreacion, :departamento_id, :comentario, :tbl_barrio_id, :tbl_pais_id)";
                
                $result = $pdo->prepare($q);
                $arrparam = array(
                    ':nombre' => $nombre,
                    ':municipio_id' => $tbl_municipio_id,
                    ':vereda_id' => $tbl_vereda_id,
                    ':acepto_terminos' => $acepto_terminos,
                    ':telefono' => $telefono,
                    ':autorizo_comunicados' => $autorizo_comunicados,
                    ':email' => $email,
                    ':sexo' => $sexo,
                    ':cumpleanos' => $cumpleanos,
                    ':cedula' => $cedula,
                    ':profesion' => $profesion,
                    ':referido' => $referido,
                    ':seguridad' => $seguridad,
                    ':agricultura' => $agricultura,
                    ':economia' => $economia,
                    ':salud' => $salud,
                    ':inclusion' => $inclusion,
                    ':ambiente' => $ambiente,
                    ':infraestructura' => $infraestructura,
                    ':politica' => $politica,
                    ':corrupcion' => $corrupcion,
                    ':comunicaciones' => $comunicaciones,
                    ':educacion' => $educacion,
                    ':familia' => $familia,
                    ':recreacion' => $recreacion,
                    ':departamento_id' => $tbl_departamento_id,
                    ':comentario' => $comentario,
                    ':tbl_barrio_id' => $tbl_barrio_id,
                    ':tbl_pais_id' => $tbl_pais_id,
                );

                if ($result->execute($arrparam)) {
                    $last_insert_id = $pdo->lastInsertId();

                    $arrjson = array('output' => array('valid' => true, 'response' => $last_insert_id));
                }else{
                    $arrjson = Util::error_general();
                }

            }else{
                $arrjson = Util::error_missing_data();
            }
        }
        $db->closeConect();
        return $arrjson;
    }

}
            