<?php

/* Cambiar el nombre debe de ser Usuario_CI */

class User_control extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('api_model');
        $this->load->helper('date');
    }

    function index() {
        $this->load->view('user');
    }

    /* Retorna si existe el email via ajax */

    public function emailExist() {
        $userEmail = $this->input->post('fullName');
        //echo 'ENTROOO ' . $useremail;
        $verify_userEmail = $this->user_model->verifyUserEmail($userEmail);
        if ($verify_userEmail == 1) {
            echo "true";
        } else {
            echo 'false';
        }
    }

    /* Retorna si existe el usuario via ajax */

    public function userExist() {
        $userName = $this->input->post('fullName');
        //echo 'ENTROOO ' . $useremail;
        $verify_userName = $this->user_model->verifyUsername($userName);
        if ($verify_userName == 1) {
            echo "true";
        } else {
            echo 'false';
        }
    }

    /* Llama la vista user */

    function urlUser() {
        //$this->load->view('user');
        redirect($this->config->item('CONSTANT_LOADVIEW') . 'user' . '');
    }

    function createUser() {
        /* falta validar que no sea nulo para entrar. */
        $id_userSum = $this->api_model->getMaxNUMId('user', 'id_username') + 1;
        $name = $this->input->post('name');
        $lastname = $this->input->post('lastname');
        $username = $this->input->post('user');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $creation_date = date("Y-m-d", time());
        $fec_actu = date("Y-m-d", time());
        // echo($name.' '.$lastname.' '.$username.' '.$password.' '.$email);

        $this->user_model->createUserModel($id_userSum, $name, $lastname, $username, $password, $email, $creation_date, $fec_actu);
        redirect($this->config->item('CONSTANT_LOADVIEW') . 'login' . '');
    }

    public function updateUser() {
        
    }

    public function deleteUser() {
        
    }

    public function consultUser() {
        
    }

}
