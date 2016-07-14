<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva extends CI_Controller {

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
    public function mostrar_reserva($passData=NULL){

        $this->load->model("reserva_model");
        $reserva = $this->reserva_model->getReserva();

        if($reserva){
            $reserva = $this->modificaClientes($reserva);
            $reserva = $this->modificaProdutos($reserva);
            $reserva = $this->modificaDatasReservas($reserva);
        }

        if ($passData) {
            $data = array(
                'resultado' => $passData['resultado'],
                'message' => $passData['message'],
                'reservas' => $reserva
                );
        }else{
            $data = array(
                'resultado' => ESCONDER_LABEL,
                'message' => 'nada a dizer',
                'reservas' => $reserva
            );
        }
        $this->template->load_template('reserva/listar',$data);
    }

    public function resgistrar_reserva($id_produto=NULL){
        $this->load->model("cliente_model");
        $this->load->model("estoque_model");

        $clientes = $this->cliente_model->getClientes();
        $clientes = $this->preparaDadosCliente($clientes);

        if($id_produto){
            $produto = $this->estoque_model->getPecaById($id_produto);
            $produtos[$produto['id_produto']] = $produto['descricao'];
        }else{
            $produtos = $this->estoque_model->getEstoque();
            $produtos = $this->preparaDadosProduto($produtos);
        }


        $data = array('clientes' => $clientes,
                      'produtos' => $produtos,
                    );

        $this->template->load_template('reserva/cadastrar', $data);
    }

    public function salvarNovo(){
        date_default_timezone_set('America/Sao_Paulo');
        $id_produto = $this->input->post("estoque");
        $id_cliente = $this->input->post("cliente");
        $data_reserva = date("Y-m-d");

        $data = array(
                'id_produto' => $id_produto,
                'id_cliente' => $id_cliente,
                'data_reserva' => $data_reserva,
                'vendido' => FALSE
            );

        try{
            $this->load->model("reserva_model");
            $salvo = $this->reserva_model->salvarNovo($data);
            $decrementaQuantidade = $this->decrementaEstoque($id_produto);
        }catch(Exception $e){
            $passData = array(
                'resultado' => 0,
                'status' => "danger",
                'message' => $e->getMessage()
            );
        }

        if ($salvo & $decrementaQuantidade) {
            $passData = array(
                'resultado' => 1,
                'status' => "success",
                'message' => "Reserva efetuada com sucesso!"
                );
        }else{
            $passData = array(
                'resultado' => 0,
                'status' => "danger",
                'message' => "Reserva não efetuada. Tente novamente"
                );
        }

        $this->mostrar_reserva($passData);
    }

    public function cancelar_reserva($id_reserva,$id_produto){
        $this->load->model("reserva_model");

        $deletado = $this->reserva_model->deleteReserva($id_reserva);
        $incrementado = $this->incrementaEstoque($id_produto);
        if($deletado & $incrementado){
            $passData = array(
                'resultado' => 1,
                'status' => "success",
                'message' => "Reserva de produto cancelada com sucesso."
                );
        }else{
            $passData = array(
                'resultado' => 0,
                'status' => "danger",
                'message' => "Reserva não pode ser cancelada. Tente novamente"
                );
        }
        $this->mostrar_reserva($passData);
    }

    private function decrementaEstoque($id_produto){
        $this->load->model("estoque_model");

        $produto = $this->estoque_model->getPecaById($id_produto);

        if($produto['quantidade'] >= 1){
            $quantidade = $produto['quantidade'] -1;

            $this->load->model("estoque_model");
            $data = array('quantidade' => $quantidade);
            $atualizado = $this->estoque_model->updatePeca($data, $id_produto);
        }else{
           throw new Exception("Produto não existe em estoque!");
        }

        return $atualizado;
    }

    private function incrementaEstoque($id_produto){
        $this->load->model("estoque_model");

        $produto = $this->estoque_model->getPecaById($id_produto);

        $quantidade = $produto['quantidade'] + 1;

        $this->load->model("estoque_model");
        $data = array('quantidade' => $quantidade);
        $atualizado = $this->estoque_model->updatePeca($data, $id_produto);

        return $atualizado;
    }

    private function preparaDadosCliente($clientes){

        foreach ($clientes as $key => $cliente) {
            $returnData[$cliente['id_cliente']] = $cliente['name'];
        }

        return $returnData;
    }

    private function preparaDadosProduto($produtos){

        foreach ($produtos as $key => $produto) {
            $returnData[$produto['id_produto']] = $produto['descricao'];
        }

        return $returnData;
    }

    private function modificaDatasReservas($reservas){
        date_default_timezone_set('America/Sao_Paulo');

        $cont = 0;
        foreach ($reservas as $key => $reserva) {
            $data = DateTime::createFromFormat("Y-m-d",$reserva['data_reserva']);
            $reserva['data_reserva'] = $data->format("d/m/Y");
            $returnData[$cont] = $reserva;
            $cont++;
        }

        return $returnData;
    }

    private function modificaProdutos($produto){
        $this->load->model("estoque_model");

        $cont = 0;

        foreach ($produto as $key => $nome) {
            $produto = $this->estoque_model->getPecaById($nome['id_produto']);

            $nome['id_produto'] = $produto['id_produto'];
            $nome['nome_produto'] = $produto['descricao'];
            $returnData[$cont] = $nome;
            $cont++;
        }

        return $returnData;

    }

    private function modificaClientes($cliente){
        $this->load->model("cliente_model");

        $cont = 0;
        foreach ($cliente as $key => $nomes) {
            $cliente = $this->cliente_model->getClienteById($nomes['id_cliente']);

            $nomes['id_cliente'] = $cliente['id_cliente'];
            $nomes['nome_cliente'] = $cliente['name'];
            $returnData[$cont] = $nomes;
            $cont++;
        }

        return $returnData;

    }
}
