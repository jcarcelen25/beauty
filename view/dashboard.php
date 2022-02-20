<?php include './header.php'; ?>
<?php include './menu.php'; ?>

  <div class="content-wrapper"><br> <!-- Content Wrapper. Contains page content -->    
    <section class="content"> <!-- Main content -->
      <div class="container-fluid"> <!-- Small boxes (Stat box) -->
        
        <div class="row">
          <div class="col-md-6 col-12">
            <div class="row">
              
              <div class="col-6"> <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>150</h3>
                    <p>Post publicados</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-document"></i>
                  </div>
                </div>
              </div>
              
              <div class="col-6"> <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                    <p>Fotos</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-images"></i>
                  </div>
                </div>
              </div>
              
              <div class="col-12">
                <div class="card"> <!-- Custom tabs (Charts with tabs)-->
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-chart-pie mr-1"></i>
                      Post del mes
                    </h3>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content">
                      <canvas id="Chart1" width="500" height="130"></canvas>
                    </div>
                  </div><!-- /.card-body -->
                </div>
              </div>
              
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="ion ion-clipboard mr-1"></i>
                      Últimos post
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-responsive table-borderless table-striped dataTable dtr-inline">
                      <thead>
                        <th>N°</th>
                        <th>Título</th>
                        <th>Portada</th>
                        <th>Fecha</th>
                        <th>Visualizaciones</th>
                        <th></th>
                      </thead>
                      <tbody>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-12">
            <div class="row">
              
              <div class="col-6"> <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>44</h3>
                    <p>Visualizaciones</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-eye"></i>
                  </div>
                </div>
              </div>
              
              <div class="col-6"> <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>150</h3>
                    <p>Clics</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-checkmark"></i>
                  </div>
                </div>
              </div>
              
              <div class="col-12">
                <div class="card"> <!-- Custom tabs (Charts with tabs)-->
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-chart-pie mr-1"></i>
                      Visitas del mes
                    </h3>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content">
                      <canvas id="Chart2" width="500" height="130"></canvas>
                    </div>
                  </div><!-- /.card-body -->
                </div>
              </div>
              
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="ion ion-clipboard mr-1"></i>
                      Redes sociales
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-responsive table-borderless table-striped dataTable dtr-inline">
                      <thead>
                        <th>N°</th>
                        <th>Nombre</th>
                        <th>Alcance</th>
                        <th></th>
                      </thead>
                      <tbody>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-12">
            <div class="row">
              <div class="col-12 col-md-6">
                <div class="info-box mb-3 bg-indigo">
                  <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Ingresos</span>
                    <span class="info-box-number">$5200.00</span>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="info-box mb-3 bg-teal">
                  <span class="info-box-icon"><i class="fas fa-credit-card"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Egresos</span>
                    <span class="info-box-number">$5200.00</span>
                  </div>
                </div>  
              </div>
              <div class="col-12">
                <div class="info-box mb-3 bg-navy">
                  <span class="info-box-icon"><i class="fas fa-wallet"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Total</span>
                    <span class="info-box-number">$5200.00</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
          <div class="col-md-6 col-12">
            <div class="row">
              <div class="col-12">
                <div class="card"> <!-- Custom tabs (Charts with tabs)-->
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-chart-pie mr-1"></i>
                      Balance
                    </h3>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content">
                      <canvas id="Chart3" width="500" height="130"></canvas>
                    </div>
                  </div><!-- /.card-body -->
                </div>
              </div>
            </div>
          </div>
        
      </div><!-- /.container-fluid -->
    </section>
  </div>
<!-- ./wrapper -->

<?php include './footer.php'; ?>