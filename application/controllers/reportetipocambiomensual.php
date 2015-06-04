<?php

// if (!defined('BASEPATH'))
//    exit('No permitir el acceso directo al script');

class Reportetipocambiomensual extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('api_m');
    }

    public function index() {
        $this->load->view('includes/header');
        $this->load->view('includes/userbar');      
        $this->load->view('includes/menu');
        $this->load->view('frontend/reportetipocambiomensual/reportetipocambiomensual_v');
        $this->load->view('includes/footer');
    }

}
