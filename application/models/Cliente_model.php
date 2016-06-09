<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente_model extends CI_Model {

    public function salvarNovo($data){

        $salvo = $this->db->insert('clientes', $data);
        return $salvo;
    }

    public function getClientes(){
        $clientes = $this->db->get('clientes');
        return $clientes->result_array();

    }


}