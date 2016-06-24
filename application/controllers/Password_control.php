<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of password_control
 *
 * @author montolio
 */
class Password_control extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('password_model');
        $this->load->library('email');
    }

    public function index() {
        $this->load_view('password');
    }

    /* Llama la vista user */

    public function urlPassword() {
        redirect($this->config->item('CONSTANT_LOADVIEW') . 'password' . '');
    }

    /* Envia correo usuario y password se llamara de la funcion emailExist */

    public function sendPassword() {
        echo 'ENTROOO';
    }

    /* Retorna si existe el correo via ajax */

    public function emailExist() {
        $email = $this->input->post('fullName');
        $verify_email = $this->password_model->verifyEmail($email);
        if ($verify_email === 1) {
            return "true";
        } else {
            return 'false';
        }
    }
   
    public function sendMail() {
        $emalExist = $this->emailExist();
        if ($emalExist === 'true') {
//            $this->email->from('manueljax@gmail.com');
//            $this->email->to('manuel.montolio.g@gmail.com');
//            $this->email->cc('');
//            $this->email->subject('probando');
//            $this->email->message('Esta es una prueba de envio de correo..');
//            $this->email->send();
            echo 'true';
        } else {
            echo 'false';
        }
        // $this->email->print_debugger('password');
    }

}
