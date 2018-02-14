<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Part_vehicle_control
 *
 * @author montolio
 */
class Part_vehicle_control extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('Api_model');
        $this->load->model('Part_vehicle_model');
        $this->load->model('Vehicle_type_model');
        $this->load->model('Part_vehicle_model');
    }

    public function index() {
        $this->load->view('part_vehicle');
    }

    public function urlVehicleTypeConsult() {
        $data = array(
            'category' => $this->Api_model->getListOptionCategory(),
            'make' => $this->Api_model->consultMake(),
        );
        $this->load->view('part_vehicle', $data);
    }

    /* Retorna las arreglos para los listOption mostrados
      en la pantalla piezas por tipo de vehiculo */

    public function consultListOption() {
        $id_category = $this->input->post('selectCategory');
        $NameCategory = $this->Api_model->consultCategoryName($id_category);
        $idMake = $this->input->post('selectMakeVM');
        $NameMake = $this->Api_model->consultMakeName($idMake);
        $this->loadSesionModel($NameMake, NULL, $idMake);
        $this->loadSesionAll($NameCategory, $id_category);
        $data = array(
            'category' => $this->Api_model->getListOptionCategory(),
            'vehicleType' => $this->Vehicle_type_model->consultVehicleType($idMake),
            'make' => $this->Api_model->consultMake()
        );
        $this->load->view('part_vehicle', $data);
    }

    /* Retorna las piezas por categoria seleccionada */

    public function getParts() {
        $idCategory = $this->input->post('id');
        $value = $this->Api_model->getParts($idCategory);

        header('Content-Type: application/json');
        echo json_encode($value);
    }

    /* Inserta las piezas por tipo de vehiculo */

    public function createPartVehicle() {
        $user_name = $this->session->userdata('username');
        $id_vehiclePart_Sum = $this->Api_model->getMaxNUMId('part_vehicle_type', 'id') + 1;
        $user_id_exist = $this->Api_model->getId('user', 'username', 'id_username', $user_name);
        $id_vehicle_type = $this->input->post('vehicleModel');
        $id_category = $this->input->post('category');
        $id_part = $this->input->post('vehiclePart');
        $creation_date = date("y-m-d", time());
        $fec_actu = date("y-m-d", time());
        $mca_inh = 'N';

        if ($user_id_exist > 0) {
            $datos = array("id" => $id_vehiclePart_Sum,
                "id_category" => $id_category,
                "id_vehicle_type" => $id_vehicle_type,
                "id_part" => $id_part,
                "creation_date" => $creation_date,
                "fec_actu" => $fec_actu,
                "mca_inh" => $mca_inh,
                "id_username" => $user_id_exist);
            $result = $this->Part_vehicle_model->createPartVehicle($datos);
            $returnValue = $this->Api_model->getException($result);
            if ($returnValue == 1) {

                // $NameMake = $this->Api_model->consultMakeName($id_vehicle_make);
                //$this->loadSesionModel($NameMake, NULL, $id_vehicle_make);
                echo TRUE;
            } else {
                echo FALSE;
            }
        } else {
            echo FALSE;
        }
    }

}
