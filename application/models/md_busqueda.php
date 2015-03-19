<?php

/**
 * @author Cristhian Narvaez
 * @copyright 2015
 */

class Md_busqueda extends CI_Model 
{    
    /**
     * FUNCION BUSCAR 
     * @return obj tabla
     */
    public function buscar($curp,$paterno,$materno,$nombre)
    {
        $this->load->library('table');
        $this->load->helpers(array('html'));
        
        $tmpl = array (
                    'table_open'          => '<table class="table table-hover table-bordered table-condensed">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );

        $this->table->set_template($tmpl);
        
        
        //VERIFICA SI HAY DATOS EN LAS VARIABLES
        if($curp != '')
            $this->db->like('curp_benef',$curp);
        if($paterno != '')
            $this->db->like('derh_paterno',$paterno);
        if($materno != '')
            $this->db->like('derh_materno',$materno);
        if($nombre != '')
            $this->db->like('derh_nombre',$nombre);
        
        $this->db->from('vw_imss');
        
        if($this->db->count_all_results() < 100)
        {
            //VERIFICA SI HAY DATOS EN LAS VARIABLES
            if($curp != '')
                $this->db->like('curp_benef',$curp);
            if($paterno != '')
                $this->db->like('derh_paterno',$paterno);
            if($materno != '')
                $this->db->like('derh_materno',$materno);
            if($nombre != '')
                $this->db->like('derh_nombre',$nombre);
            
            $consulta = $this->db->get('vw_imss');
            
            //ESTABLECE LOS TITULOS DE LA TABLA
            $this->table->set_heading('CURP','PATERNO','MATERNO','NOMBRE','ASG DESDE','ASG HASTA','NSS','NACIMIENTO','SEXO','DH HASTA','FOLIO FAM');
            
            //INTRODUCE CADA DATO EN LA TABLA
            foreach($consulta->result() as $dh){
                
                $folio_fam_celda['data'] = $dh->folio_familia;
                if($dh->folio_familia != '')
                    $folio_fam_celda['class'] = 'folioFamLleno';
                else
                    $folio_fam_celda['class'] = 'folioFamVacio';
                    
                $this->table->add_row($dh->curp_benef,$dh->derh_paterno,$dh->derh_materno,$dh->derh_nombre,substr($dh->asg_fdesde,0,10),substr($dh->asg_fhasta,0,10),$dh->nss_dh,substr($dh->fnacimiento,0,10),$dh->sexo,substr($dh->dh_fhasta,0,10),$folio_fam_celda);
            }
            
            //REGRESA LA TABLA COMPLETA
            return $this->table->generate();
        }
        else
            return heading("<strong>TU BUSQUEDA TIENE DEMASIADOS RESULTADOS, POR FAVOR SE MAS ESPECIFICO</strong>".br().img('/img/hamster.jpg'),3,'class="text-center"');
    }    
}

?>