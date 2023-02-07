<?php
header('Content-Type: text/html; charset=UTF-8');  
include 'admin/include/head.php';


?>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section position-relative">
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
</section>
    <!-- end slider section -->
  </div>
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
                <a class="nav-link" href="about.php">Nosotros </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="apoya.php">Ayúdanos A construir País </a>
            </li>
            <li class="nav-item">
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
            <li class="nav-item active">
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
</nav>
<?php include 'admin/include/element_apoyo.php';?>
  <div id="contacto" class="form-1">
    <div class="container">
        <div class="text-left">
            <h2>Diligencia el siguiente formulario</h2>
        </div>
        <form id="form" action="https://formspree.io/f/xeqdgzzr"  method="POST">
            <div class="row">
                <div class="col-md-4 form-group">                        
                    <label class="bmd-label-floating" for="rname">Nombre completo</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Por favor ingresa tu nombre">
                </div>
                <div class="col-md-4 form-group">                        
                    <label class="bmd-label-floating" for="remail">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Por favor ingresa tu correo electrónico">
                </div>
                <div class="col-md-4 form-group">                        
                    <label class="bmd-label-floating" for="phone">Teléfono</label>
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Por favor ingresa tu teléfono">
                </div>                
                <div class="col-md-12">
                <div class="my-1"> 
                    <label class="" for="rphone">Déjanos un mensaje</label>
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="6" placeholder="Por favor déjanos un mensaje"></textarea>
                </div>
                <br>
                <br>
                    <div class="g-recaptcha" data-sitekey="6LfMTOkiAAAAALlUmWZ9iHIrWLgZ8tZ6h9w9zOI0"></div>
                    <br>
                    <br>                <input type="submit" value="Enviar" class="primary2" id="boton">
            
                </div>
            </div>
        </form>
    </div> 
</div>

<!--   <section class="info_section layout_padding">
    <div class="container">
      <div class="info_contact">
        <div class="row">
          <div class="col-md-4">
            <a href=""><img src="images/location.png" alt=""><span> Passages of Lorem Ipsum available </span></a>
          </div>
          <div class="col-md-4">
            <a href="">
              <img src="images/call.png" alt="">
              <span> Call : +012334567890</span>
            </a>
          </div>
          <div class="col-md-4">
            <a href="">
              <img src="images/mail.png" alt="">
              <span>demo@gmail.com</span>
            </a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-lg-9">
          <div class="info_form">
            <form action="">
              <input type="text" placeholder="Enter your email">
              <button> subscribe</button>
            </form>
          </div>
        </div>
        <div class="col-md-4 col-lg-3">
          <div class="info_social">
            <div> <a href=""> <img src="images/facebook-logo-button.png" alt=""></a></div>
            <div> <a href=""> <img src="images/twitter-logo-button.png" alt=""></a></div>
            <div> <a href=""> <img src="images/linkedin.png" alt=""> </a> </div>
            <div> <a href=""> <img src="images/instagram.png" alt=""></a></div>
          </div>
        </div>
      </div>
    </div>
  </section>
 -->
<script src="./plugins/sweetalert2/sweetalert2.js"></script>
<script type="text/javascript" src="admin/js/lib/util.js"></script>
 <script> 

const $form = document.querySelector('#form')

$form.addEventListener('submit', handleSubmit)

async function handleSubmit(event) {
  event.preventDefault();
  var response = grecaptcha.getResponse();
  if (response.length == 0) {
      var msj = "Debes validar que no eres un robot.";
      UTIL.mostrarMensajeError(msj);
      bValid = false;
      return;
  }
  const form = new FormData(this)
  const response = await fetch(this.action, {
        method: this.method,
        body: form,
        headers:{
          'Accept':'application/json'
         }
       })
  if(response.ok){
    this.reset();
    UTIL.mostrarMensajeExitoso('Gracias por contactarnos muy pronto recibiras nuestra respuesta :)');
  }
  
}
</script>
    
  <?php include 'admin/include/footer.php'; ?>
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>

</body>

</html>