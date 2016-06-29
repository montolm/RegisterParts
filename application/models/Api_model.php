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

    public function getMaxNUMId($tableName) {
        $table = $tableName;
        $query = $this->db->query('select id_category
                                        from ' . $table . '
                                       where id_category = (select max(id_category)
                                                              from ' . $table . ')');


        if ($query->num_rows() > 0) {
            $row = $query->row();
            $value = $row->id_category;
        } else {
            $value = 0;
        }

        return $value;
    }

}
