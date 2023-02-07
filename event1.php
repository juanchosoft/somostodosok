<?php
header('Content-Type: text/html; charset=UTF-8');  
include 'admin/include/head.php';


?>


<style>

* {
  box-sizing: border-box;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}

</style>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active"><div class="img-box"> <img src="images/ok/1.jpg" alt=""></div></div>
          <div class="carousel-item"><div class="img-box"> <img src="images/ok/11.jpg" alt=""></div></div>
          <div class="carousel-item"><div class="img-box"> <img src="images/ok/12.jpg" alt=""></div></div>
          <div class="carousel-item"><div class="img-box"> <img src="images/ok/13.jpg" alt=""></div></div>
          <div class="carousel-item"><div class="img-box"> <img src="images/ok/14.jpg" alt=""></div></div>
          <div class="carousel-item"><div class="img-box"> <img src="images/ok/15.jpg" alt=""></div></div>
          <div class="carousel-item"><div class="img-box"> <img src="images/ok/2.jpg" alt=""></div></div>
          <div class="carousel-item"><div class="img-box"> <img src="images/ok/3.jpg" alt=""></div></div>
          <div class="carousel-item"><div class="img-box"> <img src="images/ok/4.jpg" alt=""></div></div>
          <div class="carousel-item"><div class="img-box"> <img src="images/ok/5.jpg" alt=""></div></div>
          <div class="carousel-item"><div class="img-box"> <img src="images/ok/6.jpg" alt=""></div></div>
          <div class="carousel-item"><div class="img-box"> <img src="images/ok/7.jpg" alt=""></div></div>
          <div class="carousel-item"><div class="img-box"> <img src="images/ok/8.jpg" alt=""></div></div>
          <div class="carousel-item"><div class="img-box"> <img src="images/ok/9.jpg" alt=""></div></div>
          <div class="carousel-item"><div class="img-box"> <img src="images/ok/10.jpg" alt=""></div></div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="sr-only">Siguiente</span>
        </a>
      </div>

      <div id="solocelulares" class="carousel slide " data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active"><div class="img-box"> <img src="images/ok/cel/1.jpg" alt=""></div></div>
        <div class="carousel-item"><div class="img-box"> <img src="images/ok/cel/2.jpg" alt=""></div></div>
        <div class="carousel-item"><div class="img-box"> <img src="images/ok/cel/3.jpg" alt=""></div></div>
        <div class="carousel-item"><div class="img-box"> <img src="images/ok/cel/4.jpg" alt=""></div></div>
        <div class="carousel-item"><div class="img-box"> <img src="images/ok/cel/5.jpg" alt=""></div></div>
        <div class="carousel-item"><div class="img-box"> <img src="images/ok/cel/6.jpg" alt=""></div></div>
        <div class="carousel-item"><div class="img-box"> <img src="images/ok/cel/13.jpg" alt=""></div></div>
        <div class="carousel-item"><div class="img-box"> <img src="images/ok/cel/14.jpg" alt=""></div></div>
        <div class="carousel-item"><div class="img-box"> <img src="images/ok/cel/15.jpg" alt=""></div></div>
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
        <a class="nav-link" href="about.php">Nuestro Movimiento </a>
      </li>
      <li class="nav-item">
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
      <a class="nav-link" href="contact.php">Contáctenos</a>
      </li>
    </ul>
  </div>
</nav>
<?php include 'admin/include/element_apoyo.php';?>


<section class="fruit_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <hr>
        <h2>
          EVENTOS Y REUNIONES REALIZADAS
        </h2>
      </div>
    </div>
    <div class="container-fluid">

      <div class="fruit_container">
        <div class="box">
          <img src="images/eventos/san_gil/1.jpg" alt="">
          <div class="link_box">
            <h5>
            San Gil - Santander
            </h5>
            <a href="">
            Dialogando con amigos
            </a>
          </div>
        </div>
        <div class="box">
          <img src="images/eventos/socorro/1.jpg" alt="">
          <div class="link_box">
            <h5>
            Socorro -Santander
            </h5>
            <a href="">
            Dialogando con amigos
            </a>
          </div>
        </div>
        <div class="box">
          <img src="images/eventos/socorro/2.jpg" alt="">
          <div class="link_box">
            <h5>
            Socorro -Santander
            </h5>
            <a href="">
            Dialogando con amigos
            </a>
          </div>
        </div>
        <div class="box">
          <img src="images/eventos/la_paz/1.jpg" alt="">
          <div class="link_box">
            <h5>
            La Paz-Santander
            </h5>
            <p>Compartiendo con la comunidad</p>
          </div>
        </div>
        <div class="box">
          <img src="images/eventos/la_paz/2.jpg" alt="">
          <div class="link_box">
            <h5>
            La Paz-Santander
            </h5>
            <p>Compartiendo con la comunidad</p>
          </div>
        </div>
        <div class="box">
          <img src="images/eventos/la_paz/3.jpg" alt="">
          <div class="link_box">
            <h5>
            La Paz-Santander
            </h5>
            <p>Compartiendo con la comunidad</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end fruit section -->

    
  <?php include 'admin/include/footer.php'; ?>
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>

</body>

</html>