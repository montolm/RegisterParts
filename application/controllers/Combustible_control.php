<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Combustible
 *
 * @author montolio
 */
class Combustible_control extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('api_model');
        $this->load->model('combustible_model');
    }

    public function index() {
        $this->load->view('combustible');
    }

    public function urlCombustible() {

        redirect($this->config->item('CONSTANT_LOADVIEW') . 'combustible');
    }

    function urlCombustibleConsult() {
        //$this->load->view('consultas/combustible_c');
        redirect($this->config->item('CONSTANT_LOADVIEW_C') . 'combustible_c');
    }

    /* Inserta tipo de combustible */

    public function createCombustible() {
        $user_name = $this->session->userdata('username');
        $id_combustible_Sum = $this->api_model->getMaxNUMId('combustible', 'id_combustible') + 1;
        $user_id_exist = $this->api_model->getId('user', 'username', 'id_username', $user_name);
        $type_combustible = $this->input->post('name_combustible');
        $creation_date = date("y-m-d", time());
        $fec_actu = date("y-m-d", time());
        $mca_inh = 'N';
        //echo $user_id_exist.' '.$type_combustible;
        if ($user_id_exist > 0 & $type_combustible != '') {
            $datos = array("id_combustible" => $id_combustible_Sum,
                "type_combustible" => $type_combustible,
                "creation_date" => $creation_date,
                "fec_actu" => $fec_actu,
                "mca_inh" => $mca_inh,
                "id_username" => $user_id_exist);
            $result = $this->combustible_model->createCombustibleModel($datos);
            $returnValue = $this->api_model->getException($result);

            if ($returnValue == 1) {
                echo 'TRUE';
            } else {
                echo 'FALSE';
            }
        } else {
            echo 'FALSE';
        }
    }
  
    /* Actualiza tipo de combustible */
    public function updateCombustible() {
        $user_name = $this->session->userdata('username');
       
        if ($user_name != FALSE) {            
            $id_combustible = $this->input->post('combustible');
            $type_combustible = $this->input->post('nameCombustible');
            $inha_combustible = $this->input->post('inhaCombustible');
            $user_id_exist = $this->api_model->getId('user', 'username', 'id_username', $user_name);
            $fec_actu = date("y-m-d", time());
            // echo $id_combustible . ' ' . $type_combustible . ' ' . $inha_combustible . ' ' . $user_name . ' ' . $fec_actu . ' ' . $user_id_exist;
            if ($id_combustible != '' & $type_combustible != '' & $inha_combustible != '' && $user_id_exist != '' && $fec_actu != '') {
                $datos = array("type_combustible" => $type_combustible,
                    "mca_inh" => $inha_combustible,
                    "fec_actu" => $fec_actu,
                    "id_username" => $user_id_exist);
                echo $result = $this->combustible_model->updateCombustibleModel($id_combustible, $datos);
            } else {
                echo 'FALSE';
            }
        } else {
            redirect($this->config->item('CONSTANT_LOADVIEW') . 'login');
        }
    }
     /*Elimina tipo de combustible */
    public function deleteCombustible() {
        $id_category = $this->input->post('idDeletect');
        if ($id_category !== '') {
            echo $result = $this->combustible_model->deleteCategoryModel($id_category);
        } else {
            echo "FALSE";
        }
    }

    /* Retorna los tipos de combustibles existentes*/ 
    public function consultCombustible() {

        $data = array(
            'combustible' => $this->combustible_model->consultCombustible()
        );
        /* Refactorizar mas adelante para colocar la llamada al metodo CONSTANT_LOADVIEW_C y asi esconder
          el controlador llamado para mas seguridad de la app. */
        $this->load->view('consultas/combustible_c', $data);
    }

}
