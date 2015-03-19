<?php

class MD_usuarios extends CI_Model 
{
    function bitacora($datos)
    {
        $this->db->insert('bitacora',$datos);
    }
}

?>