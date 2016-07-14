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

    private function modificaDatasReservas($vendas){
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

            $nome['id_produto'] = $produto['descricao'];
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

            $nomes['id_cliente'] = $cliente['name'];
            $returnData[$cont] = $nomes;
            $cont++;
        }

        return $returnData;

    }
}
