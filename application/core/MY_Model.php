<?php

class MY_Model extends CI_Model {
    protected $_tabla_origen;
    protected $_tabla_relacion;
    protected $_campo_union;
    protected $_campo_relacion;
    protected $_campo_ordenar;
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function obtener_campo_relacion()
    {
        return $this->_campo_relacion;
    }
    
    public function obtener_arreglo()
    {
        $arreglo = array();
        
        $resultado = $this->db->get( $this->_tabla_origen )->result();
        
        $campo = $this->_campo_ordenar;
        
        foreach( $resultado as $dato )
        {
            $arreglo[ $dato->id ] = $dato->$campo;
        }
        
        return $arreglo;
    }
    
    public function obtener_por_id( $id )
    {
        return $this->db->where("id", $id)->get($this->_tabla_origen)->row();   
    }
    
    public function obtener_por_campo_relacion( $campo_relacion_id )
    {
        return $this->db->select("a.*")
                ->from($this->_tabla_origen . " a")
                ->join($this->_tabla_relacion . " b", "a.id = b.".$this->_campo_union)
                ->where("b.".$this->_campo_relacion, $campo_relacion_id )
                ->get()
                ->row();
    }
    
    public function obtener_todos( $id )
    {
        return $this->db->select("a.*")
                ->from($this->_tabla_origen . " a")
                ->join($this->_tabla_relacion . " b", "a.id = b.".$this->_campo_union)
                ->where("b.".$this->_campo_relacion, $id )
                ->order_by($this->_campo_ordenar )
                ->get()
                ->result();
    }
    
    public function nuevo( $datos )
    {
        $this->db->set( $datos )->insert( $this->_tabla_origen );
        
        return $this->db->insert_id();        
    }
    
    public function actualizar( $datos )
    {
        $id = $datos['id'];
        
        unset( $datos['id'] );
        
        $this->db->where('id', $id);
        
        $resultado = $this->db->update($this->_tabla_origen , $datos );
        
        return $resultado;
    }
    
    public function relacionar( $campo_relacion, $campo_union )
    {
        $this->db->set("{$this->_campo_relacion}", $campo_relacion );
        $this->db->set("{$this->_campo_union}", $campo_union );
        $this->db->insert( $this->_tabla_relacion );        
        
        return $this->db->insert_id();
    }
    
    public function eliminar( $campo_relacion, $datos )
    {
        if( $this->validar_datos( $campo_relacion, $datos) )
        {
            $this->eliminar_datos( $datos );
            $this->eliminar_relacion( $campo_relacion, $datos );
            return true;
        }
        return false;
    }
    
    private function eliminar_datos( $datos )
    {
        foreach( $datos as $dato )
        {
            $this->db->delete($this->_tabla_origen, array('id' => $dato));             
        }
    }
    
    private function eliminar_relacion( $campo_relacion, $datos )
    {
        foreach( $datos as $dato )
        {
            $this->db->delete($this->_tabla_relacion, array($this->_campo_relacion => $campo_relacion, $this->_campo_union => $dato));        
        }
    }
    
    private function validar_datos( $campo_relacion, $datos )
    {
        foreach( $datos as $dato )
        {
            $this->db->where( $this->_campo_relacion, $campo_relacion );
            $this->db->where( $this->_campo_union, $dato );
            
            if( $this->db->get( $this->_tabla_relacion )->num_rows() == 0 )
            {
                return false;
            }
        }
        return true;
    }
    
    public function obtener_por_nombre( $id, $buscar = '', $ordenar_por = '')
    {
        $ordenar_por = ( empty($ordenar_por)) ? $this->_campo_ordenar : $ordenar_por;
        return $this->db->select("a.*")
                ->from($this->_tabla_origen . " a")
                ->join($this->_tabla_relacion . " b", "a.id = b.".$this->_campo_union)
                ->where("b.".$this->_campo_relacion, $id )
                ->like("a.".$this->_campo_ordenar, $buscar)
                ->order_by($ordenar_por )
                ->get()
                ->result();
    }
    
    public function query($sql)
    {
        return $this->db->query($sql)->result();
    }
}

?>
