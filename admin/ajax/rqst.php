<?php
session_start();
/**
 * en este archivo se atienden todas las peticiones AJAX
 */
$rqst = $_REQUEST;
$op = isset($rqst['op']) ? $rqst['op'] : '';
header("Content-type: application/javascript; charset=utf-8");
header("Cache-Control: max-age=15, must-revalidate");
header('Access-Control-Allow-Origin: *');

include '../classes/DbConection.php';
include '../classes/Util.php';
// include '../classes/SessionData.php';

switch ($op) {

    // Llamados municipios
  case 'ciudadget':
    include '../classes/Ciudad.php';
    echo json_encode(Ciudad::getAll($rqst));
    break;

    // Llamados veredas
  case 'veredaget':
    include '../classes/Vereda.php';
    echo json_encode(Vereda::getAll($rqst));
    break;

  case 'savecomentarios':
    include '../classes/Comentarios.php';
    echo json_encode(Comentarios::save($rqst));
    break;

  case 'socialget':
    include '../classes/Sociales.php';
    echo json_encode(Sociales::getAll($rqst));
  break;

  case 'get_barrios':
    include '../classes/Barrio.php';
    echo json_encode(Barrio::getAll($rqst));
  break;

  default:
    echo 'OPERACION NO DISPONIBLE';
    break;


    case 'savefirmas':
      include '../classes/Firmas.php';
      echo json_encode(Firmas::save($rqst));
      break;
}
