<?php
class Migration_Cria_tabela_de_fornecedores extends CI_migration {

    public function up() {
        // User table
        $this->dbforge->add_field(array(
            'id_fornecedor' => array('type' => 'INT','auto_increment' => true),
            'name' => array('type' => 'varchar(70)'),
            'cnpj' => array('type' => 'varchar(20)'),
            'telefone' => array('type' => 'varchar(11)'),
            'endereco' => array('type' => 'varchar(100)'),
            'forma_envio' => array('type' => 'varchar(20)'),
            'forma_pagamento' => array('type' => 'varchar(20)'),
            'observacoes' => array('type' => 'varchar(255)')
        ));
        $this->dbforge->add_key('id_fornecedor', true);
        $this->dbforge->create_table('fornecedores', true);

    }

    public function down() {
        $this->dbforge->drop_table('fornecedores');
    }
}