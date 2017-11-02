<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of make_vehicle_motor_control
 *
 * @author montolio
 */
class make_vehicle_motor_control extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('Api_model');
        $this->load->model('Make_vehicle_motor_model');
        $this->load->model('Vehicle_motor_model');
    }

    public function index() {
        $this->load->view('make_vehicle_motor');
    }

    public function urlMake() {

        redirect($this->config->item('CONSTANT_LOADVIEW') . 'make_vehicle_motor');
    }

    /* Crea las marcas con su tipo de vehiculo de motor */

    public function createMakeVehicleMotor() {
        $user_name = $this->session->userdata('username');
        $user_id_exist = $this->Api_model->getId('user', 'username', 'id_username', $user_name);
        $id_make_vehicleMotorSum = $this->Api_model->getMaxNUMId('make_vehicle_motor', 'id_make_vehicle_motor') + 1;
        $id_make = $this->input->post('makeVehicleMotor');
        $id_vehicle_motor = $this->input->post('selectIdVehicleMotor');
        $fec_actu = date("y-m-d", time());
        $mca_inh = 'N';
        if ($user_id_exist > 0) {
            $datos = array("id_make_vehicle_motor" => $id_make_vehicleMotorSum,
                "id_make" => $id_make,
                "id_vehicle_motor" => $id_vehicle_motor,
                "creation_date" => $fec_actu,
                "date_update" => $fec_actu,
                "mca_inh" => $mca_inh,
                "id_user" => $user_id_exist);
            $result = $this->Make_vehicle_motor_model->createMakeVehicleMotor($datos);
            $returnValue = $this->Api_model->getException($result);
            if ($returnValue == 1) {
                echo TRUE;
            } else {
                echo FALSE;
            }
        } else {
            echo FALSE;
        }
    }

    public function updateMakeVehicleMotor() {

        $user_name = $this->session->userdata('username');
        if ($user_name != FALSE) {
            $id_make_vehicle_type_motor = $this->input->post('makeVehicleMotor');
            $id_vehicle_motor = $this->input->post('selectIdVehicleMotor');
            $user_id_exist = $this->Api_model->getId('user', 'username', 'id_username', $user_name);
            $fec_actu = date("y-m-d", time());
            echo 'Ajaaa '.$user_id_exist;
            if ($id_make_vehicle_type_motor != 0 & $id_vehicle_motor != '' & $user_id_exist != '') {
                
                $datos = array("id_vehicle_motor" => $id_vehicle_motor,
                    "date_update" => $fec_actu,
                    "id_user" => $user_id_exist);
                
                echo $result = $this->Make_vehicle_motor_model->updateMakeVehicleMotor($id_make_vehicle_type_motor, $datos);
            }
        }
    }

    /* Retorna las Marcas de vehiculos existentes */

    public function consultMake() {

        $data = array(
            'make' => $this->Make_vehicle_motor_model->consultMake(),
            'vehicle_motor' => $this->Vehicle_motor_model->consultVehicleMotor()
        );
        /* Refactorizar mas adelante para colocar la llamada al metodo CONSTANT_LOADVIEW_C y asi esconder
          el controlador llamado para mas seguridad de la app. */
        $this->load->view('make_vehicle_motor', $data);
    }

    /* Retorna los tipos de vehiculos de motor por marca */

    public function consultMakeVehicleMotor() {
        $data = array(
            'makeVehicleMotor' => $this->Make_vehicle_motor_model->consultMakeVehicleMotor(),
            'vehicle_motor' => $this->Vehicle_motor_model->consultVehicleMotor()
        );
        $this->load->view('consultas/make_vehicle_motor_c', $data);
    }

}
