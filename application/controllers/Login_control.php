<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH')) {
    exit('No direct script access');
}

class Login_control extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('Login_model');
        
    }

    function index() {
        $this->load->view('login');
       
    }

    /* Retorna si existe el usuario via ajax */

    public function userExist() {
        $username = $this->input->post('fullName');
        $verify_username = $this->Login_model->verifyUsername($username);
        if ($verify_username == 1) {
            echo "true";
        } else {
            echo 'false';
        }
    }

    /* Llama la vista user */

    function urlUser() {
        redirect($this->config->item('CONSTANT_LOADVIEW') . 'user' . '');
    }

    /* Consulta si el usuario y clave existen como usuario activo y registrado. */

    function validateLogin() {

        $user_name = $this->input->post('user_name');
        $password = $this->input->post('password');

        if ($user_name !== '' && $password !== '') {

            $register = $this->Login_model->validateUserModel($user_name, $password);

            /* Si es cero no existe usuario de lo contrario existe */
            if ($register == 0) {
                redirect($this->config->item('CONSTANT_LOADVIEW') . 'login');
            } else {

                redirect($this->config->item('CONSTANT_LOAD_USER_SESION') . $user_name);
            }
        } else {
            redirect($this->config->item('CONSTANT_LOADVIEW') . 'login');
        }
    }

}
