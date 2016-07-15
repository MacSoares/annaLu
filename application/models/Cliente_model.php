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

    public function deleteCliente($id_cliente){
        $this->db->where('id_cliente', $id_cliente);
        $deletado = $this->db->delete('clientes');
        return $deletado;
    }

    public function updateCliente($id,$data){
        $this->db->where('id_cliente', $id);
        $alterado = $this->db->update('clientes', $data);
        return $alterado;
    }
    public function getClienteById($id){
        $where = array('id_cliente' => $id);
        $cliente = $this->db->get_where('clientes', $where);
        return $cliente->row_array();
    }

}