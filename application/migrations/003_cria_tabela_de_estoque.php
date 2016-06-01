<?php
class Migration_Cria_tabela_de_estoque extends CI_migration {

    public function up() {
        // User table
        $this->dbforge->add_field(array(
            'id_produto' => array('type' => 'INT','auto_increment' => true),
            'id_fornecedor' => array('type' => 'INT'),
            'descricao' => array('type' => 'varchar(255)'),
            'tamanho' => array('type' => 'varchar(3)'),
            'quantidade' => array('type' => 'INT'),
            'custo' => array('type' => 'decimal(5,2)'),
            'preco_venda' => array('type' => 'decimal(5,2)'),
            'caminho_foto' => array('type' => 'varchar(255)')
        ));
        $this->dbforge->add_key('id_produto', true);
        $this->dbforge->create_table('estoque', true);

        $addConstraint = "ALTER TABLE estoque ADD CONSTRAINT IDFORNECEDOR_FK FOREIGN KEY (id_fornecedor) REFERENCES fornecedores(id_fornecedor) ON DELETE RESTRICT ON UPDATE RESTRICT";
        $this->db->query($addConstraint);

    }

    public function down() {

        $dropConstraint = "ALTER TABLE estoque DROP FOREIGN KEY IDFORNECEDOR_FK";
        $this->db->query($dropConstraint);

        $this->dbforge->drop_table('estoque');
    }
}