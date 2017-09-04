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

    public function getMaxNUMId($tableName, $field) {
        $table = $tableName;
        $query = $this->db->query('select ' . $field . '
                                        from ' . $table . '
                                       where ' . $field . ' = (select max(' . $field . ')
                                                              from ' . $table . ')');


        if ($query->num_rows() > 0) {
            $row = $query->row();
            $value = $row->$field;
        } else {
            $value = 0;
        }

        return $value;
    }

    /* Retorna max num_id de la tabla solicitada */

    public function getId($tableName, $field, $selectField, $valCampo) {
        $query = $this->db->query("select $selectField "
                . "from $tableName where $field = '$valCampo'"
                . "and mca_inh = 'N'");

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $value = $row->$selectField;
        } else {
            $value = 0;
        }

        return $value;
    }

    /* Catura y lanza una exception siempre */

    public function getException($value) {
        try {
            if ($value != 1) {
                throw new Exception("Error al insertar registro", 0);
            } else {
                return $value;
            }
        } catch (Exception $e) {
            return $e->getCode(); //echo $e->getMessage();
            //return $e->getMessage(); //echo 'Excepción capturada: ', $e->getCode(), "\n";
        }
    }

    /* Retorna las marcas seleccionada */

    public function consultMake() {
        $query = $this->db->query("select a.id_vehicle_make,a.name_vehicle_make,a.creation_date,a.fec_actu,a.mca_inh,b.username
                                    from make a
                                        inner join user b
                                        on  a.id_username = b.id_username
                                   order by a.id_vehicle_make;");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function Combustibleconsult() {
        $query = $this->db->query("select a.id_combustible,a.type_combustible
                                    from combustible a
                                  order by a.id_combustible;");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    /* Retorna las marcas seleccionada */

    public function consultMakeName($idMake) {

        $query = $this->db->query("select a.name_vehicle_make
                                    from make a
                                     where  a.id_vehicle_make = $idMake
                                   order by a.id_vehicle_make;");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $value = $row->name_vehicle_make;
        } else {
            return false;
        }
    }

    /* Retorna las marcas seleccionada */

    public function consultTypeVehicleMotorForId($idTypeVehicleMotor) {

        $query = $this->db->query("select type_name_vehicle
                                    from type_vehicle_motor
                                    where id_type_vehicle_motor = $idTypeVehicleMotor;");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $value = $row->type_name_vehicle;
        } else {
            return false;
        }
    }

    /* Retorna los modelos de vehiculos por marca seleccionada */

    public function consultVehicleModelFormMake($idMake) {
        $query = $this->db->query("select id_model,model_name
                                    from vehicle_model
                                     where id_vehicle_make = $idMake
                                    order  by id_model;");

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    /* Retorna los tipos de vehiculos de motor */

    public function consultTypeVehicleMotor() {
        $query = $this->db->query("select id_type_vehicle_motor,type_name_vehicle
                                    from type_vehicle_motor
                                   order by id_type_vehicle_motor;");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    /* Retorna la generacion por modelo de vehiculo */

    public function consultGenerationModelForModel($idModel) {
        $query = $this->db->query("select id_generation,concat (a.start_generation,'/',a.end_generation) as generation 
                                    from generation_model a
                                   where id_model  = $idModel
                                   order by id_generation;");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    /* Retorna el campo deseado de la tabla vehicle_type */

    public function getIdVehicleTypeRelationship($selectField, $id_vehicle_type) {
        $query = $this->db->query("select $selectField
                                    from vehicle_type
                                   where id_vehicle_type = $id_vehicle_type; ");

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $value = $row->$selectField;
        } else {
            $value = 0;
        }

        return $value;
    }

    /* Retorna las categorias */

    public function getListOptionCategory() {
        $query = $this->db->query("select id_category,name_category
                                     from category
                                    order by id_category;");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    /* Retorna las marcas seleccionada */

    public function consultCategoryName($idCategory) {
        $query = $this->db->query("select name_category
                                    from category
                                   where id_category = $idCategory;");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $value = $row->name_category;
        } else {
            return FALSE;
        }
    }

    /* Retorna las piezas registradas */

    public function getParts($idCategory) {
        $query = $this->db->query("select id_part,name_part
                                        from part
                                       where id_category = $idCategory
                                          and mca_inh = 'N';");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    /* Retorna los tipos de vehiculos dependiendo de los parametros recibidos */

    public function getTypesVehicles($idVehicleMotor, $idVehicleMake, $idModel, $idGeneration) {
        $query = $this->db->query("select a.id_vehicle_type,a.name_vehicle_type
                                    from vehicle_type a
                                   where a.id_type_vehicle_motor = $idVehicleMotor
                                     and a.id_vehicle_make  = $idVehicleMake
                                     and a.id_model    = $idModel
                                     and a.id_generation = $idGeneration
                                     and a.mca_inh = 'N';");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    /* Retorna combustible por modelo seleccionado */

    public function gasForModel($idModel) {
        $query = $this->db->query("select a.id_combustible_model,type_combustible
                                    from model_combustible a
                              inner join combustible b
                                     on a.id_combustible = b.id_combustible
                               where a.id_model = $idModel
                                 and a.mca_inh 	= 'N'
                              order by a.id_combustible_model;");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    /* Retorna las piezas registradas por tipo y categoria */

    public function getPartsVehicleType($idCategory, $idVehicleType) {
        $query = $this->db->query("select a.id,b.name_part,a.id_category,a.id_vehicle_type,a.id_part
                                    from  part_vehicle_type a
                                   inner join part b
                                      on a.id_part = b.id_part
                                     and a.mca_inh = b.mca_inh 
                                    where a.id_vehicle_type = $idVehicleType
                                      and a.id_category = $idCategory
                                      and a.mca_inh = 'N';");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

}
