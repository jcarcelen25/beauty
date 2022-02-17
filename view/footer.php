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
        
        <script>
            var chartOptions = { legend: { display: false } };
            
            var Chart1 = document.getElementById("Chart1");            
            var data1 = {
                label: "Post", fill: true, borderColor: '#00c0ef', 
                data: [5, 5, 5, 5, 4, 6, 5, 6, 4, 6, 5, 6, 7, 5, 9, 8, 7, 6, 5, 6, 5, 7, 6, 7, 4, 5, 5, 5]
            };
            var data2 = {
                label: "Fotos", fill: false, borderColor: '#00a65a',
                data: [15, 14, 15, 13, 15, 16, 17, 14, 15, 16, 15, 14, 15, 13, 15, 16, 17, 14, 15, 16, 16, 17, 14, 15, 16, 14, 15, 16]
            };
            var Chart1Data = { labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28"], datasets: [data1, data2] };
            var lineChart = new Chart(Chart1, { type: 'line', data: Chart1Data, options: chartOptions });
            
            var Chart2 = document.getElementById("Chart2");
            var data3 = {
                label: "Clics", fill: true, borderColor: '#d43444', 
                data: [5, 5, 5, 5, 4, 6, 5, 6, 4, 6, 5, 6, 7, 5, 9, 8, 7, 6, 5, 6, 5, 7, 6, 7, 4, 5, 5, 5]
            };
            var data4 = {
                label: "Visualizaciones", fill: false, borderColor: '#fac217',
                data: [15, 14, 15, 13, 15, 16, 17, 14, 15, 16, 15, 14, 15, 13, 15, 16, 17, 14, 15, 16, 16, 17, 14, 15, 16, 14, 15, 16]
            };
            var Chart2Data = { labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28"], datasets: [data3, data4] };
            var lineChart2 = new Chart(Chart2, { type: 'line', data: Chart2Data, options: chartOptions });
            
            var Chart3 = document.getElementById("Chart3");
            var data5 = {
                label: "Ingresos", fill: true, borderColor: '#6800f0', 
                data: [5, 5, 5, 5, 4, 6, 5, 6, 4, 6, 5, 6, 7, 5, 9, 8, 7, 6, 5, 6, 5, 7, 6, 7, 4, 5, 5, 5]
            };
            var data6 = {
                label: "Egresos", fill: false, borderColor: '#43ca98',
                data: [15, 14, 15, 13, 15, 16, 17, 14, 15, 16, 15, 14, 15, 13, 15, 16, 17, 14, 15, 16, 16, 17, 14, 15, 16, 14, 15, 16]
            };
            var Chart3Data = { labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28"], datasets: [data5, data6] };
            var lineChart3 = new Chart(Chart3, { type: 'line', data: Chart3Data, options: chartOptions });
        </script>
    </body>
</html>