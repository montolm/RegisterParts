<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of password_model
 *
 * @author montolio
 */
class Password_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function verifyEmail($email) {
        $this->db->where('email', $email);
        $consulta = $this->db->get('user');
        if ($consulta->num_rows() == 0):
            return 0;
        else:
            return 1;
        endif;
    }

}
