<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Combustible_model_control
 *
 * @author montolio
 */
class CombustibleModel_control extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('Combustible_model');
        $this->load->model('Api_model');
        $this->load->model('Vehicle_model');
    }

    function index() {
        $this->load->view('combustible_model');
    }

    public function urlCombustibleModel() {

        redirect($this->config->item('CONSTANT_LOADVIEW') . 'combustible_model');
    }

    function urlCombustibleModelConsult() {
        //$this->load->view('consultas/vehicleModel_c');
        redirect($this->config->item('CONSTANT_LOADVIEW_C') . 'combustible_model_c');
    }

    public function createCombustibleModel() {
        $user_name = $this->session->userdata('username');
        $user_id_exist = $this->Api_model->getId('user', 'username', 'id_username', $user_name);
        $id_model = $this->input->post('vehicleModel');
        $id_combustible = $this->input->post('selectIdCombustible');
        $fec_actu = date("y-m-d", time());
        $mca_inh = 'N';
        if ($user_id_exist > 0) {
            $datos = array("id_combustible" => $id_combustible,
                "id_model" => $id_model,
                "fec_actu" => $fec_actu,
                "mca_inh" => $mca_inh,
                "id_username" => $user_id_exist);
            $result = $this->Combustible_model->createCombustibleModel($datos);
            $returnValue = $this->Api_model->getException($result);
            if ($returnValue == 1) {
                echo 'TRUE';
            } else {
                echo 'FALSE';
            }
        } else {
            echo 'FALSE';
        }
    }

    /* Retorna las modelos por cada marca de vehiculos existentes */

    public function consultVehicleModel() {

        $data = array(
            'vehicleModel' => $this->Vehicle_model->consultVehicleModel(),
            'combustible' => $this->Api_model->Combustibleconsult()
        );

        $this->load->view('combustible_model', $data);
    }

    /* Retorna los combustible definidos para cada modelo */

    public function consultCombustibleModel() {
        $data = array(
            'combustibleModel' => $this->Combustible_model->consultCombustibleModel()
        );
        $this->load->view('consultas/combustible_model_c', $data);
    }

}
