$(function() {

    equipo.Listar();

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

});

var equipo = {

    Guardar:function(){
        $.ajax({
            'type':'post',
            'dataType':'json',
            'url':url+'equipo/Guardar',
            'data':{
                'nEquipo':$('#txtNombreEquipo').val(),
                'nUsuario':$('#txtNombreUsuario').val(),
                'contrasena':$('#txtContrasena').val()
            }
        }).done(function(response){
            alert(response.item);
        }).fail(function(response){
            alert("Error");
        });
    },
    Listar:function(){
        $.ajax({
            'type':'post',
            'dataType':'json',
            'url':url+'equipo/Listar'
        }).done(function(response){
            
            $.each(response, function(index, item){
                $("#tblEquipo").append("<tr><td>"+item.nombre_equipo+"</td><td>"+item.nombre_usuario+"</td><td>"+item.contrasena+"</td><td>"+item.monedas+"</td></tr>");
            });

            $('#tblEquipo').dataTable({
                "language": {
                    "url": url + "plugins/DataTables/js/Spanish.json"
                }
            });

        }).fail(function(response){
            alert("Error");
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
            
            console.log(response.item);

            $("#imgLogin").removeAttr("src");

            if(response.item != null){
                $("#imgLogin").attr("src", url+"/upload/artefactos/"+response.item);
            }else{
                $("#imgLogin").attr("src", url+"/img/male.png");
            }

        }).fail(function(response){
            alert("Error");
        });
    }
}