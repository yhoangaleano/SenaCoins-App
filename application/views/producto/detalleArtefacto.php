<?php   

$css = '<link href="'.URL.'css/style-shop.css" rel="stylesheet" type="text/css">';
echo $css;

?>

<div class="row margin-bottom-40">

  <!-- BEGIN CONTENT -->
  <div class="col-md-offset-1 col-md-10 col-sm-12">
  <h2 class="">Artefacto # <span id="idArtefacto"><?php echo $id ?></span> - Equipo <?php echo $artefacto->nombre_equipo; ?></h2>

    <div class="product-page">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="product-main-image">
            <img src="<?php echo URL.'upload/artefactos/'.$artefacto->idEquipo.'/'.$imagenes[0]->url_imagen; ?>" alt="Cool green dress with red bell" class="img-responsive" data-BigImgsrc="img/products/model7.jpg">
          </div>
          <div class="product-other-images">
           <?php foreach ($imagenes as $imagen) { ?>
           <a href="<?php echo URL.'upload/artefactos/'.$artefacto->idEquipo.'/'.$imagen->url_imagen; ?>" class="fancybox-button" rel="photos-lib"><img alt="<?php echo $artefacto->nombre_producto; ?>" src="<?php echo URL.'upload/artefactos/'.$artefacto->idEquipo.'/'.$imagen->url_imagen; ?>"></a>
           <?php } ?>
         </div>
       </div>
       <div class="col-md-6 col-sm-6">
        <h1><?php echo $artefacto->nombre_producto; ?></h1>
        <div class="price-availability-block clearfix">
          <div class="availability margin-top-3">
            Cantidad de SENACoins obtenidos: 
          </div>
          <div class="price">
            <strong><span>$</span><?php echo ($artefacto->coins == "" ? 0 : $artefacto->coins); ?></strong>
          </div>

        </div>
        <div class="description">
          <h3>Descripción</h3>
          <p>
           <?php echo $artefacto->descripcion; ?>
         </p>
       </div>
       <hr>
       <?php 
       if (isset($_SESSION["ID"])) {
        ?>
        <div id="formInversion" class="product-page-cart">

          <div id="camposInversion">
            <h3>Invertir en este artefecto</h3>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <input id="rangeInversion" name="rangeInversion" type="range" min="0" max="1000" step="1" value="0" style="  display: none !important;" />
                  <output id="js-output">0</output>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <button id="btnInvertir" class="btn btn-primary btn-block" type="button">Invertir</button>
                </div>
              </div>
            </div>
          </div>
          


        </div>

        <?php 
      }
      ?>
    </div>

  </div>
</div>
</div>
<!-- END CONTENT -->
</div>

<!-- BEGIN SIMILAR PRODUCTS -->
<div class="row recent-work margin-bottom-40">
  <div class="col-md-3">
    <h2><a href="<?php echo URL; ?>producto/galeria">Ver artefactos recientes</a></h2>
    <p class="text-justify">Esta sección muestra los diferentes artefactos creados en la <b> III Jornada Pedagógica </b> realizada en el CESGE. Todos los equipos usaron su creatividad para realizar el mejor artefacto. Para invertir en alguno, siga las instrucciones que se muestran en el panel inferior.</p>
  </div>
  <div id="content-artefactos" class="col-md-9">

  </div>
</div>
<!-- END SIMILAR PRODUCTS -->

<?php   

$js = '<script src="'.URL.'js/application-home.js" type="text/javascript"></script>';
if (isset($_SESSION["ID"])) {
  $js .= '<script>home.cantidadCoins();</script>';
}


?>