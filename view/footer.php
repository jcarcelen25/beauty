            <footer class="main-footer">
                Beauty & Photography -  Todos los derechos reservados
                <div class="float-right d-none d-sm-inline-block">
                  <b>Version</b> 1.0.0
                </div>
            </footer>
        </div>

        <script src="src/jquery/jquery.min.js"></script> <!-- jQuery -->
        <script src="src/jquery-ui/jquery-ui.min.js"></script> <!-- jQuery UI 1.11.4 -->
        <script> $.widget.bridge('uibutton', $.ui.button) </script> <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script src="src/bootstrap/js/bootstrap.bundle.min.js"></script> <!-- Bootstrap 4 -->
        <script src="src/chart.js/Chart.min.js"></script> <!-- ChartJS -->
        <script src="src/sparklines/sparkline.js"></script> <!-- Sparkline -->
        <script src="src/jquery-knob/jquery.knob.min.js"></script> <!-- jQuery Knob Chart -->
        <script src="src/moment/moment.min.js"></script> <!-- daterangepicker -->
        <script src="src/daterangepicker/daterangepicker.js"></script>
        <script src="src/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> <!-- Tempusdominus Bootstrap 4 -->
        <script src="src/summernote/summernote-bs4.min.js"></script> <!-- Summernote -->
        <script src="src/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> <!-- overlayScrollbars -->
        <script src="src/adminlte.js"></script> <!-- AdminLTE App -->
        
        <!-- DataTables -->
        <script src="src/datatables/jquery.dataTables.js"></script>
        <script src="src/datatables-bs4/js/dataTables.bootstrap4.js"></script>
        <script src="src/datatables-responsive/js/dataTables.responsive.js"></script>
        <script src="src/datatables-buttons/js/dataTables.buttons.js"></script>
        <script src="src/datatables-buttons/js/buttons.bootstrap4.js"></script>
        <script src="src/datatables-colreorder/js/dataTables.colReorder.js"></script>
        <script src="src/datatables-rowreorder/js/dataTables.rowReorder.js"></script>
        <script src="src/datatables-keytable/js/dataTables.keyTable.js"></script>
        <script src="src/jszip/jszip.js"></script>
        <script src="src/pdfmake/pdfmake.js"></script>
        <script src="src/pdfmake/vfs_fonts.js"></script>
        <script src="src/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="src/datatables-buttons/js/dataTables.buttons.js"></script>
        <script src="src/datatables-buttons/js/buttons.html5.js"></script>
        <script src="src/datatables-buttons/js/buttons.print.js"></script>
        <script src="src/datatables-buttons/js/buttons.colVis.js"></script>
        
        <script>
            function limpiarForm() {
                $('#formulario')[0].reset();
                $('#imagen_muestra').attr("src","");
            }
            
            function verForm(bool) {
                if (bool) { // ver form
                    $("#mainTable").hide();
                    $("#btnAgregar").hide();
                    $("#opcionesVer").hide();
                    $("#btnGuardar").prop("disabled", false);
                    $("#btnCancelar").show();
                    $("#mainForm").show();
                } else { // ver table
                    $("#mainForm").hide();
                    $("#mainTable").show();
                    $("#btnAgregar").show();
                    $("#btnCancelar").show();
                    $("#opcionesVer").show();
                    $("#btnGuardar").prop("disabled", true);
                }
            }
            
            function cancelarForm() {
                Swal.fire({
                    title: '¿Cerrar del formulario?',
                    html: "Las cajas de texto se limpiarán<br/>No puedes revertir esta acción!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, cerrar formulario!',
                    cancelButtonText:'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        limpiarForm();
                        verForm(false);
                    }
                });
            }
            
            function guardarDatos(e) {
                e.preventDefault(); //No se activará la acción predeterminada del evento
                var formData = new FormData($("#formulario")[0]);
                
                $("#btnGuardar").prop("disabled",true);
                $.ajax({
                    url: "../controllers/"+controller+"?accion=guardar",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(datos) {     
                        if(datos == "1") {
                            Swal.fire({
                                icon: 'success',
                                text: 'Los datos se han guardado',
                                showConfirmButton: false,
                                timer: 2500
                            });
                            verForm(false);
                            limpiarForm();
                            tabla.ajax.reload();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                text: 'Los datos no se han podido guardar',
                                showConfirmButton: false,
                                timer: 2500
                            });
                        }
                    }
                });
            }
            
            function opcionesVer(status,url) {
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
            
            function verModal(bool) {
                if (bool) {
                    $("#modal_iframe").show();
                    $("#overlay").show();
                    $("#cerrar").show();
                } else {
                    $("#modal_iframe").hide();
                    $("#overlay").hide();
                    $("#cerrar").hide();
                    tabla.ajax.reload();
                }
            }
        </script>
        
        <script>
            var chartOptions = { legend: { display: false } };
            
            // post vs fotos
            var Chart1 = document.getElementById("Chart1");            
            var data1 = {
                label: "Post", fill: true, borderColor: '#00c0ef', 
                data: [ <?php
                        $days = date( 't', strtotime($fecha));
                        for ($i = 1; $i <= $days; $i++) {
                            $query = mysqli_query($conexion,
                                                 "SELECT COUNT(post_id) AS total
                                                  FROM post
                                                  WHERE post_status = 1
                                                  AND YEAR(post_published) = YEAR(CURRENT_DATE())
                                                  AND MONTH(post_published) = MONTH(CURRENT_DATE())
                                                  AND DAY(post_published) = $i; ");
                            if ($row = mysqli_fetch_array($query)) {
                                echo $row['total'].',';
                            }                            
                        }  
                    ?> ]
            };
            var data2 = {
                label: "Fotos", fill: false, borderColor: '#00a65a',
                data: [ <?php
                        for ($i = 1; $i <= $days; $i++) {
                            $query = mysqli_query($conexion,
                                                   "SELECT COUNT(b.image_id) AS total 
                                                    FROM post a 
                                                    JOIN image b ON a.post_id = b.id_post
                                                    WHERE b.image_status = 1
                                                    AND YEAR(post_published) = YEAR(CURRENT_DATE()) 
                                                    AND MONTH(post_published) = MONTH(CURRENT_DATE())
                                                    AND DAY(post_published) = $i; ");
                            if ($row = mysqli_fetch_array($query)) {
                                echo $row['total'].',';
                            }                            
                        }  
                    ?> ]
            };
            var Chart1Data = {
                labels: [ <?php
                        for ($i = 1; $i <= $days; $i++) {
                            echo $i.',';                         
                        }  
                    ?> ],
                datasets: [data1, data2]
            };
            var lineChart = new Chart(Chart1, { type: 'line', data: Chart1Data, options: chartOptions });
            
            // visualizaciones vs donaciones
            var Chart2 = document.getElementById("Chart2");
            var data3 = {
                label: "Clics", fill: true, borderColor: '#d43444', 
                data: [ <?php
                        for ($i = 1; $i <= $days; $i++) {
                            $query = mysqli_query($conexion,
                                                   "SELECT SUM(post_views) AS total
                                                    FROM post_audit
                                                    WHERE YEAR(audit_date) = YEAR(CURRENT_DATE()) 
                                                    AND MONTH(audit_date) = MONTH(CURRENT_DATE())
                                                    AND DAY(audit_date) = $i; ");
                            if ($row = mysqli_fetch_array($query)) {
                                if ($row['total'] > 0) {
                                    echo $row['total'].',';    
                                } else {
                                    echo '0,';
                                }
                            }                            
                        }  
                    ?> ]
            };
            var data4 = {
                label: "Visualizaciones", fill: false, borderColor: '#fac217',
                data: [ <?php
                        for ($i = 1; $i <= $days; $i++) {
                            $query = mysqli_query($conexion,
                                                   "SELECT SUM(ads_count) AS total
                                                    FROM ads_audit
                                                    WHERE YEAR(audit_date) = YEAR(CURRENT_DATE()) 
                                                    AND MONTH(audit_date) = MONTH(CURRENT_DATE())
                                                    AND DAY(audit_date) = $i; ");
                            if ($row = mysqli_fetch_array($query)) {
                                if ($row['total'] > 0) {
                                    echo $row['total'].',';    
                                } else {
                                    echo '0,';
                                }
                            }                            
                        }  
                    ?> ]
            };
            var Chart2Data = {
                labels: [ <?php
                        for ($i = 1; $i <= $days; $i++) {
                            echo $i.',';                         
                        }  
                    ?> ],
                datasets: [data3, data4]
            };
            var lineChart2 = new Chart(Chart2, { type: 'line', data: Chart2Data, options: chartOptions });
            
            // ingresos vs egresos
            var Chart3 = document.getElementById("Chart3");
            var data5 = {
                label: "Ingresos", fill: true, borderColor: '#6800f0', 
                data: [5, 5, 5, 5, 4, 6, 5, 6, 4, 6, 5, 6, 7, 5, 9, 8, 7, 6, 5, 6, 5, 7, 6, 7, 4, 5, 5, 5]
            };
            var data6 = {
                label: "Egresos", fill: false, borderColor: '#43ca98',
                data: [15, 14, 15, 13, 15, 16, 17, 14, 15, 16, 15, 14, 15, 13, 15, 16, 17, 14, 15, 16, 16, 17, 14, 15, 16, 14, 15, 16]
            };
            var Chart3Data = {
                labels: [ <?php
                        for ($i = 1; $i <= $days; $i++) {
                            echo $i.',';                         
                        }  
                    ?> ],
                datasets: [data5, data6]
            };
            var lineChart3 = new Chart(Chart3, { type: 'line', data: Chart3Data, options: chartOptions });
            
            
            new Chart(document.getElementById("Chart4"), {
                type: 'pie',
                data: {
                  labels: [ <?php
                                $query = mysqli_query($conexion, "SELECT social_name FROM social ORDER BY social_id ASC; ");
                                while ($row = mysqli_fetch_array($query)) {
                                    echo '"'.$row['social_name'].'",';
                                }
                              ?> "Orgánico" ],
                  datasets: [{
                    label: " %",
                    backgroundColor: ["#3e95cd", "#8e5ea2"],
                    data: [ <?php
                                $sum = 0;
                                $query = mysqli_query($conexion, "SELECT social_name, social_count, (SELECT SUM(post_views) FROM post WHERE post_status = 1) AS total FROM social ORDER BY social_id ASC; ");
                                while ($row = mysqli_fetch_array($query)) {
                                        $sum = (($row['social_count'] * 100) / $row['total']);
                                        echo number_format((($row['social_count'] * 100) / $row['total']), 0).', ';
                                }
                                echo number_format(100-$sum, 0);
                              ?> ]
                  }]
                }
            });
        </script>
    </body>
</html>