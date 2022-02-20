<?php include './header.php'; ?>
<?php include './menu.php'; ?>
<script>
  var tabla;
  var titulo = "AUTOR";
  var controller = "author.php";
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
                      Autores
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
                        <th>Usuario</th>
                        <th>Estado</th>
                        <th>Post</th>
                        <th>Visitas</th>
                        <th>Likes</th>
                        <th></th>
                      </thead>
                      <tbody></tbody>
                      <tfoot>
                        <th>Id</th>
                        <th>Usuario</th>
                        <th>Estado</th>
                        <th>Post</th>
                        <th>Visitas</th>
                        <th>Likes</th>
                        <th></th>
                      </tfoot>
                    </table>
                  </div>
                
                  <div class="col-12"  id="mainForm" style="display:none;">
                    <div class="card"> <!-- Custom tabs (Charts with tabs)-->
                      <div class="card-header">
                        <h3 class="card-title">
                          <i class="ion ion-clipboard mr-1"></i>
                          Edición de los autores
                        </h3>
                      </div><!-- /.card-header -->
                      <div class="card-body">
                        <div class="tab-content">
                          <div class="row">
                            <div class="col-12 col-md-1"></div>
                            <div class="col-12 col-md-10">
                                <form name="formulario" id="formulario" method="POST">
                                    <div class="row">
                                        <div class="col-12 col-md-2 text-center"><label>Correo <sup>*</sup></label></div>
                                        <div class="col-12 col-md-7">
                                            <input type="hidden" name="author_id" id="author_id" value="">
                                            <input type="email" class="form-control" name="author_user" id="author_user" maxlength="100" required="">
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-12 col-md-2 text-center"><label>Clave <sup>*</sup></label></div>
                                        <div class="col-12 col-md-7">
                                            <input type="password" class="form-control" name="author_password" id="author_password" maxlength="100" required="">
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-12 col-md-2 text-center"><label>Confirmación de clave <sup>*</sup></label></div>
                                        <div class="col-12 col-md-7">
                                            <input type="password" class="form-control" name="author_password2" id="author_password2" maxlength="100" required="">
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <div class="col-3">
                                            <button type="submit" id="btnGuardar" class="btn btn-block bg-gradient-info btn-sm">Guardar</button>
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col-3">
                                            <a href="#" id="btnCancelar" onclick="cancelarForm()" class="btn btn-block bg-gradient-danger btn-sm">Cancelar</a>
                                        </div>
                                    </div>
                                </form>
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
  </div>
<!-- ./wrapper -->

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
    $.post('../controllers/'+controller+'?accion=mostrar_uno',{ author_id: id }, function(datos) {
      datos = JSON.parse(datos);
      verForm(true);

      $("#author_id").val(datos.author_id);
      $("#author_user").val(datos.author_user);
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
            $.post("../controllers/"+controller+"?accion=desactivar", { author_id : id }, function(datos){
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
            $.post("../controllers/"+controller+"?accion=activar", { author_id : id }, function(datos) {
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