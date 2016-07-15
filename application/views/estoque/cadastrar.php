<?php
    $submitBtn = array(
            "class" => "btn btn-primary fa fa-floppy-o",
            "content" => "    Salvar",
            "type" => "submit"
    );

    $descricao = array(
            "name" => "descricao",
            "id" => "descricao",
            "type" => "textarea",
            "class" => "form-campo",
            "class" => "form-control",
            "maxlength" => "150"
    );
    $identificador = array(
            "name" => "identificador",
            "id" => "identificador",
            "type" => "text",
            "class" => "form-campo",
            "class" => "form-control",
            "maxlength" => "12"
    );
    $tamanho = array(
            "name" => "tamanho",
            "id" => "tamanho",
            "type" => "text",
            "class" => "form-campo",
            "class" => "form-control",
            "maxlength" => "12",
            "placeholder" => "P/M/G/GG ou Numeração Sapato"
    );
    $custo = array(
            "name" => "custo",
            "id" => "custo",
            "type" => "text",
            "class" => "form-campo",
            "class" => "form-control",
            "maxlength" => "7",
            "placeholder" => "R$"
    );
    $quantidade = array(
            "name" => "quantidade",
            "id" => "quantidade",
            "type" => "text",
            "class" => "form-campo",
            "class" => "form-control",
            "maxlength" => "4",
            "placeholder" => "Somente números"
    );
    $precoVenda = array(
            "name" => "precoVenda",
            "id" => "precoVenda",
            "type" => "number",
            "class" => "form-campo",
            "class" => "form-control",
            "maximum" => "2000",
            "step" => "any",
            "placeholder" => "R$"
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
        <?=form_open('estoque/salvarNovo');?>
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
                echo form_label("Identificador", "identificador");
                echo form_input($identificador);
                echo form_error("identificador");
            ?>
            </div>
            <div class="form-group">
            <?php
                echo form_label("Fornecedor", "fornecedor");
                echo "<br>";
                echo form_dropdown("fornecedor", $fornecedores);
                echo form_error("fornecedor");
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
                echo form_label("Custo", "custo");
                echo form_input($custo);
                echo form_error("custo");
            ?>
            </div>
            <div class="form-group">
            <?php
                echo form_label("Preço de Revenda", "precoVenda");
                echo form_input($precoVenda);
                echo form_error("precoVenda");
            ?>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <?=form_button($submitBtn);?>
        </form>
      </div>
    </div>
</div>