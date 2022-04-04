<?php
    session_start(); /* toma las variables de sesion */
    ob_start(); /* inicia almacenamiento en buffer */
?>
<div class="sticky-top">
    <div class="container">
        <div class="row" style="border-radius:25px 25px 0px 0px!important;">
            <div class="col-12 col-md-4">
                <center>
                    <a href="inicio.php"><img src="images/logo/logo.png" style="width:81%; margin:15px;" /></a>
                </center>
            </div>
            <div class="col-12 col-md-4"></div>
            <div class="col-12 col-md-4">
                <table class="icons-table">
                    <tr>
                      <?php
                        $query = mysqli_query($conexion, "SELECT social_url, social_icon FROM social WHERE social_status = 1 ORDER BY social_position ASC; ");
                        while ($row = mysqli_fetch_array($query)) {
                            $post_id = $row['post_id'];
                            echo '<td><a target="_blank" href="'.$row['social_url'].'"><img src="images/icons/'.$row['social_icon'].'" style="width:25px; margin:5px 10px 5px 10px;" /></a></td>';
                        }
                      ?>
                      <td><a target="_blank" href="mailto:info@beauty-photo.website"><img src="images/icons/mail.png" style="width:25px; margin:5px 10px 5px 10px;" /></a></td>
                      <!--<td><a target="_blank" href=""><img src="images/icons/sharethis.png" style="width:25px; margin:5px 20px 5px 10px;" /></a></td>-->
                      <td>
                        <?php
                          if ($_SESSION['author_id'] > 0) { echo '<a href="view/dashboard.php" target="_blank" class="btn btn-outline-secondary"><img src="images/icons/menu.png" style="width:25px;" /></a>'; }
                          else {echo '<button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><img src="images/icons/menu.png" style="width:25px;" /></button>'; }
                        ?>
                      </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form method="post" id="frmAcceso" autocomplete="off">
            <div class="modal-header">
              <h3 class="modal-title" id="staticBackdropLabel">Inicio de sesión</h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
      
            <div class="modal-body">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email</label>
                  <input type="email" class="form-control" id="usuario" name="usuario">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Clave</label>
                  <input type="password" class="form-control" id="clave" name="clave">
                </div>
                
                <div id="liveAlertPlaceholder"></div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-danger">Ingresar</button>
            </div>      
        </form>
    </div>
  </div>
</div>