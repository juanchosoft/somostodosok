<?php
include 'admin/include/head.php';
require 'admin/include/generic_classes.php';
include 'admin/classes/Prensa.php';
//Información de Prensa
$arr = Prensa::getAll(null);
$isvalid = $arr['output']['valid'];
$arr = $arr['output']['response'];

?>
<!-- slider section -->
<section class="slider_section position-relative">
    <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="img-box"> <img src="images/banner/74.jpg" alt=""></div>
            </div>
            <div class="carousel-item">
                <div class="img-box"> <img src="images/banner/75.jpg" alt=""></div>
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
                <div class="img-box"> <img src="images/ok/cel/5.jpg" alt=""></div>
            </div>
            <div class="carousel-item">
                <div class="img-box"> <img src="images/ok/cel/11.jpg" alt=""></div>
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
            <li class="nav-item">
                <a class="nav-link" href="about.php">Nosotros </a>
            </li>
             <li class="nav-item active">
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
<!-- end nav section -->

<!-- fruit section -->

<section class="fruit_section layout_padding">
  <div class="container">
    <div class="heading_container">
      <hr>
      <h2>
        NUESTROS COMUNICADOS DE PRENSA
      </h2>
    </div>
  </div>
  </div>
  <div class="container-fluid">
    <div class="fruit_container row">
      <?php $c = count($arr); if ($isvalid) { for ($i = 0; $i < $c; $i++) {$pdf = $arr[$i]['pdf'];?>
          <div class="col-md-4 col-xs-12 box my-3">
            <embed src="https://estiempo.org/somostodosap/assets/documentos/prensa/<?php echo $pdf; ?>" width="100%" height="375" type="application/pdf">
              <div class="link_box">
              <h5><?php echo $arr[$i]['titulo']; ?></h5>
              <a target="_blank" href="https://estiempo.org/somostodosap/assets/documentos/prensa/<?php echo $pdf; ?>" title="Ver PDF"> Ver </a>
            </div>
          </div>
          <div class="col-md-4 col-xs-12 box my-3">
            <embed src="https://estiempo.org/somostodosap/assets/documentos/prensa/<?php echo $pdf; ?>" width="100%" height="375" type="application/pdf">
              <div class="link_box">
              <h5><?php echo $arr[$i]['titulo']; ?></h5>
              <a target="_blank" href="https://estiempo.org/somostodosap/assets/documentos/prensa/<?php echo $pdf; ?>" title="Ver PDF"> Ver </a>
            </div>
          </div>
          <div class="col-md-4 col-xs-12 box my-3">
            <embed src="https://estiempo.org/somostodosap/assets/documentos/prensa/<?php echo $pdf; ?>" width="100%" height="375" type="application/pdf">
              <div class="link_box">
              <h5><?php echo $arr[$i]['titulo']; ?></h5>
              <a target="_blank" href="https://estiempo.org/somostodosap/assets/documentos/prensa/<?php echo $pdf; ?>" title="Ver PDF"> Ver </a>
            </div>
          </div>
          <div class="col-md-4 col-xs-12 box my-3">
            <embed src="https://estiempo.org/somostodosap/assets/documentos/prensa/<?php echo $pdf; ?>" width="100%" height="375" type="application/pdf">
              <div class="link_box">
              <h5><?php echo $arr[$i]['titulo']; ?></h5>
              <a target="_blank" href="https://estiempo.org/somostodosap/assets/documentos/prensa/<?php echo $pdf; ?>" title="Ver PDF"> Ver </a>
            </div>
          </div>
          <div class="col-md-4 col-xs-12 box my-3">
            <embed src="https://estiempo.org/somostodosap/assets/documentos/prensa/<?php echo $pdf; ?>" width="100%" height="375" type="application/pdf">
              <div class="link_box">
              <h5><?php echo $arr[$i]['titulo']; ?></h5>
              <a target="_blank" href="https://estiempo.org/somostodosap/assets/documentos/prensa/<?php echo $pdf; ?>" title="Ver PDF"> Ver </a>
            </div>
          </div>
          <div class="col-md-4 col-xs-12 box my-3">
            <embed src="https://estiempo.org/somostodosap/assets/documentos/prensa/<?php echo $pdf; ?>" width="100%" height="375" type="application/pdf">
              <div class="link_box">
              <h5><?php echo $arr[$i]['titulo']; ?></h5>
              <a target="_blank" href="https://estiempo.org/somostodosap/assets/documentos/prensa/<?php echo $pdf; ?>" title="Ver PDF"> Ver </a>
            </div>
          </div>
      <?php } } ?>
    </div>
  </div>
</section>

<?php include 'admin/include/footer.php';?>


<!-- <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script> -->
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>