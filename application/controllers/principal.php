<?php

/**
 * @author Cristhian Narvaez
 * @copyright 2015
 */

class Principal extends CI_Controller 
{
    //FUNCION DEFAULT
    function index()
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
?>