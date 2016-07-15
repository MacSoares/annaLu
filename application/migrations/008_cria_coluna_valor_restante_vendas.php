<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Cria_coluna_valor_restante_vendas extends CI_Migration {

    public function up() {

        $profile_route_column = array(
            'valor_restante' => array('type' => 'decimal(5,2)','NULL' => TRUE)
        );

        $this->dbforge->add_column('vendas', $profile_route_column);

        $profile_route_column2 = array(
            'qtd_parcelas' => array('type' => 'int(2)','NULL' => FALSE)
        );

        $this->dbforge->add_column('vendas', $profile_route_column2);

    }

    public function down() {
        $this->dbforge->drop_column('vendas', "valor_restante");
        $this->dbforge->drop_column('vendas', "qtd_parcelas");
    }
}

?>
