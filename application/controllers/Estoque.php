<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."/controllers/Fornecedor.php");
class Estoque extends CI_Controller {

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
    public function listar_pecas($passData=Null)
    {
        $this->load->model("estoque_model");
        $estoque = $this->estoque_model->getEstoque();

        $estoque = $this->modificaFornecedores($estoque);

        if ($passData) {
            $data = array(
                'resultado' => $passData['resultado'],
                'message' => $passData['message'],
                'pecas' => $estoque
                );
        }else{
            $data = array(
                'resultado' => ESCONDER_LABEL,
                'message' => 'nada a dizer',
                'pecas' => $estoque
            );
        }

        $this->template->load_template('estoque/listar',$data);
    }

    public function cadastrar_peca(){
        $this->load->model("fornecedor_model");
        $fornecedores = $this->fornecedor_model->getFornecedores();
        $fornecedores = $this->preparaDadosFornecedor($fornecedores);

        $data = array('fornecedores' => $fornecedores);

        $this->template->load_template('estoque/cadastrar', $data);
    }

    public function salvarNovo(){

        $descricao = $this->input->post("descricao");
        $tamanho = $this->input->post("tamanho");
        $quantidade = $this->input->post("quantidade");
        $custo = $this->input->post("custo");
        $precoVenda = $this->input->post("precoVenda");
        $id_fornecedor = $this->input->post("fornecedor");

        $data = array(
                'descricao' => $descricao,
                'tamanho' => $tamanho,
                'quantidade' => $quantidade,
                'custo' => $custo,
                'preco_venda' => $precoVenda,
                'id_fornecedor' => $id_fornecedor
            );

        try{
            $this->load->model("estoque_model");
            $salvo = $this->estoque_model->salvarNovo($data);
        }catch(Exception $e){

            $status = "danger";
            $message = $e->getMessage();
        }

        if ($salvo) {
            $passData = array(
                'resultado' => 1,
                'status' => "success",
                'message' => "Nova peça cadastrada com sucesso!"
                );
        }else{
            $passData = array(
                'resultado' => 0,
                'status' => "danger",
                'message' => "Nova peça não cadastrada. Tente novamente"
                );
        }

        $this->listar_pecas($passData);

    }

    private function preparaDadosFornecedor($fornecedores){

        foreach ($fornecedores as $key => $fornecedor) {
            $returnData[$fornecedor['id_fornecedor']] = $fornecedor['name'];
        }

        return $returnData;
    }
}
