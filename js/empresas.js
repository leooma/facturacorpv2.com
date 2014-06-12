$(document).ready( function(){      
    $(".editar").css("background-image", 'url("'+http+'/img/b_editar_negocio.png")');
    
    $('#mc_rfc').blur(mayusculas);
});

function mayusculas()
{
    $(this).val( $(this).val().toUpperCase());
    
    verificar_tipo_persona()
}
