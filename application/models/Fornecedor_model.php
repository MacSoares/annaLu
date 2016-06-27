<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Fornecedor_model extends CI_Model{

    public function salvarNovo($data){
        $salvo = $this->db->insert('fornecedores', $data);
        return $salvo;
    }
    public function getFornecedores(){
        $clientes = $this->db->get('fornecedores');
        return $clientes->result_array();
    }
    public function delete($id_fornecedor){
        $this->db->where('id_fornecedor', $id_fornecedor);
        $deletado = $this->db->delete('fornecedores');
        return $deletado;
    }
}