<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Api_model extends CI_Model {

    var $prueba = null;

    function __construct() {

        parent::__construct();
    }

    /* Retorna max num_id de la tabla solicitada */

    public function getMaxNUMId($tableName,$field) {
        $table = $tableName;
        $query = $this->db->query('select '.$field.'
                                        from ' . $table . '
                                       where '.$field.' = (select max('.$field.')
                                                              from ' . $table . ')');


        if ($query->num_rows() > 0) {
            $row = $query->row();
            $value = $row->$field;
        } else {
            $value = 0;
        }

        return $value;
    }

}
