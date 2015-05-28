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
  subirGaleria:function(){
    Dropzone.options.myDropzone = {

      url: url+'producto/subir',
          // Prevents Dropzone from uploading dropped files immediately
          autoProcessQueue: false,
          uploadMultiple: true,
          parallelUploads: 50,
          maxFiles: 50,
          addRemoveLinks: true,

          init: function() {
            var submitButton = document.querySelector("#submit-all")
                myDropzone = this; // closure

                submitButton.addEventListener("click", function() {
              myDropzone.processQueue(); // Tell Dropzone to process all queued files.
            });
                this.on("complete", function(data, response) {
              // If all files have been uploaded
              alertify.success("Se subio "+data.name);
              $("#txtIdEquipo").val("");
              if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                var _this = this;
                // Remove all files
                _this.removeAllFiles();
              }
            });

              }
            };
          },
          subirGuia:function(){
            Dropzone.options.myDropzone = {

              url: url+'producto/subirGuia',
          // Prevents Dropzone from uploading dropped files immediately
          autoProcessQueue: false,
          uploadMultiple: false,
          parallelUploads: 1,
          maxFiles: 1,
          addRemoveLinks: true,
          acceptedFiles: ".pdf,.doc,.docx",
          maxFilesize: 100,
          maxThumbnailFilesize: 100,
          // accept: function(file, done) {
          //   if (file.type != "image/jpeg" && file.type != "image/png") {
          //       done("Error! Files of this type are not accepted");
          //   }
          //   else { done(); }
          // }

          init: function() {
            var submitButton = document.querySelector("#submit-all")
                myDropzone = this; // closure

                submitButton.addEventListener("click", function() {
              myDropzone.processQueue(); // Tell Dropzone to process all queued files.
            });
                this.on("complete", function(data, response) {
              // If all files have been uploaded
              alertify.success("El archivo "+data.name+" se subio correctamente");
              producto.validarGuia();
              if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                var _this = this;
                // Remove all files
                _this.removeAllFiles();
              }
            });

              }
            };
          },

          validarGuia:function(){
            $.ajax({
              'type':'post',
              'dataType':'json',
              'url':url+'producto/obtenerGuiaProducto'
            }).done(function(response){
              console.log(response);
              if(response != null){

                if(response.producto == 'false'){
                  
                  $('#productoError').removeAttr("style");
                  $('#productoAdvertencia').css("display", "none");
                  $('#my-dropzone').css("display", "none");
                  $('#submit-all').css("display", "none");

                }else{

                  if(response.url_guia.url_guia != null){
                    
                    $('#productoAdvertencia').css("display", "none");
                    $('#opciones').css("display", "block");
                    $('#productoInfo').css("display", "block");
                    $('#my-dropzone').css("display", "none");
                    $('#submit-all').css("display", "none");

                    $('#downloadGuia').attr("href",url+"upload/guias/"+response.equipo+"/"+response.url_guia.url_guia);
                    $('#eliminarGuia').attr("onclick", "producto.EliminarGuia('"+response.url_guia.url_guia+"')");
                    

                  }
                }

              }

            }).fail(function(response){
              alertify.error("Error");
            });
          },
          EliminarGuia:function(nombre){
            $.ajax({
              'type':'post',
              'dataType':'json',
              'url':url+'producto/limpiarGuia',
              'data':{'nombre':nombre}
            }).done(function(response){

              producto.validarGuia();

              if(response.respuesta==true){
                alertify.success("Se elimino la guia correctamente");
                
                location.reload();
              }else{
                alertify.success("");
              } 



            }).fail(function(response){
              alertify.error("Error");
            });
          }
        }