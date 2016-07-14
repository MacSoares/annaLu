<?php
    if($resultado == 1){ ?>
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

    <?php }else if($resultado ==0){ ?>
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
              <h3 class="box-title">Lista de itens vendidos </h3>

              <div style="margin-left:80%">
                <?=anchor("cadastrar_vendas", "  Gerar venda", "class='btn btn-sm btn-success fa fa-save'" );?>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>Produto</th>
                          <th>Cliente</th>
                          <th>Data da Reserva</th>
                          <th>Vendido</th>
                          <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                      if (!$reservas) {?>
                        <div class="box box-warning box-solid">
                          <div class="box-header with-border">
                            <h3 class="box-title">Atenção!</h3>

                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                            <!-- /.box-tools -->
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <?php echo "Não existem regitros de reservas efetuadas no momento.";?>
                          </div>
                          <!-- /.box-body -->
                        </div>
                      <?php } else {
                      foreach ($reservas as $key => $value) { ?>
                        <tr>
                          <td><?php echo $value['id_produto'];?></td>
                          <td><?php echo $value['id_cliente'];?></td>
                          <td><?php echo $value['data_reserva'];?></td>
                          <td><?php echo $value['forma_pgto'];?></td>
                          <td>
                            <?=anchor("deletar_venda/{$value['id']}", " Cancelar venda", "class=' btn btn-info btn-sm fa fa-ban'" );?>
                            <?=anchor("quitar_parcela/{$value['id']}/{$parcela_a_quitar}", " Quitar Parcela", "class=' btn btn-info btn-sm fa fa-dollar'" );?>
                          </td>
                        </tr>
                    <?php }
                      }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>