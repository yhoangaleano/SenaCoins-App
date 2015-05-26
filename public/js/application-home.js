$(function() {

    alertify.set('notifier','position', 'top-right');

    if (!String.format) {
      String.format = function(format) {
        var args = Array.prototype.slice.call(arguments, 1);
        return format.replace(/{(\d+)}/g, function(match, number) { 
          return typeof args[number] != 'undefined'
          ? args[number] 
          : match
          ;
      });
    };
}

home.Listar_Productos();

$("#btnInvertir").click(function() {

    var cantidadCoins = parseInt($("#rangeInversion").val());
    var idArtefacto = $("#idArtefacto").text();

    if (cantidadCoins > 0) {

        $.getJSON( url+'equipo/cantidadCoins' )
        .done(function( result ) {
            if (cantidadCoins <= parseInt(result.monedas.monedas)) {
                alertify.confirm("Verificación de transacción", "¿Deseas realizar la transacción al artefacto #" + idArtefacto + "?",
                  function(){
                    home.transaccion(idArtefacto, cantidadCoins);
                },
                function(){
                    alertify.error('Transacción cancelada');
                }).set('labels', {ok:'Confirmar inversión', cancel:'Cancelar'});
                
            }else{
             alertify.set('notifier','position', 'top-right');
             alertify.notify('No cuentas con las monedas disponibles.', 'error', 10);
         };
     })
        .fail(function( jqxhr, textStatus, error ) {
            var err = textStatus + ", " + error;
            alertify.notify(err, 'error', 30);
        });

    }else{

        alertify.notify('No se pueden invertir 0 Coins.', 'error', 30);
    }

});

});


var home = {

    transaccion: function (idArtefacto, cantidadCoins) {
        console.log(idArtefacto);
        console.log(cantidadCoins);
        $.ajax({
            url: url+'producto/transaccion',
            type: 'POST',
            dataType: 'json',
            data: {idArtefacto: idArtefacto, cantidadCoins: cantidadCoins},
        })
        .done(function(result) {
            console.log(result);
            location.reload();
        })
        .fail(function() {
            console.log("error");
        });
    },
    cantidadCoins :function () {

        $.ajax({
            url: url+'equipo/cantidadCoins',
            type: 'GET',
            dataType: 'json'
        })
        .done(function(result) {

            console.log(result);
            var idArtefacto = $("#idArtefacto").text();

            if (result.artefacto.idProducto != idArtefacto) {



                if (parseInt(result.monedas.monedas) > 0) {
                    var $range = $("#rangeInversion");

                    $range.ionRangeSlider({
                      min: 0,
                      max: result.monedas.monedas,
                      from: 0,
                      grid: true,
                      grid_num: 10
                  });

                    $range.on("change", function () {
                      var $this = $(this),
                      value = $this.prop("value");
                      var output = document.getElementById('js-output');
                      output.innerHTML = value;
                  });
                }else{
                    $("#formInversion").append("<h3>No tienes monedas disponibles.</h3>");
                    $("#camposInversion").remove();
                };

            }else{
                $("#formInversion").append("<h3>No puedes invertir en tu artefacto.</h3>");
                $("#camposInversion").remove();
            };
        })
.fail(function( jqxhr, textStatus, error ) {
    var err = textStatus + ", " + error;
    alertify.notify(err, 'error', 30);
});
},

Listar_Productos:function(){
    $.ajax({
        'type':'GET',
        'dataType':'json',
        'url':url+'producto/Listar'
    }).done(function(response){

        var content = '<div id="lista-artefactos" class="owl-carousel owl-carousel3">{0}</div>';
        var template = '<div class="recent-work-item"> <em> <img src="{0}" alt="{1}" class="img-responsive"> <a href="{2}"><i class="fa fa-link"></i></a> <a href="{0}" class="fancybox-button" title="{1}" data-rel="fancybox-button"><i class="fa fa-search"></i></a> </em> <a class="recent-work-description" href="javascript:;"> <strong>{3}</strong> <b>Artefacto {1} - Coins {4}</b> </a> </div>';
        var artefactos = '';

        $.each(response, function(position, item){
            artefactos += String.format(template, (url + "upload/artefactos/" + item.equipo_idEquipo + "/" + item.imagen), item.nombre_producto, (url + 'producto/detalle/' + item.idProducto), item.nombre_equipo,  item.inversion == null ? 0 : item.inversion);
        });
        content = String.format(content,artefactos);
        $("#content-artefactos").append(content);

        $("#lista-artefactos").owlCarousel({
            pagination: false,
            navigation: true,
            items: 3,
            addClassActive: true,
            itemsCustom : [
            [0, 1],
            [320, 1],
            [480, 2],
            [700, 3],
            [768, 2],
            [1024, 3],
            [1200, 3],
            [1400, 3],
            [1600, 3]
            ],
        });

        if (!jQuery.fancybox) {
            return;
        }

        jQuery(".fancybox-fast-view").fancybox();

        if (jQuery(".fancybox-button").size() > 0) {            
            jQuery(".fancybox-button").fancybox({
                groupAttr: 'data-rel',
                prevEffect: 'none',
                nextEffect: 'none',
                closeBtn: true,
                helpers: {
                    title: {
                        type: 'inside'
                    }
                }
            });

            $('.fancybox-video').fancybox({
                type: 'iframe'
            });
        }

    }).fail(function( jqxhr, textStatus, error ) {
        var err = textStatus + ", " + error;
        alertify.notify(err, 'error', 30);
    });
}

}