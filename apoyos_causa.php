<?php
require './admin/include/generic_classes.php';
header('Content-Type: text/html; charset=UTF-8');  




include './admin/include/head.php';
?>

<section class=" slider_section position-relative">
  <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="img-box">
        <img src="images/banner/6.jpg" alt="">
        </div>
      </div>
      <div class="carousel-item">
        <div class="img-box">
        <img src="images/banner/8.jpg" alt="">
        </div>
      </div>
      <div class="carousel-item">
        <div class="img-box">
        <img src="images/banner/9.jpg" alt="">
        </div>
      </div>
      <div class="carousel-item">
        <div class="img-box">
        <img src="images/banner/11.jpg" alt="">
        </div>
      </div>
      <div class="carousel-item">
        <div class="img-box">
        <img src="images/banner/12.jpg" alt="">
        </div>
      </div>
      <div class="carousel-item">
        <div class="img-box">
        <img src="images/banner/7.jpg" alt="">
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="sr-only">Siguiente</span>
    </a>
  </div>
</section>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand d-block d-sm-none" href="#">Menú</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">Nuestro Movimiento </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="apoya.php">Apoya nuestra Causa </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="estatutos.php">Testimonial</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="prensa.php">Comunicados de prensa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="event.php">Eventos Realizados</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contactenos</a>
      </li>
    </ul>
  </div>
</nav>
  <div id="register" class="form-1">
    <div class="container">
        <div class="text-left">
            <h2>Gracias Sr(a) JUAN MEJIA por unirte al movimiento </h2>
            <p></p>
        </div>

        <form id="registrationForm" data-toggle="validator" data-focus="false">
                            <div class="col-md-12">
                    <p><b>Selecciona la casillas donde indique como puedes aportar al movimiento:</b></p>
                    <div class="form-check form-check-inline">                        
                        <input class="form-check-input" type="checkbox" name="seguridad" value="seguridad">
                        <label class="form-check-label" for="economico">Economico</label>
                    </div>
                    <div class="form-check form-check-inline">                        
                        <input class="form-check-input" type="checkbox" name="agricultura" value="agricultura">
                        <label class="form-check-label" for="logistica">Logistica</label>
                    </div>
                    <div class="form-check form-check-inline">                        
                        <input class="form-check-input" type="checkbox" name="economia" value="economia">
                        <label class="form-check-label" for="seguidores">Seguidores en redes </label>
                    </div>
                    <div class="form-check form-check-inline">                        
                        <input class="form-check-input" type="checkbox" name="salud" value="salud">
                        <label class="form-check-label" for="salud">Equipos</label>
                    </div>
                    <div class="form-check form-check-inline">                        
                        <input class="form-check-input" type="checkbox" name="infraestructura" value="infraestructura">
                        <label class="form-check-label" for="infraestructura">Personal </label>
                    </div>
                    <div class="form-check form-check-inline">                        
                        <input class="form-check-input" type="checkbox" name="politica" value="politica">
                        <label class="form-check-label" for="politica">Amplificacion </label>
                    </div>
                    <div class="form-check form-check-inline">                        
                        <input class="form-check-input" type="checkbox" name="corrupcion" value="corrupcion">
                        <label class="form-check-label" for="corrupcion">Otros </label>
                    </div>
                    <!-- <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="comunicaciones" value="comunicaciones">
                        <label class="form-check-label" for="comuniaciones">Comunicaciones </label>
                    </div>    
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="educacion" value="educacion">
                        <label class="form-check-label" for="educacion">Educacion </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="familia" value="familia">
                        <label class="form-check-label" for="inlineCheckbox3">Familia </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="recreacion" value="option2">
                        <label class="form-check-label" for="recreacion">Recreación </label>
                    </div> -->

                <div class="my-3"> 
                    <label class="" for="rphone">Detallas en esta cailla otros</label>
                    <textarea class="form-control" id="comentario" name="comentario" rows="6" placeholder="Por favor déjanos tus comentarios y opiniones"></textarea>
                </div>

                <div> 
                    <input type="checkbox" id="acepto_terminos" name="acepto_terminos" required>He leído y acepto los terminos de tratamiento de datos <a href="privacy-policy.php">Politica de Privacidad</a> y <a href="terms-conditions.html">Terminos y Condiciones</a>
                    <div class="help-block with-errors"></div>
                </div>

                <div> 
                    <input type="checkbox" id="autorizo_comunicados" name="autorizo_comunicados" required>Autorizo el envió de comunicados
                    <div class="help-block with-errors"></div>
                </div>

                <button type="button" onclick="APOYO.validateData();" class="form-control-submit-button mt-5">Guardar y Enviar</button>
                <div class="col-md-12"> 
                    <div id="rmsgSubmit" class="h3 text-center hidden"></div>
                </div> 
                </div>
            </div>
        </form>
    </div> 
</div>


<?php include 'admin/include/footer.php'; ?>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
<script src="./plugins/sweetalert2/sweetalert2.js"></script>
<script type="text/javascript" src="admin/js/lib/util.js"></script>
<script type="text/javascript" src="admin/js/solonumeros.js"></script>
<script type="text/javascript" src="admin/js/departamento.js"></script>
<script type="text/javascript" src="admin/js/apoyosrecibidos.js"></script>


<script>
    DEPARTAMENTO.getMunicipios();
</script>