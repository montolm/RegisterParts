<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of category_control
 *
 * @author montolio
 */
class Category_control extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('api_model');
        $this->load->model('category_model');
    }

    public function index() {
        $this->load->view('category');
    }

    /* Llama la vista user */

    function urlCategory() {
        redirect($this->config->item('CONSTANT_LOADVIEW') . 'category');
    }

    function urlCategoryConsult() {
        //$this->load->view('consultas/category_c');
        redirect($this->config->item('CONSTANT_LOADVIEW_C') . 'category_c');
    }

    /* Inserta categoria */

    public function createCategory() {
        $user_name = $this->session->userdata('username');
        $id_categorySum = $this->api_model->getMaxNUMId('category', 'id_category') + 1;
        $user_id_exist = $this->api_model->getId('user', 'username', 'id_username', $user_name);
        $name_category = $this->input->post('categoria');
        $creation_date = date("y-m-d", time());
        $fec_actu = date("y-m-d", time());
        $mca_inh = 'N';
        $result = $this->category_model->createCategoryModel($id_categorySum, $name_category, $creation_date, $fec_actu, $mca_inh, $user_id_exist);
        $returnValue = $this->api_model->getException($result);
        if ($returnValue == 1) {
            redirect($this->config->item('CONSTANT_LOADVIEW') . 'category');
        }
    }

    public function updateCategory() {

        $id_category = $this->input->post('editIDCategory');
        $name_category = $this->input->post('nameCategory');
        $inh_category = $this->input->post('inhaCategory');
        $user_name = $this->session->userdata('username');
        $user_id_exist = $this->api_model->getId('user', 'username', 'id_username', $user_name);
        $fec_actu = date("y-m-d", time()); 
        if ($id_category != '' && $name_category != '' && $inh_category != '' && $user_name != '' && $fec_actu != '') {
            $datos = array("name_category" => $name_category,
                "mca_inh" => $inh_category,
                "id_username" => $user_id_exist,
                "fec_actu" => $fec_actu);
            echo $result = $this->category_model->updateCategoryModel($id_category, $datos);
        } else {
            echo 'FALSE';
        }
    }

    public function deleteCategory() {
        $id_category = $this->input->post('idDeletect');
        if ($id_category !== '') {
            echo $result = $this->category_model->deleteCategoryModel($id_category);
        } else {
            echo "FALSE";
        }
    }

    /* Retorna todas las categorias existentes */

    public function consultCategory() {
        $data = array(
            'categoria' => $this->category_model->consultCategoryModel()
        );
        /* Refactorizar mas adelante para colocar la llamada al metodo CONSTANT_LOADVIEW_C y asi esconder
          el controlador llamado para mas seguridad de la app. */
        $this->load->view('consultas/category_c', $data);
    }

}
