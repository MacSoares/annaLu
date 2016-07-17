<div class="row">
  <div class="col-md-8">
    <!-- Line chart -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <i class="fa fa-bar-chart-o"></i>

        <h3 class="box-title">Lançamentos Mensais</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div id="line-chart">
          <?php
            echo $this->gcharts->ColumnChart('LancamentosDiarios')->outputInto('line-chart');
            echo $this->gcharts->div(600, 300);
            if($this->gcharts->hasErrors())
            {
                echo $this->gcharts->getErrors();
                echo "<div class='box-body'>
                        Ainda não existem lancamentos para este mês.
                      </div>";
            }
          ?>
        </div>
      </div>
      <!-- /.box-body-->
    </div>
    <!-- /.box -->
  </div>
</div>