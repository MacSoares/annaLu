<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."/controllers/Estoque.php");
require_once(APPPATH."/controllers/Cliente.php");
class Venda extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function listar_vendas($passData=Null){
        $this->load->model("venda_model");
        $venda = $this->venda_model->getVenda();

        $venda = $this->modificaVendas($venda);

        if ($passData) {
            $data = array(
                'resultado' => $passData['resultado'],
                'message' => $passData['message'],
                'vendas' => $venda
                );
        }else{
            $data = array(
                'resultado' => ESCONDER_LABEL,
                'message' => 'nada a dizer',
                'vendas' => $venda
            );
        }

        $this->template->load_template('venda/listar',$data);
    }

    public function cadastrar_venda(){
        $this->load->model("cliente_model");
        $this->load->model("estoque_model");

        $clientes = $this->cliente_model->getClientes();
        $clientes = $this->preparaDadosCliente($clientes);

        $produtos = $this->estoque_model->getEstoque();
        $produtos = $this->preparaDadosProduto($produtos);


        $data = array('clientes' => $clientes,
                      'produtos' => $produtos,
                    );

        $this->template->load_template('venda/cadastrar', $data);
    }

    public function salvarNovo(){

        $id_produto = $this->input->post("produto");
        $id_cliente = $this->input->post("cliente");
        $data_venda = $this->input->post("data_venda");
        $preco = $this->input->post("preco");
        $forma_pagamento = $this->input->post("forma_pagamento");
        $parcelas = $this->input->post("parcelas");

        $data = array(
                'id_produto' => $id_produto,
                'id_cliente' => $id_cliente,
                'data_venda' => $data_venda,
                'preco' => $preco,
                'forma_pagamento' => $forma_pagamento,
                'parcelas' => $parcelas
            );

        try{
            $this->load->model("venda_model");
            $salvo = $this->venda_model->salvarNovo($data);
        }catch(Exception $e){

            $status = "danger";
            $message = $e->getMessage();
        }

        if ($salvo) {
            $passData = array(
                'resultado' => 1,
                'status' => "success",
                'message' => "Venda efetuada com sucesso!"
                );
        }else{
            $passData = array(
                'resultado' => 0,
                'status' => "danger",
                'message' => "Venda não efetuada. Tente novamente"
                );
        }

        $this->listar_vendas($passData);

    }

    public function delete($id_venda){

        $this->load->model("venda_model");

        $deletado = $this->venda_model->deleteVenda($id_venda);

        if($deletado){
            $passData = array(
                'resultado' => 1,
                'status' => "success",
                'message' => "Venda deletada do estoque com sucesso."
                );
        }else{
            $passData = array(
                'resultado' => 0,
                'status' => "danger",
                'message' => "Venda não pode ser deletada. Tente novamente"
                );
        }
        $this->listar_vendas($passData);

    }

    private function preparaDadosCliente($clientes){

        foreach ($clientes as $key => $cliente) {
            $returnData[$cliente['id_cliente']] = $cliente['name'];
        }

        return $returnData;
    }

    private function modificaClientes($cliente){
        $this->load->model("cliente_model");

        $cont = 0;

        foreach ($cliente as $key => $nomes) {
            $cliente = $this->cliente_model->getClienteById($nomes['id_cliente']);

            $nomes['id_cliente'] = $cliente['name'];
            $returnData[$cont] = $nomes;
            $cont++;
        }

        return $returnData;

    }
    private function preparaDadosProduto($produtos){

        foreach ($produtos as $key => $produto) {
            $returnData[$produto['id_produto']] = $produto['descricao'];
        }

        return $returnData;
    }

    private function modificaProdutos($produto){
        $this->load->model("estoque_model");

        $cont = 0;

        foreach ($produto as $key => $nome) {
            $produto = $this->estoque_model->getProdutoById($nomes['id_produto']);

            $nomes['id_produto'] = $produto['descricao'];
            $returnData[$cont] = $nomes;
            $cont++;
        }

        return $returnData;

    }
}
