<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Menu_control extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    /* Llama la vista login */

    function urlLogin() {
        $this->session->sess_destroy();
        redirect($this->config->item('CONSTANT_LOADVIEW') . 'login');
    }

}
