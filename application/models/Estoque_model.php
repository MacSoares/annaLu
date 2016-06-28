<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estoque_model extends CI_Model {

    public function salvarNovo($data){

        $salvo = $this->db->insert('estoque', $data);
        return $salvo;
    }

    public function getEstoque(){
        $clientes = $this->db->get('estoque');
        return $clientes->result_array();

    }

    public function deleteCliente($id_peca){
        $this->db->where('id_produto', $id_peca);
        $deletado = $this->db->delete('estoque');
        return $deletado;
    }


}