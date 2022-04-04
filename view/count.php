<?php include './header.php'; ?>
<?php include './menu.php'; ?>
<script>
  var tabla;
  var titulo = "CONTABLE";
  var controller = "count.php";
</script>

<div class="content-wrapper"><!-- Content Wrapper. Contains page content -->    
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
                      Registro contable
                    </h3>
                  </div>
                  <div class="col-12 col-md-4">
                    <div class="row">
                      <div class="col-6"></div>
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
                        <th>Fecha</th>
                        <th>Transacción</th>
                        <th>Ingreso</th>
                        <th>Egreso</th>
                        <th>Total</th>
                        <th></th>
                      </thead>
                      <tbody></tbody>
                      <tfoot>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Transacción</th>
                        <th>Ingreso</th>
                        <th>Egreso</th>
                        <th>Total</th>
                        <th></th>
                      </tfoot>
                    </table>
                  </div>
                
                  <div class="col-12"  id="mainForm" style="display:none;">
                    <div class="card"> <!-- Custom tabs (Charts with tabs)-->
                      <div class="card-header">
                        <h3 class="card-title">
                          <i class="ion ion-clipboard mr-1"></i>
                          Edición del registro contable
                        </h3>
                      </div><!-- /.card-header -->
                      <div class="card-body">
                        <div class="tab-content">
                          <div class="row">
                            <div class="col-12 col-md-1"></div>
                            <div class="col-12 col-md-10">
                                <form name="formulario" id="formulario" method="POST">
                                  <div class="row">
                                      <div class="col-12 col-md-2 text-center"><label>Detalle <sup>*</sup></label></div>
                                      <div class="col-12 col-md-7">
                                          <input type="hidden" name="count_id" id="count_id" value="">
                                          <input type="text" class="form-control" name="count_name" id="count_name" maxlength="250" required="">
                                      </div>
                                  </div><br>
                                  <div class="row">
                                      <div class="col-12 col-md-2 text-center"><label>Tipo <sup>*</sup></label></div>
                                      <div class="col-12 col-md-7">
                                          <select id="count_type" name="count_type" class="form-control">
                                            <option value="1">Ingreso</option>
                                            <option value="0">Egreso</option>
                                          </select>
                                      </div>
                                  </div><br>
                                  <div class="row">
                                      <div class="col-12 col-md-2 text-center"><label>Valor <sup>*</sup></label></div>
                                      <div class="col-12 col-md-7">
                                          <input type="number" class="form-control" name="count_ammount" id="count_ammount" required="">
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
                      </div>
                    </div> <!-- .card -->
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<!-- ./wrapper -->

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
    $.post('../controllers/'+controller+'?accion=mostrar_uno',{ count_id: id }, function(datos) {
      datos = JSON.parse(datos);
      verForm(true);

      $("#count_id").val(datos.count_id);
      $("#count_name").val(datos.count_name);
      $("#count_ammount").val(datos.count_ammount);
      
      $("#count_type").val(datos.count_type);
      $("#count_type").selectpicker('refresh');
    });
  }
  
  function opcionesVerParam() {
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
            url: "../controllers/"+controller+"?accion=mostrar_todos",
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
  
  init();
</script>