<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>SENA Coins</title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Jornada Pedagógica |||, SENA, SENA COINS, ADSI, Proyectos" name="description">
  <meta content="Jornada Pedagógica, SENA, ADSI" name="keywords">
  <meta content="ADSI" name="author">

  <meta property="og:site_name" content="SENA Coins">
  <meta property="og:title" content="Rueda de negocios">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="shortcut icon" href="<?php echo URL; ?>favicon.ico">

  <!-- Global styles START -->          
  <link href="<?php echo URL; ?>css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo URL; ?>css/bootstrap.min.css" rel="stylesheet">
  <!-- Global styles END --> 

  <!-- Page level plugin styles START -->
  <link href="<?php echo URL; ?>plugins/fancybox/jquery.fancybox.css" rel="stylesheet">
  <link href="<?php echo URL; ?>plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
  <link href="<?php echo URL; ?>css/settings.css" rel="stylesheet">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="<?php echo URL; ?>css/components.css" rel="stylesheet">
  <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
  <link href="<?php echo URL; ?>css/style-revolution-slider.css" rel="stylesheet"><!-- metronic revo slider styles -->
  <link href="<?php echo URL; ?>css/style-responsive.css" rel="stylesheet">
  <link href="<?php echo URL; ?>css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="<?php echo URL; ?>css/custom.css" rel="stylesheet">

  <link href="<?php echo URL; ?>plugins/DataTables/css/dataTables.bootstrap.css" rel="stylesheet">
  <!-- Theme styles END -->

  <!-- CSS -->
  <link rel="stylesheet" href="<?php echo URL; ?>plugins/Alertify/css/alertify.min.css"/>
  <!-- Bootstrap theme -->
  <link rel="stylesheet" href="<?php echo URL; ?>plugins/Alertify/css/themes/bootstrap.min.css"/>


  <style>
    .slide_desc > p {
      line-height: 10px;
    }

    .logo > img{
      width: 80px;
      height: 80px;
    }

    .margin-top{
      margin-top: 25px;
    }

    .margin-top-2{
     margin-top: 15px;
   }

   .margin-top-3{
     margin-top: 10px;
   }

   output {
    display: block;
    padding-top: 0px;
    font-size: 20px;
    line-height: 1.42857143;
    color: #555;
    text-align: center;
    margin-top: 15px;
    font-weight: 700;
  }

  .panel-orange  {
    border-color: #e64f00
  }

  .panel-orange > .panel-heading {
    color: #fff;
    background: #cc3304;
    border-color: #e64f00
  }

  .table > thead > tr > td.active, .table > thead > tr > th.active, .table > thead > tr.active > td, .table > thead > tr.active > th, .table > tbody > tr > td.active, .table > tbody > tr > th.active, .table > tbody > tr.active > td, .table > tbody > tr.active > th, .table > tfoot > tr > td.active, .table > tfoot > tr > th.active, .table > tfoot > tr.active > td, .table > tfoot > tr.active > th {
    background: #cc3304;
    color: #fff;
    text-align: center;
  }

  .table {
    text-align: center;
  }

  .main{
    margin-bottom: 80px;
  }

  .alertify-notifier .ajs-message.ajs-success {
    background: rgba(91,189,114,.95);
    color: #fff;
  }

</style>

</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="corporate">

  <!-- BEGIN HEADER -->
  <div class="header">
    <div class="container">
      <a class="site-logo logo" href="index.html"><img src="img/logos/logo-corp-red.png" alt="SENA Coins"></a>


      <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

      <!-- BEGIN NAVIGATION -->
      <div class="header-navigation pull-right font-transform-inherit margin-top">
        <ul>
          <li><a href="index.html">III Jornada Pedagógica - CESGE - SENA</a></li>
          <li><a href="artefactos.html">Ver artefactos y ranking</a></li>
          <?php if(isset($_SESSION['Rol'])){ ?>
          <?php if($_SESSION['Rol'] == 1){ ?>
          <li><a href="equipo/index">Equipos</a></li>
          <li><a href="producto/index">Productos</a></li>
          <?php } ?>
          <li><a href="#"><?php echo $_SESSION['User'] ?> </a></li>
          <li><a href="home/logout">Cerrar sesión</a></li>
          <?php }else{ ?>
          <li><a href="home/login">Iniciar sesión</a></li>
          <?php } ?>


          
        </ul>
      </div>
      <!-- END NAVIGATION -->
    </div>
  </div>
  <!-- Header END -->

  <?php 

  if (isset($slides)) {
    if ($slides) {


     ?>

     <!-- BEGIN SLIDER -->
     <div class="page-slider margin-bottom-40">
      <div class="fullwidthbanner-container revolution-slider">
        <div class="fullwidthabnner">
          <ul id="revolutionul">
            <!-- THE THIRD SLIDE -->
            <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="img/revolutionslider/thumbs/thumb2.jpg">
              <img src="img/revolutionslider/bg3.jpg" alt="">
              <div class="caption lfl slide_item_left"
              data-x="30"
              data-y="95"
              data-speed="400"
              data-start="1500"
              data-easing="easeOutBack">
              <iframe src="https://www.youtube.com/embed/AA2D5qv5GtI" width="420" height="240" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="caption lfr slide_title"
            data-x="470"
            data-y="100"
            data-speed="400"
            data-start="2000"
            data-easing="easeOutExpo">
            Reflexión inicial
          </div>
          <div class="caption lfr slide_subtitle"
          data-x="470"
          data-y="170"
          data-speed="400"
          data-start="2500"
          data-easing="easeOutExpo">
          Pink Floyd - Another Brick In The Wall (Sub. Esp.).
        </div>
        <div class="caption lfr slide_desc"
        data-x="470"
        data-y="220"
        data-speed="400"
        data-start="3000"
        data-easing="easeOutExpo">
        Ver video!
      </div>
    </li>
    <!-- THE THIRD SLIDE -->
    <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="img/revolutionslider/thumbs/thumb2.jpg">
      <img src="img/revolutionslider/bg3.jpg" alt="">
      <div class="caption lfl slide_item_left"
      data-x="30"
      data-y="95"
      data-speed="400"
      data-start="1500"
      data-easing="easeOutBack">
      <iframe src="https://www.youtube.com/embed/SbiGZYwZAKo" width="420" height="240" style="border:0" allowfullscreen></iframe>
    </div>
    <div class="caption lfr slide_title"
    data-x="470"
    data-y="100"
    data-speed="400"
    data-start="2000"
    data-easing="easeOutExpo">
    Métodos a seguir.
  </div>
  <div class="caption lfr slide_subtitle"
  data-x="470"
  data-y="170"
  data-speed="400"
  data-start="2500"
  data-easing="easeOutExpo">
  Métodos Scamper.
</div>
<div class="caption lfr slide_desc"
data-x="470"
data-y="220"
data-speed="400"
data-start="3000"
data-easing="easeOutExpo">
<p>
  Herramienta que permite activar la creatividad y las habilidades, para
</p>
<p>
  resolver problemas de un producto o servicio ya existente, a través de
  <p>
    7 pasos definidas en las siglas S.C.A.M.P.E.R
  </p>
</div>
</li>
<!-- THE THIRD SLIDE -->
<li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="img/revolutionslider/thumbs/thumb2.jpg">
  <img src="img/revolutionslider/bg3.jpg" alt="">
  <div class="caption lfl slide_item_left"
  data-x="30"
  data-y="95"
  data-speed="400"
  data-start="1500"
  data-easing="easeOutBack">
  <iframe src="https://www.youtube.com/embed/PlLHc60egiQ" width="420" height="240" style="border:0" allowfullscreen></iframe>
</div>
<div class="caption lfr slide_title"
data-x="470"
data-y="100"
data-speed="400"
data-start="2000"
data-easing="easeOutExpo">
Métodos a seguir.
</div>
<div class="caption lfr slide_subtitle"
data-x="470"
data-y="170"
data-speed="400"
data-start="2500"
data-easing="easeOutExpo">
Métodos Scrum.
</div>
<div class="caption lfr slide_desc"
data-x="470"
data-y="220"
data-speed="400"
data-start="3000"
data-easing="easeOutExpo">
<p>
  Marco de desarrollo ágil de un proyecto, a través de roles,
</p>
<p>
  artefactos y reuniones, el cual permite obtener incrementos
</p>
<p>
  funcionales del producto, que se entregará al final del proyecto,
</p>
<p>
  desarrollado en interacciones llamadas Sprint 1, 2, n (en un Sprint
</p>
<p>
  pueden converger varias fases).
</p>
</div>
</li>
</ul>
<div class="tp-bannertimer tp-bottom"></div>
</div>
</div>
</div>
<!-- END SLIDER -->

<?php 

}
}
?>

<div class="main">
  <div class="container">

    <?php require content; ?>

  </div>
</div>

<div class="footer">
  <div class="container">
    <div class="row">
      <!-- BEGIN COPYRIGHT -->
      <div class="col-md-6 col-sm-6 padding-top-10">
        2015 © ADSI Centro de Servicios y Gestión Empresarial.
      </div>
      <!-- END COPYRIGHT -->
      <!-- BEGIN PAYMENTS -->
      <div class="col-md-6 col-sm-6">
        <ul class="social-footer list-unstyled list-inline pull-right">
          <li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
          <li><a href="javascript:;"><i class="fa fa-google-plus"></i></a></li>
          <li><a href="javascript:;"><i class="fa fa-dribbble"></i></a></li>
          <li><a href="javascript:;"><i class="fa fa-linkedin"></i></a></li>
          <li><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
          <li><a href="javascript:;"><i class="fa fa-skype"></i></a></li>
          <li><a href="javascript:;"><i class="fa fa-github"></i></a></li>
          <li><a href="javascript:;"><i class="fa fa-youtube"></i></a></li>
          <li><a href="javascript:;"><i class="fa fa-dropbox"></i></a></li>
        </ul>
      </div>
      <!-- END PAYMENTS -->
    </div>
  </div>
</div>
<!-- END FOOTER -->

<script src="<?php echo URL; ?>js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo URL; ?>js/jquery-migrate.min.js" type="text/javascript"></script>

<script>
  var url = "<?php echo URL; ?>";
</script>

<script src="<?php echo URL; ?>js/bootstrap.min.js" type="text/javascript"></script>

<script src="<?php echo URL; ?>js/back-to-top.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
<script src="<?php echo URL; ?>plugins/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
<script src="<?php echo URL; ?>plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
<!-- BEGIN RevolutionSlider -->
<script src="<?php echo URL; ?>js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
<script src="<?php echo URL; ?>js/jquery.themepunch.tools.min.js" type="text/javascript"></script>
<script src="<?php echo URL; ?>js/revo-slider-init.js" type="text/javascript"></script>
<!-- END RevolutionSlider -->
<script src="<?php echo URL; ?>js/layout.js" type="text/javascript"></script>

<script src="<?php echo URL; ?>plugins/DataTables/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo URL; ?>plugins/DataTables/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

<!-- JavaScript -->
<script src="<?php echo URL; ?>plugins/Alertify/js/alertify.min.js"></script>

<script src="<?php echo URL; ?>js/application.js"></script>



<script type="text/javascript">
  jQuery(document).ready(function () {
    Layout.init();
    Layout.initOWL();
    RevosliderInit.initRevoSlider();
    Layout.initFixHeaderWithPreHeader(); /* Switch On Header Fixing (only if you have pre-header) */
    Layout.initNavScrolling();
    // alertify.set('notifier','position', 'top-right');
    // alertify.notify('sample', 'success', 5, function(){  console.log('dismissed'); });
  });
</script>


<?php 

if (isset($js)) {
  echo $js;
}

?>

<!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>