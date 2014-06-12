<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends MY_Controller 
{
    public function __construct() 
    {
        parent::__construct();
    }   
    
    public function index()
    {
        if( $this->session->userdata('usuario_id') === FALSE)
        {
            redirect(base_url('usuario/login'));
        }
    }
    
    public function definir_yml(){}
        
    public function login()
    {         
        if( $this->input->post() )
        {   
            if( $this->session->userdata('usuario_id') > 0 )
            {
                $usuario = $this->Usuario_model->obtener_por_id( $this->session->userdata('usuario_id') );
                
                $this->_obtener_permisos();
                
                $this->session->set_userdata('usuario_id', $usuario->id);
                
                $this->session->set_userdata('correo', $usuario->correo);
                
                $this->session->set_userdata('nombre_completo', $usuario->nombre . ' ' . $usuario->apellido_paterno . ' ' . $usuario->apellido_materno);
                
                redirect(base_url('cliente'));
            }
        }
        
        $this->load->vars($this->obtener_datos());
        
        $this->load->view('login');
    }    
    
    private function _obtener_permisos()
    {
        $permisos = $this->Usuario_model->obtener_permisos( $this->session->userdata('usuario_id') );
        
        $arreglo_permisos = array();
        
        foreach($permisos as $permiso )
        {
            $arreglo_permisos[$permiso->modulo][$permiso->accion] = $permiso;
        }
        
        $this->session->set_userdata('permisos', $arreglo_permisos);
    }
    
    public function validar_usuario()
    {
        $usuario = $this->input->post('usuario');
        
        $password = $this->input->post('password');
        
        $resultado = array('tipo' => 1, 'mensaje' => 'El usuario/contraseña no son correctos.');
                
        $respuesta = $this->Usuario_model->autentificar($usuario, $password);
        
        if( $respuesta !== FALSE)
        {
            $this->session->set_userdata('usuario_id', $respuesta);
            
            $resultado['tipo'] = 3;
            
            $resultado['mensaje'] = 'El usuario se ha logeado correctamente.';
        }
        
        echo json_encode($resultado, true);
        
        exit();
    }
    
    public function salir()
    {
        $this->session->sess_destroy();
        
        $this->session->set_userdata('usuario_logeado', false);
        
        redirect(base_url('usuario/login'));
    }
    
}