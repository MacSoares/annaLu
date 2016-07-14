<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Cria_coluna_identificador_estoque extends CI_Migration {

    public function up() {

        $profile_route_column = array(
            'identificador' => array('type' => 'varchar(20)','NULL' => FALSE)
        );

        $this->dbforge->add_column('estoque', $profile_route_column);

        $addConstraint = "ALTER TABLE `estoque` ADD UNIQUE(`identificador`)";
        $this->db->query($addConstraint);

    }

    public function down() {
        $this->dbforge->drop_column('estoque', "identificador");
    }
}

?>
