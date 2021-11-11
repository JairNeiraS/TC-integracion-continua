<?php 
require 'conexion.php';
use  PHPMailer \ PHPMailer \ PHPMailer ; 
use  PHPMailer \ PHPMailer \ Exception ;

require  'PHPMailer/src/Exception.php'; 
require  'PHPMailer/src/PHPMailer.php ' ; 
require  'PHPMailer/src/SMTP.php';



if ($_POST['vBandera'] == "1"){

$pNombre = $_POST['vNombre'];
$pCorreo = $_POST['vCorreo'];
$pAsunto = $_POST['vAsunto'];
$pDescri = $_POST['vDescripcion'];



    $qSql="INSERT INTO `proyecto_001`.`webtec_003` (`nombrex`, `correoxx`, `asuntoxx`, `descrxxx`) VALUES (\"{$pNombre}\" , \"{$pCorreo}\" , \"{$pAsunto}\" , \"{$pDescri}\")";
    $rSql = mysqli_query($conexion,$qSql);
    ?>
    <script type="text/javascript">



    </script>
    <?php

$qselec = ("SELECT * FROM `proyecto_001`.`webtec_003` ");
$rSqla = mysqli_query($conexion, $qselec);
$pResul = mysqli_fetch_array($rSqla);




$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'webtecnology0@gmail.com';                     // SMTP username
    $mail->Password   = 'nemesis2193';                               // SMTP password
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('webtecnology0@gmail.com', 'webtecnology0');
    $mail->addAddress('webtecnology0@gmail.com');
    
    
    //REPLICA$mail->addReplyTo('info@example.com', 'Information');
    //COPIA$mail->addCC('cc@example.com');
    //COPIA$mail->addBCC('bcc@example.com');

    // Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content


    $sHtml = '<!DOCTYPE html>
    <html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>
    Email
        </title>
        <style>
        button{
            color: #144E66;
            font-size: 10pt;
            padding: 15px;
            cursor: pointer;
        }
        </style>
    </head>
    <body style="margin: 0; padding: 0;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td style="padding: 10px 0 30px 0;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0"
                        style="border: 1px solid black; border-collapse: collapse;" width="600">
                        <tr>
                            <td bgcolor="#144E66" style="padding: 5px 0 5px 0;">
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 10px 0 20px 0; color: #144E66;">
                                <center>
                                    <p>
                                        Este correo electr&oacute;nico &uacute;nicamente es usado como medio informativo por lo que le
                                        pedimos por favor no responder este mensaje.
                                    </p>
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                Fecha: ' . date('Y-m-d') . ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 40px 30px 40px 30px;">
                                Estimado usuario se ha presentado una nueva solicitud de informacion en WEB TECHNOLOGY con los siguientes datos:
    
                                <table border="0" cellpadding="-10"  width="100%">
                                    <tr >
                                        <td>
                                        <ul>
                                        <li>Nombre del solicitante:  '.$pNombre.'
                                        <li>Correo del solicitante: '.$pCorreo.'
                                        <li>Asunto: '.$pAsunto.'
                                        <li>Descripcion: '.$pDescri.' 
                                        </ul>
                                        </td>
                                    </tr>
                                    <tr style="margin-top: 10pt;">
                                                  </tr>
                                </table>
                                <br>
    
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
    </html>';


    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = ("NUEVA SOLICITUD: "); //  Asunto
    $mail->Body    = $sHtml;
   //MENSAJE ALTERNATIVO $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
} catch (Exception $e) {
}



/*
echo '<pre>';
print_r($pResul);
echo '</pre>';


try{



        $zTicket = '<html>

        <body>

        <p>HOLaA</p>

        </body>
        </html>';

        echo $zTicket;
        


            $mail = new PHPMailer;
            
            $mail->setFrom('luisfernandoahumada08@gmail.com');
            $mail->addAddress("luisfernandoahumada08@gmail.com");
            $mail->Subject = ("NUEVA SOLICITUD DE INFORMACION: "); //  Asunto
            $mail->Body = $zTicket; //  Contenido
            $mail->isHTML(true); //Validaci�n
            $mail->send(); // Env

            echo 'Message has been sent';
          } catch (Exception $e) {
              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          }
          */
}

?>

<html lang="es">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CONTACTANOS</title>

  <link rel="shortcut icon" type="imagenes/logo3" href="imagenes/logo3.png">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style>
    .map-container-6 {
      overflow: hidden;
      padding-bottom: 56.25%;
      position: relative;
      height: 0;
    }
    .map-container-6 iframe {
      left: 0;
      top: 0;
      height: 100%;
      width: 100%;
      position: absolute;
    }
  </style>
      <script>
    function f_Enviar() {
        var vNomb = document.forms["frgrm"]["vNombre"].value;
        var vCorr = document.forms["frgrm"]["vCorreo"].value;
        var vAsun = document.forms["frgrm"]["vAsunto"].value;
        var vDesc = document.forms["frgrm"]["vDescripcion"].value;



        if (vNomb == "") {
            alert("Ingrese su nombre");
        } else if (vCorr == "") {
            alert("Ingrese su correo");
        } else if (vAsun == "") {
            alert("Ingrese su asunto");
        } else if (vDesc == "") {
            alert("Ingrese la description");
        } else {
            document.forms["frgrm"]["vBandera"].value = "1";
            document.forms["frgrm"].submit();
            alert("EN PRONTO SE CONTACTARAN CONTIGO");
        }
    }
    </script>

</head>

<body>
  <!--MENU DE NAVEGACION-->

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
    <!--Section: Contact v.1-->
    <section class="section pb-5">

      <!--Section heading-->
      <h2 class="section-heading h1 pt-4">Escribenos</h2>
      <!--Section description-->
      <p class="section-description pb-4">Este es un espacio para que puedas enviarnos tus solicitudes, informacion, sugerencias o recomendaciones. De aseguramos que los leemos todos. En breve te responderemos</p>

      <div class="row">

        <!--Grid column-->
        <div class="col-lg-5 mb-4">

          <!--Form with header-->
          <div class="card">

            <div class="card-body">
              <!--Header-->
              <div class="form-header blue accent-1">
                <h3><i class="fas fa-envelope"></i> ¿Que necesitas?</h3>
              </div>

              <p>Escribe y te responderemos</p>
              <br>

              <!--Body-->

    <form name="frgrm" method="post">
        <input type="hidden" name="vBandera" value="0" />
              <div class="md-form">
              <label for="form-name">Tu nombre</label>
                <i class="fas fa-user prefix grey-text"></i>
                <input type="text" id="form-name" name ="vNombre" class="form-control">
                
              </div>

              <div class="md-form">
              <label for="form-email">Tu correo</label>
                <i class="fas fa-envelope prefix grey-text"></i>
                <input type="text" id="form-email" name="vCorreo" class="form-control">
                
              </div>

              <div class="md-form">
              <label for="form-Subject">Asunto</label>
                <i class="fas fa-tag prefix grey-text"></i>
                <input type="text" id="form-Subject" name="vAsunto" class="form-control">
                
              </div>

              <div class="md-form">
              <label for="form-text">Descripcion</label>
                <i class="fas fa-pencil-alt prefix grey-text"></i>
                <textarea id="form-text" name="vDescripcion" class="form-control md-textarea" rows="3"></textarea>
                
              </div>
              

              <div class="text-center mt-4">
              
                <button type="button" onclick="f_Enviar()" class="btn btn-outline-success my-2 my-sm-0">ENVIAR</button>

              </div>
              </form>

            </div>

          </div>
          <!--Form with header-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-7">

          <!--Google map-->
          <div id="map-container-google-11" class="z-depth-1-half map-container-6" style="height: 400px">
            <iframe src="https://maps.google.com/maps?q=sanmateo&t=&z=13&ie=UTF8&iwloc=&output=embed"
              frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>

          <br>
          <!--Buttons-->
          <div class="row text-center">
            <div class="col-md-4">
              <a class="btn-floating blue accent-1"><i class="fas fa-map-marker-alt"></i></a>
              <p>Bogota, Centro</p>
              <p>Colombia</p>
            </div>

            <div class="col-md-4">
              <a class="btn-floating blue accent-1"><i class="fas fa-phone"></i></a>
              <p>+ 57 319 284 19 39</p>
              <p>Lunes - Sabado, 8:00-18:00</p>
            </div>

            <div class="col-md-4">
              <a class="btn-floating blue accent-1"><i class="fas fa-envelope"></i></a>
              <p>webtecnology0@gmail.com</p>
              <p>decodermc@gmail.com</p>
            </div>
          </div>

        </div>
        <!--Grid column-->

      </div>

    </section>
    <!--Section: Contact v.1-->
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
                    <i class="fab fa-facebook-f white-text mr-4"> <img
                            src="imagenes/Redes_sociales/facebook.png" alt="..." class="img"></i>
                </a>
                <!-- Whattssap -->
                <a class="fb-ic"   target="_blank" href="https://chat.whatsapp.com/GpQVDXqJHmW8fm65wn9gMh">
                    <i class="fab fa-facebook-f white-text mr-4"> <img src="imagenes/Redes_sociales/wha.png"
                            alt="..." class="img"></i>
                </a>
                <!-- Twitter -->
                <a class="tw-ic" target="_blank" href="https://twitter.com/decodermc">
                    <i class="fab fa-twitter white-text mr-4"> <img src="imagenes/Redes_sociales/twi.png"
                            alt="..." width="45" height="45" class="img"> </i>
                </a>
                <!-- MAPAS -->
                <a class="gplus-ic" target="_blank" href="https://goo.gl/maps/GTfj2Yqu41A67wp69">
                    <i class="fab fa-google-plus-g white-text mr-4"> <img
                      src="imagenes/Redes_sociales/mapa.png"  alt="..." width="50" height="50"  class="img"> </i>
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
            <h6 class="text-uppercase font-weight-bold">WebTecnology</h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>La tecnologia al alcance de tus manos la encontraras con nosotros. No gastes mas tiempo, registrate y escoge tu producto preferido</p>

        </div>

        <!-- Grid column -->
<div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

<img src="imagenes/logo/logo22222.png"  class="img-thumbnail">

</div>

       
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

            <!-- Links -->
            <h6 id=contacto class="text-uppercase font-weight-bold">Contactanos</h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>
                <i class="fas fa-home mr-3" ></i><i class="fab fa-google-plus-g white-text mr-4"> <img
                      src="imagenes/Redes_sociales/maps.png"  alt="..." width="50" height="50"  class="img"> </i> <br>Colombia, Bogotá</p>
            <p>
                <i class="fas fa-envelope mr-3"></i> <i class="fab fa-google-plus-g white-text mr-4"> <img
                      src="imagenes/Redes_sociales/correo1.png"  alt="..." width="50" height="50"  class="img"> </i>webtecnology0@gmail.com    </p>
            <p>
            <i class="fas fa-envelope mr-3"></i> <i class="fab fa-google-plus-g white-text mr-4"> <img
                      src="imagenes/Redes_sociales/llamada.png"  alt="..." width="50" height="50"  class="img"><i class="fas fa-phone mr-3"></i><br> + 57 319 284 19 39</p>
            <p>
                <i class="fas fa-print mr-3"></i>+ 57 312 477 27 01</p>

        </div>
        <!-- Grid column -->

    </div>
    <!-- Grid row -->

</div>
<!-- Footer Links -->

<div class="footer-copyright text-center py-3">Power By: SOFTSELF®
</div>

</footer>
<!-- Footer -->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>

</html>

