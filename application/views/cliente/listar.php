<?php
    if($salvo == 1){ ?>
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Sucesso!</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php echo $message;?>
            </div>
            <!-- /.box-body -->
          </div>

    <?php }else if($salvo ==0){ ?>
          <div class="box box-danger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Erro!</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php echo $message;?>
            </div>
            <!-- /.box-body -->
          </div>
    <?php }?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Clientes </h3>

              <div style="margin-left:80%">
                <?=anchor("cadastrar_cliente", "  Cadastrar novo", "class='btn btn-sm btn-success fa fa-save'" );?>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>Nome</th>
                          <th>Telefone</th>
                          <th>Endereco</th>
                          <th>Data de Nascimento</th>
                          <th>Observações</th>
                          <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($clientes as $key => $value) { ?>
                        <tr>
                          <td><?php echo $value['name'];?></td>
                          <td><?php echo $value['telefone'];?></td>
                          <td><?php echo $value['endereco'];?></td>
                          <td><?php echo $value['data_nascimento'];?></td>
                          <td><?php echo $value['observacoes'];?></td>
                          <td>
                            <?=anchor("deletar_cliente", " ", "class='fa fa-trash'" );?>
                            <?=anchor("alterar_cliente", " ", "class='fa fa-pencil'");?>
                          </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>