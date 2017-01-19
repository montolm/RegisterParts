<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Generation_model
 *
 * @author montolio
 */
class Generation_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /* Inserta Generacion por modelos de vehiculos*/

    public function createGeneration($datos) {
        $insert = $this->db->insert('generation_model', $datos);
        if ($insert > 0) {
            return $insert;
        } else {
            return 0;
        }
    }

    /* Inserta Generacion por cada modelo */

    public function createGenerationModel($datos) {
        $insert = $this->db->insert('generation_model', $datos);
        if ($insert > 0) {
            return $insert;
        } else {
            return 0;
        }
    }

    /* Retorna generacion definida para cada modelo de vehiculo */

    public function consultGenerationModel() {
        $query = $this->db->query("select a.id_model,b.model_name,a.start_generation,a.end_generation,a.fec_actu,a.mca_inh,c.username
                                    from generation_model a
                                   inner join vehicle_model b
                                     on a.id_model =  b.id_model
                                   inner join user c
                                     on c.id_username = a.id_username;");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

}
