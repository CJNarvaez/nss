<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Cristhian Narvaez
 * @copyright 2015
 */

class Busqueda extends CI_Controller 
{
    /**
    * BUSCA EL DERECHOHABIENTE EN LA BASE DE DATOS E IMPRIME EL RESULTADO
    */
    function buscar()
    {
        //$this->output->enable_profiler();
        
        $this->load->library('ion_auth');
        $this->load->helpers('form');
        
        //VERIFICA SI INICIO SESION
        if (!$this->ion_auth->logged_in())
			redirect('auth/login', 'refresh');
        else{
            //GUARDA LOS DATOS EN VARIABLES
            $curp = $this->input->post('curp');
            $paterno = $this->input->post('paterno');
            $materno = $this->input->post('materno');
            $nombre = $this->input->post('nombre');
            
            $this->load->model('md_busqueda');
            
            //echo $this->md_busqueda->buscar($curp,$paterno,$materno,$nombre);
            $datos['tabla'] = $this->md_busqueda->buscar($curp,$paterno,$materno,$nombre);
            $this->load->view('vw_busqueda_resultado',$datos);
        }
    }
}

/* End of file busqueda.php */
/* Location: ./application/controllers/busqueda.php */