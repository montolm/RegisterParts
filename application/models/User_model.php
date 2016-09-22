<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_model
 *
 * @author montolio
 */
class User_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    /* Esta funcion ses utilizada para validar
      la existencia del usuario introducido en el 
     * formulario user y es usada desde JS ajax */

    public function verifyUsername($username) {
        $this->db->where('username', $username);
        $consulta = $this->db->get('user');
        if ($consulta->num_rows() == 0):
            return 0;
        else:
            return 1;
        endif;
    }
    
    /* Esta funcion ses utilizada para validar
      la existencia del email introducido en el
      formulario user y es usada desde JS ajax */

    public function verifyUserEmail($userEmail) {
        $this->db->where('email', $userEmail);
        $consulta = $this->db->get('user');
        if ($consulta->num_rows() == 0):
            return 0;
        else:
            return 1;
        endif;
    }

    public function createUserModel($id_userSum,$name, $lastname, $username, $password, $email,$creation_date,$fec_actu) {
        $this->id_username =  $id_userSum;
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
        $this->last_name = $lastname;
        $this->email = $email;
        $this->creation_date = $creation_date;
        $this->fec_actu = $fec_actu;
        $this->mca_inh = 'N';
//        echo 'model '.$name.' '.$lastname.' '.$username.' '.$password.' '.$email;
        $this->db->insert('user', $this);
    }

    public function updateUserModel() {
        
    }

    public function deleteUserModel() {
        
    }

    public function consultUserModel() {
        
    }

}
