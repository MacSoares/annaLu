<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fornecedor extends CI_Controller {

    public static function getInstance(){

        if(!isset(self::$instance)){
            self::$instance = new Fornecedor();
        }

        $instance = self::$instance;

        return $instance;
    }

    public function cadastrar_fornecedor(){
        $this->template->load_template('fornecedor/cadastrar');
    }

    public function listar_fornecedor($passData=Null){
        $this->load->model("fornecedor_model");
        $fornecedores = $this->fornecedor_model->getFornecedores();

        if ($passData) {
            $data = array(
                'resultado' => $passData['resultado'],
                'message' => $passData['message'],
                'fornecedores' => $fornecedores
                );
        }else{
            $data = array(
                'resultado' => ESCONDER_LABEL,
                'message' => 'nada a dizer',
                'fornecedores' => $fornecedores
            );
        }

        $this->template->load_template('fornecedor/listar', $data);
    }
    public function salvarNovo(){

        $nome = $this->input->post('nome');
        $telefone = $this->input->post('telefone');
        $endereco = $this->input->post('endereco');
        $cnpj = $this->input->post('cnpj');
        $forma_envio = $this->input->post('forma_de_envio');
        $forma_pgto = $this->input->post('forma_de_pagamento');
        $observacao = $this->input->post('observacao');


        $data = array(
                'name' => $nome,
                'telefone' => $telefone,
                'endereco' => $endereco,
                'cnpj' => $cnpj,
                'forma_envio' => $forma_envio,
                'forma_pagamento' => $forma_pgto,
                'observacoes' => $observacao
            );

        try{

            $this->load->model("fornecedor_model");
            $salvo = $this->fornecedor_model->salvarNovo($data);

        }catch(Exception $e){

            $status = "danger";
            $message = $e->getMessage();
        }

        if ($salvo) {
            $passData = array(
                'resultado' => 1,
                'status' => "success",
                'message' => "Fornecedor cadastrado com sucesso!"
                );
        }else{
            $passData = array(
                'resultado' => 0,
                'status' => "danger",
                'message' => "Fornecedor nao cadastrado. Tente novamente"
                );
        }

        $this->listar_fornecedor($passData);

    }

    public function delete($id_fornecedor){
        $this->load->model("fornecedor_model");

        $deletado = $this->fornecedor_model->delete($id_fornecedor);

        if($deletado){
            $passData = array(
                'resultado' => 1,
                'status' => "success",
                'message' => "Fornecedor deletado com sucesso."
                );
        }else{
            $passData = array(
                'resultado' => 0,
                'status' => "danger",
                'message' => "Fornecedor não pode ser deletado."
                );
        }
        $this->listar_fornecedor($passData);
    }

    public function form_altera($id_fornecedor){
        $this->load->model("fornecedor_model");

        $fornecedor = $this->fornecedor_model->getFornecedorById($id_fornecedor);

        $data = array('fornecedor' => $fornecedor);

        $this->template->load_template("fornecedor/form_alteracao", $data);
    }

    public function updateFornecedor(){

        $nome = $this->input->post('nome');
        $telefone = $this->input->post('telefone');
        $endereco = $this->input->post('endereco');
        $cnpj = $this->input->post('cnpj');
        $forma_envio = $this->input->post('forma_de_envio');
        $forma_pgto = $this->input->post('forma_de_pagamento');
        $observacao = $this->input->post('observacao');
        $id_fornecedor = $this->input->post('id_fornecedor');

        $data = array(
                'name' => $nome,
                'telefone' => $telefone,
                'endereco' => $endereco,
                'cnpj' => $cnpj,
                'forma_envio' => $forma_envio,
                'forma_pagamento' => $forma_pgto,
                'observacoes' => $observacao
            );

        try{

            $this->load->model("fornecedor_model");
            $alterado = $this->fornecedor_model->updateFornecedor($data, $id_fornecedor);

        }catch(Exception $e){

            $status = "danger";
            $message = $e->getMessage();
        }

        if ($alterado) {
            $passData = array(
                'resultado' => 1,
                'status' => "success",
                'message' => "Fornecedor alterado com sucesso!"
                );
        }else{
            $passData = array(
                'resultado' => 0,
                'status' => "danger",
                'message' => "Fornecedor nao alterado. Tente novamente"
                );
        }

        $this->listar_fornecedor($passData);

    }

}