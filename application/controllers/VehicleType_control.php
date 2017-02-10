<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VehicleType_control
 *
 * @author montolio
 */
class VehicleType_control extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('Vehicle_type_model');
        $this->load->model('Api_model');
    }

    public function index() {
        $this->load->view('vehicle_type');
    }

    public function urlVehicleModel() {

        redirect($this->config->item('CONSTANT_LOADVIEW') . 'vehicle_type');
    }

    function urlVehicleModelConsult() {
        redirect($this->config->item('CONSTANT_LOADVIEW_C') . 'vehicle_type_c');
    }

    /* Inserta Marca de vehiculo */

    public function createVehicleType() {
        $user_name = $this->session->userdata('username');
        $id_vehicleType_Sum = $this->Api_model->getMaxNUMId('vehicle_type', 'id_vehicle_type') + 1;
        $user_id_exist = $this->Api_model->getId('user', 'username', 'id_username', $user_name);
        $idTypeMotor = $this->input->post('selectTypeVehicleMotor');
        $idMake = $this->input->post('selectMakeVM');
        $idModel = $this->input->post('selectVehicleModelMV');
        $idVehicleGeneration = $this->input->post('selectVehicleGeneration');
        $vehicleTypeModel = $this->input->post('vehicleTypeModel');
        $creation_date = date("y-m-d", time());
        $fec_actu = date("y-m-d", time());
        $mca_inh = 'N';
        if ($user_name >= 0 & $idTypeMotor != '' & $idMake != '' & $idModel != '' & $vehicleTypeModel != '' & $idVehicleGeneration != '') {
            $datos = array('id_vehicle_type' => $id_vehicleType_Sum,
                'name_vehicle_type' => $vehicleTypeModel,
                'creation_date' => $creation_date,
                'fec_actu' => $fec_actu,
                'mca_inh' => $mca_inh,
                'id_username' => $user_id_exist,
                'id_type_vehicle_motor' => $idTypeMotor,
                'id_vehicle_make' => $idMake,
                'id_model' => $idModel,
                'id_generation' => $idVehicleGeneration);

            $result = $this->Vehicle_type_model->createVehicleType($datos);
            $returnVale = $this->Api_model->getException($result);

            if ($returnVale == 1) {
                // Coloca estos campos en sesion 
                $nameVehicleTypeMotor = $this->Api_model->consultTypeVehicleMotorForId($idTypeMotor);
                $NameMake = $this->Api_model->consultMakeName($idMake);
                $this->loadSesionModel($NameMake, NULL, $idMake);
                $this->loadSesionAll($nameVehicleTypeMotor, $idTypeMotor);
                echo TRUE;
            } else {
                // Coloca estos campos en sesion
                $nameVehicleTypeMotor = $this->Api_model->consultTypeVehicleMotorForId($idTypeMotor);
                $NameMake = $this->Api_model->consultMakeName($idMake);
                $this->loadSesionModel($NameMake, NULL, $idMake);
                $this->loadSesionAll($nameVehicleTypeMotor, $idTypeMotor);
                echo FALSE;
            }
        } else {
            echo FALSE;
        }
    }

    /* Actualiza typo de vehiculo */

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
                echo FALSE;
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
            echo FALSE;
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

    /* Retorna las arreglos para los listOption mostrados
      en la pantalla vehicle_type */

    public function consultListOption() {
        $data = array(
            'make' => $this->Api_model->consultMake(),
            'vehicle_motor' => $this->Api_model->consultTypeVehicleMotor()
        );
        $this->load->view('vehicle_type', $data);
    }

    /* Retorna las lista modelos de vehiculos por marca seleccionada */

    public function listVehicleModel() {
        $idMake = $this->input->post('id');
        $value = $this->Api_model->consultVehicleModelFormMake($idMake);

        header('Content-Type: application/json');
        echo json_encode($value);
    }

    /* Retorna las lista modelos de vehiculos por marca seleccionada */

    public function listGenerationModel() {
        $idMake = $this->input->post('id');
        $value = $this->Api_model->consultGenerationModelForModel($idMake);

        header('Content-Type: application/json');
        echo json_encode($value);
    }

    public function loadSesionModel($marca, $modelo, $value) {
        parent::loadSesionModel($marca, $modelo, $value);
    }

    public function loadSesionAll($typeMotor, $value) {
        parent::loadSesionAll($typeMotor, $value);
    }

}
