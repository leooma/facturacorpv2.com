/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready( function () { 
    
    $(".formulario").submit(function() { 
        
        if( $("#mc_guardar").val() == 'Registrar' && $("#mc_error").val() == 0 )
        {  
            if( $("#mc_password").val() != $("#mc_password_repetir").val() )
            {
                mostrarMensaje('Las contraseñas no coinciden', 1);
            }
            if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($("#mc_correo").val()))
            {
                
            } else
            {
                mostrarMensaje('El correo no es valido, favor de intentar con otro.', 1);
            }
            
            validar_usuario();
        }
        
        if( $("#mc_guardar").val() == 'Entrar' && $("#mc_error").val() == 0 )
        {  
            logearse();         
        }
         
        if( $("#mc_guardar").val() == 'Recuperar' && $("#mc_error").val() == 0 )
        {
            recuperar();
        }
        
        if( $("#mc_guardar").val() == 'Actualizar' && $("#mc_error").val() == 0 )
        {
            actualizar();
        }
        
        if( $("#mc_error").val() > 0 ) {  
            return false;
        }        
    });
    
    if( $("h3").html() == 'Agregar Usuario' )
    {
        $("h3").html("Registra tu Negocio");
        $(".bienvenido").hide();
        $("nav").hide();
        $("#buscar").hide();
        $("#mc_guardar").val("Registrar");
    }
   
});

function logearse()
{
    var logeo = false;
    $.ajax({    
            url: http+"usuario/validarLogin/",
            type: "POST",
            async: false,
            
            beforeSend: function()
            {
                $('#mc_mensaje').html("<div style='align:center;'><center>Verificando informaci&oacute;n</center></div>");
            },
            data: { usuario: $("#mc_usuario").val(), password: $("#mc_password").val() },
            success: function(resultado)
            {
                if( resultado ) {
                    mostrarMensaje( resultado, 1); 
                    return false;
                } else {                   
                    mostrarMensaje('Se logeo correctamente');
                                        
                    logeo = true;
                }
            }
        });   
        
     if( logeo )
     {       
         window.location = http + 'factura';
     }
}

function logearse()
{
    var logeo = false;
    $.ajax({    
            url: http+"usuario/validarLogin/",
            type: "POST",
            async: false,
            
            beforeSend: function()
            {
                $('#mc_mensaje').html("<div style='align:center;'><center>Verificando informaci&oacute;n</center></div>");
            },
            data: { usuario: $("#mc_usuario").val(), password: $("#mc_password").val() },
            success: function(resultado)
            {
                if( resultado ) {
                    mostrarMensaje( resultado, 1); 
                    return false;
                } else {                   
                    mostrarMensaje('Se logeo correctamente');
                                        
                    logeo = true;
                }
            }
        });   
        
     if( logeo )
     {       
         window.location = http + 'factura';
     }
}

function validar_usuario()
{    
    $.ajax({    
        url: http+"/usuario/validar/" + $("#mc_usuario").val(),
        type: "POST",
        async: false,
        beforeSend: function()
        {
            $('#mc_mensaje').html("<div style='align:center;'><center>Verificando informaci&oacute;n</center></div>");
        },
        data: { usuario: $("#mc_usuario").val(), password: $("#mc_password").val() },
        success: function(resultado)
        {
            if( resultado ) {
                mostrarMensaje( resultado, 1);                
            }
        }
    });
    
    if( $("#mc_error").val() > 0 ) {
        return false;
    }    
}

function actualizar()
{    
    $.ajax({    
        url: http+"/usuario/actualizar_password/?" + $("#mc_agregar_producto").serialize(),
        type: "POST",
        async: false,
        beforeSend: function()
        {
            $('#mc_mensaje').html("<div style='align:center;'><center>Verificando informaci&oacute;n</center></div>");
        },
        data: { usuario: $("#mc_usuario").val(), password: $("#mc_password").val() },
        success: function(resultado)
        {
            if( resultado ) {
                mostrarMensaje( resultado, 1);                
            }
        }
    });
    
    if( $("#mc_error").val() > 0 ) {
        return false;
    }    
}
