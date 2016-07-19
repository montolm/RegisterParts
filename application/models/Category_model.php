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
        //echo $id_categorySum . ' ' . $name_category . ' ' . $creation_date . ' ' . $fec_actu . ' ' . $mca_inh . ' ' . $user_name;
        $this->id_category = $id_categorySum;
        $this->name_category = $name_category;
        $this->creation_date = $creation_date;
        $this->fec_actu = $fec_actu;
        $this->mca_inh = $mca_inh;
        $this->user_username = $user_name;
        $this->db->insert('category', $this);
        return 'S';
    }

    public function updateCategoryModel($idCategory, $datos) {
 
        $this->db->where('id_category', $idCategory);
        $this->db->update('category', $datos);
        $affect = $this->db->affected_rows();
        if ($affect > 0){
            return 'TRUE';
        }else{
            return 'FALSE';
        }
            
    }

    public function deleteCategoryModel() {
        
    }

    /* Retorna todas las categorias existentes */

    public function consultCategoryModel() {

        $query = $this->db->query("select * from category");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

}
