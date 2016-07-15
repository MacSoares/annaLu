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
                  if($dia){
                   foreach ($dia as $key => $aniversariantes) {?>
                      <tr>
                        <td><?php echo $aniversariantes['name'];?></td>
                        <td><?php echo $aniversariantes['data_nascimento'];?></td>
                        <td><?php echo $aniversariantes['telefone'];?></td>
                      </tr>
                    <?php }
                  }else{?>
                    <div class="box box-warning box-solid">
                      <div class="box-header with-border">
                        <h3 class="box-title fa fa-comments-o fa-2x"></h3>

                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                        <!-- /.box-tools -->
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <?php echo "Ninguém faz aniversário hoje.";?>
                      </div>
                      <!-- /.box-body -->
                    </div>
                  <?php
                  }
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
                  if($mes){
                    foreach ($mes as $key => $aniversariantes) {?>
                      <tr>
                        <td><?php echo $aniversariantes['name'];?></td>
                        <td><?php echo $aniversariantes['data_nascimento'];?></td>
                      </tr>
                    <?php }
                  }else{?>
                    <div class="box box-warning box-solid">
                      <div class="box-header with-border">
                        <h3 class="box-title fa fa-comments-o fa-2x"></h3>

                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                        <!-- /.box-tools -->
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <?php echo "Ninguém faz aniversário nesse mês.";?>
                      </div>
                      <!-- /.box-body -->
                    </div>
                  <?php
                  }
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
            <h3 class="box-title">Bar Chart</h3>
          </div>
          <html>
            <head>
              <script src="../../plugins/morris/morris.min.js"></script>
              <script>
                $(function () {
                "use strict";
                var bar = new Morris.Bar({
                element: 'bar-chart',
                resize: true,
                  data: [
                    {y: '2006', a: 100, b: 90},
                    {y: '2007', a: 75, b: 65},
                    {y: '2008', a: 50, b: 40},
                    {y: '2009', a: 75, b: 65},
                    {y: '2010', a: 50, b: 40},
                    {y: '2011', a: 75, b: 65},
                    {y: '2012', a: 100, b: 90}
                  ],
                  barColors: ['#00a65a', '#f56954'],
                  xkey: 'y',
                  ykeys: ['a', 'b'],
                  labels: ['CPU', 'DISK'],
                  hideHover: 'auto'
                });
              });
              </script>
            </head>
          </html>
          <div class="box-body chart-responsive">
            <div class="chart" id="bar-chart" style="height: 300px;"></div>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
      
      <!-- LINE CHART -->
      <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Line Chart</h3>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="line-chart" style="height: 300px;"></div>
            </div>
          </div>
            <!-- /.box-body -->
      </div>
    </div>