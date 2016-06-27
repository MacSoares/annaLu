<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fornecedor extends CI_Controller {

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
        // $this->load->view('welcome_message');
    public function cadastrar_fornecedor(){
        $this->template->load_template('fornecedor/cadastrar');
    }

    public function listar_fornecedor($passData=Null){
        $this->load->model("fornecedor_model");
        $fornecedores = $this->fornecedor_model->getFornecedores();

        if ($passData) {
            $data = array(
                'salvo' => $passData['salvo'],
                'message' => $passData['message'],
                'fornecedores' => $fornecedores
                );
        }else{
            $data = array(
                'salvo' => ESCONDER_LABEL,
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

            $status = "success";
            $message = "Cliente cadastrado com sucesso!";

        }catch(Exception $e){

            $status = "danger";
            $message = $e->getMessage();
        }

        if ($salvo) {
            $passData = array(
                'salvo' => 1,
                'status' => "success",
                'message' => "Fornecedor cadastrado com sucesso!"
                );
        }else{
            $passData = array(
                'salvo' => 0,
                'status' => "danger",
                'message' => "Fornecedor nao cadastrado. Tente novamente"
                );
        }

        $this->listar_fornecedor($passData);

    }

}