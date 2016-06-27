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

    public function getFornecedorById($id){
        $where = array('id_fornecedor' => $id);
        $fornecedor = $this->db->get_where('fornecedores', $where);
        return $fornecedor->row_array();
    }

    public function updateFornecedor($data, $id){
        $this->db->where('id_fornecedor', $id);
        $alterado = $this->db->update('fornecedores', $data);
        return $alterado;
    }
}