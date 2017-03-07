<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Part_control
 *
 * @author montolio
 */
class Part_control extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('Api_model');
        $this->load->model('Part_model');
    }

    public function index() {
        $this->load->view('part');
    }

    /* Inserta Marca de vehiculo */

    public function createPart() {
        $user_name = $this->session->userdata('username');
        $id_part_Sum = $this->Api_model->getMaxNUMId('part', 'id_part') + 1;
        $user_id_exist = $this->Api_model->getId('user', 'username', 'id_username', $user_name);
        $idCategory = $this->input->post('selectCategory');
        $name_part = $this->input->post('part');
        $creation_date = date("y-m-d", time());
        $fec_actu = date("y-m-d", time());
        $mca_inh = 'N';
        echo $idCategory . ' eee ' . $name_part;
        
        if ($user_id_exist > 0 & $idCategory != 0) {
            $datos = array('id_part' => $id_part_Sum,
                'name_part' => $name_part,
                'creation_date' => $creation_date,
                'fec_actu' => $fec_actu,
                'mca_inh' => $mca_inh,
                'id_username' => $user_id_exist,
                'id_category' => $idCategory,);
            
            $result = $this->Part_model->createPart($datos);
            $returnVale = $this->Api_model->getException($result);
        
            if ($returnVale == 1) {
                // Coloca estos campos en sesion 
                $NameCategory = $this->Api_model->consultCategoryName($idCategory);
                $this->loadSesionAll($NameCategory, $idCategory);
                echo TRUE;
            } else {
                $NameCategory = $this->Api_model->consultCategoryName($idCategory);
                $this->loadSesionAll($NameCategory, $idCategory);
                echo FALSE;
            }
        } else {
            $NameCategory = $this->Api_model->consultCategoryName($idCategory);
            $this->loadSesionAll($NameCategory, $idCategory);
            echo FALSE;
        }
    }
    
     /* Actualiza Marca de vehiculo */

    public function updatePart() {
        $user_name = $this->session->userdata('username');
        if ($user_name != FALSE) {
            $id_part = $this->input->post('idPart');
            $nam_part = $this->input->post('namePart');
            $inha_part = $this->input->post('inhaPart');
            $user_id_exist = $this->Api_model->getId('user', 'username', 'id_username', $user_name);
            $fec_actu = date("y-m-d", time());
            if ($id_part != '' && $nam_part != '' && $inha_part != '' && $user_id_exist != '' && $fec_actu != '') {
                $datos = array("name_part" => $nam_part,
                    "mca_inh" => $inha_part,
                    "fec_actu" => $fec_actu,
                    "id_username" => $user_id_exist);
                echo $result = $this->Part_model->updatePart($id_part, $datos);
            } else {
                echo FALSE;
            }
        } else {
            redirect($this->config->item('CONSTANT_LOADVIEW') . 'login');
        }
    }

    /* Retorna las piezas por categorias existentes */

    public function consultPartCategory() {

        $data = array(
            'parts' => $this->Part_model->consultPart()
        );
        /* Refactorizar mas adelante para colocar la llamada al metodo CONSTANT_LOADVIEW_C y asi esconder
          el controlador llamado para mas seguridad de la app. */
        $this->load->view('consultas/part_c', $data);
    }

    /* Retorna las arreglos para los listOption mostrados
      en la pantalla pieza */

    public function consultListOption() {
        $data = array(
            'category' => $this->Api_model->getListOptionCategory(),
        );
        $this->load->view('part', $data);
    }

    /* Carga en sesion los campos solicitados */

    public function loadSesionAll($name, $value) {
        parent::loadSesionAll($name, $value);
    }

}
