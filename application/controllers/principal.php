<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Cristhian Narvaez
 * @copyright 2015
 */

class Principal extends CI_Controller 
{
    /**
     * Funcion por default
     * @return none
     */
    public function index()
    {
        $this->load->library('ion_auth');
        $this->load->helpers(array('form','html'));
        
        //VERIFICA SI INICIO SESION
        if (!$this->ion_auth->logged_in())
			redirect('auth/login', 'refresh');
        
        //SI ESTA LA SESION INICIADA
        else
        {
            $this->load->view('vw_busqueda');
        }
    }    
}
/* End of file principal.php */
/* Location: ./application/controllers/principal.php */