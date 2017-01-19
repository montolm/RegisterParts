<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GenerationModel_control
 *
 * @author montolio
 */
class GenerationModel_control extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('Generation_model');
        $this->load->model('Api_model');
        $this->load->model('Vehicle_model');
    }

    function index() {
        $this->load->view('generation_model');
    }

    public function urlCombustibleModel() {
        redirect($this->config->item('CONSTANT_LOADVIEW') . 'generation_model');
    }

    function urlCombustibleModelConsult() {
        redirect($this->config->item('CONSTANT_LOADVIEW_C') . 'generation_model_c');
    }

    public function createGenerationModel() {
        $user_name = $this->session->userdata('username');
        $user_id_exist = $this->Api_model->getId('user', 'username', 'id_username', $user_name);
        $id_model = $this->input->post('vehicleModel');
        $star_generatioModel = $this->input->post('star_generatioModel');
        $end_generatioModel = $this->input->post('end_generatioModel');
        $fec_actu = date("y-m-d", time());
        $mca_inh = 'N';
        //echo $star_generatioModel.' '.$end_generatioModel.' '.$id_model.' '.$user_id_exist;
        if ($user_id_exist > 0) {
            $datos = array("id_model" => $id_model,
                "start_generation" => $star_generatioModel,
                "end_generation" => $end_generatioModel,
                "fec_actu" => $fec_actu,
                "mca_inh" => $mca_inh,
                "id_username" => $user_id_exist);
            $result = $this->Generation_model->createGenerationModel($datos);
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

        $this->load->view('generation_model', $data);
    }

    /* Retorna los combustible definidos para cada modelo */

    public function consultCombustibleModel() {
        $data = array(
            'generationModel' => $this->Generation_model->consultGenerationModel()
        );
        $this->load->view('consultas/generation_model_c', $data);
    }

}
