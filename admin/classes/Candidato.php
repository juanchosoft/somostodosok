<?php

class Comentarios
{

    public function __construct()
    {
    }
    public static function save($rqst, $files = [])
    {
        $id = isset($rqst['id']) ? intval($rqst['id']) : 0;
        $nombre = isset($rqst['nombre']) ? ($rqst['nombre']) : '';
        $email =  isset($rqst['email']) ? ($rqst['email']) : '';
        $aspiracion = isset($rqst['aspiracion']) ? ($rqst['aspiracion']) : '';
        $celular =   isset($rqst['celular']) ? ($rqst['celular']) : '';
        $comentarios =   isset($rqst['comentarios']) ? ($rqst['comentarios']) : '';
        $terminos =   isset($rqst['terminos']) ? ($rqst['terminos']) : '';

        if ($email != "") {
            if (!Util::validate_email($email)) {
                return Util::error_general('El email no es correcto');
            }
        }

        if ($terminos == "" || $terminos == "no") {
            return Util::error_general('Debe aceptar el tratamiento de datos');
        }

        $db = new DbConection();
        $pdo = $db->openConect();

        if ($id > 0) {
            //actualiza la informacion
            $q = "SELECT id FROM " . $db->getTable('candidatos') . " WHERE id = " . $id;
            $result = $pdo->query($q);
            if ($result) {
                $table = $db->getTable('candidatos');
                $arrfieldscomma = array(
                    'nombre' => $nombre,
                    'email' => $email,
                    'pdf' => $pdf,
                    'aspiracion' => $aspiracion,
                    'comentarios' => $comentarios,
                    'terminos' => $terminos,
                    'celular' => $celular
                );
                $arrfieldsnocomma = array('dtcreate_at' => Util::date_now_server());
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
            if ($nombre != "" && $email  != "") {
                $q = "INSERT INTO " . $db->getTable('candidatos') . " (dtcreate_at,  nombre, email, celular, aspiracion, comentarios, terminos, pdf)
                VALUES ( " . Util::date_now_server() . ",  :nombre, :email,  :celular, :aspiracion, :comentarios, :terminos, :pdf)";
                $result = $pdo->prepare($q);
                $arrparam = array(
                    ':nombre' => $nombre,
                    ':email' => $email,
                    ':celular' => $celular,
                    ':aspiracion' => $aspiracion,
                    ':comentarios' => $comentarios,
                    ':terminos' => $terminos,
                    ':pdf' => $pdf
                );
                if ($result->execute($arrparam)) {
                    $arrjson = array('output' => array('valid' => true, 'response' => $pdo->lastInsertId()));
                } else {
                    $arrjson = Util::error_general();
                }
            } else {
                $arrjson = Util::error_missing_data();
            }
        }
        $db->closeConect();
        return $arrjson;
    }
}
