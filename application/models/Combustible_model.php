<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Combustible_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /* Inserta tipo de combustible */

    public function createCombustibleModel($datos) {
        $insert = $this->db->insert('combustible', $datos);
        if ($insert > 0) {
            return $insert;
        } else {
            return 0;
        }
    }
   /* Actualiza tipos de combustible */
    public function updateCombustibleModel($id_vehicleMotor, $datos) {
        $this->db->where('id_combustible', $id_vehicleMotor);
        $this->db->update('combustible', $datos);
        $affect = $this->db->affected_rows();
        if ($affect > 0) {
            return 'TRUE';
        } else {
            return 'FALSE';
        }
    }
   /* Elimina tipo de combustible */
    public function deleteCombustibleModel($idCategory) {

        $this->db->where('id_type_vehicle_motor', $idCategory);
        $this->db->delete('type_vehicle_motor');
        $affect = $this->db->affected_rows();
        if ($affect > 0) {
            return 'TRUE';
        } else {
            return 'FALSE';
        }
    }

    /* Retorna todos los tipos de combustibles existentes */

    public function consultCombustible() {

        $query = $this->db->query("select a.id_combustible,a.type_combustible,a.creation_date,a.fec_actu,a.mca_inh,b.username
                                    from combustible a
                                        inner join user b
                                        on a.id_username = b.id_username
                                   order by a.type_combustible;");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

}
