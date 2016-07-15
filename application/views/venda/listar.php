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
                          <th>Data de Venda</th>
                          <th>Preço</th>
                          <th>Forma de Pagamento</th>
                          <th>Parcelas Restantes</th>
                          <th>Débito Restante<th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                      if (!$vendas) {?>
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
                            <?php echo "Não existem regitros de vendas efetuadas no momento.";?>
                          </div>
                          <!-- /.box-body -->
                        </div>
                      <?php } else {
                      foreach ($vendas as $key => $value) { ?>
                        <tr>
                          <td><?php echo $value['id_produto'];?></td>
                          <td><?php echo $value['id_cliente'];?></td>
                          <td><?php echo $value['data_venda'];?></td>
                          <td><?php echo "R$ ".$value['preco'];?></td>
                          <td><?php echo $value['forma_pgto'];?></td>
                          <td><?php echo $value['parcelas_restantes'];?></td>
                          <td><?php echo "R$ ".$value['valor_restante'];?></td>
                          <td>
                          <?php if($value['parcelas_restantes']){?>
                            <?=anchor("deletar_venda/{$value['id']}", " Cancelar venda", "class=' btn btn-info btn-sm fa fa-ban'" );?>
                            <?php
                              $parcela_a_quitar = $value['parcelas_restantes']-1;
                              $valor_subtrai = $value['preco'] / $value['qtd_parcelas'];
                              $valor_restante = $value['valor_restante'] - $valor_subtrai;
                              ?>
                              <br>
                              <?=anchor("quitar_parcela/{$value['id']}/{$parcela_a_quitar}/{$valor_restante}/{$valor_subtrai}", " Quitar Parcela", "class=' btn btn-info btn-sm fa fa-dollar'" );?>
                            <?php }
                            ?>
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