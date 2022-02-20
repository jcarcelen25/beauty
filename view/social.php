<?php include './header.php'; ?>
<?php include './menu.php'; ?>

    <div class="content-wrapper"><br> <!-- Content Wrapper. Contains page content -->
    
    <section class="content"> <!-- Main content -->
      <div class="container-fluid"> <!-- Small boxes (Stat box) -->
        
        <div class="row">
          <div class="col-12" id="mainTable">
            <div class="row">
              
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="row">
                      <div class="col-12 col-md-8">
                        <h3 class="card-title">
                          <i class="ion ion-clipboard mr-1"></i>
                          Redes sociales
                        </h3>
                      </div>
                      <div class="col-12 col-md-4">
                        <div class="row">
                          <div class="col-6">
                            <select class="form-control form-select-sm" id="opcionesVer" name="opcionesVer" onchange="opcionesVer()">
                                <option value="activos">Activos &nbsp;&nbsp;&nbsp;&nbsp;</option>
                                <option value="inactivos">Inactivos &nbsp;&nbsp;&nbsp;&nbsp;</option>
                                <option value="todos">Todos &nbsp;&nbsp;&nbsp;&nbsp;</option>
                            </select>
                          </div>
                          <div class="col-6">
                            <a href="#" onclick="verForm()" class="btn btn-block bg-gradient-info btn-sm">Agregar</a>
                          </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-borderless table-striped table-responsive dataTable">
                      <thead>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Ícono</th>
                        <th>Url</th>
                        <th>Posición</th>
                        <th>Estado</th>
                        <th></th>
                      </thead>
                      <tbody></tbody>
                      <tfoot>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Ícono</th>
                        <th>Url</th>
                        <th>Posición</th>
                        <th>Estado</th>
                        <th></th>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-12" id="mainForm">
            <div class="row">
              <div class="col-12">
                <div class="card"> <!-- Custom tabs (Charts with tabs)-->
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="ion ion-clipboard mr-1"></i>
                      Edición de la red social
                    </h3>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="row">
                        <div class="col-12 col-md-1"></div>
                        <div class="col-12 col-md-10">
                            <form name="formulario" id="formulario" method="POST">
                              <div class="row">
                                  <div class="col-12 col-md-2 text-center"><label>Nombre <sup>*</sup></label></div>
                                  <div class="col-12 col-md-7">
                                      <input type="hidden" name="social_id" id="social_id" value="">
                                      <input type="text" class="form-control" name="social_name" id="social_name" maxlength="50" required="">
                                  </div>
                              </div><br>
                              <div class="row">
                                  <div class="col-12 col-md-2 text-center"><label>Ícono <sup>*</sup></label></div>
                                  <div class="col-12 col-md-7">
                                      <input type="text" class="form-control" name="social_icon" id="social_icon" maxlength="150" required="">
                                  </div>
                              </div><br>
                              <div class="row">
                                  <div class="col-12 col-md-2 text-center"><label>URL <sup>*</sup></label></div>
                                  <div class="col-12 col-md-7">
                                      <input type="text" class="form-control" name="social_url" id="social_url" maxlength="150" required="">
                                  </div>
                              </div><br>
                              <div class="row">
                                  <div class="col-12 col-md-2 text-center"><label>Posición <sup>*</sup></label></div>
                                  <div class="col-12 col-md-7">
                                      <input type="number" class="form-control" name="social_position" min="1" id="social_position" maxlength="11" required="">
                                  </div>
                              </div><br>
                              <div class="row">
                                  <div class="col-2"></div>
                                  <div class="col-3">
                                      <a href="#" onclick="cancelarForm()" class="btn btn-block bg-gradient-danger btn-sm">Cancelar</a>
                                  </div>
                                  <div class="col-1"></div>
                                  <div class="col-3">
                                      <button type="submit" class="btn btn-block bg-gradient-info btn-sm">Guardar</button>
                                  </div>
                              </div>
                            </form>
                        </div>
                        <div class="col-12 col-md-1"></div>
                      </div>
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