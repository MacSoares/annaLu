<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caixa_model extends CI_Model {

    public function getCaixa(){
        $vendas = $this->db->get('caixa');
        return $vendas->result_array();

    }

    public function salvarNovoFluxo($data){
        $fluxoSalvo = $this->db->insert('caixa',$data);
        return $fluxoSalvo;
    }

}