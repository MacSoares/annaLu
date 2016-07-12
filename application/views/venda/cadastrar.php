<?php
    $submitBtn = array(
            "class" => "btn btn-primary fa fa-floppy-o",
            "content" => "    Salvar",
            "type" => "submit"
    );

    $data_venda = array(
            "name" => "data_venda",
            "id" => "data_venda",
            "type" => "date",
            "class" => "form-campo",
            "class" => "form-control"
    );
    $parcelas = array(
            "name" => "parcelas",
            "id" => "parcelas",
            "type" => "number",
            "class" => "form-campo",
            "class" => "form-control",
            "min"=>1
    );
    $forma_pagamento = array(
            "name" => "forma_pagamento",
            "id" => "custo",
            "type" => "text",
            "class" => "form-campo",
            "class" => "form-control",
    );
    $preco = array(
            "name" => "preco",
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
          <h3 class="box-title">Nova Venda</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?=form_open('venda/salvarNovo');?>
          <div class="box-body">
            <div class="form-group">
            <?php
                echo form_label("Cliente", "cliente");
                echo "<br>";
                echo form_dropdown("cliente", $clientes);
                echo form_error("cliente");
            ?>
            </div>
            <div class="form-group">
            <?php
                echo form_label("Produto", "estoque");
                echo "<br>";
                echo form_dropdown("estoque", $produtos);
                echo form_error("estoque");
            ?>
            </div>
            <div class="form-group">
            <?php
                echo form_label("Preço", "preco");
                echo form_input($preco);
                echo form_error("preco");
            ?>
            </div>
            <div class="form-group">
            <?php
                echo form_label("Forma de Pagamento", "forma_pagamento");
                echo form_input($forma_pagamento);
                echo form_error("forma_pagamento");
            ?>
            </div>
            <div class="form-group">
            <?php
                echo form_label("Quantidade de Parcelas", "parcelas");
                echo form_input($parcelas);
                echo form_error("parcelas");
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