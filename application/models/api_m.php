<?php

class Api_m extends CI_Model
{

/** POR DESAPARECER **/
    function get($arrParam) {
        try {
            $arrResultado =  $this->db->query_sp('USERS_GET',$arrParam);
            return $arrResultado;
        } catch (Exception $e) {
            throw new Exception('Error Inesperado');
        }
    }

    public function get_all(){
        $query = $this->db->get("users_api");
        if($query->num_rows() > 0){
            return $query->result();
        }
    }
/** FIN POR DESAPARECER **/

    public function exchange_rate_month($arrParam) {
        try {
            $arrResultado =  $this->db->query_sp('EXCHANGE_RATE_MONTH_GET',$arrParam);
            return $arrResultado;
        } catch (Exception $e) {
            throw new Exception('Error Inesperado');
        }
    }

    public function exchange_rate_year($arrParam) {
        try {
            $arrResultado =  $this->db->query_sp('EXCHANGE_RATE_YEAR_GET',$arrParam);
            return $arrResultado;
        } catch (Exception $e) {
            throw new Exception('Error Inesperado');
        }
    }

    public function exchange_rate_all() {
        try {
            $arrResultado =  $this->db->query_sp('EXCHANGE_RATE_ALL_GET',NULL);
            return $arrResultado;
        } catch (Exception $e) {
            throw new Exception('Error Inesperado');
        }
    }
}