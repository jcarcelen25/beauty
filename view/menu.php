<body class="hold-transition sidebar-mini layout-fixed">
  
  <div id="overlay" style="position: fixed; background-color: rgba(0, 0, 0, 0.8); width: 100%; height: 100%; top: 0px; left: 0px; display: none; z-index: 99998;" onclick="verModal(false)"></div>
  <div id="cerrar" style="position: fixed; top: 10px; right: 10px; display: none; z-index: 999999;"><a href="#" onclick="verModal(false)"><i class="far fa-times-circle" style="color: #fff; font-size: 2em;"></i></a></div>
  <iframe src="" id="modal_iframe" name="modalIframe" style="position: fixed; top: 25px; left: 10px; width: 97%; height: 95%; z-index: 99999; display: none; border: none; border-radius: 35px;"></iframe>
  
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../inicio.php" target="_blank" class="nav-link"><i class="fas fa-eye"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="https://mail.hostinger.com" target="_blank" class="nav-link"><i class="fas fa-envelope"></i></a>
        </li>
      </ul>
  
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
  
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Brand Logo -->
      <a href="dashboard.php" class="brand-link text-center">        
        <span class="brand-text font-weight-bold">Beauty & Photography</span>
      </a>
  
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info text-center">
            <i class="fa fa-user fa-2x"></i><br>
            <a href="#" class="d-block"><?php echo $_SESSION['author_user']; ?></a>
          </div>
        </div>
  
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            
            <li class="nav-item">
              <a href="post.php" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>Post</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="author.php" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Autores</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="config.php" class="nav-link">
                <i class="nav-icon fas fa-wrench"></i>
                <p>Configuración</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="newsletter.php" class="nav-link">
                <i class="nav-icon fas fa-envelope"></i>
                <p>Boletín</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="social.php" class="nav-link">
                <i class="nav-icon fas fa-thumbs-up"></i>
                <p>Redes sociales</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="ads.php" class="nav-link">
                <i class="nav-icon fas fa-credit-card"></i>
                <p>Ads</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="count.php" class="nav-link">
                <i class="nav-icon fas fa-money-bill"></i>
                <p>Registro contable</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="../controllers/author.php?accion=cerrar_sesion" class="nav-link">
                <i class="nav-icon fas fa-times"></i>
                <p>Cerrar sesión</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
