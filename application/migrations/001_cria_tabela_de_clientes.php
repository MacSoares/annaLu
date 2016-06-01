<?php
class Migration_Cria_tabela_de_clientes extends CI_migration {

    public function up() {
        // User table
        $this->dbforge->add_field(array(
            'id_cliente' => array('type' => 'INT','auto_increment' => true),
            'name' => array('type' => 'varchar(70)'),
            'telefone' => array('type' => 'varchar(11)'),
            'endereco' => array('type' => 'varchar(100)'),
            'data_nascimento' => array('type' => 'date'),
            'observacoes' => array('type' => 'varchar(255)')
        ));
        $this->dbforge->add_key('id_cliente', true);
        $this->dbforge->create_table('clientes', true);

    }

    public function down() {
        $this->dbforge->drop_table('clientes');
    }
}