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
        $this->load->model('category_model');
    }

    public function index() {
        $this->load->view('category');
    }
    
    /* Llama la vista user */

    function urlCategory() {
        redirect($this->config->item('CONSTANT_LOADVIEW') . 'category' . '');
    }

    public function createCategory() {
        
    }

    public function updateCategory() {
        
    }

    public function deleteCategory() {
        
    }

    public function consultCategory() {
        
    }

}
