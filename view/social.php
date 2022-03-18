<?php include './header.php'; ?>
<?php include './menu.php'; ?>
<script>
  var tabla;
  var titulo = "RED SOCIAL";
  var controller = "social.php";
</script>

<div class="content-wrapper"><br> <!-- Content Wrapper. Contains page content -->
    
    <section class="content"> <!-- Main content -->
      <div class="container-fluid"> <!-- Small boxes (Stat box) -->
        
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
                        <a href="#" id="btnAgregar" onclick="verForm(true)" class="btn btn-block bg-gradient-info btn-sm">Agregar</a>
                      </div>
                  </div>
                </div
              </div> <!-- /.card-header -->
              
              <div class="card-body"> <!-- .card-body -->
                <div class="row">
                  <div class="col-12" id="mainTable">
                    <table id="mainTableData" class="table dataTable table-hover table-head-fixed table-light table-condensed " role="grid">
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
                
                  <div class="col-12"  id="mainForm" style="display:none;">
                    <div class="card"> <!-- Custom tabs (Charts with tabs)-->
                      <div class="card-header">
                        <h3 class="card-title">
                          <i class="ion ion-clipboard mr-1"></i>
                          Edición de redes sociales
                        </h3>
                      </div><!-- /.card-header -->
                      <div class="card-body">
                        <div class="tab-content">
                          <div class="row">
                            
                            <div class="col-12 col-md-1"></div>
                            <div class="col-12 col-md-7">
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
                                          <div class="input-group">
                                              <div class="custom-file">
                                                  <input type="file" class="custom-file-input form-control" name="social_icon" id="social_icon">
                                                  <label class="custom-file-label" for="image_url">Seleccionar foto</label>
                                              </div>
                                          </div>
                                          <input type="hidden" name="imagen_actual" id="imagen_actual">
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
                            <div class="col-12 col-md-3" style="background-color:#3177fe;">
                                <img src="" id="imagen_muestra" style="width:100%; border-radius:15px; margin-top:15px;">
                            </div>
                            <div class="col-12 col-md-1"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> <!-- /.card-body -->
            </div> <!-- .card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div> <!-- ./wrapper -->

<?php include './footer.php'; ?>
<script>
  function init() {
    verForm(false);
    opcionesVer();
    
    $("#formulario").on("submit", function(e) {
      guardarDatos(e);	
    });
  }

  function mostrarUno(id) {
    $.post('../controllers/'+controller+'?accion=mostrar_uno',{ social_id: id }, function(datos) {
      datos = JSON.parse(datos);
      verForm(true);

      $("#social_id").val(datos.social_id);
      $("#social_name").val(datos.social_name);
      $("#social_url").val(datos.social_url);
      $("#social_position").val(datos.social_position);
      
      $("#imagen_muestra").show();
      $("#imagen_muestra").attr("src","../images/icons/"+datos.social_icon);
      $("#imagen_actual").val(datos.social_icon);
    });
  }
  
  function desactivar(id) { /* desactivar */
    Swal.fire({
        text: '¿Inactivar este '+titulo+'?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, inactivar!',
        cancelButtonText:'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post("../controllers/"+controller+"?accion=desactivar", { social_id : id }, function(datos){
                if(datos == "1") {
                    Swal.fire({
                        icon: 'success',
                        text: 'Los datos se han inactivado',
                        showConfirmButton: false,
                        timer: 2500
                    });
                    verForm(false);
                    tabla.ajax.reload();
                } else {
                    Swal.fire({
                        icon: 'error',
                        text: 'Los datos no se han podido inactivar',
                        showConfirmButton: false,
                        timer: 2500
                    });
                }
            });	
        }
    });
  }
  
  function activar(id) { /* activar */
    Swal.fire({
        text: '¿Activar este '+titulo+'?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, activar!',
        cancelButtonText:'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post("../controllers/"+controller+"?accion=activar", { social_id : id }, function(datos) {
                if(datos == "1") {
                    Swal.fire({
                        icon: 'success',
                        text: 'Los datos se han activado',
                        showConfirmButton: false,
                        timer: 2500
                    });
                    verForm(false);
                    tabla.ajax.reload();
                } else {
                    Swal.fire({
                        icon: 'error',
                        text: 'Los datos no se han podido activar',
                        showConfirmButton: false,
                        timer: 2500
                    });
                }
            });	
        }
    });
  }
  
  init();
</script>