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
                          <td><?php echo $value['parcelas_restantes']-1;?></td>
                          <td>
                            <?php
                              if($value['parcelas_restantes']-1){
                                $falta_pagar = $value['preco'] / $value['parcelas_restantes'];
                                echo "R$ ".$falta_pagar.".00";
                              }else{
                                echo "R$ 0.00";
                              }
                            ?>
                          </td>
                          <td>
                            <?=anchor("deletar_venda/{$value['id']}", " Cancelar venda", "class=' btn btn-info btn-sm fa fa-ban'" );?>
                            <?php
                            if($value['parcelas_restantes']-1){
                              $parcela_a_quitar = $value['parcelas_restantes']-1;
                              ?>
                              <br>
                              <?=anchor("quitar_parcela/{$value['id']}/{$parcela_a_quitar}", " Quitar Parcela", "class=' btn btn-info btn-sm fa fa-dollar'" );?>
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