<?php

if (!defined('BASEPATH'))
    exit('No permitir el acceso directo al script');

class Main extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->helper('form');
        $this->load->library('form_validation');
        // $this->load->model('main_m');
    }

    public function index() {
        $this->load->view('includes/header');
        $this->load->view('includes/userbar');      
        $this->load->view('includes/menu');
        $this->load->view('frontend/main/main_v');
        $this->load->view('includes/footer');
    }


}
