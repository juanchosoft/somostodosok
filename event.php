<?php
header('Content-Type: text/html; charset=UTF-8');  
include 'admin/include/head.php';


?>


<style>
* {
  box-sizing: border-box;
}


/* Center website */
.main {
  max-width: 1000px;
  margin: auto;
}


/* Add padding BETWEEN each column (if you want) */
.row,
.row > .column {
  padding: 8px;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  display: none; /* Hide columns by default */
}


/* The "show" class is added to the filtered elements */
.show {
  display: block;
}

/* Style the buttons */
.btn {
  border: none;
  outline: none;
  padding: 12px 10px;
  background-color: white;
  cursor: pointer;
  background: linear-gradient(180deg, #fbd200 0%, #fb8800 35%, #fb4f00 76%);
  color: #000b56 ;
  text-decoration: none;
  font-style: italic;
  font-weight: bold;
  padding: 1rem 1rem;
  border-radius: 12px;
}

/* Add a grey background color on mouse-over */
.btn:hover {
  background-color: #ddd;
}

/* Add a dark background color to the active button */
.btn.active {
  background-color: #666;
   color: white;
}
/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content !important{
    width: 100%;
  }
}
</style>
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
            <li class="nav-item active">
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
</nav>
<?php include 'admin/include/element_apoyo.php';?>

  <div class="container">
    <br>
    <center>
    <button type="button" class="btn btn-primary primary4" data-toggle="modal" data-target=".bd-example-modal-lg">PROXIMAS REUNIONES QUE REALIZAREMOS CON NUESTRA GENTE</button>
</center>
  
    <h2 class="text-center p-5">EVENTOS REALIZADOS</h2>
    
  </div>
  <div class="container-fluid">
    <div id="myBtnContainer">
      <button class="btn active" onclick="filterSelection('all')"> Todos</button>
      <button class="btn" onclick="filterSelection('antioquia')"> Antioquia</button>
      <button class="btn" onclick="filterSelection('santander')"> Santander</button>
      <!-- <button class="btn" onclick="filterSelection('paz')"> La Paz (Santander)</button> -->
    </div> 
  </div> 

<!-- Portfolio Gallery Grid -->
<div class="container-fluid">
 <div class="row">
  <div class="column santander">
    <div class="content">
    <article class="foto" >
      <img src="images/eventos/san_gil/1.jpg" alt="Mountains" style="width:100%"class="img-fluid" >
   
      <h4>San Gil - Santander</h4>
      <p>Dialogando con amigos</p>
      </article>
    </div>
  </div>
  <div class="column santander">
    <div class="content">
      <img src="images/eventos/socorro/1.jpg" alt="Car" style="width:100%" class="img-fluid">
      <h4>Socorro -Santander</h4>
      <p>Dialogando con amigos</p>
    </div>
  </div>
  <div class="column santander">
    <div class="content">
      <img src="images/eventos/socorro/2.jpg" alt="Car" style="width:100%" class="img-fluid">
      <h4>Socorro -Santander</h4>
      <p>Dialogando con amigos</p>
    </div>
  </div>

  <div class="column santander">
    <div class="content">
      <img src="images/eventos/la_paz/1.jpg" alt="paz" style="width:100%" class="img-fluid">
      <h4>La Paz Santander</h4>
      <p>Compartiendo con la comunidad</p>
    </div>
  </div>
  <div class="column santander">
    <div class="content">
      <img src="images/eventos/la_paz/2.jpg" alt="paz" style="width:100%" class="img-fluid">
      <h4>La Paz Santander</h4>
      <p>Compartiendo con la comunidad</p>
    </div>
  </div>
  <div class="column santander">
    <div class="content">
      <img src="images/eventos/la_paz/3.jpg" alt="paz" style="width:100%" class="img-fluid">
      <h4>La Paz Santander</h4>
      <p>Compartiendo con la comunidad</p>
    </div>
  </div>
  <div class="column antioquia">
    <div class="content">
    <div class="ratio ratio-16x9">
        <iframe width="100%" height="300" src="https://www.youtube.com/embed/HQBQl3amXwY?autoplay=1&controls=0&loop=1" title="Es Tiempo de progresar" allowfullscreen></iframe>
    </div>
      <h4>Conversatiorio</h4>
      <p>Universidad Santo Tomás</p>
    </div>
  </div>
  <div class="column antioquia">
    <div class="content">
    <div class="ratio ratio-16x9">
        <iframe width="100%" height="300" frameborder="0" src="https://www.youtube.com/embed/Yyuq1dtScg8?autoplay=1&controls=0&loop=1" title="Es Tiempo de progresar" allowfullscreen></iframe>
    </div>
      <h4>Conversatiorio</h4>
      <p>Universidad Santo Tomás</p>
    </div>
  </div>
  <div class="column antioquia">
    <div class="content">
    <div class="ratio ratio-16x9">
        <iframe width="100%" height="300" frameborder="0" src="https://www.youtube.com/embed/oweJeduiueI?autoplay=1&controls=0&loop=1" title="Es Tiempo de progresar" allowfullscreen></iframe>
    </div>
      <h4>Conversatiorio</h4>
      <p>Universidad Santo Tomás</p>
    </div>
  </div>
  
  <div class="column antioquia">
    <div class="content">
    <div class="ratio ratio-16x9">
        <iframe width="100%" height="300" frameborder="0" src="https://www.youtube.com/embed/vQP9FUSB2zc?autoplay=1&controls=0&loop=1" title="Es Tiempo de progresar" allowfullscreen></iframe>
    </div>
      <h4>Conversatiorio</h4>
      <p>Universidad Santo Tomás</p>
    </div>
  </div>
  <div class="column antioquia">
    <div class="content">
    <div class="ratio ratio-16x9">
        <iframe width="100%" height="300" frameborder="0" src="https://www.youtube.com/embed/vQP9FUSB2zc?autoplay=1&controls=0&loop=1" title="Es Tiempo de progresar" allowfullscreen></iframe>
    </div>
      <h4>Conversatiorio</h4>
      <p>Universidad Santo Tomás</p>
    </div>
  </div>
<!-- END GRID -->
</div>
</div>

   
   <!-- Modal mapa-->
   <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <img src="images/mapa.png" class="img-fluid" alt="Responsive image">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Grupo</th>
      <th scope="col">Dia</th>
      <th scope="col">Fecha</th>
      <th scope="col">Municipio</th>
    </tr>
  </thead>
  <tbody>
  <tr>
      <th scope="row">1</th>
      <td>Viernes</td>
      <td>20 de Enero 2023</td>
      <td>Jordan</td>
    </tr>
    <tr>
      <th scope="row">1</th>
      <td>Viernes</td>
      <td>20 de Enero 2023</td>
      <td>Aratoca</td>
    </tr>
    <tr>
      <th scope="row">1</th>
      <td>Viernes</td>
      <td>20 de Enero 2023</td>
      <td>Curiti</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Sabado</td>
      <td>21 de Enero 2023</td>
      <td>Curiti</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Sabado</td>
      <td>21 de Enero 2023</td>
      <td>Onzaga</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Sabado</td>
      <td>21 de Enero 2023</td>
      <td>San Joaquin</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Domingo</td>
      <td>22 de Enero 2023</td>
      <td>San Gil</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Domingo</td>
      <td>22 de Enero 2023</td>
      <td>Encino</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Domingo</td>
      <td>22 de Enero 2023</td>
      <td>Charala</td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Lunes</td>
      <td>23 de Enero 2023</td>
      <td>Charala</td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Lunes</td>
      <td>23 de Enero 2023</td>
      <td>Coromoro</td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Lunes</td>
      <td>23 de Enero 2023</td>
      <td>Ocamonte</td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Lunes</td>
      <td>23 de Enero 2023</td>
      <td>Paramo</td>
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>Martes</td>
      <td>24 de Enero 2023</td>
      <td>San Jose</td>
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>Martes</td>
      <td>24 de Enero 2023</td>
      <td>Cabrera</td>
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>Martes</td>
      <td>24 de Enero 2023</td>
      <td>Galán</td>
    </tr>
    <tr>
      <th scope="row">6</th>
      <td>Miercoles</td>
      <td>25 de Enero 2023</td>
      <td>Barichara</td>
    </tr>
    <tr>
      <th scope="row">6</th>
      <td>Miercoles</td>
      <td>25 de Enero 2023</td>
      <td>Villanueva</td>
    </tr>
  </tbody>
</table>
    </div>
  </div>
</div>

            </div>
        </div>
    </div>

 <script> 


filterSelection("all") // Execute the function and show all columns
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}


</script>
    
  <?php include 'admin/include/footer.php'; ?>
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>

</body>

</html>