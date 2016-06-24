<?php

class Home_control extends CI_Controller {

    function __construct() {
        parent::__construct();
        //$this->load->model('usuario_model');
        //$this->load->helper('date');
    }

    function index() {
        $this->load->view('home');
        
    }

    /* Llama la vista user */
    function urlLogin() {

        $viewUsuario = 'login';
        //esto va en una constante
        redirect('/helpers/api/loadView/' . $viewUsuario . '');
    }

}
