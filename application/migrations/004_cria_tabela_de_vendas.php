<?php
class Migration_Cria_tabela_de_vendas extends CI_migration {

    public function up() {
        // User table
        $this->dbforge->add_field(array(
            'id' => array('type' => 'INT','auto_increment' => true),
            'id_produto' => array('type' => 'INT'),
            'id_cliente' => array('type' => 'INT'),
            'data_venda' => array('type' => 'date'),
            'preco' => array('type' => 'decimal(5,2)'),
            'forma_pgto' => array('type' => 'varchar(25)'),
            'parcelas_restantes' => array('type' => 'INT')
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('vendas', true);


        // Definindo relaçoes com produto e cliente
        $addConstraint = "ALTER TABLE vendas ADD CONSTRAINT IDPRODUTO_FK FOREIGN KEY (id_produto) REFERENCES estoque(id_produto) ON DELETE NO ACTION ON UPDATE RESTRICT";
        $this->db->query($addConstraint);

        $addConstraint = "ALTER TABLE vendas ADD CONSTRAINT IDCLIENTE_FK FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente) ON DELETE NO ACTION ON UPDATE RESTRICT";
        $this->db->query($addConstraint);

    }

    public function down() {

        $dropConstraint = "ALTER TABLE vendas DROP FOREIGN KEY IDPRODUTO_FK";
        $this->db->query($dropConstraint);


        $dropConstraint = "ALTER TABLE vendas DROP FOREIGN KEY IDCLIENTE_FK";
        $this->db->query($dropConstraint);

        $this->dbforge->drop_table('vendas');
    }
}