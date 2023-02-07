<?php

/**
 * Clase que contiene todas las operaciones utilizadas sobre la base de datos
 * @author SPIDERSOFTWARE
 */
class Barrio {

    public function __construct(){}

    public static function getAll($rqst){

        $id = isset($rqst['id']) ? intval($rqst['id']) : 0;
        $codigo_departamento = isset($rqst['departamento_id']) ? intval($rqst['departamento_id']) : 0;
        $codigo_municipio = isset($rqst['municipio_id']) ? intval($rqst['municipio_id']) : 0;

        $db = new DbConection();
        $pdo = $db->openConect();

        $q = "SELECT * FROM " . $db->getTable('tbl_barrios') . " ORDER BY barrio ASC";
        if ($id > 0) {
            $q = "SELECT * FROM " . $db->getTable('tbl_barrios') . " WHERE id = " . $id;
        }
        if ($codigo_departamento > 0 && $codigo_municipio > 0) {
            $q = "SELECT tbl_barrios.* FROM " . 
            $db->getTable('tbl_barrios') . "," . 
            $db->getTable('tbl_ciudades') . "," . 
            $db->getTable('tbl_departamentos') . " 
            WHERE 
            tbl_barrios.departamento_id = tbl_departamentos.id AND
            tbl_barrios.municipio_id = tbl_ciudades.id AND
            tbl_ciudades.codigo_muncipio = $codigo_municipio AND tbl_departamentos.codigo_departamento = $codigo_departamento ";
        }
        $result = $pdo->query($q);
        $arr = array();
        if ($result) {
            foreach ($result as $valor) {
                $arr[] = $valor;
            }
            $arrjson = array('output' => array('valid' => true, 'response' => $arr));
        } else {
            $arrjson = Util::error_no_result();
        }
        $db->closeConect();
        return $arrjson;
    }
}
