<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FluxoDeCaixa extends CI_Controller {

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

    public function fluxo_de_caixa()
    {
        $this->loadGraficoColunas();

        $this->template->load_template('fluxo/fluxos');
    }

    public function loadGraficoColunas(){
        date_default_timezone_set('America/Sao_Paulo');
        $this->load->model('caixa_model');
        $this->gcharts->load('ColumnChart');

        $caixa = $this->caixa_model->getCaixa();

        $dataTable = $this->gcharts->DataTable('LancamentosDiarios');

        $dataTable->addColumn('string', 'Datas', 'datas');
        $dataTable->addColumn('number', 'Entradas', 'entradas');
        $dataTable->addColumn('number', 'Saidas', 'saidas');

        $entradas =0;
        $saidas =0;
        foreach ($caixa as $key => $fluxo) {
            $data = DateTime::createFromFormat("Y-m-d",$fluxo['data']);
            $data_compara = $data->format("m/Y");

            if($data_compara == date("m/Y")){
                $entradas = $entradas + $fluxo['valor_entrada'];
                $saidas = $saidas + $fluxo['valor_saida'];
            }else{

            }
        }
        $returnData = array(
            "Mes de ".date("M")." de ".date("Y"),
            $entradas,
            $saidas
            );
        $dataTable->addRow($returnData);
        $config = array(
             'title' => ' '
        );

        $this->gcharts->ColumnChart('LancamentosDiarios')->setConfig($config);
    }

}
