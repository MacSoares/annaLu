<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$aniversariantesMes = $this->getAniversariantesDoMes();
		$aniversariantesDia = $this->getAniversariantesDoDia();

		$data = array(
				'mes' => $aniversariantesMes,
				'dia' => $aniversariantesDia
			);

		$this->template->load_template('welcome_message', $data);
	}

	private function getAniversariantesDoMes(){
		date_default_timezone_set('America/Sao_Paulo');
		$this->load->model("cliente_model");

		$clientes = $this->cliente_model->getClientes();

		$mes = date("m");
		$cont = 0;
        $returnData = null;

        foreach ($clientes as $key => $cliente) {
            $aniversario = DateTime::createFromFormat("Y-m-d",$cliente['data_nascimento']);
            $cliente['data_nascimento'] = $aniversario->format("d/m");

            if($mes == $aniversario->format("m")){
            	$returnData[$cont] = $cliente;
            	$cont++;
            }

        }

        return $returnData;

	}

	private function getAniversariantesDoDia(){
		date_default_timezone_set('America/Sao_Paulo');
		$this->load->model("cliente_model");

		$clientes = $this->cliente_model->getClientes();

		$dia = date("d");
		$cont = 0;
        $returnData = null;

        foreach ($clientes as $key => $cliente) {
            $aniversario = DateTime::createFromFormat("Y-m-d",$cliente['data_nascimento']);
            $cliente['data_nascimento'] = $aniversario->format("d/m");

            if($dia == $aniversario->format("d")){
            	$returnData[$cont] = $cliente;
            	$cont++;
            }

        }

        return $returnData;

	}
}
