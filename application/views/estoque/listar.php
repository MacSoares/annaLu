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
              <h3 class="box-title">Lista de peças em estoque </h3>

              <div style="margin-left:80%">
                <?=anchor("cadastrar_peca", "  Cadastrar nova", "class='btn btn-sm btn-success fa fa-save'" );?>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>Descrição</th>
                          <th>Tamanho</th>
                          <th>Quantidade</th>
                          <th>Fornecedor</th>
                          <th>Custo</th>
                          <th>Preço de Venda</th>
                          <th>Foto</th>
                          <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                      if (!$pecas) {?>
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
                            <?php echo "Não existem peças cadastradas no momento.";?>
                          </div>
                          <!-- /.box-body -->
                        </div>
                      <?php } else {
                      foreach ($pecas as $key => $value) { ?>
                        <tr>
                          <td><?php echo $value['descricao'];?></td>
                          <td><?php echo $value['tamanho'];?></td>
                          <td><?php echo $value['quantidade'];?></td>
                          <td><?php echo $value['id_fornecedor'];?></td>
                          <td><?php echo $value['custo'];?></td>
                          <td><?php echo $value['preco_venda'];?></td>
                          <td>
                            <?php
                              if($value['caminho_foto']){?>
                                <img src=<?=base_url("uploads/".$value['caminho_foto']);?> height="90" width="90">
                              <?php
                              }else{?>
                                <?=anchor("carregar_foto/{$value['id_produto']}", "  Adicionar Foto", "class='btn btn-info fa fa-picture-o'");?>
                            <?php } ?>

                          </td>
                          <td>
                            <?=anchor("deletar_peca/{$value['id_produto']}", " Deletar peça", "class=' btn btn-info fa fa-trash'" );?> <br>
                            <?=anchor("alterar_peca/{$value['id_produto']}", " Alterar dados", "class=' btn btn-info fa fa-pencil'" );?> <br>
                            <?=anchor("vender_peca/{$value['id_produto']}", "  Vender", "class='btn btn-info fa fa-shopping-bag'");?>
                          </td>
                        </tr>
                    <?php }
                    }
                    ?>
