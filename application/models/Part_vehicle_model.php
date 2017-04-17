<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Part_vehicle_model
 *
 * @author montolio
 */
class Part_vehicle_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /* Inserta piza por tipo de vehiculo*/
    public function createPartVehicle($datos) {
        $insert = $this->db->insert('part_vehicle_type', $datos);
        if ($insert > 0) {
            return $insert;
        } else {
            return 0;
        }
    }

}
