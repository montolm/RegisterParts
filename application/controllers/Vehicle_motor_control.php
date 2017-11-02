<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vehicle_motor_control
 *
 * @author montolio
 */
class Vehicle_motor_control extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('api_model');
        $this->load->model('vehicle_motor_model');
    }

    public function index() {
        $this->load->view('vehicle_motor');
    }

    public function urlVehicleMotor() {

        redirect($this->config->item('CONSTANT_LOADVIEW') . 'vehicle_motor');
    }

    function urlVehicleMotorConsult() {
        //$this->load->view('consultas/category_c');
        redirect($this->config->item('CONSTANT_LOADVIEW_C') . 'vehicle_motor_c');
    }

    /* Inserta tipo vehiculo de motor */

    public function createVehicleMotor() {
        $user_name = $this->session->userdata('username');
        $id_type_vehicleSum = $this->api_model->getMaxNUMId('type_vehicle_motor', 'id_type_vehicle_motor') + 1;
        $user_id_exist = $this->api_model->getId('user', 'username', 'id_username', $user_name);
        $type_name_vehicle = $this->input->post('vehicleMotor');
        $creation_date = date("y-m-d", time());
        $fec_actu = date("y-m-d", time());
        $mca_inh = 'N';
        if ($user_id_exist > 0 & $type_name_vehicle != '') {
            $datos = array("id_type_vehicle_motor" => $id_type_vehicleSum,
                "type_name_vehicle" => $type_name_vehicle,
                "creation_date" => $creation_date,
                "fec_actu" => $fec_actu,
                "mca_inh" => $mca_inh,
                "id_username" => $user_id_exist);
            $result = $this->vehicle_motor_model->createVehicleMotorModel($datos);
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

    public function updateVehicleMotor() {
        $user_name = $this->session->userdata('username');
        $id_vehicleMotor = $this->input->post('vehicleMotor');
        $name_vehicleMotor = $this->input->post('nameVehicleMotor');
        $inha_vehicleMotor = $this->input->post('inhaVehicleMotor');
        $user_id_exist = $this->api_model->getId('user', 'username', 'id_username', $user_name);
        $fec_actu = date("y-m-d", time());
        // echo $id_vehicleMotor . ' ' . $name_vehicleMotor . ' ' . $inha_vehicleMotor . ' ' . $user_name . ' ' . $fec_actu.' '.$user_id_exist;
        if ($id_vehicleMotor != '' && $name_vehicleMotor != '' && $inha_vehicleMotor != '' && $user_id_exist != '' && $fec_actu != '') {
            $datos = array("type_name_vehicle" => $name_vehicleMotor,
                "mca_inh" => $inha_vehicleMotor,
                "fec_actu" => $fec_actu,
                "id_username" => $user_id_exist);
            echo $result = $this->vehicle_motor_model->updateVehicleMotorModel($id_vehicleMotor, $datos);
        } else {
            echo 'FALSE';
        }
    }

    public function deleteVehicleMotor() {
        $id_category = $this->input->post('idDeletect');
        if ($id_category !== '') {
            echo $result = $this->category_model->deleteCategoryModel($id_category);
        } else {
            echo "FALSE";
        }
    }

    /* Retorna todas las categorias existentes */

    public function consultVehicleMotor() {
        $data = array(
            'vehicleMotor' => $this->vehicle_motor_model->consultVehicleMotor()
        );
        /* Refactorizar mas adelante para colocar la llamada al metodo CONSTANT_LOADVIEW_C y asi esconder
          el controlador llamado para mas seguridad de la app. */
        $this->load->view('consultas/vehicle_motor_c', $data);
    }

   
}
