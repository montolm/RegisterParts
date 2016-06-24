<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    /* Esta funcion ses utilizada para validad
      la existencia del usuario introducido en el login
      y es usada desde JS ajax */

    public function verifyUsername($username) {
        $this->db->where('username', $username);
        $consulta = $this->db->get('user');
        if ($consulta->num_rows() == 0):
            return 0;
        else:
            return 1;
        endif;
    }

    /* Retorna cero o uno dependiendo si existe el usuario y clave son correctas */

    function validateUserModel($user_name, $password) {
        $this->db->where('username', $user_name);
        $this->db->where('password', $password);
        $this->db->where('mca_inh', 'N');

        $query = $this->db->get('user');
        if ($query->num_rows() == 0) :
            //usuario no existe
            return 0;
        else :
            //Usuario y contraseña correcta
            return 1;
        endif;
    }


}
