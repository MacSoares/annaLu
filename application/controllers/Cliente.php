<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

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
    public function cadastrar_cliente(){
        $this->template->load_template('cliente/cadastrar');
    }

    public function listar_cliente($passData=Null){

        $this->load->model("cliente_model");
        $clientes = $this->cliente_model->getClientes();
        $clientes = $this->modificaDatasView($clientes);

        if ($passData) {
            $data = array(
                'resultado' => $passData['resultado'],
                'message' => $passData['message'],
                'clientes' => $clientes
                );
        }else{
            $data = array(
                'resultado' => ESCONDER_LABEL,
                'message' => 'nada a dizer',
                'clientes' => $clientes
            );
        }
        $this->template->load_template('cliente/listar', $data);
    }

    public function delete($id_cliente){
        $this->load->model("cliente_model");

        $deletado = $this->cliente_model->deleteCliente($id_cliente);
        $this->listar_cliente();
    }

    public function salvarNovo(){

        $nome = $this->input->post('nome');
        $telefone = $this->input->post('telefone');
        $endereco = $this->input->post('endereco');
        $data_nascimento = $this->input->post('data_nascimento');
        $observacao = $this->input->post('obsercacao');


        $data = array(
                'name' => $nome,
                'telefone' => $telefone,
                'endereco' => $endereco,
                'data_nascimento' => $data_nascimento,
                'observacoes' => $observacao
            );

        try{

            $this->load->model("cliente_model");
            $salvo = $this->cliente_model->salvarNovo($data);

        }catch(Exception $e){

            $status = "danger";
            $message = $e->getMessage();
        }

        if ($salvo) {
            $passData = array(
                'resultado' => 1,
                'status' => "success",
                'message' => "Cliente cadastrado com sucesso!"
                );
        }else{
            $passData = array(
                'resultado' => 0,
                'status' => "danger",
                'message' => "Cliente nao cadastrado. Tente novamente"
                );
        }

        $this->listar_cliente($passData);

    }
    public function form_altera($id_cliente){
        $this->load->model("cliente_model");

        $cliente = $this->cliente_model->getClienteById($id_cliente);

        $data = array('cliente' => $cliente);

        $this->template->load_template("cliente/form_alteracao", $data);
    }

    public function updateCliente(){

        $nome = $this->input->post('nome');
        $telefone = $this->input->post('telefone');
        $endereco = $this->input->post('endereco');
        $data_nascimento = $this->input->post('data_nascimento');
        $observacao = $this->input->post('observacao');
        $id_cliente = $this->input->post('id_cliente');

        $data = array(
                'name' => $nome,
                'telefone' => $telefone,
                'endereco' => $endereco,
                'data_nascimento'=> $data_nascimento,
                'observacoes' => $observacao
            );

        try{

            $this->load->model("cliente_model");
            $alterado = $this->cliente_model->updateCliente($id_cliente, $data);

        }catch(Exception $e){

            $status = "danger";
            $message = $e->getMessage();
        }

        if ($alterado) {
            $passData = array(
                'resultado' => 1,
                'status' => "success",
                'message' => "Cliente alterado com sucesso!"
                );
        }else{
            $passData = array(
                'resultado' => 0,
                'status' => "danger",
                'message' => "Cliente nao alterado. Tente novamente"
                );
        }

        $this->listar_cliente($passData);

    }

    private function modificaDatasView($clientes){
        date_default_timezone_set('America/Sao_Paulo');
        $cont = 0;
        $returnData = null;

        foreach ($clientes as $key => $cliente) {
            $aniversario = DateTime::createFromFormat("Y-m-d",$cliente['data_nascimento']);
            $cliente['data_nascimento'] = $aniversario->format("d/m/Y");

            $returnData[$cont] = $cliente;
            $cont++;

        }

        return $returnData;
    }
}
