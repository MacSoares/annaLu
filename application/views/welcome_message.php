<?php

?>
    <!-- Content Header (Page header) -->
    <!-- <img src=<?=base_url("/css/images/annaluLogo.jpg");?> > -->

    <div class="row">
      <div class="col-md-6">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title fa fa-birthday-cake">  Aniversariantes do Dia</h3>
          </div>
          <div class="box-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Data</th>
                      <th>Telefone</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    foreach ($dia as $key => $aniversariantes) {?>
                      <tr>
                        <td><?php echo $aniversariantes['name'];?></td>
                        <td><?php echo $aniversariantes['data_nascimento'];?></td>
                        <td><?php echo $aniversariantes['telefone'];?></td>
                      </tr>
                    <?php }
                  ?>
                </tbody>
            </table>
          </div>
        <!-- /.box-header -->
        <!-- form start -->
        </div>
      </div>

      <div class="col-md-6">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title fa fa-birthday-cake">  Aniversariantes do Mês</h3>
          </div>
          <div class="box-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    foreach ($mes as $key => $aniversariantes) {?>
                      <tr>
                        <td><?php echo $aniversariantes['name'];?></td>
                        <td><?php echo $aniversariantes['data_nascimento'];?></td>
                      </tr>
                    <?php }
                  ?>
                </tbody>
            </table>
          </div>
        <!-- /.box-header -->
        <!-- form start -->
        </div>
      </div>
    </div>