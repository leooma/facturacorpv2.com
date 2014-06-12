<?php

class MY_Controller  extends CI_Controller {
    protected $_datos = array();
    protected $_vistas = array();    
    private $_servidor = array();
    protected $_modulo = false;
    protected $_accion = false;
    protected $_modelo = false;

    public function __construct()
    {
        parent::__construct();
        
        $this->_servidor['prueba'] = array(
            'servidor'      => 'http://facelei2.dns2go.com/Pruebas/ServiciosWebTercerosFACELEI.asmx?wsdl',
            'contribuyente' => '1',
            'password'      => '3f178',
            );
        
        $this->_servidor['produccion'] = array(
            'servidor'      => 'http://facelei2.dns2go.com/Produccion/ServiciosWebTercerosFACELEI.asmx?wsdl',
            'contribuyente' => '611',
            'password'      => '8d96f',
            );     
        
        $this->_modulo = $this->uri->segment(1);
        
        $this->_modelo = ucfirst($this->_modulo) . '_model';
        
        $this->_accion = $this->uri->segment(2);
        
        $this->definir_datos('base_url', base_url());
    }
    
    private function _armar_menu()
    {
        $this->Menu = new Menu();
        
        $this->definir_datos('permisos', $this->session->userdata('permisos'));
        
        $this->definir_datos('nombre_completo', $this->session->userdata('nombre_completo'));
        
        $menu = $this->Menu->crear_menu( $this->session->userdata('permisos') );
        
        $this->definir_datos('menu', $menu);
    }
    
    protected function definir_principal()
    {             
        $this->Formulario = new Formulario();
        
        $this->Formulario->definir_variables($this->_datos, $this->obtener_modulo(), 'buscar');
        
        $this->Formulario->armar_formulario();
        
        $this->definir_datos('principal', $this->Formulario->obtener_formulario());
    }
    
    protected function definir_yml()
    {
        $datos = Spyc::YAMLLoad('yml/' . $this->obtener_modulo() . '.yml');
        
        $this->_datos = array_merge($this->_datos, $datos );
    }
    
    public function index()
    {
        redirect(base_url($this->obtener_modulo() . '/listar'));
    }
    
    public function inicializar()
    {
        $this->definir_yml();
        
        $this->_armar_menu();
        
        $this->definir_principal();
    }
    
    public function listar()
    {
        $this->inicializar();        
        
        $this->_datos['listado'] = '';
        
        if( $this->input->post())
        {
            $modelo = $this->_modelo;
            
            $registros = $this->$modelo->obtener_todos($this->session->userdata('usuario_id'));  
            error_log(print_r($registros,true));
            $this->_datos['listado'] = $this->load->view('listar', array('registros' => $registros), true);            
        }
        
        $this->load->vars($this->obtener_datos());
        
        $this->load->view('principal');
    }
    
    public function definir_datos($variable, $informacion)
    {
        $this->_datos[$variable] = $informacion;
    }
    
    public function obtener_modulo()
    {
        return $this->_modulo;
    }       
    
    public function obtener_servidor($servidor = 'prueba')
    {
        return $this->_servidor[$servidor];
    }    
    
    public function obtener_datos()
    {
        return $this->_datos;
    }
}