var select_equipo = {

    Listar:function(){
        $.ajax({
            'type':'post',
            'dataType':'json',
            'url':url+'equipo/Listar'
        }).done(function(response){
            
            $.each(response, function(index, item){
                $("#txtIdEquipo").append("<option value=\""+item.idEquipo+"\">"+item.nombre_equipo+"</option>");
            });

        }).fail(function(response){
            alert("Error");
        });
    }
}