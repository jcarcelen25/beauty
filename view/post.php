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
                          Post
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
                        <th>Título</th>
                        <th>Meta</th>
                        <th>Slug</th>
                        <th>Resumen</th>
                        <th>Autor</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Visitas</th>
                        <th>Likes</th>
                        <th></th>
                      </thead>
                      <tbody></tbody>
                      <tfoot>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Meta</th>
                        <th>Slug</th>
                        <th>Resumen</th>
                        <th>Autor</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Visitas</th>
                        <th>Likes</th>
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
                      Edición del post
                    </h3>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="row">
                        <div class="col-12 col-md-1"></div>
                        <div class="col-12 col-md-10">
                            <form name="formulario" id="formulario" method="POST">
                                <div class="row">
                                    <div class="col-12 col-md-2 text-center"><label>Título <sup>*</sup></label></div>
                                    <div class="col-12 col-md-8">
                                        <input type="hidden" name="post_id" id="post_id" value="">
                                        <input type="text" class="form-control" name="post_title" id="post_title" maxlength="75" required="">
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-12 col-md-2 text-center"><label>Meta título <sup>*</sup></label></div>
                                    <div class="col-12 col-md-8">
                                        <input type="text" class="form-control" name="post_meta_title" id="post_meta_title" maxlength="100" required="">
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-12 col-md-2 text-center"><label>Slug <sup>*</sup></label></div>
                                    <div class="col-12 col-md-8">
                                        <input type="text" class="form-control" name="post_slug" id="post_slug" maxlength="100" required="">
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-12 col-md-2 text-center"><label>Slug <sup>*</sup></label></div>
                                    <div class="col-12 col-md-8">
                                        <input type="text" class="form-control" name="post_slug" id="post_slug" maxlength="100" required="">
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-12 col-md-2 text-center"><label>Texto principal<sup>*</sup></label></div>
                                    <div class="col-12 col-md-8">
                                        <textarea class="form-control" cols="45" rows="15"></textarea>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-12 col-md-2 text-center"><label>Texto secundario</label></div>
                                    <div class="col-12 col-md-8">
                                        <textarea class="form-control" cols="45" rows="15"></textarea>
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