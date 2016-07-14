<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Venda_model extends CI_Model {

    public function salvarNovo($data){

        $salvo = $this->db->insert('vendas', $data);
        return $salvo;
    }

    public function getVenda(){
        $vendas = $this->db->get('vendas');
        return $vendas->result_array();

    }

    public function deleteVenda($id_venda){
        $this->db->where('id', $id_venda);
        $deletado = $this->db->delete('vendas');
        return $deletado;
    }

    public function quitarParcela($data, $id_venda){
        $this->db->where('id', $id_venda);
        $alterado = $this->db->update('vendas', $data);
        return $alterado;
    }

    public function salvarNovoFluxo($data){
        $caixa = array(
                'valor_entrada' => $data['preco'],
                'data' => $data['data_venda']);
        $fluxoSalvo = $this->db->insert('caixa',$caixa);
        return $fluxoSalvo;
    }

}