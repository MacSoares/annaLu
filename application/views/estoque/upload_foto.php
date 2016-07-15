<?php

    $submitBtn = array(
            "class" => "btn btn-primary fa fa-floppy-o",
            "content" => "    Salvar Foto",
            "type" => "submit"
    );

    $descricao = array(
            "name" => "userfile",
            "id" => "upload",
            "type" => "file",
            "class" => "form-campo",
            "class" => "form-control",
            "size" => 20
    );
$hidden = array('id_peca' => $id_peca);
?>

<div class="row">
    <div class="col-md-6" style="margin-left:25%">
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Cadastrar foto para peça</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?=form_open_multipart('estoque/upload'," ", $hidden);?>
          <div class="box-body">
            <div class="form-group">
            <?php
                echo form_label("Descricao", "descricao");
                echo form_input($descricao);
                echo form_error("descricao");
            ?>
            </div>
          <div class="box-footer">
            <?=form_button($submitBtn);?>
        </form>
      </div>
    </div>
</div>