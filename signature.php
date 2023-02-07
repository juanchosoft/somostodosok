<?php
require './admin/include/generic_classes.php';
header('Content-Type: text/html; charset=UTF-8');
include './admin/classes/Departamento.php';
/* include './admin/classes/Pais.php'; */

// Información de departamentos
$arrDep = Departamento::getAll(null);
$isvalid = $arrDep['output']['valid'];
$arrDep = $arrDep['output']['response'];
$optionDep = "";
foreach ($arrDep as $val) {
    $optionDep .= "<option value='" . $val['codigo_departamento'] . "'>" . $val['departamento'] . "</option>";
}
// Información de PAISES
/* $arrPais = Pais::getAll(null);
$isvalid = $arrPais['output']['valid'];
$arrPais = $arrPais['output']['response'];
$optionPais = "";
foreach ($arrPais as $val) {
    $optionPais .= "<option value='" . $val['id'] . "'>" . $val['nombre'] . "</option>";
} */

include './admin/include/head.php';


if (!empty($_POST)) {

    $nombre = $_POST['nombre'];
    $captcha = $_POST['grecaptcha-response'];
    $secret = '6LfMTOkiAAAAAEEQoirBSXKkoqUOfP5lA1bQ7L0s';
    if (!$captcha)
        echo "Por favor verifica el captcha";
}
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$recaptchaResponse}&remoteip={$ip}");


?>

<link href="css/modal.css" rel="stylesheet">
<body>


<!-- <section class="slider_section position-relative">
    <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="img-box"> <img src="images/ok/1.jpg" alt=""></div>
            </div>
            <div class="carousel-item">
                <div class="img-box"> <img src="images/ok/2.jpg" alt=""></div>
            </div>
            <div class="carousel-item">
                <div class="img-box"> <img src="images/ok/4.jpg" alt=""></div>
            </div>
            <div class="carousel-item">
                <div class="img-box"> <img src="images/ok/5.jpg" alt=""></div>
            </div>
            <div class="carousel-item">
                <div class="img-box"> <img src="images/ok/6.jpg" alt=""></div>
            </div>
             <div class="carousel-item">
                <div class="img-box"> <img src="images/ok/8.jpg" alt=""></div>
            </div>
            <div class="carousel-item">
                <div class="img-box"> <img src="images/ok/9.jpg" alt=""></div>
            </div>
             <div class="carousel-item">
                <div class="img-box"> <img src="images/ok/11.jpg" alt=""></div>
            </div>
            <div class="carousel-item">
                <div class="img-box"> <img src="images/ok/12.jpg" alt=""></div>
            </div>
            <div class="carousel-item">
                <div class="img-box"> <img src="images/ok/13.jpg" alt=""></div>
            </div>
            <div class="carousel-item">
                <div class="img-box"> <img src="images/ok/14.jpg" alt=""></div>
            </div>
            <div class="carousel-item">
                <div class="img-box"> <img src="images/ok/15.jpg" alt=""></div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
    </div>

    <div id="solocelulares" class="carousel slide " data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="img-box"> <img src="images/ok/cel/1.jpg" alt=""></div>
            </div>
            <div class="carousel-item">
                <div class="img-box"> <img src="images/ok/cel/2.jpg" alt=""></div>
            </div>
             <div class="carousel-item">
                <div class="img-box"> <img src="images/ok/cel/4.jpg" alt=""></div>
            </div>
            <div class="carousel-item">
                <div class="img-box"> <img src="images/ok/cel/5.jpg" alt=""></div>
            </div>
            <div class="carousel-item">
                <div class="img-box"> <img src="images/ok/cel/6.jpg" alt=""></div>
            </div>
             <div class="carousel-item">
                <div class="img-box"> <img src="images/ok/cel/8.jpg" alt=""></div>
            </div>
            <div class="carousel-item">
                <div class="img-box"> <img src="images/ok/cel/9.jpg" alt=""></div>
            </div>
             <div class="carousel-item">
                <div class="img-box"> <img src="images/ok/cel/11.jpg" alt=""></div>
            </div>
            <div class="carousel-item">
                <div class="img-box"> <img src="images/ok/cel/12.jpg" alt=""></div>
            </div>
            <div class="carousel-item">
                <div class="img-box"> <img src="images/ok/cel/13.jpg" alt=""></div>
            </div>
            <div class="carousel-item">
                <div class="img-box"> <img src="images/ok/cel/14.jpg" alt=""></div>
            </div>
            <div class="carousel-item">
                <div class="img-box"> <img src="images/ok/cel/15.jpg" alt=""></div>
            </div>
            <a class="carousel-control-prev" href="#solocelulares" role="button" data-slide="prev">
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#solocelulares" role="button" data-slide="next">
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
    </div>
</section> -->

<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand d-block d-sm-none" href="#">Menú</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
        <ul class="navbar-nav">
            <li class="nav-item">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">Nosotros </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="apoya.php">Ayúdanos A construir País </a>
            </li>
            <li class="nav-item active">
            <a class="nav-link" href="signature.php" >Ayuda con tus Firmas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="prensa.php">Prensa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="candidates.php">Candidatos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="event.php">Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contáctenos</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="another_regions.php">Otras Regiones</a>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled" href="another_regions.php">Quien es Juvenal Díaz Mateus</a>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled" href="another_regions.php">Otras Regiones</a>
            </li>
        </ul>
    </div>
</nav> -->

<div id="register" class="form-1">
    <div class="container">
        <div class="text-left">
            <h2>Ayúdanos conocerte y saber cómo podemos compartir esfuerzos, conocimientos y a conocernos.</h2>
            <p></p>
        </div>

        <form id="registrationForm" data-toggle="validator" data-focus="false" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="row">
                <input type="hidden" id="filtro" name="filtro" value="vereda">
<!--                 <div class="col-md-12 form-group">
                    <label class="bmd-label-floating">Pais<b class="errLbl">*</b></label>
                    <select class="form-control" onchange="APORTES.onchangePais();" id="tbl_pais_id" name="tbl_pais_id">
                        <?php echo $optionPais; ?>
                    </select>
                </div> -->
.
                    <div class="col-md-6 form-group" id="divDep">
                        <label class="bmd-label-floating">Departamento<b class="errLbl">*</b></label>
                        <select class="form-control" onchange="DEPARTAMENTO.getMunicipios();" id="tbl_departamento_id" name="tbl_departamento_id">
                            <?php echo $optionDep; ?>
                        </select>
                    </div>
                    <div class="col-md-6 form-group" id="divMun">
                        <label class="bmd-label-floating">Municipio<b class="errLbl">*</b></label>
                        <select class="form-control" onchange="DEPARTAMENTO.getVeredasByMunicipioId();" id="tbl_municipio_id" name="tbl_municipio_id"> </select>
                    </div>
                    <div class="col-md-6 form-group" id="divVer">
                        <label class="bmd-label-floating">Vereda<b class="errLbl">(para ciudades capitales busca zona urbana)</b></label>
                        <select class="form-control" id="tbl_vereda_id" name="tbl_vereda_id"></select>
                    </div>
                    <div class="col-md-6 form-group" id="divBarr">
                        <label class="bmd-label-floating">Barrio <b class="errLbl">(solo aplica para capitales, no es obligatorio colocarlo)</b></label>
                        <select class="form-control" id="tbl_barrio_id" name="tbl_barrio_id"></select>
                    </div>

                <div class="col-md-6 form-group">
                    <label class="bmd-label-floating" for="rname">Nombre completo<b class="errLbl">*</b></label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Por favor ingresa tu profesión o oficio">
                </div>
                        
                <div class="col-md-6 form-group">
                    <label class="bmd-label-floating" for="rphone">Teléfono Celular<b class="errLbl">*</b></label>
                    <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Por favor ingresa tu teléfono">
                </div>
                
                <div class="col-md-6 form-group">
                    <label class="bmd-label-floating" for="rname">Cédula Ciudadania<b class="errLbl">*</b></label>
                    <input type="number" class="form-control" id="cedula" name="cedula" required placeholder="Por favor ingresa tu cédula de ciudadania">
                </div>
                <div class="col-md-3 form-group">
                    <label class="bmd-label-floating" for="rphone">Día de Cumpleaños<b class="errLbl">*</b></label>
                    <select class="form-control" id="dia" name="dia">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <label class="bmd-label-floating" for="rphone">Mes de Cumpleaños<b class="errLbl">*</b></label>
                    <select class="form-control" id="mes" name="mes">
                        <option value="01">Enero</option>
                        <option value="02">Febrero</option>
                        <option value="03">Marzo</option>
                        <option value="04">Abril</option>
                        <option value="05">Mayo</option>
                        <option value="06">Junio</option>
                        <option value="07">Julio</option>
                        <option value="08">Agosto</option>
                        <option value="09">Septiembre</option>
                        <option value="20">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                </div>
               
                <div class="col-md-6 form-group">
                    <label class="bmd-label-floating" for="rname">Correo electrónico<b class="errLbl">(opcional)</b></label>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="ingresa tu correo electrónico">
                </div>
                <div>
                        <input type="checkbox" id="acepto_terminos" name="acepto_terminos" required>He leído y acepto los términos de tratamiento de datos Política y Términos <a href="privacy-policy.php"><b>Politica de Privacidad</b></a> y <a href="terms-conditions.html"><b>Términos y Condiciones</b></a>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div>
                        <input type="checkbox" id="autorizo_comunicados" name="autorizo_comunicados" required>Autorizo el envío de comunicados
                        <div class="help-block with-errors"></div>
                    </div>
                    <br>
                    <div class="g-recaptcha" data-sitekey="6LfMTOkiAAAAALlUmWZ9iHIrWLgZ8tZ6h9w9zOI0"></div>
                    <br>
                    <br>


                    <button type="button" onclick="FIRMAS.validateData();" class="primary2">Guardar y Enviar</button>
                    <div class="col-md-12">
                        <div id="rmsgSubmit" class="h3 text-center hidden"></div>
                    </div>
                </div>
            </div>
        </form>
                
                
                </div>
            </div>
        </form>
    </div>
</div>


<?php include 'admin/include/footer.php'; ?>

<script src="./plugins/sweetalert2/sweetalert2.js"></script>
<script type="text/javascript" src="admin/js/lib/util.js"></script>
<script type="text/javascript" src="admin/js/solonumeros.js"></script>
<script type="text/javascript" src="admin/js/departamento.js"></script>
<script type="text/javascript" src="admin/js/signature.js"></script>



<script>
  
    setTimeout(function() {
        $("#tbl_departamento_id").val('05')
                    }, 500);

                    setTimeout(function() {
                        DEPARTAMENTO.getMunicipios();
                    }, 1000);
</script>