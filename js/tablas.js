
$(document).ready( function () {
    buildPage(20);
      
    $("tbody tr").addClass('found');
    $("#buscar_dato").keyup(function(event){        
        if( event.keyCode == 27 || $(this).val() == '')
        {
            $(this).val('');
            
            $("tbody tr").removeClass('found').show().addClass('found');
            
            var pageSize = $("#pageSize").val();
            
            buildPage( pageSize );
            
            $("#pagination").css('display', 'block');
        }
        else
        {
            filterRows('tbody tr', $(this).val());
        }
    });
});

// Funcion de paginacion
function buildPage( pageSize )
{
    // Cantidad de filas dela tabla
    var numRows = $('tbody tr').size();
    
    // Calcular el numero de paginas que desplegara el paginador
    var numPages = Math.ceil(numRows / pageSize );
    
    if( numRows > pageSize )
    {
        $("#currentPage").val(0);
        $("#pageSize").val(pageSize);
        
        // Construir el html del paginador
        var paginationControl = '';
        
        paginationControl += '<ul>';
        paginationControl += '<li><a class="previousLink" href="javascript:previousPage();">&lsaquo;</a></li>';
        
        var actualPage = parseInt( $("#currentPage").val() );
        
        for( var page = 0; page < numPages; page++ )
        {
            paginationControl += '<li>';
            paginationControl += '<a class="pageLink" href="javascript:goToPage('+ ( page ) +');">'+ (page + 1) +'</a>';
            paginationControl += '</li>';
        }
        
        
        paginationControl += '<li><a class="nextLink" href="javascript:nextPage();">&rsaquo;</a></li>';
        paginationControl += '</ul>';
        
        // Meter el html en el pagination div
        $("#pagination").html( paginationControl );
        
        // actual numero de paginas
        $("#selectPageSize").val(pageSize);
        
        // Agregar la pagina actual
        $("#pagination .pageLink:first").addClass('activePage');
        
        // Muestra la primera pagina
        $("tbody tr").hide().slice(0, pageSize).show();
    }
}

function previousPage()
{
    // Calcula la pagina anterior
    var previousPage = parseInt( $("#currentPage").val() ) - 1;
    
    // Ve a la pagina anterior
    if( previousPage >= 0 )
    {
        goToPage( previousPage );
    }
}

function nextPage()
{
    // Calcula la pagina anterior
    var nextPage = parseInt( $("#currentPage").val() ) + 1;
    
    // Obtener numero de paginas
    var pageSize = $("#pageSize").val();
    
    //Obtener el numero de filas en la tabla
    var numRows = $("tbody tr").size();
    
    // Calcular el numero de paginas
    var numPages = Math.ceil(numRows / pageSize );
    // Ve a la pagina anterior
    if( nextPage < numPages )
    {
        goToPage( nextPage );
    }
}

function goToPage(page)
{
    // Obtener numero de paginas
    var pageSize = parseInt( $("#pageSize").val() );
    
    // Obtener la fila donde empezar a contar
    firstRow = page * pageSize;
    
    // Obtener la fila donde terminara de contar
    lastRow = firstRow + pageSize;
    
    // Oculta todas las filas y muesta solo las del rango seleccionado
    $("tbody tr").hide().slice(firstRow, lastRow). show();
    
    // eliminar la clase active page de la pagina actual
    $("a.activePage").removeClass('activePage');
    $('a.pageLink').eq(page).addClass('activePage');
    
    $("#currentPage").val(page);
}

function filterRows(selector, query)
{
    $("#pagination").css('display', 'none');
    
    query = $.trim(query);
    query = query.replace(/ /gi, '|');
    
    $(selector).each(function(){
       if( $(this).text().search(new RegExp(query, 'i')) < 0 )
       {
           $(this).hide().removeClass('found');
       }
       else
       {
           $(this).show().addClass('found');
       }
    });
}
