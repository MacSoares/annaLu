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

        if($venda){
            $venda = $this->modificaClientes($venda);
            $venda = $this->modificaProdutos($venda);
            $venda = $this->modificaDatasVendas($venda);
        }

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

    public function cadastrar_venda($id_produto=NULL, $id_cliente=NULL){
        $this->load->model("cliente_model");
        $this->load->model("estoque_model");

        if($id_cliente){
            $clientes = $this->cliente_model->getClienteById($id_cliente);
            $cliente[$clientes['id_cliente']] = $clientes['name'];
        }else{
            $clientes = $this->cliente_model->getClientes();
            $cliente = $this->preparaDadosCliente($clientes);
        }
        if($id_produto){
            $produto = $this->estoque_model->getPecaById($id_produto);
            $produtos[$produto['id_produto']] = $produto['descricao'];
        }else{
            $produtos = $this->estoque_model->getEstoque();
            $produtos = $this->preparaDadosProduto($produtos);
        }


        $data = array('clientes' => $cliente,
                      'produtos' => $produtos,
                    );

        $this->template->load_template('venda/cadastrar', $data);
    }

    public function salvarNovo(){
        date_default_timezone_set('America/Sao_Paulo');
        $id_produto = $this->input->post("estoque");
        $id_cliente = $this->input->post("cliente");
        $preco = $this->input->post("preco");
        $forma_pagamento = $this->input->post("forma_pagamento");
        $parcelas = $this->input->post("parcelas");
        $data_venda = date("Y-m-d");

        if ($parcelas > 1) {
            $entrada = $preco / $parcelas;
            $valor_restante = $preco - $entrada;
        }else{
            $entrada = $preco;
            $valor_restante = 0;
        }

        $parcelas_restantes = $parcelas -1;
        $data = array(
                'id_produto' => $id_produto,
                'id_cliente' => $id_cliente,
                'data_venda' => $data_venda,
                'preco' => $preco,
                'forma_pgto' => $forma_pagamento,
                'parcelas_restantes' => $parcelas_restantes,
                'valor_restante' => $valor_restante,
                'qtd_parcelas' => $parcelas
            );

        $caixa = array(
                'valor_entrada' => $entrada,
                'data' => $data_venda
            );

        try{
            $this->load->model("venda_model");
            $salvo = $this->venda_model->salvarNovo($data);
            $salvo = $this->venda_model->salvarNovoFluxo($caixa);
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



    public function quitar_parcela($id_venda,$parcelas_restantes,$valor_restante,$valor_caixa){
        date_default_timezone_set('America/Sao_Paulo');
        $this->load->model("venda_model");
        $data_venda = date("Y-m-d");
        $data = array(
                'parcelas_restantes'=>$parcelas_restantes,
                'valor_restante' => $valor_restante
            );

        $caixa = array(
                'valor_entrada' => $valor_caixa,
                'data' => $data_venda
            );

        try{
            $salvo = $this->venda_model->quitarParcela($data, $id_venda);
            $salvo2 = $this->venda_model->salvarNovoFluxo($caixa);
        }catch(Exception $e){

            $status = "danger";
            $message = $e->getMessage();
        }

        if ($salvo) {
            $passData = array(
                'resultado' => 1,
                'status' => "success",
                'message' => "Parcela quitada com sucesso!"
                );
        }else{
            $passData = array(
                'resultado' => 0,
                'status' => "danger",
                'message' => "Parcela não pode ser quitada. Tente novamente"
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

    private function modificaDatasVendas($vendas){
        date_default_timezone_set('America/Sao_Paulo');

        $cont = 0;
        foreach ($vendas as $key => $venda) {
            $data = DateTime::createFromFormat("Y-m-d",$venda['data_venda']);
            $venda['data_venda'] = $data->format("d/m/Y");
            $returnData[$cont] = $venda;
            $cont++;
        }

        return $returnData;
    }

    private function modificaProdutos($produto){
        $this->load->model("estoque_model");

        $cont = 0;

        foreach ($produto as $key => $nome) {
            $produto = $this->estoque_model->getPecaById($nome['id_produto']);

            $nome['id_produto'] = $produto['identificador'];
            $returnData[$cont] = $nome;
            $cont++;
        }

        return $returnData;

    }
}
