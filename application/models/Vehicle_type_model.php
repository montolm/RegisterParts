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

    public function updateVehicleTypeModel($id_vehicleMotor, $datos) {
        $this->db->where('id_vehicle_type', $id_vehicleMotor);
        $this->db->update('vehicle_type', $datos);
        $affect = $this->db->affected_rows();
        if ($affect > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function consultVehicleType() {
        $query = $this->db->query(" select a.id_vehicle_type,a.name_vehicle_type,b.type_name_vehicle,c.name_vehicle_make,d.model_name,
                                            concat (e.start_generation,'/',e.end_generation) generacion,a.fec_actu,a.mca_inh,f.username
                                      from vehicle_type a
                                     inner join type_vehicle_motor b
                                        on a.id_type_vehicle_motor = b.id_type_vehicle_motor
                                     inner join make c
                                        on a.id_vehicle_make =  c.id_vehicle_make
                                     inner join vehicle_model d
                                        on a.id_model  = d.id_model
                                     inner join generation_model e
                                        on a.id_generation = e.id_generation
                                     inner join user f
                                        on a.id_username = f.id_username
                                       order by a.id_vehicle_type; ");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

}
