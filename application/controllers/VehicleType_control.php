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

    public function urlVehicleModelConsult() {
        redirect($this->config->item('CONSTANT_LOADVIEW_C') . 'vehicle_type_c');
    }

    public function urlVehicleTypeConsult() {
        $data = array(
            'make' => $this->Api_model->consultMake(),
        );
        $this->load->view('consultas/vehicle_type_c', $data);
    }

    /* Inserta Marca de vehiculo */

    public function createVehicleType() {
        $user_name = $this->session->userdata('username');
        $id_vehicleType_Sum = $this->Api_model->getMaxNUMId('vehicle_type', 'id_vehicle_type') + 1;
        $user_id_exist = $this->Api_model->getId('user', 'username', 'id_username', $user_name);
        $idTypeMotor = $this->input->post('selectVehicleMotor');
        $idMake = $this->input->post('selectMakeVM');
        $idModel = $this->input->post('selectVehicleModelMV');
        $idVehicleGeneration = $this->input->post('selectVehicleGeneration');
        $vehicleTypeModel = $this->input->post('vehicleTypeModel');
        $creation_date = date("y-m-d", time());
        $fec_actu = date("y-m-d", time());
        $mca_inh = 'N';
        //echo $user_name . ' ' . $id_vehicleType_Sum . ' ' . $user_id_exist . ' ' . $idTypeMotor;
        if ($user_id_exist > 0 & $idTypeMotor != '' & $idMake != '' & $idModel != '' & $vehicleTypeModel != '' & $idVehicleGeneration != '') {
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
            $id_vehicleTypeModel = $this->input->post('vehicleModel');
            $nam_vehicleTypeModel = $this->input->post('nameVehicleModel');
            $inha_vehicleTypeModel = $this->input->post('inhaTypeVehicleModel');
            $id_selectTypeVehicleMotor = $this->input->post('selectTypeVehicleMotor');
            $id_selectMakeVM = $this->input->post('selectMakeVM');
            $id_selectVehicleModelMV = $this->input->post('selectVehicleModelMV');
            $id_selectVehicleGeneration = $this->input->post('selectVehicleGeneration');
            $user_id_exist = $this->Api_model->getId('user', 'username', 'id_username', $user_name);
            $fec_actu = date("y-m-d", time());
            //  echo $id_vehicleTypeModel . ' ' . $nam_vehicleTypeModel . ' ' . $inha_vehicleTypeModel . ' ' . $id_selectTypeVehicleMotor . ' ' .
            $id_selectMakeVM . ' ' . $id_selectVehicleModelMV . ' ' . $id_selectVehicleGeneration;

            if ($id_vehicleTypeModel != '' & $nam_vehicleTypeModel != '' & $inha_vehicleTypeModel != '' & $user_id_exist != '') {
                /* Se validan los campos a cero ya que para la actualizacion no necesariamente sea obligatorio cambiar
                  valores en los list-option */
                if ($id_selectTypeVehicleMotor == 0) {
                    $id_selectTypeVehicleMotor = $this->getIdVehicleTypeRelationship('id_type_vehicle_motor', $id_vehicleTypeModel);
                }

                if ($id_selectMakeVM == 0) {
                    $id_selectMakeVM = $this->getIdVehicleTypeRelationship('id_vehicle_make', $id_vehicleTypeModel);
                }

                if ($id_selectVehicleModelMV == 0) {
                    $id_selectVehicleModelMV = $this->getIdVehicleTypeRelationship('id_model', $id_vehicleTypeModel);
                }

                if ($id_selectVehicleGeneration == 0) {
                    $id_selectVehicleGeneration = $this->getIdVehicleTypeRelationship('id_generation', $id_vehicleTypeModel);
                }

                $datos = array('name_vehicle_type' => $nam_vehicleTypeModel,
                    'fec_actu' => $fec_actu,
                    'mca_inh' => $inha_vehicleTypeModel,
                    'id_username' => $user_id_exist,
                    'id_type_vehicle_motor' => $id_selectTypeVehicleMotor,
                    'id_vehicle_make' => $id_selectMakeVM,
                    'id_model' => $id_selectVehicleModelMV,
                    'id_generation' => $id_selectVehicleGeneration);

                echo $result = $this->Vehicle_type_model->updateVehicleTypeModel($id_vehicleTypeModel, $datos);
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

    /* Retorna las tipos de vehiculos existentes */

    public function consultVehicleType() {
        $idMake = $this->input->post('selectMakeVM');
        $NameMake = $this->Api_model->consultMakeName($idMake);
       // $this->loadSesionAll($NameMake, $idMake);
        $this->loadSesionModel($NameMake, NULL, $idMake);
        $data = array(
            'vehicleType' => $this->Vehicle_type_model->consultVehicleType($idMake),
            'make' => $this->Api_model->consultMake(),
            'vehicle_motor' => $this->Api_model->consultTypeVehicleMotor(),
        );
        /* Refactorizar mas adelante para colocar la llamada al metodo CONSTANT_LOADVIEW_C y asi esconder
          el controlador llamado para mas seguridad de la app. */
        $this->load->view('consultas/vehicle_type_c', $data);
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
        $idVehicleMotor = $this->input->post('idVehicleMotor');
        //'make '.$idMake.' motor '.$idVehicleMotor;
        $value = $this->Api_model->consultVehicleModelFormMakeWS($idMake, $idVehicleMotor);

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

    /* Llama el metodo que carga en sesion los campos solicitados */

    public function loadSesionModel($marca, $modelo, $value) {
        parent::loadSesionModel($marca, $modelo, $value);
    }

    /* Carga en sesion los campos solicitados */

    public function loadSesionAll($typeMotor, $value) {
        parent::loadSesionAll($typeMotor, $value);
    }

    /* Retorna mediante la consulta el id solicitado */

    private function getIdVehicleTypeRelationship($selectField, $id_vehicle_type) {
        $value = $this->Api_model->getIdVehicleTypeRelationship($selectField, $id_vehicle_type);
        return $value;
    }

}
