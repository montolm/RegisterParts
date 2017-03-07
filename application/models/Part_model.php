<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Part_model
 *
 * @author montolio
 */
class Part_model extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function createPart($datos) {
        $insert = $this->db->insert('part', $datos);
        if ($insert > 0) {
            return $insert;
        } else {
            return 0;
        }
    }

    public function updatePart($id_vehicleMotor, $datos) {
        $this->db->where('id_part', $id_vehicleMotor);
        $this->db->update('part', $datos);
        $affect = $this->db->affected_rows();
        if ($affect > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function consultPart() {
        $query = $this->db->query("select a.id_part,a.name_part,b.name_category,a.creation_date,a.fec_actu,a.mca_inh,c.username
                                    from part a
                                   inner join category b
                                      on a.id_category =  b.id_category
                                   inner join user c
                                      on a.id_username = b.id_username
                                   order by id_part;");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    
}
