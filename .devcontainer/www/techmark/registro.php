<?php


require 'conexion.php';


if ($_POST['vBandera'] == "1") {

    $pEmail = $_POST['vEmail'];
    $pPassw = $_POST['vPassword'];
    $pPassw = hash('sha512', $pPassw);
    $pNombr = $_POST['vNombre'];
    $pDirec = $_POST['vDireccion'];
    $pCiuda = $_POST['vCiudad'];
    $pDepar = $_POST['vDepartamento'];
    $pTelef = $_POST['vTelefono'];

    $pUsuario = 1014294468;
    $pFecha = date("Y-m-d");
    $pHora = date("H:i:s");



    $qUsuario = "SELECT * FROM `proyecto_001`.`webtec_001` ";
    $rrSql = mysqli_query($conexion, $qUsuario);
    while ($mResultado = mysqli_fetch_array($rrSql)) {


        if($mResultado['emailxxx'] == $pEmail){
            ?>
            <script>
            alert("EL CORREO YA SE ENCUENTRA REGISTRADO");

            window.location = "registro.php";

            </script>
            <?php

        break;


        }else{
            $qSql = "INSERT INTO `proyecto_001`.`webtec_001` (`emailxxx`, `password`, `nombrexx`, `direccxx`, `ciudaxxx`, `deparxxx`, `telefoxxx`,`perfilxx`, `userxxxx`, `fechxxxx`, `horaxxxx`) VALUES (\"{$pEmail}\" , \"{$pPassw}\" , \"{$pNombr}\" , \"{$pDirec}\" , \"{$pCiuda}\" , \"{$pDepar}\" , \"{$pTelef}\", '1' , \"{$pUsuario}\" , \"{$pFecha}\" , \"{$pHora}\")";
            $rSql = mysqli_query($conexion, $qSql);
        
        
            ?>
            <script>
            alert("SE REGISTRO CORRECTAMENTE");
        
            window.location('registo.php');
            </script>
            <?php
            break;
        }
    break;

    }






    
/*
    foreach ($Mdatos as $key => $value) {


        if($Mdatos != ""){



        }
    }
    echo '<pre>';
    print_r($Mdatos);
    echo '</pre>';
    echo '<pre>';
    print_r($key);
    echo '</pre>';

    echo '<pre>';
    print_r($value);
    echo '</pre>';

    echo $pEmail;*/

}

?>


<html lang="es">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>REGISTRO</title>
    <link rel="shortcut icon" type="imagenes/logo3" href="imagenes/logo3.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    </style>
    <script>
        function f_Enviar() {
            var vCorr = document.forms["frgrm"]["vEmail"].value;
            var vPass = document.forms["frgrm"]["vPassword"].value;
            var vvPass = document.forms["frgrm"]["vConfpass"].value;
            var vNomb = document.forms["frgrm"]["vNombre"].value;
            var vDire = document.forms["frgrm"]["vDireccion"].value;
            var vCiud = document.forms["frgrm"]["vCiudad"].value;
            var vDepa = document.forms["frgrm"]["vDepartamento"].value;
            var vTele = document.forms["frgrm"]["vTelefono"].value;


            if (vCorr == "") {
                alert("Ingrese correo");
            } else if (vPass == "") {
                alert("Ingrese password");
            } else if (vNomb == "") {
                alert("Ingrese su nombre");
            } else if (vDire == "") {
                alert("Ingrese su direccion");
            } else if (vCiud == "") {
                alert("Ingrese su ciudad");
            } else if (vDepa == "") {
                alert("Selecciona su departamento");
            } else if (vTele == "") {
                alert("Ingrese su telefono");
            } else if (vPass != vvPass) {

                alert("LA CONFIRMACION DE LA CONTRASEÑA NO ES CORRECTA");

            } else if (vvPass === vPass) {

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


    <!--registro-->

    <br>
    <br>

    <form name="frgrm" method="post">
        <input type="hidden" name="vBandera" value="0" />


        <section class="container mt-5 pt-5">

            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">REGISTRO</h5>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" name="vEmail" class="form-control" id="inputEmail4" placeholder="Email: ejemplo@webtecnology.com">
                        </div>

                        <div class="form-group col-md-6">

                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Confirmar</label>
                            <input type="password" name="vPassword" class="form-control" id="inputPassword4" placeholder="Contraseña">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Confirmar Contraseña</label>
                            <input type="password" name="vConfpass" class="form-control" id="inputPassword4" placeholder=" Confirmar Contraseña">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Nombre Completo</label>
                        <input type="text" name="vNombre" class="form-control" id="inputAddress" placeholder="Nombre y Apellido">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Direccion</label>
                        <input type="text" name="vDireccion" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Ciudad</label>
                            <input type="text" name="vCiudad" class="form-control" id="inputCity">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">DEPARTAMENTO</label>
                            <select id="inputState" name="vDepartamento" class="form-control">
                                <option selected>BOGOTÁ D.C</option>
                                <option>MEDELLIN</option>
                                <option>BUCARAMANGA</option>
                                <option>CALI</option>
                                <option>CARTAGENA</option>
                                <option>AMAZONAS</option>
                                <option>CARTAGENA DE INDIAS</option>
                                <option>CUCUTA</option>
                                <option>SOLEDAD</option>
                                <option>IBAGUE</option>
                                <option>SANTA MARTA</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">Telefono</label>
                            <input type="number" name="vTelefono" class="form-control" id="inputZip">
                        </div>
                    </div>

                    <button type="button" onclick="f_Enviar()" class="btn btn-primary">REGISTRARME</button>
    </form>
    </div>
    </div>
    </form>





    </section>





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
