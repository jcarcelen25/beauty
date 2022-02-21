<?php include './header.php'; ?>
<?php $id = $_REQUEST["id"]; ?>
<script>
  var tabla;
  var titulo = "FOTO";
  var controller = "image.php";
</script>

<section class="content"><br><br> <!-- Main content -->
  <div class="container-fluid"> <!-- Small boxes (Stat box) -->
  <div class="row">
      <div class="col-12">
        <div class="card">
          
          <div class="card-header">
            <div class="row">
              <div class="col-12 col-md-8">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  Fotos
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
                    <th>Foto</th>
                    <th>Tipo</th>
                    <th>Posición</th>
                    <th>Estado</th>
                    <th></th>
                  </thead>
                  <tbody></tbody>
                  <tfoot>
                    <th>Id</th>
                    <th>Foto</th>
                    <th>Tipo</th>
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
                      Edición de las fotos
                    </h3>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="row">
                        <div class="col-12 col-md-1"></div>
                        <div class="col-12 col-md-7">
                            <form name="formulario" id="formulario" method="POST">
                              <div class="row">
                                  <div class="col-12 col-md-2 text-center"><label>Foto <sup>*</sup></label></div>
                                  <div class="col-12 col-md-8">
                                      <input type="number" class="form-control" name="image_id" id="image_id" value="" readonly >
                                      <input type="hidden" class="form-control" name="id_post" id="id_post" value="<?php echo $id; ?>">
                                  </div>
                              </div><br>
                              <div class="row">
                                  <div class="col-12 col-md-2 text-center"><label>Foto <sup>*</sup></label></div>
                                  <div class="col-12 col-md-8">
                                    
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input form-control" name="image_url" id="image_url">
                                            <label class="custom-file-label" for="image_url">Seleccionar foto</label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="imagen_actual" id="imagen_actual">
                                  </div>
                              </div><br>
                              <div class="row">
                                  <div class="col-12 col-md-2 text-center"><label>Posición <sup>*</sup></label></div>
                                  <div class="col-12 col-md-8">
                                      <input type="text" class="form-control" name="image_position" id="image_position" maxlength="100" required="">
                                  </div>
                              </div><br>
                              <div class="row">
                                  <div class="col-12 col-md-2 text-center"><label>Tipo <sup>*</sup></label></div>
                                  <div class="col-12 col-md-8">
                                      <select class="form-control" id="image_type" name="image_type">
                                        <option value="1">Post</option>
                                        <option value="2">Banner</option>
                                      </select>
                                  </div>
                              </div><br>
                              <div class="row">
                                  <div class="col-12 col-md-2"></div>
                                  <div class="col-12 col-md-3">
                                      <a href="#" onclick="cancelarForm()" class="btn btn-block bg-gradient-danger btn-sm">Cancelar</a>
                                  </div>
                                  <div class="col-12 col-md-1"></div>
                                  <div class="col-12 col-md-3">
                                      <button type="submit" class="btn btn-block bg-gradient-info btn-sm">Guardar</button>
                                  </div>
                              </div>
                          </form>
                        </div>
                        <div class="col-12 col-md-3">
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

<?php include './footer.php'; ?>
<script>
  function init() {
    verForm(false);
    opcionesVerParam();
    
    $("#formulario").on("submit", function(e) {
      guardarDatos(e);	
    });
  }

  function mostrarUno(id) {
    $.post('../controllers/'+controller+'?accion=mostrar_uno',{ image_id: id }, function(datos) {
        datos = JSON.parse(datos);
        verForm(true);

        $("#image_id").val(datos.image_id);
        $("#image_position").val(datos.image_position);
      
        $("#imagen_muestra").show();
        $("#imagen_muestra").attr("src","../images/post/"+datos.image_url);
        $("#imagen_actual").val(datos.image_url);
            
        $("#image_type").val(datos.image_type);
        $("#image_type").selectpicker('refresh');
    });
  }
  
  function opcionesVerParam(status,url) {
    var e = document.getElementById("opcionesVer");
    status = e.options[e.selectedIndex].value;

    switch(status) {
        case 'activos':
             url = '../controllers/'+controller+'?accion=mostrar_activos';
        break;
        case 'inactivos':
             url = '../controllers/'+controller+'?accion=mostrar_inactivos';
        break;
        case 'todos':
             url = '../controllers/'+controller+'?accion=mostrar_todos';
        break;
        default :
             url = '../controllers/'+controller+'?accion=mostrar_activos';
    }
    
    tabla=$('#mainTableData').dataTable({
        colReorder: false,
        rowReorder: false,
        keys: true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "lengthMenu": [[10, 20, 50, 100, -1], [10, 20, 50, 100, "Todo"]],//mostramos el menú de registros a revisar
        "aProcessing": true, /* activa el procesamiento de DataTables */
        "aServerSide": true, /* Paginación y filtrado realizado por el servidor */
        dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
        "buttons": [
            { extend: 'copyHtml5', text: '<i class="fas icon-size fa-copy"></i>', titleAttr: 'Copiar' },
            { extend: 'excelHtml5', text: '<i class="fas icon-size fa-file-excel"></i>', titleAttr: 'Excel' },
            { extend: 'csvHtml5', text: '<i class="fas icon-size fa-file-csv"></i>', titleAttr: 'CSV' },
            { extend: 'pdfHtml5', text: '<i class="fas icon-size fa-file-pdf"></i>', titleAttr: 'PDF' },
            { extend: 'print', text: '<i class="fas icon-size fa-print"></i>', titleAttr: 'Imprimir' },
            { extend: 'colvis', text: '<i class="fas icon-size fa-eye-slash"></i>', titleAttr: 'Mostrar/ocultar' },
            { text: '<i class="fas icon-size fa-sync-alt"></i>', action: function() { tabla.ajax.reload(); }, titleAttr: 'Recargar' }
        ],
        "ajax": {
            url: url,
            data: { id_post: <?php echo $id; ?> },
            type: "get",
            dataType: "json",
            error: function (xhr, error, code) {
                console.log(xhr);
                console.log(code);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se pudo cargar la tabla!'
                });
            }
        },
        "language": {
            url: 'src/dataTables.es-mx.json',
            "lengthMenu": "Mostrar : _MENU_ registros",
            "buttons": {
                "copyTitle": "Tabla Copiada",
                "copySuccess": { _: '%d líneas copiadas', 1: '1 línea copiada' }
            }
        },
        "bDestroy": true,
        "iDisplayLength": 10, /* paginación */
        "order": [[0, "asc"]]
    }).DataTable();
}
  
  function desactivar(id) { /* desactivar */
    Swal.fire({
        text: '¿Inactivar esta '+titulo+'?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, inactivar!',
        cancelButtonText:'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post("../controllers/"+controller+"?accion=desactivar", { image_id : id }, function(datos){
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
        text: '¿Activar esta '+titulo+'?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, activar!',
        cancelButtonText:'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post("../controllers/"+controller+"?accion=activar", { image_id : id }, function(datos) {
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