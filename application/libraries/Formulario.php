<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of Formulario
 *
 * @author OALerma
 */
class Formulario
{    
    private $_datos = false;
    private $_modulo = false;
    private $_tipo_formulario = false;
    private $_formulario = '';
    private $_columnas = 8;
    private $_estilo = 'sencillo';
    
    public function obtener_formulario()
    {
        return $this->_formulario;
    }
    
    
    public function definir_variables($datos, $modulo, $tipo_formulario)
    {
        $this->_datos = $datos;
        
        $this->_modulo = $modulo;
        
        $this->_tipo_formulario = $tipo_formulario;
    }
    
    public function armar_formulario()
    {
        $this->_formulario .= form_open();
        
        if( isset($this->_datos[ $this->_modulo][$this->_tipo_formulario]['blockes']))
        {
            $this->armar_formulario_blockes();
        }       
        
         $this->_formulario .= form_close();
    }
    
    private function armar_formulario_blockes()
    {   
        foreach($this->_datos[ $this->_modulo][$this->_tipo_formulario]['blockes'] as $id_blocke => $blocke)
        {
            $this->_formulario .= '<div class="box-info animated fadeInDown">';
            
            $this->_formulario .= '<h2><strong>Formulario</strong> de ' . $blocke['titulo'] . '</h2>';
            
            $this->_formulario .= $this->obtener_botones($id_blocke);
            
            $this->_columnas = (isset($blocke['columnas'])) ? ( 12 / $blocke['columnas'] ) : 8;
            
            $this->_estilo = (isset($blocke['estilo'])) ? $blocke['estilo'] : 'sencillo';
            
            $this->_formulario .= '<div id="' . $id_blocke . '-form" class="collapse in">';
            
            foreach( $blocke['campos'] as $campo )
            {
                $this->obtener_inputs_por_tipo($this->_datos[$this->_modulo]['campos'][$campo]);
            }           
            
            $this->_formulario .= '</div>';
            
            $this->_formulario .= '</div>';
        }
    }
    
    private function obtener_inputs_por_tipo($campo)
    {
        switch ($campo['tipo'])
        {
            case 'telefono':
            case 'text':
            case 'rfc':
            case 'email':
            default:
                
                $this->obtener_input_text($campo);
                
                break;
            
            case 'radio':
                
                $this->obtener_input_radio($campo);
                
                break;
        }
    }
    
    private function obtener_input_radio($campo)
    {        
        $clase = '';
        
        $input = $this->obtener_input_standar($campo);
       
        $input['type'] = 'radio';
        
        $this->_formulario .= '<div class="col-sm-' . $this->_columnas . '">';
        
        $this->_formulario .= '<div class="form-group">';
        
        if( $this->_estilo == 'lineal')
        {
            $clase = 'class="radio-inline" ';
            
            $clase1 = ' class="col-sm-4 control-label" ';
        }
        
        $this->_formulario .= '<label for="input_' . $campo['campo'] . '" ' . $clase1 . '> ' . $input['caption'] . '</label>';
        
        if( $this->_estilo == 'lineal')
        {
            $this->_formulario .= '<div class="col-sm-8">';
        }                
        
        foreach( $campo['options'] as $id_option => $option )
        {
            //$this->_formulario .= '<div class="radio">';
            
            $this->_formulario .= '<label for="input_' . $campo['campo'] . '" ' . $clase . '>';
            
            $input['value'] = $id_option;
            
            $this->_formulario .= form_radio($input);
            
            $this->_formulario .=  $option . '</label>';
            
            //$this->_formulario .= '</div>';
        }
        
        if( $this->_estilo == 'lineal')
        {
            $this->_formulario .= '</div>';
        }
        
        $this->_formulario .= '</div>';
        
        $this->_formulario .= '</div>';
    }   
    
    private function obtener_input_text($campo)
    {
        
        $clase = '';
        
        $input = $this->obtener_input_standar($campo);
       
        $input['type'] = 'text';
        
        $this->_formulario .= '<div class="col-sm-' . $this->_columnas . '">';
        
        $this->_formulario .= '<div class="form-group">';
        
        if( $this->_estilo == 'lineal')
        {
            $clase = ' class="col-sm-4 control-label" ';
        }
        
        $this->_formulario .= '<label for="input_' . $campo['campo'] . '" ' . $clase . '> ' . $input['caption'] . '</label>';
        
        if( $this->_estilo == 'lineal')
        {
            $this->_formulario .= '<div class="col-sm-8">';
        }
        
        $this->_formulario .= form_input($input);
        
        if( $this->_estilo == 'lineal')
        {
            $this->_formulario .= '</div>';
        }
        
        $this->_formulario .= '</div>';
        
        $this->_formulario .= '</div>';
    }    
    
    
    private function obtener_input_standar($campo)
    {
        $input = array();
        
        $input['id']        = 'MC_' . $campo['campo'];
        
        $input['name']      = 'MC_input[' . $campo['campo'] . ']';
        
        $input['caption']   = $campo['caption'];
        
        $input['class']     = 'MC_input form-control ';
        
        $input['class']    .= 'MC_' . $campo['tipo'] . ' ';
        
        $input['class']    .= (isset($campo['mayusculas']) && $campo['mayusculas'] == TRUE ) ? 'MC_mayusculas ' : '';
        
        $input['class']    .= (isset($campo['requerido']) && $campo['requerido'] == TRUE && $this->_tipo_formulario != 'buscar' ) ? 'MC_requerido ' : '';
        
        $input['placeholder'] = (isset($campo['placeholder']) ) ? $campo['placeholder'] : $campo['caption'];
        
        $input['maxlength'] = (isset($campo['maxlength']) ) ? $campo['maxlength'] : 100;
        
        return $input;
    }
    
    private function obtener_botones($id_blocke)
    {
        $botones  = '<div class="additional-btn">';
        $botones .= '<button type="submit" class="btn btn-default btn_principal">Buscar</button>';
        $botones .= '<a class="additional-icon" href="#" data-toggle="collapse" data-target="#' . $id_blocke . '-form"><i class="fa fa-chevron-down"></i></a>';
        $botones .= '<a class="additional-icon" href="#"><i class="fa fa-question-circle"></i></a>';
        $botones .= '</div>';
        
        return $botones;
    }
}