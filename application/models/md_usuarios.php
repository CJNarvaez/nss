<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MD_usuarios extends CI_Model 
{
    function bitacora($datos)
    {
        $this->db->insert('bitacora',$datos);
    }
}

/* End of file md_usuarios.php */
/* Location: ./application/models/md_usuarios.php */