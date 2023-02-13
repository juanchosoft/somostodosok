<?php

class Firmas
{

    public function __construct()
    {
    }

        public static function availableDocument($rqst){

        $cedula = isset($rqst['cedula']) ? ($rqst['cedula']) : '';


        if ($cedula != "") {

            $db = new DbConection();
            $pdo = $db->openConect();

            $q = "SELECT * FROM " . $db->getTable('firmas') . " WHERE cedula = :cedula ";
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
        $tbl_pais_id = isset($rqst['tbl_pais_id']) ? intval($rqst['tbl_pais_id']) : 52;
        $nombre = isset($rqst['nombre']) ? ($rqst['nombre']) : '';
        $telefono = isset($rqst['telefono']) ? ($rqst['telefono']) : '';
        $cedula = isset($rqst['cedula']) ? intval($rqst['cedula']) : '';
        $email = isset($rqst['email']) ? ($rqst['email']) : '';
        // $cumpleanos = isset($rqst['cumpleanos']) ? ($rqst['cumpleanos']) : '';
         $acepto_terminos = isset($rqst['acepto_terminos']) ? ($rqst['acepto_terminos']) : '';
        $autorizo_comunicados = isset($rqst['autorizo_comunicados']) ? ($rqst['autorizo_comunicados']) : '';
       
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

        if ($acepto_terminos == "" || $acepto_terminos == "no") {
            return Util::error_general('Debe aceptar el tratamiento de datos');
        }

        if($cedula !="") {
            $p = array('cedula' => $cedula);
            $res = firmas::availableDocument($p);
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
            $q = "SELECT id FROM " . $db->getTable('firmas') . " WHERE id = " . $id;
            $result = $pdo->query($q);
            if ($result) {
                $table = $db->getTable('firmas');
                $arrfieldscomma = array(
                    'nombre' => $nombre,
                    'tbl_municipio_id' => $tbl_municipio_id,
                    'tbl_vereda_id' => $tbl_vereda_id,
                    'tbl_barrio_id' => $tbl_barrio_id,
                    'tbl_pais_id' => $tbl_pais_id,
                    'acepto_terminos' => $acepto_terminos,
                    'telefono' => $telefono,
                    'autorizo_comunicados' => $autorizo_comunicados,
                    'cedula' => $cedula,
                    'email' => $email,
                    'cumpleanos' => $cumpleanos,
                    'tbl_departamento_id' => $tbl_departamento_id,
                                    
                
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

                $q = "INSERT INTO " . $db->getTable('firmas') . " (dtcreate_at, nombre, municipio_id, vereda_id, acepto_terminos, email, cumpleanos, telefono, autorizo_comunicados, cedula,   departamento_id, tbl_barrio_id, tbl_pais_id) VALUES 
                                                ( " . Util::date_now_server() . ", :nombre, :municipio_id, :vereda_id, :acepto_terminos, :email, :cumpleanos, :telefono, :autorizo_comunicados,  :cedula,  :departamento_id,  :tbl_barrio_id, :tbl_pais_id)";
                
                $result = $pdo->prepare($q);
                $arrparam = array(
                    ':nombre' => $nombre,
                    ':municipio_id' => $tbl_municipio_id,
                    ':vereda_id' => $tbl_vereda_id,
                    ':acepto_terminos' => $acepto_terminos,
                    ':email' => $email,
                    ':cumpleanos' => $cumpleanos,
                    ':telefono' => $telefono,
                    ':autorizo_comunicados' => $autorizo_comunicados,
                    ':cedula' => $cedula,
                    ':departamento_id' => $tbl_departamento_id,
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
            