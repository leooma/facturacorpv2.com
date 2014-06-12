http = $('#url_base').val();

$(".MC_input:visible").eq(0).focus();

function mostrar_mensaje(resultado)
{
    var tipos = [];
    tipos[1] = 'alert-danger';
    tipos[2] = 'alert-warning';
    tipos[3] = 'alert-success';
    
    $('.MC_mensajes').removeClass(tipos[1])
                     .removeClass(tipos[2])
                     .removeClass(tipos[3])
                     .addClass(tipos[resultado.tipo])
                     .removeClass('hidden')
                     .children('.MC_mensaje')
                     .html(resultado.mensaje);
}

function ocultar_mensaje()
{
    $('.MC_mensajes').addClass(' hidden');
}

function validar_errores()
{
    if($('.has-error').size() > 0 )
    {
        $('.btn_principal').attr('disabled', 'disabled');
    }
    else
    {
        $('.btn_principal').removeAttr('disabled');
    }
}

$(document).keypress(function(e) 
{
    if(e.which == 13) 
    {        
        if( $('.MC_input:focus').val() != undefined )
        {
            var enFoco = $('.MC_input:focus');
            
            var l_index = $('.MC_input:visible').index(enFoco); 

            $('.MC_input:visible').eq(l_index+1).focus();
        }
        else
        {
            $(".MC_input:visible").eq(0).focus();
        }
        return false;
    }
});

$('.MC_mayusculas').on('keyup', function(e)
{
    $(this).val($(this).val().toUpperCase());
});

$('.MC_email').on('blur', function()
{
    ocultar_mensaje();
    
    that = $(this);
    
    that.parents('.form-group').removeClass('has-error');

    variable = $.trim(this.value);

    if( variable !== '')
    {        
        if(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(variable) == false)
        {            
            that.parents('.form-group').addClass(' has-error');
            
            resultado = {tipo: 1, mensaje: 'El campo es no es un email válido.'};
        
            mostrar_mensaje(resultado);
        }
    }
    
    validar_errores();
});

$('.MC_requerido').on('blur', function()
{
    ocultar_mensaje();
    
    that.parents('.form-group').removeClass(' has-error');
    
    that = $(this);    

    campo = $.trim(that.val());
    
    if( campo === '' || campo === '0')
    {     
        that.parents('.form-group').addClass(' has-error');
        
        resultado = {tipo: 1, mensaje: 'El campo es requerido.'};
        
        mostrar_mensaje(resultado);
    }    
    
    validar_errores();
});

$('.btn_principal').on('click', function(){
    $('.MC_requerido').each(function()
    {   
        that = $(this);    
        
        that.parents('.form-group').removeClass(' has-error');

        campo = $.trim(that.val());

        if( campo === '' || campo === '0')
        {     
            that.parents('.form-group').addClass(' has-error');

            resultado = {tipo: 1, mensaje: 'El campo es requerido.'};

            mostrar_mensaje(resultado);
        }    
    });
    
    validar_errores();
    console.log($(this).is(':visible'));
    if( $(this).is(':visible') )
    {
        $(this).submit();
    }
});

$('.MC_telefono').on('blur', formato_telefono );

function formato_telefono()
{
    var telefono = $.trim($(this).val());
    
    telefono = telefono.replace(' ', '');
    
    telefono = telefono.replace('(', '');
    
    telefono = telefono.replace(')', '');
    
    telefono = telefono.replace('-', '');
        
    var formato = '';    
    
    if( telefono != '')
    {
        formato += '(' + telefono.substr(0, 3) + ') ';

        formato += telefono.substr(3, 3) + '-' + telefono.substr(6); 
    }
    
    $(this).val(formato);
}