<?php

/**
 * Clase que contiene todas las operaciones utilizadas sobre la base de datos
 * @author SPIDERSOFTWARE
 */
class Lideres {

    public function __construct(){}

    /**
     * Metodo para recuperar todos los registros
     * @return array del lider
     */
    public static function getAll($rqst)
    {

        $id = isset($rqst['id']) ? intval($rqst['id']) : 0;
        $tipo = isset($rqst['tipo']) ? ($rqst['tipo']) : '';

        $db = new DbConection();
        $pdo = $db->openConect();

        $q = "SELECT * FROM " . $db->getTable('tbl_lideres');
        if ($id > 0) {
            $q = "SELECT * FROM " . $db->getTable('tbl_lideres') . " WHERE id = " . $id;
        }

        if ($tipo != "") {
            $q = "SELECT * FROM " . $db->getTable('tbl_lideres') . " WHERE tipo = '$tipo' AND habilitado = 'si'";
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

    /**
     * Funcion para validar si la cedula ingresa ya existe
     * [available description]
     * @param  [type] $rqst [description]
     * @return [type]       [description]
     */
    public static function available($rqst)
    {
        $identificacion_num  = isset($rqst['identificacion_num ']) ? ($rqst['identificacion_num ']) : '';

        $db = new DbConection();
        $pdo = $db->openConect();

        $q = "SELECT * FROM " . $db->getTable('tbl_lideres') . " WHERE identificacion_num  = :identificacion_num ";
        $result = $pdo->prepare($q);
        $arr = array();
        $arrparam = array(":identificacion_num " => $identificacion_num );
        if ($result->execute($arrparam)) {
            foreach ($result as $valor) {
                $arr[] = $valor;
            }
            if (count($arr) > 0) {
                $arrjson = Util::error_general('El Lider ingresado ya existe en nuestro sistema');
            } else {
                $arrjson = array('output' => array('valid' => true, 'response' => 'available'));
            }
        } else {
            $arrjson = Util::error_general('');
        }
        $db->closeConect();
        return $arrjson;
    }

  

    public static function save($rqst)
    {
        $id = isset($rqst['id']) ? intval($rqst['id']) : 0;
        $tbl_departamento_id = isset($rqst['tbl_departamento_id']) ? intval($rqst['tbl_departamento_id']) : 0;
        $tbl_municipio_id = isset($rqst['tbl_municipio_id']) ? intval($rqst['tbl_municipio_id']) : 0;
        $tbl_vereda_id = isset($rqst['tbl_vereda_id']) ? intval($rqst['tbl_vereda_id']) : 0;
        $tbl_usuario_id =  intval($_SESSION['session_user']['id']);
        $nombre = isset($rqst['nombre']) ? ($rqst['nombre']) : '';
        $apellido = isset($rqst['apellido']) ? ($rqst['apellido']) : '';
        $identificacion_tipo = isset($rqst['identificacion_tipo']) ? ($rqst['identificacion_tipo']) : '';
        $identificacion_num = isset($rqst['identificacion_num']) ? ($rqst['identificacion_num']) : '';
        $email = isset($rqst['email']) ? ($rqst['email']) : '';
        $telefono = isset($rqst['telefono']) ? ($rqst['telefono']) : '';
        $habilitado = isset($rqst['habilitado']) ? ($rqst['habilitado']) : '';
        $tbl_usuario_id =  intval($_SESSION['session_user']['id']);
        $img = isset($_SESSION['file']['nombrearchivo']) ? ($_SESSION['file']['nombrearchivo']) : '';

        $db = new DbConection();
        $pdo = $db->openConect();

      
        if ($id > 0) {
            //actualiza la informacion
            $q0 = "SELECT id, img FROM " . $db->getTable('tbl_lideres') . " WHERE id = " . $id;
            $result0 = $pdo->query($q0);
            if ($result0) {
                $table = $db->getTable('tbl_lideres');
                $arrfieldscomma = array(
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'identificacion_tipo' => $identificacion_tipo,
                    'identificacion_num' => $identificacion_num,
                    'email' => $email,
                    'telefono' => $telefono,
                    'area' => $area,
                    'cargo' => $cargo,
                    'img' => $img,
                    'tbl_departamento_id' => $tbl_departamento_id,
                    'tbl_municipio_id' => $tbl_municipio_id,
                    'tbl_vereda_id' => $tbl_vereda_id,
                     'habilitado' => $habilitado);
                $arrfieldsnocomma = array('dtcreate' => Util::date_now_server());
                $q = Util::make_query_update($table, "id = '$id'", $arrfieldscomma, $arrfieldsnocomma);
                $result = $pdo->query($q);

                // Obtemos el valor de la imagen del producto
                $file = "";
                foreach ($result0 as $valor0) {
                    $file = $valor0['img'];
                }

                if(!$result){
                    $arrjson = Util::error_general('Actualizando los datos del Lider');
                }else{


                    $arrjson = array('output' => array('valid' => true, 'id' => $id, 'img' => $file));

                    // Eliminamos el archivo anterior siempre y cuando se halla actualizado la imagen
                    if ($file != "" && file_exists("../../assets/img/admin/usuarios/" . $file)) {
                        unlink("../../assets/img/admin/usuarios/" . $file);
                    }
                }
            } else {
                $arrjson = Util::error_general();
            }
        } else {
            if ($nombre != "" || $apellido !="" || $tbl_departamento_id > 0 || $identificacion_num !="") {
                $q = "INSERT INTO " . $db->getTable('tbl_lideres') . " (dtcreate, nombre, apellido, identificacion_tipo, identificacion_num, email, telefono, img, tbl_departamento_id, tbl_municipio_id, tbl_vereda_id, habilitado, tbl_usuario_id) VALUES
                                              ( " . Util::date_now_server() . ", :nombre, :apellido, :identificacion_tipo, :identificacion_num, :email, :telefono, :img, :tbl_departamento_id, :tbl_municipio_id, :tbl_vereda_id, :habilitado, :tbl_usuario_id)";
                $result = $pdo->prepare($q);
                $arrparam = array(                    
                    ':nombre' => $nombre,
                    ':apellido' => $apellido,
                    ':identificacion_tipo' => $identificacion_tipo,
                    ':identificacion_num' => $identificacion_num,
                    ':email' => $email,
                    ':telefono' => $telefono,
                     ':img' => $img,
                    ':tbl_departamento_id' => $tbl_departamento_id,
                    ':tbl_municipio_id' => $tbl_municipio_id,
                    ':tbl_vereda_id' => $tbl_vereda_id,
                    ':tbl_usuario_id' => $tbl_usuario_id,
                    ':habilitado' => $habilitado);
                if ($result->execute($arrparam)) {
                    $arrjson = array('output' => array('valid' => true, 'response' => $pdo->lastInsertId()));
                } else {
                    $arrjson = Util::error_general('Ingresando los datos del usurario');
                }
            } else {
                $arrjson = Util::error_missing_data();
            }
        }
        $db->closeConect();
        return $arrjson;
    }

    public static function search($rqst){
        $search = isset($rqst['search']) ? ($rqst['search']) : '';

        $db = new DbConection();
        $pdo = $db->openConect();

        $q = "SELECT * FROM " . $db->getTable('tbl_lideres') . "
        WHERE nombre  LIKE '%$search%'  OR
            apellido  LIKE '%$search%' OR
            tipo  LIKE '%$search%'";
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
