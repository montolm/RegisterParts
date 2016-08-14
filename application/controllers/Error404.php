<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Error404
 *
 * @author montolio
 */
class Error404 extends CI_Controller{
    //put your code here
    public function index() {
        echo 'Error 404. Usted está intentando acceder a una página que no existe.';
    }
}
