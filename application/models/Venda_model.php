<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Venda_model extends CI_Model {

    public function salvarNovo($data){

        $salvo = $this->db->insert('venda', $data);
        return $salvo;
    }

    public function getVenda(){
        $vendas = $this->db->get('venda');
        return $vendas->result_array();

    }

    public function deleteVenda($id_venda){
        $this->db->where('id', $id_venda);
        $deletado = $this->db->delete('venda');
        return $deletado;
    }


}