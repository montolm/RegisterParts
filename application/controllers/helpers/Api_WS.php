<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Api_WS 
 * Se crean los Web Services necesarios de los registros de piezas.
 * @author montolio
 */
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Api_WS extends REST_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('Api_model');
    }

    /* Retorna los tipos de vehiculos de motor en formato Json */

    public function vehicleMotorType_get() {
        $data = array(
            'typeMotors' => $this->Api_model->consultTypeVehicleMotor()
        );
        $this->response($data);
    }

    /* Retorna las marcas en formato Json */

    public function makes_get() {
        $data = array(
            'makes' => $this->Api_model->consultMake()
        );
        $this->response($data);
    }

    /* Retorna los modelos por marca definida en formato Json */

    public function modelForMake_get($idMake) {
        $data = array(
            'models' => $this->Api_model->consultVehicleModelFormMake($idMake)
        );
        $this->response($data);
    }

    /* Retorna las generaciones por modelo definida en formato Json */

    public function generationForModel_get($idModel) {
        $data = array(
            'generations' => $this->Api_model->consultGenerationModelForModel($idModel)
        );
        $this->response($data);
    }

    /* Retorna las tipos de vehicuilos en formato Json */

    public function typeForModel_get($idModel) {
        $data = array(
            'generations' => $this->Api_model->consultGenerationModelForModel($idModel)
        );
        $this->response($data);
    }
    /*Retorn los tipos de vehiculos en Json dependiendo de los parametros enviados*/
    function typesVehicles_get($idVehicleMotor, $idVehicleMake, $idModel, $idGeneration) {
        $data = array(
            'typesVehicles' => $this->Api_model->getTypesVehicles($idVehicleMotor, $idVehicleMake, $idModel, $idGeneration)
        );
        $this->response($data);
    }

}
