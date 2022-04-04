<?php include './header.php'; ?>
<?php include './menu.php'; ?>

  <div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->    
    <section class="content"> <!-- Main content -->
      <div class="container-fluid"> <!-- Small boxes (Stat box) -->
        
        <div class="row">
          <div class="col-md-6 col-12">
            <div class="row">
              
              <div class="col-6"> <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <?php
                        $query = mysqli_query($conexion, "SELECT SUM(post_views) AS total FROM post WHERE post_status = 1; ");
                        if ($row = mysqli_fetch_array($query)) {
                            echo '<h3>'.$row['total'].'</h3>';
                        }
                    ?>
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
                    <?php
                        $query = mysqli_query($conexion, "SELECT SUM(ads_count) AS total FROM ads; ");
                        if ($row = mysqli_fetch_array($query)) {
                            echo '<h3>'.$row['total'].'</h3>';
                        }
                    ?>
                    <p>Clics en <i>donar</i></p>
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
                      Mejores post
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="post2" class="table  table-borderless table-striped dataTable dtr-inline">
                      <thead>
                        <th>N°</th>
                        <th>Título</th>
                        <th>Fecha</th>
                        <th>Visualizaciones</th>
                        <th>Likes</th>
                      </thead>
                      <tbody>
                        <?php
                          $cont = 0;
                          $query = mysqli_query($conexion,
                                               "SELECT post_title, post_views, post_likes, DATE_FORMAT(post_published,'%d/%m/%Y') AS date
                                                FROM post
                                                WHERE post_status = 1
                                                ORDER BY post_likes DESC
                                                LIMIT 10; ");
                          while ($row = mysqli_fetch_array($query)) {
                              $cont++;
                              echo '<tr>';
                                echo '<td>'.$cont.'</td>';
                                echo '<td>'.$row['post_title'].'</td>';
                                echo '<td>'.$row['date'].'</td>';
                                echo '<td style="text-align:center;">'.$row['post_views'].'</td>';
                                echo '<td style="text-align:center;">'.$row['post_likes'].'</td>';
                              echo '</tr>';
                          }
                        ?>
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
                <div class="small-box bg-info">
                  <div class="inner">
                    <?php
                        $query = mysqli_query($conexion, "SELECT COUNT(post_id) AS total FROM post WHERE post_status = 1; ");
                        if ($row = mysqli_fetch_array($query)) {
                            echo '<h3>'.$row['total'].'</h3>';
                        }
                    ?>
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
                    <?php
                        $query = mysqli_query($conexion, "SELECT COUNT(image_id) AS total FROM image WHERE image_status = 1; ");
                        if ($row = mysqli_fetch_array($query)) {
                            echo '<h3>'.$row['total'].'</h3>';
                        }
                    ?>
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
                    <table id="post1" class="table  table-borderless table-striped dataTable dtr-inline">
                      <thead>
                        <th>N°</th>
                        <th>Título</th>
                        <th>Fecha</th>
                        <th>Visualizaciones</th>
                        <th>Likes</th>
                      </thead>
                      <tbody>
                        <?php
                          $cont = 0;
                          $query = mysqli_query($conexion,
                                               "SELECT post_title, post_views, post_likes, DATE_FORMAT(post_published,'%d/%m/%Y') AS date
                                                FROM post
                                                WHERE post_status = 1
                                                ORDER BY post_published DESC
                                                LIMIT 10; ");
                          while ($row = mysqli_fetch_array($query)) {
                              $cont++;
                              echo '<tr>';
                                echo '<td>'.$cont.'</td>';
                                echo '<td>'.$row['post_title'].'</td>';
                                echo '<td>'.$row['date'].'</td>';
                                echo '<td style="text-align:center;">'.$row['post_views'].'</td>';
                                echo '<td style="text-align:center;">'.$row['post_likes'].'</td>';
                              echo '</tr>';
                          }
                        ?>
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
                    <?php
                      $query = mysqli_query($conexion, "SELECT SUM(count_ammount) AS total FROM count WHERE count_type = 1; ");
                      if ($row = mysqli_fetch_array($query)) {
                        echo '<span class="info-box-number">$'.number_format($row['total'], 2, '.', '').'</span>';
                      }
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="info-box mb-3 bg-teal">
                  <span class="info-box-icon"><i class="fas fa-credit-card"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Egresos</span>
                    <?php
                      $query = mysqli_query($conexion, "SELECT SUM(count_ammount) AS total FROM count WHERE count_type = 0; ");
                      if ($row = mysqli_fetch_array($query)) {
                        echo '<span class="info-box-number">$'.number_format($row['total'], 2, '.', '').'</span>';
                      }
                    ?>
                  </div>
                </div>  
              </div>
              <div class="col-12">
                <div class="info-box mb-3 bg-navy">
                  <span class="info-box-icon"><i class="fas fa-wallet"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Total</span>
                    <?php
                      $query = mysqli_query($conexion, "SELECT SUM(count_ammount) AS total FROM count; ");
                      if ($row = mysqli_fetch_array($query)) {
                        echo '<span class="info-box-number">$'.number_format($row['total'], 2, '.', '').'</span>';
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
          <div class="col-md-6 col-12">
            <div class="row">
              <div class="col-12">
                <div class="card"> 
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
          
          <div class="col-md-6 col-12">
            <div class="row">
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
                    <table id="redes" class="table  table-borderless table-striped dataTable dtr-inline">
                      <thead>
                        <th>N°</th>
                        <th>Nombre</th>
                        <th>Alcance</th>
                      </thead>
                      <tbody>
                        <?php
                          $cont = 0;
                          $sum = 0;
                          $query = mysqli_query($conexion,
                                               "SELECT social_name, social_count,
                                                  (SELECT SUM(post_views) FROM post WHERE post_status = 1) AS total
                                                FROM social; ");
                          while ($row = mysqli_fetch_array($query)) {
                              $cont++;
                              $sum += (($row['social_count'] * 100) / $row['total']);
                              echo '<tr>';
                                echo '<td>'.$cont.'</td>';
                                echo '<td>'.$row['social_name'].'</td>';
                                echo '<td>'.number_format((($row['social_count'] * 100) / $row['total']), 2, '.', '').' %</td>';
                              echo '</tr>';
                          }
                        ?>
                        <tr>
                          <td>0</td>
                          <td>Orgánico</td>
                          <td><?php echo number_format(100-$sum, 2, '.', ''); ?> %</td>
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
                    <div class="tab-content">
                      <canvas id="Chart4" width="500" height="130"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="ion ion-clipboard mr-1"></i>
                      Espacio en disco
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content">
                      <canvas id="Chart5" width="500" height="130"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>        
      </div><!-- /.container-fluid -->
    </section>
  </div>
<!-- ./wrapper -->




<?php include './footer.php'; ?>