<?php include './header.php'; ?>
<?php include './menu.php'; ?>
<script>
  var tabla;
  var titulo = "NEWSLETTER";
  var controller = "newsletter.php";
</script>

<div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
    
    <section class="content"> <!-- Main content -->
      <div class="container-fluid"> <!-- Small boxes (Stat box) -->
        
        <div class="row">
          <div class="col-12">
            <div class="row">
              
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="ion ion-clipboard mr-1"></i>
                      Suscripciones al boletín
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12" id="mainTable">
                        <table id="mainTableData" class="table dataTable table-hover table-head-fixed table-light table-condensed " role="grid">
                          <thead>
                            <th>Id</th>
                            <th>Correo</th>
                            <th>Fecha</th>
                            <th></th>
                          </thead>
                          <tbody></tbody>
                          <tfoot>
                            <th>Id</th>
                            <th>Correo</th>
                            <th>Fecha</th>
                            <th></th>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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
    opcionesVerParam();
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