<?php
class Migration_Cria_tabela_de_reserva extends CI_migration {

    public function up() {
        // User table
        $this->dbforge->add_field(array(
            'id_reserva' => array('type' => 'INT','auto_increment' => true),
            'id_produto' => array('type' => 'INT'),
            'id_cliente' => array('type' => 'INT'),
            'data_reserva' => array('type' => 'date'),
            'vendido' => array('type' => 'bool')
        ));
        $this->dbforge->add_key('id_reserva', true);
        $this->dbforge->create_table('reserva', true);


        // Definindo relaçoes com produto e cliente
        $addConstraint = "ALTER TABLE reserva ADD CONSTRAINT IDPRODUTORESERVA_FK FOREIGN KEY (id_produto) REFERENCES estoque(id_produto) ON DELETE CASCADE ON UPDATE RESTRICT";
        $this->db->query($addConstraint);

        $addConstraint = "ALTER TABLE reserva ADD CONSTRAINT IDCLIENTERESERVA_FK FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente) ON DELETE CASCADE ON UPDATE RESTRICT";
        $this->db->query($addConstraint);

    }

    public function down() {

        $dropConstraint = "ALTER TABLE reserva DROP FOREIGN KEY IDPRODUTORESERVA_FK";
        $this->db->query($dropConstraint);


        $dropConstraint = "ALTER TABLE reserva DROP FOREIGN KEY IDCLIENTERESERVA_FK";
        $this->db->query($dropConstraint);

        $this->dbforge->drop_table('reserva');
    }
}