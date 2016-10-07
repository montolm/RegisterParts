<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Make_model
 *
 * @author montolio
 */
class Make_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /* Inserta marca */
    public function createMakeModel($datos) {
        $insert = $this->db->insert('make', $datos);
        if ($insert > 0) {
            return $insert;
        } else {
            return 0;
        }
    }
    /*Actualiza la marca seleccionada*/
    public function updateMakeModel($id_vehicleMotor, $datos) {
        $this->db->where('id_vehicle_make', $id_vehicleMotor);
        $this->db->update('make', $datos);
        $affect = $this->db->affected_rows();
        if ($affect > 0) {
            return 'TRUE';
        } else {
            return 'FALSE';
        }
    }
   /*Elimina la marca seleccionada*/
    public function deleteMakeModel($idCategory) {

        $this->db->where('id_type_vehicle_motor', $idCategory);
        $this->db->delete('type_vehicle_motor');
        $affect = $this->db->affected_rows();
        if ($affect > 0) {
            return 'TRUE';
        } else {
            return 'FALSE';
        }
    }

    /*Retorna las marcas seleccionada*/

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

}
