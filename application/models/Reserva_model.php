<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reserva_model extends CI_Model {

    public function salvarNovo($data){

        $salvo = $this->db->insert('reserva', $data);
        return $salvo;
    }

    public function getReserva(){
        $vendas = $this->db->get('reserva');
        return $vendas->result_array();

    }

    public function deleteReserva($id_reserva){
        $this->db->where('id', $id_reserva);
        $deletado = $this->db->delete('reserva');
        return $deletado;
    }

}