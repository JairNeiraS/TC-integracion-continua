<?php
require 'conexion.php';

if ($_POST['vBandera'] == "1") {

  $pEmail = $_POST['vEmail'];
  //$pPassw = hash('sha512',$pPassw); // posible encriptacion
  $pPassw = $_POST['vPassword'];
  // posible encriptacion
  $vali = "usuario";

  $pFecha = date("Y-m-d");
  $pHora = date("H:i:s");
  $hor = $pFecha . $pHora;

  $qselec = ("SELECT * FROM `proyecto_001`.`webtec_001` ");
  $rSql = mysqli_query($conexion, $qselec);

  while ($pResul = mysqli_fetch_array($rSql)) {

    $Mdatos[$pResul["idexxxxx"]]["ident"] = $pResul["idexxxxx"];
    $Mdatos[$pResul["idexxxxx"]]["correo"] = $pResul["emailxxx"];
    $Mdatos[$pResul["idexxxxx"]]["contrasena"] = $pResul["password"];
  }



  foreach ($Mdatos as $key => $value) {

    $pEmail = $_POST['vEmail'];
    $sUsr = $value["correo"];
    $sPasssin = $_POST["vPassword"];
    $sPass = $value["contrasena"];
    $pPassw = $_POST['vPassword'];
    $pPassw = hash('sha512', $pPassw);
  


  if ($pEmail === $sUsr && $pPassw === $sPass) {




    $vali1 = 0;
    $vali2 = 0;
    if ($pEmail == "webtecnology0@gmail.com") {

      $vali = "INGRESO CORRECTAMENTE";
      $qSql = "INSERT INTO `proyecto_001`.`log` (`emailxxx`, `password`, `fechxxxx`, `horaxxxx` , `vailuser` ) VALUES (\"{$pEmail}\" , \"{$sPasssin}\" , \"{$pFecha}\" , \"{$pHora}\" , \"{$vali}\")";
      $rSql = mysqli_query($conexion, $qSql);
      session_start();
      $_SESSION['usuario'] = $sUsr;
      header("Location:productos3.php");

      $vali1 = 1;

    } else if ($pEmail != "webtecnology0@gmail.com") {

      $vali = "INGRESO CORRECTAMENTE";
      $qSql = "INSERT INTO `proyecto_001`.`log` (`emailxxx`, `password`, `fechxxxx`, `horaxxxx` , `vailuser` ) VALUES (\"{$pEmail}\" , \"{$sPasssin}\" , \"{$pFecha}\" , \"{$pHora}\" , \"{$vali}\")";
      $rSql = mysqli_query($conexion, $qSql);
      session_start();
      $_SESSION['usuario'] = $sUsr;
      header("Location:productos.php");
      $vali2 = 2;


    }
  } else if ($pEmail !== $sUsr && $pPassw !== $sPass) {


    $vali = "INGRESO INCORRECTAMENTE";
    $qSql = "INSERT INTO `proyecto_001`.`log` (`emailxxx`, `password`, `fechxxxx`, `horaxxxx` , `vailuser` ) VALUES (\"{$pEmail}\" , \"{$sPasssin}\" , \"{$pFecha}\" , \"{$pHora}\" , \"{$vali}\")";
    $rSql = mysqli_query($conexion, $qSql);
    ?>
    <script type="text/javascript">
    alert("USUARIO INCORRECTO");
    window.location = "login.php";
    </script>
    <?php


  }
}
}

?>

<html lang="es">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>LOGIN</title>
  <link rel="shortcut icon" type="imagenes/logo3" href="imagenes/logo3.png">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


  <style>
    .espacio {
      background-color: black;
    }
  </style>

  <script type="text/javascript">
    function f_login() {
      var sUser = document.forms["frgrm"]["vEmail"].value;
      var sPass = document.forms["frgrm"]["vPassword"].value;


      if (sUser == "") {
        alert("Ingresa el Usuario");
      } else if (sPass == "") {
        alert("Ingrese Password");
      } else {
        document.forms["frgrm"]["vBandera"].value = "1";
        document.forms["frgrm"].submit();
      }
    }
  </script>
</head>

<body>
  <!--MENU DE NAVEGACION-->
  <nav class="navbar fixed-top navbar-expand-md navbar-right navbar-light bg-light">
  <div class="container collapse navbar-collapse " id="navbarSupportedContent">
  <img src="imagenes/logo4.png" width="200" height="55">
    <ul class="navbar-nav mr-auto ">
      <li class="nav-item active">
      <a class="nav-link ml-auto mr-5" href="index.php">Inicio</a>
      </li>
      <li class="nav-item active">
      <a class="nav-link ml-md-auto mr-5" href="#">Contactenos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link ml-md-auto mr-5" href="productos.php">Productos</a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle ml-md-auto mr-5" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Login
        </a>
        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
          <a class="dropdown-item " href="login.php">Iniciar Sesión</a>
          <a class="dropdown-item" href="registro.php">Registrese</a>
          </div>
      </li>
    </ul>
    
    <form class="form-inline my-2 my-lg-0">
    <form class="form-inline">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
      </form>
      </form>
  </div>
</nav>

  <section class="container mt-5 pt-5">

    <div class="card mb-3">
      <img src="imagenes/logo.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">LOGIN</h5>
        <form name="frgrm" method="post">
          <input type="hidden" name="vBandera" value="0" />
          <input type="hidden" name="vCambio" value="0">
          <input type="hidden" name="vBorrado" value="0">
          <div class="form-group">
            <label for="exampleInputEmail1">Email </label>
            <input type="email" name="vEmail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">AYUDA.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="vPassword" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <!--div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>-->
          <button type="button" onclick="f_login()" class="btn btn-primary">INGRESAR</button>
        </form>
      </div>
    </div>



  </section>

  <br>

  <!-- Footer -->
  <footer class="page-footer font-small unique-color-dark">

    <div style="background-color: #009BFF;">
      <div class="container">

        <!-- Grid row-->
        <div class="row py-4 d-flex align-items-center">

          <!-- Grid column -->
          <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
            <h4 class="mb-0">Nuestras Redes Sociales </h4>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-6 col-lg-7 text-center text-md-right">
            <!-- Facebook -->
            <a class="fb-ic" target="_blank" href="https://www.facebook.com/DanniielRmc/">
              <i class="fab fa-facebook-f white-text mr-4"> <img src="imagenes/Redes_sociales/facebook.png" alt="..." class="img"></i>
            </a>
            <!-- Whattssap -->
            <a class="fb-ic" target="_blank" href="https://chat.whatsapp.com/GpQVDXqJHmW8fm65wn9gMh">
              <i class="fab fa-facebook-f white-text mr-4"> <img src="imagenes/Redes_sociales/wha.png" alt="..." class="img"></i>
            </a>
            <!-- Twitter -->
            <a class="tw-ic" target="_blank" href="https://twitter.com/decodermc">
              <i class="fab fa-twitter white-text mr-4"> <img src="imagenes/Redes_sociales/twi.png" alt="..." width="45" height="45" class="img"> </i>
            </a>
            <!-- MAPAS -->
            <a class="gplus-ic" target="_blank" href="https://goo.gl/maps/GTfj2Yqu41A67wp69">
              <i class="fab fa-google-plus-g white-text mr-4"> <img src="imagenes/Redes_sociales/mapa.png" alt="..." width="50" height="50" class="img"> </i>
            </a>

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row-->

      </div>
    </div>



    <!-- Footer Links -->
    <div class="container text-center text-md-left mt-5">

<!-- Grid row -->
<div class="row mt-3">

    <!-- Grid column -->
    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

        <!-- Content -->
        <h6 class="text-uppercase font-weight-bold">Tech Mark</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>La tecnologia al alcance de tus manos la encontraras con nosotros. No gastes mas tiempo, registrate y escoge tu producto preferido</p>

    </div>

    <!-- Grid column -->
    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

        <img src="imagenes/logo2.jpeg" class="img-thumbnail">

    </div>


    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Links -->
        <h6 id=contacto class="text-uppercase font-weight-bold">Contactanos</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
            <i class="fas fa-home mr-3"></i><i class="fab fa-google-plus-g white-text mr-4"> <img src="imagenes/Redes_sociales/maps.png" alt="..." width="50" height="50" class="img"> </i> <br>Colombia, Bogotá</p>
        <p>
            <i class="fas fa-envelope mr-3"></i> <i class="fab fa-google-plus-g white-text mr-4"> <img src="imagenes/Redes_sociales/correo1.png" alt="..." width="50" height="50" class="img"> </i>webtecnology0@gmail.com</p>
        <p>
            <i class="fas fa-envelope mr-3"></i> <i class="fab fa-google-plus-g white-text mr-4"> <img src="imagenes/Redes_sociales/llamada.png" alt="..." width="50" height="50" class="img"><i class="fas fa-phone mr-3"></i><br> + 57 319 284 19 39</p>
        <p>
            <i class="fas fa-print mr-3"></i>+ 57 312 477 27 01</p>

    </div>
    <!-- Grid column -->

</div>
<!-- Grid row -->

</div>
<!-- Footer Links -->

</footer>
<!-- Footer -->


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
</body>

</html>
