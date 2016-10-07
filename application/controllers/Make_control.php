<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of make_control
 *
 * @author montolio
 */
class Make_control extends CI_Controller {

    //put your code here
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('api_model');
        $this->load->model('make_model');
    }

    public function index() {
        $this->load->view('make');
    }

    public function urlMake() {

        redirect($this->config->item('CONSTANT_LOADVIEW') . 'make');
    }

    function urlMakeConsult() {
        //$this->load->view('consultas/make_c');
        redirect($this->config->item('CONSTANT_LOADVIEW_C') . 'make_c');
    }

    /* Inserta Marca de vehiculo */

    public function createMake() {
        $user_name = $this->session->userdata('username');
        $id_make_Sum = $this->api_model->getMaxNUMId('make', 'id_vehicle_make') + 1;
        $user_id_exist = $this->api_model->getId('user', 'username', 'id_username', $user_name);
        $name_vehicle_make = $this->input->post('name_make');
        $creation_date = date("y-m-d", time());
        $fec_actu = date("y-m-d", time());
        $mca_inh = 'N';
       //echo $user_id_exist.' '.$name_vehicle_make;
        if ($user_id_exist > 0 & $name_vehicle_make != '') {
            $datos = array("id_vehicle_make" => $id_make_Sum,
                "name_vehicle_make" => $name_vehicle_make,
                "creation_date" => $creation_date,
                "fec_actu" => $fec_actu,
                "mca_inh" => $mca_inh,
                "id_username" => $user_id_exist);
            $result = $this->make_model->createMakeModel($datos);
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
  /* Actualiza Marca de vehiculo */
    public function updateMake() {
        $user_name = $this->session->userdata('username');
        if ($user_name != FALSE) {
            $id_make = $this->input->post('make');
            $nam_make = $this->input->post('nameMake');
            $inha_make = $this->input->post('inhaMake');
            $user_id_exist = $this->api_model->getId('user', 'username', 'id_username', $user_name);
            $fec_actu = date("y-m-d", time());
            // echo $id_make . ' ' . $type_make . ' ' . $inha_make . ' ' . $user_name . ' ' . $fec_actu . ' ' . $user_id_exist;
            if ($id_make != '' & $nam_make != '' & $inha_make != '' && $user_id_exist != '' && $fec_actu != '') {
                $datos = array("name_vehicle_make" => $nam_make,
                    "mca_inh" => $inha_make,
                    "fec_actu" => $fec_actu,
                    "id_username" => $user_id_exist);
                echo $result = $this->make_model->updateMakeModel($id_make, $datos);
            } else {
                echo 'FALSE';
            }
        } else {
            redirect($this->config->item('CONSTANT_LOADVIEW') . 'login');
        }
    }
    /* Borra Marca de vehiculo */
    public function deleteMake() {
        $id_category = $this->input->post('idDeletect');
        if ($id_category !== '') {
            echo $result = $this->make_model->deleteCategoryModel($id_category);
        } else {
            echo "FALSE";
        }
    }

   /* Retorna las Marcas de vehiculos existentes */

    public function consultMake() {

        $data = array(
            'make' => $this->make_model->consultMake()
        );
        /* Refactorizar mas adelante para colocar la llamada al metodo CONSTANT_LOADVIEW_C y asi esconder
          el controlador llamado para mas seguridad de la app. */
        $this->load->view('consultas/make_c', $data);
    }

}
