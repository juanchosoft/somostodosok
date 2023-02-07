<?php

/**
 * Clase que contiene todas las operaciones utilizadas sobre la base de datos
 * @author SPIDERSOFTWARE
 */
class Vereda
{

  public function __construct()
  {
  }

  /**
   * Metodo para actualizar la descripcion de la vereda
   */
  public static function updateDescripcionVereda($rqst)
  {
    $codigo_departamento = isset($rqst['codigo_departamento']) ? ($rqst['codigo_departamento']) : '';
    $codigo_muncipio = isset($rqst['codigo_muncipio']) ? ($rqst['codigo_muncipio']) : '';
    $nombre_vereda = isset($rqst['nombre_vereda']) ? ($rqst['nombre_vereda']) : '';
    $observaciones = isset($rqst['observaciones']) ? ($rqst['observaciones']) : '';

    $db = new DbConection();
    $pdo = $db->openConect();

    $q1 = "UPDATE  " . $db->getTable('tbl_vereda') . "
      SET observaciones='" . $observaciones . "'
      WHERE departamento_id = $codigo_departamento AND municipio_id = $codigo_muncipio  AND nombre_vereda = '$nombre_vereda' LIMIT 1 ";

    $result = $pdo->query($q1);

    $arrjson = array('output' => array('valid' => true, 'response' => $nombre_vereda));
    $db->closeConect();
    return $arrjson;
  }

  public static function getVeredasInfo($rqst)
  {
    $db = new DbConection();
    $pdo = $db->openConect();

    $q = "SELECT tbl_batallones.sigla AS batallon, tbl_brigadas.sigla AS brigada, tbl_departamentos.departamento, tbl_ciudades.municipio, tbl_vereda.nombre_vereda, tbl_vereda.id
        FROM (((" . $db->getTable('tbl_vereda') . " 
        INNER JOIN " . $db->getTable('tbl_brigadas') . "   ON tbl_vereda.tbl_brigada_id = tbl_brigadas.id) 
        INNER JOIN " . $db->getTable('tbl_batallones') . "   ON tbl_vereda.tbl_batallon_id = tbl_batallones.id) 
        INNER JOIN " . $db->getTable('tbl_departamentos') . "   ON tbl_vereda.departamento_id = tbl_departamentos.codigo_departamento) 
        INNER JOIN " . $db->getTable('tbl_ciudades') . "   ON tbl_vereda.municipio_id = tbl_ciudades.codigo_muncipio ";
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
   * Obtener la informacion de las veredas
   */
  public static function getAll($rqst)
  {
    $id = isset($rqst['id']) ? intval($rqst['id']) : 0;
    $municipio_id = isset($rqst['municipio_id']) ? intval($rqst['municipio_id']) : 0;

    $db = new DbConection();
    $pdo = $db->openConect();

    $q = "SELECT * FROM " . $db->getTable('tbl_vereda') .  " ORDER BY nombre_vereda ASC";

    if ($id > 0) {
      $q = "SELECT * FROM " . $db->getTable('tbl_vereda') . " WHERE id = " . $id;
    }
    if ($municipio_id > 0) {
      $q = "SELECT * FROM " . $db->getTable('tbl_vereda') . " WHERE municipio_id = '$municipio_id' ORDER BY nombre_vereda ASC";
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
   * Informacion de las veredas que no tienen datos ingresados
   */
  public static function getVeredasSinDatos($rqst)
  {

    $social = isset($rqst['social']) ? ($rqst['social']) : 'no';
    $economico = isset($rqst['economico']) ? ($rqst['economico']) : 'no';
    $armado = isset($rqst['armado']) ? ($rqst['armado']) : 'no';

    $db = new DbConection();
    $pdo = $db->openConect();

    //Social
    if ($social === 'si') {
      $q = "SELECT tbl_vereda.id, tbl_vereda.nombre_vereda, tbl_vereda.codigo_vereda, tbl_ciudades.municipio
          FROM " . $db->getTable('tbl_vereda') . "," . $db->getTable('tbl_ciudades') . "
          WHERE tbl_vereda.municipio_id = tbl_ciudades.codigo_muncipio AND
          tbl_vereda.id NOT IN (SELECT vereda_id FROM " . $db->getTable('tbl_resultados_social') . "  )";
    }

    //Economico
    if ($economico === 'si') {
      $q = "SELECT tbl_vereda.id, tbl_vereda.nombre_vereda, tbl_vereda.codigo_vereda, tbl_ciudades.municipio
          FROM " . $db->getTable('tbl_vereda') . "," . $db->getTable('tbl_ciudades') . "
          WHERE tbl_vereda.municipio_id = tbl_ciudades.codigo_muncipio AND
          tbl_vereda.id NOT IN (SELECT vereda_id FROM " . $db->getTable('tbl_resultados_economico') . "  )";
    }

    //Armado
    if ($armado === 'si') {
      $q = "SELECT tbl_vereda.id, tbl_vereda.nombre_vereda, tbl_vereda.codigo_vereda, tbl_ciudades.municipio
          FROM " . $db->getTable('tbl_vereda') . "," . $db->getTable('tbl_ciudades') . "
          WHERE tbl_vereda.municipio_id = tbl_ciudades.codigo_muncipio AND
          tbl_vereda.id NOT IN (SELECT vereda_id FROM " . $db->getTable('tbl_resultados_armado') . "  )";
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
   * Metodo para obtener las veredas 5 más criticas por batallon o brigada
   */
  public static function getVeredasCriticasByBatallonIdOrByBrigadaId($rqst)
  {

    include 'Estado.php';

    $tbl_brigada_id = isset($rqst['tbl_brigada_id']) ? intval($rqst['tbl_brigada_id']) : 0;
    $tbl_batallon_id = isset($rqst['tbl_batallon_id']) ? intval($rqst['tbl_batallon_id']) : 0;
    $limit = isset($rqst['limit']) ? intval($rqst['limit']) : 8;
    $filtro = isset($rqst['filtro']) ? ($rqst['filtro']) : '';
    $puntaje = 200;
    $q = "";

    if ($tbl_brigada_id == 0 && $tbl_batallon_id  == 0) {
      return Util::error_no_result();
    }

    $db = new DbConection();
    $pdo = $db->openConect();

    // Filtro por brigada
    if ($tbl_brigada_id  > 0) {
      $q = "SELECT tbl_ciudades.id AS tbl_ciudad_id,
        tbl_vereda.id AS tbl_vereda_id,
        tbl_vereda.nombre_vereda,
        tbl_vereda.carpeta_svg,
        tbl_vereda.nombre_svg,
        tbl_ciudades.municipio,
        tbl_ciudades.codigo_muncipio,
        tbl_ciudades.codigo_departamento,
        tbl_brigadas.id as tbl_brigada_id,
        tbl_brigadas.sigla AS brigada, 
        tbl_batallones.sigla AS batallon, 
        tbl_vereda.color, 
        tbl_vereda.puntaje
        FROM ((" . $db->getTable('tbl_vereda') . " INNER JOIN " . $db->getTable('tbl_ciudades') . " ON tbl_vereda.municipio_id = tbl_ciudades.codigo_muncipio) 
        INNER JOIN " . $db->getTable('tbl_batallones') . " ON tbl_vereda.tbl_batallon_id = tbl_batallones.id) 
        INNER JOIN " . $db->getTable('tbl_brigadas') . " ON tbl_vereda.tbl_brigada_id = tbl_brigadas.id 
        WHERE tbl_brigadas.id =  $tbl_brigada_id AND tbl_vereda.puntaje >= $puntaje ORDER BY tbl_vereda.puntaje DESC LIMIT $limit";
    }

    // Filtro por Batallon
    if ($tbl_batallon_id  > 0) {

      $q = "SELECT tbl_ciudades.id AS tbl_ciudad_id,
        tbl_vereda.id AS tbl_vereda_id,
        tbl_vereda.nombre_vereda,
        tbl_vereda.carpeta_svg,
        tbl_vereda.nombre_svg,
        tbl_ciudades.municipio,
        tbl_ciudades.codigo_muncipio,
        tbl_ciudades.codigo_departamento,
        tbl_brigadas.id as tbl_brigada_id,
        tbl_brigadas.sigla AS brigada, 
        tbl_batallones.sigla AS batallon, 
        tbl_vereda.color, 
        tbl_vereda.puntaje
        FROM ((" . $db->getTable('tbl_vereda') . " INNER JOIN " . $db->getTable('tbl_ciudades') . " ON tbl_vereda.municipio_id = tbl_ciudades.codigo_muncipio) 
        INNER JOIN " . $db->getTable('tbl_batallones') . " ON tbl_vereda.tbl_batallon_id = tbl_batallones.id) 
        INNER JOIN " . $db->getTable('tbl_brigadas') . " ON tbl_vereda.tbl_brigada_id = tbl_brigadas.id 
        WHERE tbl_batallones.id = $tbl_batallon_id AND tbl_vereda.puntaje >= $puntaje ORDER BY tbl_vereda.puntaje DESC LIMIT $limit";
    }
    $result = $pdo->query($q);
    $arr = array();
    $arrEstadoVeredasCriticas = array();
    if ($result) {
      foreach ($result as $valor) {
        $arrTemp = array();
        $arrTemp['tbl_vereda_id'] = $valor['tbl_vereda_id'];
        $arrTemp['tbl_ciudad_id'] = $valor['tbl_ciudad_id'];
        $arrTemp['nombre_vereda'] = $valor['nombre_vereda'];
        $arrTemp['carpeta_svg'] = $valor['carpeta_svg'];
        $arrTemp['nombre_svg'] = $valor['nombre_svg'];
        $arrTemp['municipio'] = $valor['municipio'];
        $arrTemp['codigo_muncipio'] = $valor['codigo_muncipio'];
        $arrTemp['codigo_departamento'] = $valor['codigo_departamento'];
        $arrTemp['tbl_brigada_id'] = $valor['tbl_brigada_id'];
        $arrTemp['brigada'] = $valor['brigada'];
        $arrTemp['batallon'] = $valor['batallon'];
        $arrTemp['color'] = $valor['color'];
        $arrTemp['puntaje'] = $valor['puntaje'];
        $arrTemp['clase'] = Util::getClasePorColor($valor['color']);
        $arr[] = $arrTemp;

        //Consultamos la informacion del estado de la VEREDA
        $codigo_departamento = $valor['codigo_departamento'];
        $codigo_muncipio = $valor['codigo_muncipio'];
        $nombre_vereda = $valor['nombre_vereda'];
        $rqstVereda =  array('codigo_departamento' => $codigo_departamento, 'codigo_muncipio' => $codigo_muncipio, 'vereda' => $nombre_vereda);
        $resultVereda = Estado::getEstadoFactorArmadoSocialEcon($rqstVereda);
        if ($resultVereda) {
          $arrEstadoVeredasCriticas[] = $resultVereda['output'];
        }
      }
      if (count($arr) > 0) {
        $arrjson = array('output' => array('valid' => true, 'response' => $arr, 'filtro' => $filtro, 'estados' => $arrEstadoVeredasCriticas));
      } else {
        $arrjson = Util::error_no_result();
      }
    } else {
      $arrjson = Util::error_no_result();
    }
    $db->closeConect();
    return $arrjson;
  }

  /**
   * Metodo para mostrar la información de las veredas seleccionadas en Modulo de "Veredas Críticas - Selección personalizada"
   */
  public static function getVeredasSeleccionadasCriticasByBatallonIdOrByBrigadaId($rqst)
  {
    include 'Estado.php';

    $tbl_brigada_id = isset($rqst['tbl_brigada_id']) ? intval($rqst['tbl_brigada_id']) : 0;
    $tbl_batallon_id = isset($rqst['tbl_batallon_id']) ? intval($rqst['tbl_batallon_id']) : 0;
    $filtro = isset($rqst['filtro']) ? ($rqst['filtro']) : '';
    $tbl_vereda_ids = isset($rqst['tbl_vereda_id']) ? ($rqst['tbl_vereda_id']) : '';

    $arr = array();
    $arrEstadoVeredasCriticas = array();
    $q = "";

    if ($tbl_brigada_id == 0 && $tbl_batallon_id  == 0) {
      return Util::error_no_result();
    }

    if ($tbl_vereda_ids == "") {
      return Util::info_general('Debe selecionar al menos una vereda');
    }
    $arrchkVeredaId = explode(',', $tbl_vereda_ids);
    $contador = count($arrchkVeredaId);

    $db = new DbConection();
    $pdo = $db->openConect();


    for ($i = 0; $i < $contador; $i++) {

      if (intval($arrchkVeredaId[$i]) > 0) {
        $q = "SELECT tbl_ciudades.id AS tbl_ciudad_id,
          tbl_vereda.id AS tbl_vereda_id,
          tbl_vereda.nombre_vereda,
          tbl_vereda.carpeta_svg,
          tbl_vereda.nombre_svg,
          tbl_ciudades.municipio,
          tbl_ciudades.codigo_muncipio,
          tbl_ciudades.codigo_departamento,
          tbl_brigadas.id as tbl_brigada_id,
          tbl_brigadas.sigla AS brigada, 
          tbl_batallones.sigla AS batallon, 
          tbl_batallones.id AS tbl_batallon_id, 
          tbl_vereda.color, 
          tbl_vereda.puntaje
          FROM ((" . $db->getTable('tbl_vereda') . " INNER JOIN " . $db->getTable('tbl_ciudades') . " ON tbl_vereda.municipio_id = tbl_ciudades.codigo_muncipio) 
          INNER JOIN " . $db->getTable('tbl_brigadas') . " ON tbl_vereda.tbl_brigada_id = tbl_brigadas.id) 
          INNER JOIN " . $db->getTable('tbl_batallones') . " ON tbl_vereda.tbl_batallon_id = tbl_batallones.id
          WHERE tbl_vereda.id = $arrchkVeredaId[$i]";

        $result = $pdo->query($q);
        if ($result) {
          foreach ($result as $valor) {
            $arrTemp = array();
            $arrTemp['tbl_vereda_id'] = $valor['tbl_vereda_id'];
            $arrTemp['tbl_ciudad_id'] = $valor['tbl_ciudad_id'];
            $arrTemp['nombre_vereda'] = $valor['nombre_vereda'];
            $arrTemp['carpeta_svg'] = $valor['carpeta_svg'];
            $arrTemp['nombre_svg'] = $valor['nombre_svg'];
            $arrTemp['municipio'] = $valor['municipio'];
            $arrTemp['codigo_muncipio'] = $valor['codigo_muncipio'];
            $arrTemp['codigo_departamento'] = $valor['codigo_departamento'];
            $arrTemp['tbl_brigada_id'] = $valor['tbl_brigada_id'];
            $arrTemp['brigada'] = $valor['brigada'];
            $arrTemp['batallon'] = $valor['batallon'];
            $arrTemp['color'] = $valor['color'];
            $arrTemp['puntaje'] = $valor['puntaje'];
            $arrTemp['clase'] = Util::getClasePorColor($valor['color']);
            $arr[] = $arrTemp;

            //Consultamos la informacion del estado de la VEREDA
            $codigo_departamento = $valor['codigo_departamento'];
            $codigo_muncipio = $valor['codigo_muncipio'];
            $nombre_vereda = $valor['nombre_vereda'];
            $rqstVereda =  array('codigo_departamento' => $codigo_departamento, 'codigo_muncipio' => $codigo_muncipio, 'vereda' => $nombre_vereda);
            $resultVereda = Estado::getEstadoFactorArmadoSocialEcon($rqstVereda);
            if ($resultVereda) {
              $arrEstadoVeredasCriticas[] = $resultVereda['output'];
            }
          }
        }
      }
    }

    if (count($arr) > 0) {
      $arrjson = array('output' => array('valid' => true, 'response' => $arr, 'filtro' => $filtro, 'estados' => $arrEstadoVeredasCriticas));
    } else {
      $arrjson = Util::error_no_result();
    }

    $db->closeConect();
    return $arrjson;
  }

  public static function getSoloInformacionVeredasCriticasV2($rqst)
  {

    include 'Estado.php';

    $tbl_brigada_id = isset($rqst['tbl_brigada_id']) ? intval($rqst['tbl_brigada_id']) : 0;
    $tbl_batallon_id = isset($rqst['tbl_batallon_id']) ? intval($rqst['tbl_batallon_id']) : 0;
    $limit = isset($rqst['limit']) ? intval($rqst['limit']) : 5;
    $filtro = isset($rqst['filtro']) ? ($rqst['filtro']) : '';
    $puntaje = 0;
    $q = "";

    if ($tbl_brigada_id == 0 && $tbl_batallon_id  == 0) {
      return Util::error_no_result();
    }

    $db = new DbConection();
    $pdo = $db->openConect();

    // Filtro por brigada
    if ($tbl_brigada_id  > 0) {
      $q = "SELECT tbl_brigadas.sigla AS brigada, 
        tbl_batallones.id AS batallon_id, 
        tbl_brigadas.id AS brigada_id, 
        tbl_batallones.sigla AS batallon, 
        tbl_ciudades.municipio, 
        tbl_vereda.id AS tbl_vereda_id, 
        tbl_vereda.nombre_vereda, 
        tbl_vereda.nombre_svg, 
        tbl_vereda.carpeta_svg, 
        tbl_ciudades.codigo_departamento, 
        tbl_vereda.color, 
        tbl_vereda.puntaje
        FROM ((" . $db->getTable('tbl_vereda') . " INNER JOIN " . $db->getTable('tbl_ciudades') . " ON tbl_vereda.municipio_id = tbl_ciudades.codigo_muncipio) 
        INNER JOIN " . $db->getTable('tbl_brigadas') . " ON tbl_vereda.tbl_brigada_id = tbl_brigadas.id) 
        INNER JOIN " . $db->getTable('tbl_batallones') . " ON tbl_vereda.tbl_batallon_id = tbl_batallones.id
        WHERE tbl_brigadas.id = $tbl_brigada_id 
        ORDER BY tbl_ciudades.municipio, tbl_vereda.nombre_vereda ASC LIMIT $limit";
    }

    // Filtro por Batallon
    if ($tbl_batallon_id  > 0) {
      $q = "SELECT tbl_brigadas.sigla AS brigada, 
        tbl_batallones.id AS batallon_id, 
        tbl_brigadas.id AS brigada_id, 
        tbl_batallones.sigla AS batallon, 
        tbl_ciudades.municipio, 
        tbl_vereda.id AS tbl_vereda_id, 
        tbl_vereda.nombre_vereda, 
        tbl_vereda.nombre_svg, 
        tbl_vereda.carpeta_svg, 
        tbl_ciudades.codigo_departamento, 
        tbl_vereda.color, 
        tbl_vereda.puntaje
        FROM ((" . $db->getTable('tbl_vereda') . " INNER JOIN " . $db->getTable('tbl_ciudades') . " ON tbl_vereda.municipio_id = tbl_ciudades.codigo_muncipio) 
        INNER JOIN " . $db->getTable('tbl_brigadas') . " ON tbl_vereda.tbl_brigada_id = tbl_brigadas.id) 
        INNER JOIN " . $db->getTable('tbl_batallones') . " ON tbl_vereda.tbl_batallon_id = tbl_batallones.id
        WHERE tbl_batallones.id = $tbl_batallon_id 
        ORDER BY tbl_ciudades.municipio, tbl_vereda.nombre_vereda ASC LIMIT $limit";
    }
    $result = $pdo->query($q);
    $arr = array();
    if ($result) {
      foreach ($result as $valor) {
        $arr[] = $valor;
      }
      if (count($arr) > 0) {
        $arrjson = array('output' => array('valid' => true, 'response' => $arr, 'filtro' => $filtro));
      } else {
        $arrjson = Util::error_no_result();
      }
    } else {
      $arrjson = Util::error_no_result();
    }
    $db->closeConect();
    return $arrjson;
  }
}
