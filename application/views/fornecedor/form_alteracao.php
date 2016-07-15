<?php
   $submitBtn = array(
            "class" => "btn btn-primary fa fa-retweet",
            "content" => "  Atualizar",
            "type" => "submit"
    );

    $nome = array(
            "name" => "nome",
            "id" => "nome",
            "type" => "text",
            "class" => "form-campo",
            "class" => "form-control",
            "maxlength" => "150",
            "value" => $fornecedor['name']
    );
    $telefone = array(
            "name" => "telefone",
            "id" => "telefone",
            "type" => "text",
            "class" => "form-campo",
            "class" => "form-control",
            "maxlength" => "12",
            "placeholder" => "Somente números",
            "value" => $fornecedor['telefone']
    );
    $cnpj = array(
            "name" => "cnpj",
            "id" => "cnpj",
            "type" => "text",
            "class" => "form-campo",
            "class" => "form-control",
            "maxlength" => "20",
            "placeholder" => "Somente números",
            "value" => $fornecedor['cnpj']
    );
    $endereco = array(
            "name" => "endereco",
            "id" => "endereco",
            "type" => "text",
            "class" => "form-campo",
            "class" => "form-control",
            "maxlength" => "200",
            "value" => $fornecedor['endereco']
    );
    $forma_de_pagamento = array(
            "name" => "forma_de_pagamento",
            "id" => "forma_de_pagamento",
            "type" => "text",
            "class" => "form-campo",
            "class" => "form-control",
            "value" => $fornecedor['forma_pagamento']
    );
    $forma_de_envio = array(
            "name" => "forma_de_envio",
            "id" => "forma_de_envio",
            "type" => "text",
            "class" => "form-campo",
            "class" => "form-control",
            "value" => $fornecedor['forma_envio']
    );
    $obs = array(
            "name" => "observacao",
            "id" => "observacao",
            "type" => "text",
            "class" => "form-campo",
            "class" => "form-control",
            "maxlength" => "255",
            "value" => $fornecedor['observacoes']
    );

    $hidden = array('id_fornecedor' => $fornecedor['id_fornecedor']);
?>


<div class="row">
    <div class="col-md-6" style="margin-left:25%">
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Cadastrar Novo Fornecedor</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?=form_open('fornecedor/updateFornecedor','', $hidden);?>
          <div class="box-body">
            <div class="form-group">
            <?php
                echo form_label("Nome", "nome");
                echo form_input($nome);
                echo form_error("nome");
            ?>
            </div>
            <div class="form-group">
            <?php
                echo form_label("Telefone", "telefone");
                echo form_input($telefone);
                echo form_error("telefone");
            ?>
            </div>
            <div class="form-group">
            <?php
                echo form_label("Endereço", "endereco");
                echo form_input($endereco);
                echo form_error("endereco");
            ?>
            </div>
            <div class="form-group">
            <?php
                echo form_label("CNPJ", "cnpj");
                echo form_input($cnpj);
                echo form_error("cnpj");
            ?>
            </div>
            <div class="form-group">
            <?php
                echo form_label("Forma de Envio", "forma_de_envio");
                echo form_input($forma_de_envio);
                echo form_error("forma_de_envio");
            ?>
            </div>
            <div class="form-group">
            <?php
                echo form_label("Forma de Pagamento", "forma_de_pagamento");
                echo form_input($forma_de_pagamento);
                echo form_error("forma_de_pagamento");
            ?>
            </div>
            <div class="form-group">
            <?php
                echo form_label("Observações", "observacao");
                echo form_input($obs);
                echo form_error("observacao");
            ?>
            </div>

          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <?=form_button($submitBtn);?>
          </div>
        </form>
      </div>
    </div>
</div>