$('#MC_login').on('click', validar_login );

function validar_login()
{    
    that = $(this);
    
    $('.MC_mensajes').addClass(' hidden');
    
    var usuario = $('#usuario');
   
    var password = $('#password');
    
    if( $.trim(usuario.val()) === '')
    {
        resultado = {tipo: 1, mensaje: 'El usuario no puede estar vacío.'}
        
        mostrar_mensaje(resultado);
        
        return false;
    }
    
    if( $.trim(password.val()) === '')
    {
        resultado = {tipo: 1, mensaje: 'La contraseña no puede estar vacía.'}
        
        mostrar_mensaje(resultado);
        
        return false;
    }
    
    $.ajax({    
        url: http + 'usuario/validar_usuario',
        type: "POST",
        async: false,
        dataType: 'json',        
        data: { usuario: usuario.val(), password: password.val() }
    }).done(function(resultado)
    {
        mostrar_mensaje(resultado);
        
        if(resultado.tipo = 3)
        {
            setInterval(function(){$("form").submit();},1000);   
        }
    }).error(function()
    {
        resultado = {tipo: 1, mensaje: 'Hubo un error en el servidor, favor de intentarlo más tarde.'};
        
        mostrar_mensaje(resultado);
    });
   
    
    return false;
}