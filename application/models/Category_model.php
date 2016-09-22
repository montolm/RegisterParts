<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of category_model
 *
 * @author montolio
 */
class Category_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /* Inserta categoria */

    public function createCategoryModel($id_categorySum, $name_category, $creation_date, $fec_actu, $mca_inh, $user_name) {
        $this->id_category = $id_categorySum;
        $this->name_category = $name_category;
        $this->creation_date = $creation_date;
        $this->fec_actu = $fec_actu;
        $this->mca_inh = $mca_inh;
        $this->id_username = $user_name;
        $value = $this->db->insert('category', $this);
        if ($value == 1) {
            return $value;
        } else {
            return 0;
        }
    }

    public function updateCategoryModel($idCategory, $datos) {

        $this->db->where('id_category', $idCategory);
        $this->db->update('category', $datos);
        $affect = $this->db->affected_rows();
// echo $affect;
        if ($affect > 0) {
            return 'TRUE';
        } else {
            return 'FALSE';
        }
    }

    public function deleteCategoryModel($idCategory) {

        $this->db->where('id_category', $idCategory);
        $this->db->delete('category');
        $affect = $this->db->affected_rows();
        if ($affect > 0) {
            return 'TRUE';
        } else {
            return 'FALSE';
        }
    }

    /* Retorna todas las categorias existentes */

    public function consultCategoryModel() {

        $query = $this->db->query("select a.id_category,a.name_category,a.creation_date,a.fec_actu,a.mca_inh,b.username
                                    from category a
                                  inner join user b
                                    on a.id_username = b.id_username");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

}
