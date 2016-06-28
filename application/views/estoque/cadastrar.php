<?php
   $submitBtn = array(
            "class" => "btn btn-primary fa fa-floppy-o",
            "content" => "Salvar",
            "type" => "submit"
    );

    $descricao = array(
            "name" => "descricao",
            "id" => "descricao",
            "type" => "text",
            "class" => "form-campo",
            "class" => "form-control",
            "maxlength" => "150"
    );
    $tamanho = array(
            "name" => "tamanho",
            "id" => "tamanho",
            "type" => "text",
            "class" => "form-campo",
            "class" => "form-control",
            "maxlength" => "12",
            "placeholder" => "Somente números"
    );
    $cnpj = array(
            "name" => "cnpj",
            "id" => "cnpj",
            "type" => "text",
            "class" => "form-campo",
            "class" => "form-control",
            "maxlength" => "20",
            "placeholder" => "Somente números"
    );
    $quantidade = array(
            "name" => "quantidade",
            "id" => "quantidade",
            "type" => "text",
            "class" => "form-campo",
            "class" => "form-control",
            "maxlength" => "200"
    );
    $forma_de_pagamento = array(
            "name" => "forma_de_pagamento",
            "id" => "forma_de_pagamento",
            "type" => "text",
            "class" => "form-campo",
            "class" => "form-control"
    );
    $forma_de_envio = array(
            "name" => "forma_de_envio",
            "id" => "forma_de_envio",
            "type" => "text",
            "class" => "form-campo",
            "class" => "form-control",
    );
    $obs = array(
            "name" => "observacao",
            "id" => "observacao",
            "type" => "text",
            "class" => "form-campo",
            "class" => "form-control",
            "maxlength" => "255"
    );
?>


<div class="row">
    <div class="col-md-6" style="margin-left:25%">
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Cadastrar Nova Peça</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?=form_open_multipart('estoque/salvarNovo');?>
          <div class="box-body">
            <div class="form-group">
            <?php
                echo form_label("Descricao", "descricao");
                echo form_input($descricao);
                echo form_error("descricao");
            ?>
            </div>
            <div class="form-group">
            <?php
                echo form_label("Tamanho", "tamanho");
                echo form_input($tamanho);
                echo form_error("tamanho");
            ?>
            </div>
            <div class="form-group">
            <?php
                echo form_label("Quantidade", "quantidade");
                echo form_input($quantidade);
                echo form_error("quantidade");
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