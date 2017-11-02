<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of make_vehicle_motor_model
 *
 * @author montolio
 */
class make_vehicle_motor_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /* Inserta marca */

    public function createMakeVehicleMotor($datos) {
        $insert = $this->db->insert('make_vehicle_motor', $datos);
        if ($insert > 0) {
            return $insert;
        } else {
            return 0;
        }
    }

    /* Actualiza el tipo de vehiculo de motor */

    public function updateMakeVehicleMotor($id_make_vehicle_type_motor, $datos) {
        $this->db->where('id_make_vehicle_motor', $id_make_vehicle_type_motor);
        $this->db->update('make_vehicle_motor', $datos);
        $affect = $this->db->affected_rows();
        if ($affect > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /* Retorna las marcas seleccionada */

    public function consultMake() {
        $query = $this->db->query("select a.id_vehicle_make,a.name_vehicle_make,a.creation_date,a.fec_actu,a.mca_inh,b.username
                                    from make a
                                        inner join user b
                                        on a.id_username = b.id_username
                                   order by a.id_vehicle_make;");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    /* Retorna los tipos de vehiculos de motor por marca */

    public function consultMakeVehicleMotor() {
        $query = $this->db->query("select a.id_make_vehicle_motor,b.name_vehicle_make,d.type_name_vehicle,a.creation_date,date_update,a.mca_inh,e.username
                                    from make_vehicle_motor a
                                   inner join make b 
                                     on  a.id_make = b.id_vehicle_make
                                   inner join type_vehicle_motor d
                                     on  a.id_vehicle_motor = d.id_type_vehicle_motor
                                   inner join user e
                                      on a.id_user = e.id_username
                                   order by a.id_make,b.name_vehicle_make;");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

}
