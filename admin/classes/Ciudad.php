<?php

/**
 * Clase que contiene todas las operaciones utilizadas sobre la base de datos
 * @author SPIDERSOFTWARE
 */
class Ciudad {

    public function __construct(){}

    public static function getAll($rqst)
    {
        $id = isset($rqst['id']) ? intval($rqst['id']) : 0;
        $codigo_departamento = isset($rqst['codigo_departamento']) ? intval($rqst['codigo_departamento']) : 0;

        $db = new DbConection();
        $pdo = $db->openConect();

        $q = "SELECT * FROM " . $db->getTable('tbl_ciudades') . " ORDER BY municipio ASC";

        if ($id > 0) {
            $q = "SELECT * FROM " . $db->getTable('tbl_ciudades') . " WHERE id = " . $id;
        }
        if ($codigo_departamento > 0) {
            $q = "SELECT * FROM " . $db->getTable('tbl_ciudades') . " WHERE codigo_departamento = " . $codigo_departamento;
        }
        $result = $pdo->query($q);
        $arr = array();
        if ($result) {
            foreach ($result as $valor) {
                $codeCity = $valor['codigo_muncipio'];
                $colorCalculadoDelMunicipio = ""; 

                // Informacion de los colores del Municipio
                $qColorPrimante = "SELECT tbl_vereda.municipio_id, tbl_vereda.color, tbl_colores.orden  FROM  ".$db->getTable('tbl_vereda'). " INNER JOIN  ".$db->getTable('tbl_colores'). "  ON tbl_vereda.color = tbl_colores.color
                WHERE tbl_vereda.municipio_id = '$codeCity' GROUP BY tbl_vereda.color ORDER BY orden ASC limit 1";    
                $resultColor = $pdo->query($qColorPrimante);
                foreach ($resultColor as $valor1) {
                    $colorCalculadoDelMunicipio = $valor1['color'];
                }

                // Arr Temporales
                $arrTemp = array();
                $arrTemp['id'] = $valor['id'];
                $arrTemp['codigo_departamento'] = $valor['codigo_departamento'];
                $arrTemp['codigo_muncipio'] = $valor['codigo_muncipio'];
                $arrTemp['subregion'] = $valor['subregion'];
                $arrTemp['aap'] = $valor['aap'];
                $arrTemp['pdet'] = $valor['pdet'];
                $arrTemp['zf'] = $valor['zf'];
                $arrTemp['visible'] = $valor['visible'];
                $arrTemp['tbl_batallon_id'] = $valor['tbl_batallon_id'];
                $arrTemp['municipio'] = $valor['municipio'];
                $arrTemp['puntaje'] = $valor['puntaje'];
                $arrTemp['color'] = $valor['color'];
                $arrTemp['carpeta_mapa'] = $valor['carpeta_mapa'];
                $arrTemp['carpeta_svg'] = $valor['carpeta_svg'];
                $arrTemp['nombre_mapa'] = $valor['nombre_mapa'];
                $arrTemp['mostrar_barrio'] = $valor['mostrar_barrio'];
                $arrTemp['color_calculado_de_municipio'] = $colorCalculadoDelMunicipio;
                $arr[] = $arrTemp;
            }
            $arrjson = array('output' => array('valid' => true, 'response' => $arr));
        } else {
            $arrjson = Util::error_no_result();
        }
        $db->closeConect();
        return $arrjson;
    }
}
