<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
        $this->template->load_template('estoque/cadastrar');
    }
}
