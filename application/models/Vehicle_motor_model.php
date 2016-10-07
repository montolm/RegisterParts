<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vehicle_motor_model
 *
 * @author montolio
 */
class Vehicle_motor_model extends CI_Model {

//put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /* Inserta categoria */

    public function createVehicleMotorModel($datos) {
        $insert = $this->db->insert('type_vehicle_motor', $datos);
        if ($insert > 0) {
            return $insert;
        } else {
            return 0;
        }
    }

    public function updateVehicleMotorModel($id_vehicleMotor, $datos) {
        $this->db->where('id_type_vehicle_motor', $id_vehicleMotor);
        $this->db->update('type_vehicle_motor', $datos);
        $affect = $this->db->affected_rows();
        if ($affect > 0) {
            return 'TRUE';
        } else {
            return 'FALSE';
        }
    }

    public function deleteVehicleMotorModel($idCategory) {

        $this->db->where('id_type_vehicle_motor', $idCategory);
        $this->db->delete('type_vehicle_motor');
        $affect = $this->db->affected_rows();
        if ($affect > 0) {
            return 'TRUE';
        } else {
            return 'FALSE';
        }
    }

    /* Retorna todas las categorias existentes */

    public function consultVehicleMotor() {

        $query = $this->db->query("select a.id_type_vehicle_motor,a.type_name_vehicle,a.creation_date,a.fec_actu,a.mca_inh,b.username
                                    from type_vehicle_motor a
                                    inner join user b
                                    on a.id_username = b.id_username
                                order by a.id_type_vehicle_motor;");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

}
