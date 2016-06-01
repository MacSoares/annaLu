<?php
class Migration_Cria_tabela_de_caixa extends CI_migration {

    public function up() {
        // User table
        $this->dbforge->add_field(array(
            'id_transacao' => array('type' => 'INT','auto_increment' => true),
            'valor_entrada' => array('type' => 'decimal(5,2)'),
            'valor_saida' => array('type' => 'decimal(5,2)'),
            'data' => array('type' => 'date')
        ));
        $this->dbforge->add_key('id_transacao', true);
        $this->dbforge->create_table('caixa', true);

    }

    public function down() {
        $this->dbforge->drop_table('caixa');
    }
}