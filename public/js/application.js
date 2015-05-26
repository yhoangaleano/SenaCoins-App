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
        }
    }


    // just a super-simple JS demo

    var demoHeaderBox;

    // simple demo to show create something via javascript on the page
    if ($('#javascript-header-demo-box').length !== 0) {
    	demoHeaderBox = $('#javascript-header-demo-box');
    	demoHeaderBox
      .hide()
      .text('Hello from JavaScript! This line has been added by public/js/application.js')
      .css('color', 'green')
      .fadeIn('slow');
  }

    // if #javascript-ajax-button exists
    if ($('#javascript-ajax-button').length !== 0) {

        $('#javascript-ajax-button').on('click', function(){

            // send an ajax-request to this URL: current-server.com/songs/ajaxGetStats
            // "url" is defined in views/_templates/footer.php
            $.ajax(url + "/songs/ajaxGetStats")
            .done(function(result) {
                    // this will be executed if the ajax-call was successful
                    // here we get the feedback from the ajax-call (result) and show it in #javascript-ajax-result-box
                    $('#javascript-ajax-result-box').html(result);
                })
            .fail(function() {
                    // this will be executed if the ajax-call had failed
                })
            .always(function() {
                    // this will ALWAYS be executed, regardless if the ajax-call was success or not
                });
        });
    }

    $("#txtUsuario").change(function(){
        equipo.validar();
    });

    $("#btnGuardar").click(function(){
        equipo.Guardar();
    });

});

var equipo = {

    Guardar:function(){
        $.ajax({
            'type':'post',
            'dataType':'json',
            'url':url+'equipo/Create',
            'data':{
                'txtNombreEquipo':$('#txtNombreEquipo').val(),
                'txtNombreUsuario':$('#txtNombreUsuario').val(),
                'txtContrasena':$('#txtContrasena').val()
            }
        }).done(function(response){
            alertify.success(response.item);
            equipo.Listar();
            equipo.limpiar();
        }).fail(function(response){
            alertify.error("Error");
        });
    },
    Edit:function(id, nombreE, nombreU, contrasena){

        $('#txtCodigoEquipo').val(id);
        $('#txtNombreEquipo').val(nombreE);
        $('#txtNombreUsuario').val(nombreU);
        $('#txtContrasena').val(contrasena);

        $("#btnGuardar").css({"display":"none"});
        $("#btnModificar").css({"display":"block"});
        $("#btnModificar").attr({"onclick":"equipo.Modificar()"});
          
    },
    limpiar:function(){

        $('#txtCodigoEquipo').val("");
        $('#txtNombreEquipo').val("");
        $('#txtNombreUsuario').val("");
        $('#txtContrasena').val("");

        $("#btnGuardar").css({"display":"block"});
        $("#btnModificar").css({"display":"none"});
    },
    Modificar:function(){
        $.ajax({
            'type':'post',
            'dataType':'json',
            'url':url+'equipo/Modificar',
            'data':{
                'txtCodigoEquipo':$('#txtCodigoEquipo').val(),
                'txtNombreEquipo':$('#txtNombreEquipo').val(),
                'txtNombreUsuario':$('#txtNombreUsuario').val(),
                'txtContrasena':$('#txtContrasena').val()
            }
        }).done(function(response){
            alertify.success(response.item);
            equipo.Listar();
            equipo.limpiar();
        }).fail(function(response){
            alertify.error("Error");
        });
    },
    Listar:function(){
        $.ajax({
            'type':'post',
            'dataType':'json',
            'url':url+'equipo/Listar'
        }).done(function(response){
            
            $("#tbdyEquipo").empty();

            $.each(response, function(index, item){
                var template =  "<tr><td>{0}</td><td>{1}</td><td>{2}</td><td>{3}</td><td><a onclick='equipo.Edit({4}, {5}, {6}, {7})'>Editar</a></td></tr>";
                $("#tbdyEquipo").append(String.format(template, item.nombre_equipo, item.nombre_usuario, item.contrasena, item.monedas, item.idEquipo, '"'+item.nombre_equipo+'"', '"'+item.nombre_usuario+'"', '"'+item.contrasena+'"'));
            });

            $('#tblEquipo').dataTable({
                "language": {
                    "url": url + "plugins/DataTables/js/Spanish.json"
                }
            });

        }).fail(function(response){
            alertify.error("Error");
        });
    },
    validar:function(){
        $.ajax({
            'type':'post',
            'dataType':'json',
            'url':url+'home/ValiUsuario',
            'data':{
                'User':$("#txtUsuario").val()
            }
        }).done(function(response){
            
            $("#imgLogin").removeAttr("src");

            if(response.item != null){
                $("#imgLogin").attr("src", url+"/upload/artefactos/"+response.item);
            }else{
                $("#imgLogin").attr("src", url+"/img/male.png");
            }

        }).fail(function(response){
            alertify.error("Error");
        });
    }
}