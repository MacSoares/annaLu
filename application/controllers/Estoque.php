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
    public function listar_pecas($passData=Null){
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
        $fornecedores = $this->getDadosFornecedores();

        $data = array('fornecedores' => $fornecedores);

        $this->template->load_template('estoque/cadastrar', $data);
    }

    public function form_foto($id_peca){
        $data = array('id_peca'=>$id_peca);
        $this->template->load_template('estoque/upload_foto', $data);
    }

    public function upload(){
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 4096;
        $config['max_width']            = 0;
        $config['max_height']           = 0;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile')){

            $passData = array(
            'resultado' => 0,
            'status' => "danger",
            'message' => $this->upload->display_errors()
            );

            $this->listar_pecas($passData);
        }else{

            $caminho_foto = $this->upload->data('file_name');
            $id_produto = $this->input->post('id_peca');

            $data = array(
                    'caminho_foto' => $caminho_foto
                );

            try{
            $this->load->model("estoque_model");
            $salvo = $this->estoque_model->updatePeca($data, $id_produto);
            }catch(Exception $e){

                $status = "danger";
                $message = $e->getMessage();
            }

            if ($salvo) {
                $passData = array(
                    'resultado' => 1,
                    'status' => "success",
                    'message' => "Foto cadastrada com sucesso!"
                    );
            }else{
                $passData = array(
                    'resultado' => 0,
                    'status' => "danger",
                    'message' => "Não foi possivel fazer o upload da foto. Tente novamente"
                    );
            }

            $this->listar_pecas($passData);
        }
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

    public function form_altera($id_peca){
        $this->load->model("estoque_model");

        $peca = $this->estoque_model->getPecaById($id_peca);

        $fornecedores = $this->getDadosFornecedores();

        $data = array('peca' => $peca, 'fornecedores' => $fornecedores);

        $this->template->load_template("estoque/form_alteracao", $data);
    }

    public function update(){

        $descricao = $this->input->post("descricao");
        $tamanho = $this->input->post("tamanho");
        $quantidade = $this->input->post("quantidade");
        $custo = $this->input->post("custo");
        $precoVenda = $this->input->post("precoVenda");
        $id_fornecedor = $this->input->post("fornecedor");
        $id_produto = $this->input->post("id_peca");

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
            $salvo = $this->estoque_model->updatePeca($data, $id_produto);
        }catch(Exception $e){

            $status = "danger";
            $message = $e->getMessage();
        }

        if ($salvo) {
            $passData = array(
                'resultado' => 1,
                'status' => "success",
                'message' => "Dados alterados com sucesso!"
                );
        }else{
            $passData = array(
                'resultado' => 0,
                'status' => "danger",
                'message' => "Não puderam ser alterados. Tente novamente"
                );
        }

        $this->listar_pecas($passData);
    }

    public function delete($id_peca){

        $this->load->model("estoque_model");

        $deletado = $this->estoque_model->deletePeca($id_peca);

        if($deletado){
            $passData = array(
                'resultado' => 1,
                'status' => "success",
                'message' => "Peça deletada do estoque com sucesso."
                );
        }else{
            $passData = array(
                'resultado' => 0,
                'status' => "danger",
                'message' => "Peça não pode ser deletada. Tente novamente"
                );
        }
        $this->listar_pecas($passData);

    }

    private function getDadosFornecedores(){
        $this->load->model("fornecedor_model");
        $fornecedores = $this->fornecedor_model->getFornecedores();
        $fornecedores = $this->preparaDadosFornecedor($fornecedores);
        return $fornecedores;
    }

    private function preparaDadosFornecedor($fornecedores){

        foreach ($fornecedores as $key => $fornecedor) {
            $returnData[$fornecedor['id_fornecedor']] = $fornecedor['name'];
        }

        return $returnData;
    }

    private function modificaFornecedores($estoque){
        $this->load->model("fornecedor_model");

        $cont = 0;
        $returnData = null;
        foreach ($estoque as $key => $peca) {
            $fornecedor = $this->fornecedor_model->getFornecedorById($peca['id_fornecedor']);

            $peca['id_fornecedor'] = $fornecedor['name'];
            $returnData[$cont] = $peca;
            $cont++;
        }

        return $returnData;

    }
}
