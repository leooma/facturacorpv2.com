<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of Menu
 *
 * @author OALerma
 */
class Menu
{
    public function crear_menu($permisos)
    {
        $html  = '<div id="sidebar-menu">';
        $html .= '<ul>';
        
        foreach($permisos as $modulo => $permiso)
        {
            $contador = 0;

            foreach($permiso as $id_accion => $dato )
            {
                if( $dato->es_menu == 0 )
                {
                    continue;
                }
                
                $contador++;                    

                if($dato->padre_id == 0)
                {
                    if( count($permisos[$modulo]) > 1 )
                    {
                        $html .= '<li><a href=""><i class="fa ' . $dato->clase . '"></i>';
                        $html .= '<i class="fa fa-angle-double-down i-right"></i>' . $dato->nombre .'</a>';               
                    }
                    else
                    {            
                        $html .= '<li><a href=""><i class="fa ' . $dato->clase . '"></i> ' . $dato->nombre . '</a></li>';
                    }
                }
                else
                {
                    if( $contador == 2 )
                    {
                        $html .= '<ul>';            
                    }

                    $html .= '<li><a href="' . base_url($modulo . '/' . $dato->accion) . '">';
                    $html .= '<i class="fa ' . $dato->clase . '"></i> ' . $dato->nombre . '</a></li>';

                }
            }
            if( $contador > 1)
            {    
                $html .= '</ul>';
            }
        }
        $html .= '</ul>';
        $html .= '<div class="clear"></div>';
        $html .= '</div>';

        return $html;
    }
}
