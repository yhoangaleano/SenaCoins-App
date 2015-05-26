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

home.Listar_Productos();

});


var home = {

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
                artefactos += String.format(template, (url + item.imagen), item.nombre_producto, (url + 'producto/detalle/' + item.idProducto), item.nombre_equipo,  item.inversion == null ? 0 : item.inversion);
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

        }).fail(function(response){
            alert(response);
        });
    },

}