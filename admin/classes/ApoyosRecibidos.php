<?php

class ApoyosRecibidos
{

    public function __construct()
    {
    }

    public static function save($rqst)
    {
        $id = isset($rqst['id']) ? intval($rqst['id']) : 0;
        $tbl_comentario_id = isset($rqst['tbl_comentario_id']) ? ($rqst['tbl_comentario_id']) : 0;
        $economico = isset($rqst['economico']) ? ($rqst['economico']) : '';
        $logistica = isset($rqst['logistica']) ? ($rqst['logistica']) : '';
        $telefono = isset($rqst['telefono']) ? ($rqst['telefono']) : '';
        $redes = isset($rqst['redes']) ? ($rqst['redes']) : '';
        $equipossec  = isset($rqst['equipossec']) ? ($rqst['equipossec']) : '';
        $personal = isset($rqst['personal']) ? ($rqst['personal']) : '';
        $amplificacion = isset($rqst['amplificacion']) ? ($rqst['amplificacion']) : '';
        $otros = isset($rqst['otros']) ? ($rqst['otros']) : '';
        $detalles = isset($rqst['detalles']) ? ($rqst['detalles']) : '';
        $acepto_terminos = isset($rqst['acepto_terminos']) ? ($rqst['acepto_terminos']) : '';
        $autorizo_comunicados = isset($rqst['autorizo_comunicados']) ? ($rqst['autorizo_comunicados']) : '';
    
        
        }

        // if ($acepto_terminos == "" || $acepto_terminos == "no") {
        //     return Util::error_general('Debe aceptar el tratamiento de datos');
        // }

        $db = new DbConection();
        $pdo = $db->openConect();

        if ($id > 0) {
            //actualiza la informacion
            $q = "SELECT id FROM " . $db->getTable('tbl_apoyos_recibidos') . " WHERE id = " . $id;
            $result = $pdo->query($q);
            if ($result) {
                $table = $db->getTable('tbl_apoyos_recibidos');
                $arrfieldscomma = array(
                    'nombre' => $nombre,
                    'tbl_comentario_id' => $tbl_comentario_id,
                    'economico' => $economico,
                    'logistica' => $logistica,
                    'redes' => $redes,
                    'equipossec ' => $equipossec ,
                    'amplificacion' => $amplificacion,
                    'otros' => $otros,
                    'detalles' => $detalles,
                    
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
            if ($nombre != "" ||  $autorizo_comunicados != "" || $tbl_comentario_id != ) {

                $q = "INSERT INTO " . $db->getTable('tbl_apoyos_recibidos') . " (dtcreate_at, comentario_id, economico, acepto_terminos, logistica, autorizo_comunicados, 
                redes, equipossec , personal, amplificacion, otros, detalles, )
                    VALUES ( " . Util::date_now_server() . ", :nombre, :municipio_id, :economico, :acepto_terminos, :logistica, :autorizo_comunicados,:redes, :equipossec, :personal, :amplificacion, :otros, :detalles)";
                $result = $pdo->prepare($q);
                $arrparam = array(
                    ':comentario_id' => $comentario_id,
                    ':acepto_terminos' => $acepto_terminos,
                    ':economico' => $economico,
                    ':logistica' => $logistica,
                    ':redes' => $redes,
                    ':equipossec ' => $equipossec ,
                    ':personal' => $personal,
                    ':amplificacion' => $amplificacion,
                    ':otros' => $otros,
                    ':detalles' => $detalles,
                  
                );
/* 
                print_r($q);
                print_r($arrparam);
                exit(); */
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
            