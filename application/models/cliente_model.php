<?php

class Cliente_model extends MY_Model {    
    
    public function __construct()
    {
        parent::__construct();
        $this->_tabla_origen = 'clientes';
        $this->_tabla_relacion = 'usuarios_clientes';
        $this->_campo_relacion = 'usuario_id';
        $this->_campo_union = 'cliente_id';
        $this->_campo_ordenar = 'razon_social';
    }
    
    public function obtener_permisos($usuario_id)
    {
        return $this->db->select('b.*')
                ->from('usuarios_permisos a')
                ->join('permisos b', 'a.permiso_id = b.id')
                ->where('a.usuario_id', $usuario_id)
                ->order_by('b.orden')
                ->get()
                ->result();
    }
    
    public function autentificar( $usuario, $password )
    {
        $password = md5( $usuario.$password );
        $sql = "SELECT * FROM usuarios WHERE usuario = ? AND password = ? LIMIT 1";
        $resultado = $this->db->query( $sql, array($usuario, $password) );
        
        if( $resultado->num_rows() == 1 )
        {
            return $resultado->row()->id;
            
        }
        return false;
    }
    
    public function validarUsuario( $usuario )
    {
        return $this->db->where('usuario', $usuario)->limit(1)->get('usuarios')->num_rows();
    }
    
    public function get_usuario_por_nombre( $usuario )
    {
        $sql = "SELECT * FROM usuarios WHERE usuario = ? LIMIT 1";
        $resultado = $this->db->query( $sql, array( $usuario ) );
        
        if( $resultado->num_rows() == 1 )
        {
            return $resultado->row();
        }
        return false;
    }
    
    public function actualizar_password( $usuario_id, $nuevo_password )
    {
        $query_str = "UPDATE usuarios SET password = ? WHERE id = ?";
        
        $this->db->query( $query_str, array($nuevo_password, $usuario_id ) );

        return true;
    }
}

?>
