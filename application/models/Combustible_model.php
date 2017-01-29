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

    public function createCombustible($datos) {
        $insert = $this->db->insert('combustible', $datos);
        if ($insert > 0) {
            return $insert;
        } else {
            return 0;
        }
    }

    /* Inserta tipo de combustible por cada modelo */

    public function createCombustibleModel($datos) {
        $insert = $this->db->insert('model_combustible', $datos);
        if ($insert > 0) {
            return $insert;
        } else {
            return 0;
        }
    }

    /* Actualiza tipos de combustible */

    public function updateCombustible($id_vehicleMotor, $datos) {
        $this->db->where('id_combustible', $id_vehicleMotor);
        $this->db->update('combustible', $datos);
        $affect = $this->db->affected_rows();
        if ($affect > 0) {
            return 'TRUE';
        } else {
            return 'FALSE';
        }
    }
      /* Actualiza combustible por modelo de vehiculo */
    public function updateCombustibleModel($id_combustibleModel, $datos) {
        $this->db->where('id_combustible_model', $id_combustibleModel);
        $this->db->update('model_combustible', $datos);
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

    /* Retorna los combustible definidos para cada modelo */

    public function consultCombustibleModel() {
        $query = $this->db->query("select a.id_combustible_model,c.type_combustible,b.model_name,a.fec_actu,a.mca_inh,d.username
                                    from model_combustible a
                                   inner join vehicle_model b
                                     on a.id_model = b.id_model
                                   inner join combustible c
                                     on a.id_combustible  = c.id_combustible
                                   inner join user d
                                     on a.id_username = d.id_username
                                   order by a.id_combustible_model;");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

}
