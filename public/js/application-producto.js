$(function() {

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

});


var producto = {
    
    listaArtefactos :function(){
        console.log("refresh");

        $.ajax({
            'type':'GET',
            'dataType':'json',
            'url':url+'producto/Listar'
        }).done(function(response){

            $("#lista-artefactos").empty();

            var ranking = '<div class="sticker sticker-sale"></div>';
            var template = '<div class="col-md-3"> <div class="product-item"> <div class="pi-img-wrapper"> <img src="{0}" class="img-responsive" alt="{1}"> <div> <a href="{0}" class="btn btn-default fancybox-button">Ver artefacto</a> <br><br><a href="{2}" class="btn btn-default" target="black">Descargar guía</a> </div></div><h3><a href="{5}">{3} - {1}</a></h3> <div class="pi-price">$ {4}</div><a href="{5}" class="btn btn-default add2cart">Invertir</a>{6}</div></div>';
            var artefactos = '';

            $.each(response, function(position, item){
                artefactos += String.format(template, (url + "upload/artefactos/" + item.equipo_idEquipo + "/" + item.imagen), item.nombre_producto, (url + "upload/guias/" + item.equipo_idEquipo + "/" + item.url_guia), item.nombre_equipo, item.inversion == null ? 0 : item.inversion, (url + 'producto/detalle/' + item.idProducto), position == 0 ? ranking : "");
            });
            
            $("#lista-artefactos").append(artefactos);

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

        }).fail(function(response){
            alert(response);
        });
    },

}