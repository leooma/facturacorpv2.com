$(document).ready( function(){  
   
   $(".formulario").submit(function() {             
        
        if( window.opener )
        {   
            if( $("#mc_id").val() > 0 )
            {                
                window.opener.$(".boton_mas").click();
                
                var linea = window.opener.$(".copia:last").attr("linea");                
                
                window.opener.$("#mc_cantidad_"+linea).val( 1 );
                
                window.opener.$("#mc_producto_id_"+linea).val( $("#mc_id").val() );
                
                window.opener.$("#mc_descripcion_"+linea).val( $("#mc_descripcion").val() );
                
                window.opener.$("#mc_unidad_"+linea).val( $("#mc_unidad").val() );
                
                window.opener.$("#mc_precio_"+linea).val( $("#mc_precio").val() );
                
                window.opener.$("#mc_cantidad_"+linea).blur();
                
                window.close();
            } 
            
        }
    });  
});
