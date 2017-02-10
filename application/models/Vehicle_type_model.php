<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VehicleType_model
 *
 * @author montolio
 */
class Vehicle_type_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function createVehicleType($datos) {
        $insert = $this->db->insert('vehicle_type', $datos);
        if ($insert > 0) {
            return $insert;
        } else {
            return 0;
        }
    }

}
