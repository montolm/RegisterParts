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

    /*Inserta categoria*/
    public function createCategory() {
        $id_categorySum = $this->api_model->getMaxNUMId('category') + 1;
        $name_category = $this->input->post('categoria');
        $creation_date = date("y-m-d", time());
        $fec_actu = date("y-m-d", time());
        $mca_inh = 'N';
        $user_name = $this->session->userdata('username');
        $result = $this->category_model->createCategoryModel($id_categorySum, $name_category, $creation_date, $fec_actu, $mca_inh, $user_name);
        if ($result == 'S') {
            
            redirect($this->config->item('CONSTANT_LOADVIEW') . 'category');
        }
    }

    public function updateCategory() {
        
    }

    public function deleteCategory() {
        
    }
    /*Retorna todas las categorias existentes*/
    public function consultCategory() {
        $data = array(
            'categoria' => $this->category_model->consultCategoryModel()
        );
        /*Refactorizar mas adelante para colocar la llamada al metodo CONSTANT_LOADVIEW_C y asi esconder
        el controlador llamado para mas seguridad de la app. */
        $this->load->view('consultas/category_c', $data);
    }

}
