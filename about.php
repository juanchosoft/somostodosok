<?php include 'admin/include/head.php';?>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section position-relative">
    <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="img-box"> <img src="images/banner/72.jpg" alt=""></div>
            </div>
            <div class="carousel-item">
                <div class="img-box"> <img src="images/banner/73.jpg" alt=""></div>
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
                <div class="img-box"> <img src="images/ok/cel/3.jpg" alt=""></div>
            </div>
            <div class="carousel-item">
                <div class="img-box"> <img src="images/ok/cel/4.jpg" alt=""></div>
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

  <!-- nav section -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
            <li class="nav-item active">
                <a class="nav-link" href="about.php">Nosotros </a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="prensa.php">Prensa</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="candidates.php">Candidatos</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="event.php">Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contáctenos</a>
            </li>
        </ul>
    </div>
</nav>
 

  <section class="about_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 px-0">
          <div class="img-box">
            <img src="images/logo_bg_white.png" class="img-fluid" alt=""  >
          </div>
        </div>
        <div class="col-md-5">
          <div class="detail-box">
            <div class="heading_container">
              <hr>
              <h2>
                QUIENES SOMOS
              </h2>
            </div>
            <p>
            Somos un grupo de ciudadanos de diversos orígenes políticos, preocupados por el presente y el futuro de Colombia. Somos colombianos de distintos orígenes sociales, económicos y culturales, que aspiramos a que el Centro Democrático encarne la riqueza y diversidad de nuestro país.
            </p>
            <p>Nos une el amor y compromiso profundo con la Patria, el respeto y la adhesión por la obra liderada por el expresidente Álvaro Uribe Velez; la convicción de que el país debe avanzar por la senda de la Seguridad Democrática, la confianza inversionista, la cohesión social, la austeridad estatal y el diálogo popular.</p>
       
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- info section -->

<hr>
<br>

  <!-- end info section -->


  <!-- footer section -->
  <?php

include 'admin/include/footer.php';
?>
  <!-- footer section -->


  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
</body>

</html>