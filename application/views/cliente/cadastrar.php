<?php
   $submitBtn = array(
            "class" => "btn btn-primary",
            "content" => "Salvar",
            "type" => "submit"
    );

    $nome = array(
            "name" => "nome",
            "id" => "nome",
            "type" => "text",
            "class" => "form-campo",
            "class" => "form-control",
            "maxlength" => "150"
    );
    $telefone = array(
            "name" => "telefone",
            "id" => "telefone",
            "type" => "text",
            "class" => "form-campo",
            "class" => "form-control",
            "maxlength" => "12",
            "placeholder" => "Somente números"
    );
    $endereco = array(
            "name" => "endereco",
            "id" => "endereco",
            "type" => "text",
            "class" => "form-campo",
            "class" => "form-control",
            "maxlength" => "200"
    );
    $data_nascimento = array(
            "name" => "data_nascimento",
            "id" => "data_nascimento",
            "type" => "date",
            "class" => "form-campo",
            "class" => "form-control"
    );
    $obs = array(
            "name" => "obsercacao",
            "id" => "observacao",
            "type" => "text",
            "class" => "form-campo",
            "class" => "form-control",
            "maxlength" => "250"
    );
?>

<div class="box box-default">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Cadastrar Novo Cliente</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?=form_open('cliente/salvarNovo','');?>
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
                    echo form_label("Data de Nascimento", "data_nascimento");
                    echo form_input($data_nascimento);
                    echo form_error("data_nascimento");
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
</div>