<?php
    $submitBtn = array(
            "class" => "btn btn-primary fa fa-floppy-o",
            "content" => "    Salvar",
            "type" => "submit"
    );
?>


<div class="row">
    <div class="col-md-6" style="margin-left:25%">
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Nova Reserva</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?=form_open('reserva/salvarNovo');?>
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
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <?=form_button($submitBtn);?>
        </form>
      </div>
    </div>
</div>