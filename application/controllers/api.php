<?php

// if (!defined('BASEPATH'))
//     exit('No permitir el acceso directo al script');

//debemos colocar esta línea para extender de REST_Controller
require(APPPATH.'/libraries/REST_Controller.php');
class Api extends REST_Controller
{
    public function __construct() {

        parent::__construct();

        $this->load->model('api_m');
    }

/* POR DESPARECER */

    //obtener datos de un usuario
    //http://localhost:81/apitipocambio/api/user/id/[id de usuario]/format/formato/X-API-KEY/miapikey
    //ejm: http://localhost:81/apitipocambio/api/user/id/1/x-api-key/8hu8fWMCIhCXyq0U4TP0CMJ9waHkCGNcsrqok8zS
    public function user_get()
    {
        if(!$this->get("id")){
            $this->response(NULL, 400);
        }
        $user = $this->api_m->get($this->get("id"));
        header("Content-type: application/json");
        echo Json_encode($user);
    }

    // Obtner todos
    //obtener datos de un usuario
    //http://localhost:81/apitipocambio/api/user/id/1/format/formato/X-API-KEY/miapikey
    //ejm:  http://localhost:81/apitipocambio/api/user_all_get/x-api-key/8hu8fWMCIhCXyq0U4TP0CMJ9waHkCGNcsrqok8zS
    public function user_all_get()
    {
        $user = $this->api_m->get_all();
        header("Content-type: application/json");
        echo Json_encode($user);
    }

/*FIN POR DESAPARECER*/


    //obtener tipos de cambio por el mes del año 2014
    //http://localhost:81/apitipocambio/api/erm/id/id_user/format/formato/X-API-KEY/miapikey
    //ejm:  http://localhost:81/apitipocambio/api/erm/id/1/x-api-key/8hu8fWMCIhCXyq0U4TP0CMJ9waHkCGNcsrqok8zS
    public function erm_get() // Function Get Exchange Rate Month
    {
        $erm = $this->api_m->exchange_rate_month($this->get("id"));
        header("Content-type: application/json");
        echo Json_encode($erm);
    }

        //obtener tipos de cambio por año.
    //http://localhost:81/apitipocambio/api/erm/id/id_user/format/formato/X-API-KEY/miapikey
    //ejm: http://localhost:81/apitipocambio/api/ery/id/2014/x-api-key/8hu8fWMCIhCXyq0U4TP0CMJ9waHkCGNcsrqok8zS
    public function ery_get() // Function Get Exchange Rate Month
    {
        $ery = $this->api_m->exchange_rate_year($this->get("id"));
        header("Content-type: application/json");
        echo Json_encode($ery);
    }
    //obtener todos los tipos de cambio
    //http://localhost:81/apitipocambio/api/erm/id/id_user/format/formato/X-API-KEY/miapikey
    //ejm: http://localhost:81/apitipocambio/api/er_all/x-api-key/8hu8fWMCIhCXyq0U4TP0CMJ9waHkCGNcsrqok8zS

    public function era_get() // Function Get Exchange Rate All
    {
        $era = $this->api_m->exchange_rate_all();
        header("Content-type: application/json");
        echo Json_encode($era);
    }
}