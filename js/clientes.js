$(document).ready( function(){
   verificar_repetido();   
   agregar_quitar_extranjero();
   $(".formulario").submit(function() {             
        
        if( window.opener )
        {
            window.opener.document.getElementById("mc_cliente_id_oculto").value = $("#mc_id").val();
            
            if( $("#mc_id").val() > 0 )
            {
                window.opener.$("#mc_cliente_id_oculto").change();
                
                window.close();
            } 
            
        }
    });    
    
    $('#mc_rfc').blur(verificar_tipo_persona);
    
    $('#mc_rfc').blur(verificar_repetido);
    
    $('[type=radio]').click(verificar_tipo_persona);
    
    $('#mc_telefono').blur(formato_telefono);
       
});

function verificar_repetido()
{
    if( $('#mc_rfc').val() == undefined)
    {
        return false;
    }
    var cliente_id = $('#mc_id').val();
    
    var rfc = $('#mc_rfc').val().toUpperCase().replace(' ', '');
    
    var alias = $('#mc_alias').val();
    
    $('#mc_rfc').val(rfc);
    
    $.ajax({    
        url: http + 'cliente/validar_repetido',
        type: "POST",
        async: false,
        dataType: 'html',        
        data: { cliente_id: cliente_id, rfc: rfc, alias: alias }
    }).done(function(cliente){
        if(cliente != '')
        {
            mostrarMensaje(cliente, 1);
            
            $('#mc_rfc').val('');
        }
    }).error(function(){
        
    });
}

function formato_telefono()
{
    var telefono = $.trim($(this).val());
    
    telefono = telefono.replace(' ', '');
    
    telefono = telefono.replace('(', '');
    
    telefono = telefono.replace(')', '');
    
    telefono = telefono.replace('-', '');
    
    var contar = telefono.length;
    
    var formato = '';
    
    if( contar === 10)
    {
        formato += '(' + telefono.substr(0, 3) + ') ';
        
        formato += telefono.substr(3, 3) + '-' + telefono.substr(6);
    }
    else
    {
        formato += telefono.substr(0, 3) + '-' + telefono.substr(3);
    }
    
    $(this).val(formato);
}



$('#mc_estado_id').live('change', agregar_quitar_extranjero);

function agregar_quitar_extranjero()
{
    var estado_id = $('#mc_estado_id').val();
    
    if( estado_id == 33 )
    {
        $('#mc_estado_id').next().show();
        $('#mc_estado_extranjero').show();
    }
    else
    {
        $('#mc_estado_id').next().hide();
        $('#mc_estado_extranjero').hide();
    }
}