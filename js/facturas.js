$(document).ready(function(){              
   clonar_producto();
   $(".agregar").css("background-image", 'url("'+http+'/img/b_nuevo.png")');
   $('#mc_cliente_id_oculto').attr('class', 'requerido');
   $('#mc_cliente_id_oculto').attr('str', 'Cliente');
   $('form').append('<input id="mc_cliente_tipo_persona" type="hidden" value="0" />');
   $('#mc_cliente_tipo_persona').attr('str', 'Cliente');
   $('form').submit( validar_exista_cliente );   
   $('#mc_moneda_id').change(cambiar_tipo_cambio);
});

function cambiar_tipo_cambio()
{
    if( $(this).val() == 1 )
    {
        $('#mc_tipo_cambio_oculto').val(1);
        
        $('.tipo_cambio_nuevo').remove();
    }
    else
    {
        $('#mc_moneda_id').after('<div class="tipo_cambio_nuevo"><label>Tipo de cambio:</label><input type="text" id="tipo_cambio_nuevo" value="1" /></div>');
    }
}

$(".boton_mas").live("click", clonar_producto ); 
$(".boton_menos").live("click", eliminar_producto );
$(".txt_cantidad").live("blur", actualizar_importe );
$(".txt_importe").live("blur", actualizar_saldos );
$(".txt_precio").live("blur", actualizar_importe );
$("#tipo_cambio_nuevo").live("blur", actualizar_tipo_cambio );

function actualizar_tipo_cambio()
{
    $('#mc_tipo_cambio_oculto').val($("#tipo_cambio_nuevo").val());
}

$('.autocomplete_cliente').live('keyup.autocomplete', function() {
    $(this).autocomplete({
        source: http + 'cliente/obtener_clientes', 
        minLength:2,
        select: clienteMarcado
    });
});

$('.producto_autocomplete').live('keyup.autocomplete', function() {
    $(this).autocomplete({
        source: http + 'producto/obtener_productos', 
        minLength:2,
        select: productoMarcado
    });    
    
});

function validar_exista_cliente()
{
    var cliente_id = $.trim($("#mc_cliente_id_oculto").val());
    
    if( cliente_id == 0 || cliente_id == '')
    {
        mc_error.val(1);
        
        mostrarMensaje( "No se puede generar factura por falta de usuario cliente.", 1);
        
        return false;
    }
}

function actualizar_saldos()
{
    var datos = '';
    var linea = 0;
    
    $("input.txt_importe:visible").each( function()
    {        
        linea = $(this).parent().attr('linea');        
        datos += $('#mc_cantidad_'+linea).val()+'_';
        datos += $('#mc_producto_id_'+linea).val()+'_';
        datos += $('#mc_precio_'+linea).val()+'||';        
    });
    
    obtener_impuestos(datos);      
}

function obtener_impuestos(datos)
{
    $.ajax({    
        url: http + 'factura/obtener_impuestos',
        type: "POST",
        async: false,
        dataType: 'html',        
        data: { datos: datos, cliente_tipo_persona: $('#mc_cliente_tipo_persona').val() },
        success: function(impuestos)
        {
            $('.impuestos').html(impuestos);
        }
    });
}

function actualizar_importe()
{
    var linea = $(this).parent().attr('linea');    
    
    var cantidad = parseFloat( $("#mc_cantidad_"+linea).val() );
    
    var precio = ( $("#mc_precio_"+linea).val() ) ? parseFloat($("#mc_precio_"+linea).val()) : 0;
    
    if( cantidad && precio )
    {
        var importe = cantidad * precio;
    } 
    else 
    {
        return false;
    }
    $("#mc_importe_"+linea).val( importe.toFixed(6) );
    
    actualizar_saldos();
}

function clonar_producto()
{
    var clon = $(".original").clone();
    clon.attr("class", "copia");
    
    var posible_numero = parseInt( $(".copia:last").attr('linea') );
    var numero_copias = 0;
    if( posible_numero > 0 )
    {
        numero_copias = posible_numero;
    }
    numero_copias++;
    
    clon.attr("linea", numero_copias);
    
    clon.find("input:eq(0)").attr('id', 'mc_cantidad_'+numero_copias); 
    
    clon.find("input:eq(1)").attr('id', 'mc_producto_id_'+numero_copias);     
    clon.find("input:eq(2)").attr('id', 'mc_descripcion_'+numero_copias); 
    clon.find("input:eq(3)").attr('id', 'mc_unidad_'+numero_copias); 
    clon.find("input:eq(4)").attr('id', 'mc_precio_'+numero_copias);     
    clon.find("input:eq(5)").attr('id', 'mc_importe_'+numero_copias);
    
    $(".inline").append( clon );
}

function eliminar_producto()
{    
    $(this).parent().remove();
    
    actualizar_saldos();
}

function clienteMarcado(event, ui)
{
    var cliente = ui.item.value;		   
    $("#mc_cliente_id_oculto").val( cliente.id ).change();  
    return false;
}

$("#mc_cliente_id_oculto").live("change", function(){
   var url = http+  "cliente/obtener_por_id/" +$("#mc_cliente_id_oculto").val();   
   
   $.ajax({    
        url: url,
        type: "POST",
        async: false,
        dataType: 'json',
        beforeSend: function()
        {
            $('#mc_mensaje').html("<div style='align:center;'><center>Verificando informaci&oacute;n</center></div>");
        },
        data: { usuario: $("#mc_usuario").val(), password: $("#mc_password").val() },
        success: function(cliente)
        {
            var informacion = '';
            $(".informacion_cliente").html( informacion );
            
            $("#mc_cliente").val( cliente.razon_social );    
            $('#mc_cliente_tipo_persona').val( cliente.tipo_persona );
            informacion += '<h5>' + cliente.alias + ' - ' + cliente.razon_social + '</h5>';
            informacion += '<p>' + cliente.calle + ' ' + cliente.numero_exterior + '</p>';
            informacion += '<p>' + cliente.colonia + '</p>';
            informacion += '<p>' + cliente.localidad + ', ' + cliente.municipio + ', ' + cliente.estado_id + ', ' + cliente.pais + '</p>';

            $(".informacion_cliente").append( informacion );
        }
    });
});


function productoMarcado(event, ui)
{
    var producto = ui.item.value;
    var linea = $(this).parent().attr('linea');    
    
    $("#mc_producto_id_"+linea).val( producto.id );
    $("#mc_descripcion_"+linea).val( producto.descripcion );
    $("#mc_unidad_"+linea).val( producto.unidad );
    var precio = producto.precio * 1;
    $("#mc_precio_"+linea).val( precio.toFixed(6) );
    
    var cantidad = parseFloat( $("#mc_cantidad_"+linea).val() );
    
    if( cantidad > 0 )
    {
        var importe = cantidad * producto.precio;
    }
    $("#mc_importe_"+linea).val( importe.toFixed(6) );
    
    actualizar_saldos();
    
    return false;
}

$(document).keypress(function(e) 
{
    if(e.which == 13) 
    {
        return false;
    }
});