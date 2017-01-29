<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vehicle_type
 *
 * @author montolio
 */
class Vehicle_type_control extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        // $this->load->model('api_model');
        $this->load->model('Vehicle_model');
        $this->load->model('Api_model');
    }

    public function index() {
        $this->load->view('vehicle_type');
    }

    public function urlVehicleModel() {

        redirect($this->config->item('CONSTANT_LOADVIEW') . 'vehicle_type');
    }

    function urlVehicleModelConsult() {
        //$this->load->view('consultas/vehicleModel_c');
        redirect($this->config->item('CONSTANT_LOADVIEW_C') . 'vehicle_type_c');
    }

    /* Inserta Marca de vehiculo */

    public function createVehicleType() {
        $user_name = $this->session->userdata('username');
        $id_vehicleModel_Sum = $this->Api_model->getMaxNUMId('vehicle_model', 'id_model') + 1;
        $user_id_exist = $this->Api_model->getId('user', 'username', 'id_username', $user_name);
        $name_model = $this->input->post('vehicleModel');
        $star_generatioModel = $this->input->post('star_generatioModel');
        $end_generatioModel = $this->input->post('end_generatioModel');
        $id_vehicle_brand = $this->input->post('selectVehicleModel');
        $creation_date = date("y-m-d", time());
        $fec_actu = date("y-m-d", time());
        $mca_inh = 'N';
        if ($user_id_exist > 0 & $name_model != '') {
            $datos = array("id_model" => $id_vehicleModel_Sum,
                "model_name" => $name_model,
                "creation_date" => $creation_date,
                "fec_actu" => $fec_actu,
                "mca_inh" => $mca_inh,
                "start_generation" => $star_generatioModel,
                "end_generation" => $end_generatioModel,
                "id_vehicle_brand" => $mca_inh,
                "id_username" => $user_id_exist,
                "id_vehicle_brand" => $id_vehicle_brand);
            $result = $this->Vehicle_model->createVehicleModel($datos);
            $returnValue = $this->Api_model->getException($result);
            if ($returnValue == 1) {
                $NameMake = $this->Api_model->consultMakeName($id_vehicle_brand);
                $this->loadSesionModel($NameMake, $name_model, $id_vehicle_brand);
                echo 'TRUE';
            } else {
                echo 'FALSE';
            }
        } else {
            echo 'FALSE';
        }
    }

    /* Actualiza Marca de vehiculo */

    public function updateVehicleType() {
        $user_name = $this->session->userdata('username');
        if ($user_name != FALSE) {
            $id_vehicleModel = $this->input->post('vehicleModel');
            $nam_vehicleModel = $this->input->post('nameVehicleModel');
            $inha_vehicleModel = $this->input->post('inhaVehicleModel');
            $iniGeneration = $this->input->post('iniGeneration');
            $endGeneration = $this->input->post('endGeneration');
            $user_id_exist = $this->Api_model->getId('user', 'username', 'id_username', $user_name);
            $fec_actu = date("y-m-d", time());

            if ($id_vehicleModel != '' && $nam_vehicleModel != '' && $inha_vehicleModel != '' && $user_id_exist != '' && $fec_actu != '') {
                $datos = array("model_name" => $nam_vehicleModel,
                    "mca_inh" => $inha_vehicleModel,
                    "start_generation" => $iniGeneration,
                    "end_generation" => $endGeneration,
                    "fec_actu" => $fec_actu,
                    "id_username" => $user_id_exist);
                echo $result = $this->Vehicle_model->updateVehicleModel($id_vehicleModel, $datos);
            } else {
                echo 'FALSE';
            }
        } else {
            redirect($this->config->item('CONSTANT_LOADVIEW') . 'login');
        }
    }

    /* Borra Marca de vehiculo */

    public function deleteVehicleType() {
        $id_category = $this->input->post('idDeletect');
        if ($id_category !== '') {
            echo $result = $this->vehicleModel_model->deleteCategoryModel($id_category);
        } else {
            echo "FALSE";
        }
    }

    /* Retorna las modelos por cada marca de vehiculos existentes */

    public function consultVehicleType() {

        $data = array(
            'vehicleModel' => $this->Vehicle_model->consultVechicleModel()
        );
        /* Refactorizar mas adelante para colocar la llamada al metodo CONSTANT_LOADVIEW_C y asi esconder
          el controlador llamado para mas seguridad de la app. */
        $this->load->view('consultas/vehicle_model_c', $data);
    }

    /* Retorna las Marcas de vehiculos existentes para llenar la lista en el view */
    public function consultMake() {
        $data = array(
            'make' => $this->Api_model->consultMake(),
            'make_1' => $this->Api_model->consultMake_1(),
            'make_2' => $this->Api_model->consultMake_2()
        );
        $this->load->view('vehicle_type', $data);
    }

    public function loadSesionModel($marca, $modelo, $value) {
        parent::loadSesionModel($marca, $modelo, $value);
    }

}