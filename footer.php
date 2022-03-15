            <section>
                <div class="row" id="footer">
                    <div class="col-12 col-md-4">
                        <center>
                            <h4>Entradas populares</h4>
                            <ol class="footer-list">
                                <?php
                                    $query = mysqli_query($conexion, "
                                                        SELECT DISTINCT post_title, post_slug
                                                        FROM post a
                                                        JOIN image b ON a.post_id = b.id_post
                                                        WHERE image_type = 3
                                                        ORDER BY RAND()
                                                        LIMIT 6; ");
                                    while ($row = mysqli_fetch_array($query)) {
                                        echo '<li><a href="post.php?ver='.$row['post_slug'].'" style="color:#fff; text-decoration:none;">'.$row['post_title'].'</a></li>';
                                    }
                                ?>
                            </ol>
                        </center>
                    </div>
                    
                    <div class="col-12 col-md-4">
                        <center>
                            <h4>Contáctanos</h4>
                            <p class="footer-list">Si quieres contactarte con nostros escríbenos al correo: <a>beauty&photo@gmail.com</a></p>
                        </center>
                    </div>
                    
                    <div class="col-12 col-md-4">
                        <center>
                            <div style="width:90%;">
                                <h4>Boletin informativo</h4>
                                <p class="footer-list">Suscríbete a nuestro boletín para recibir noticias cada semana</p>
                                <form>
                                    <table>
                                        <tr>
                                            <td><input type="email" class="form-control" /></td>
                                            <td></td>
                                            <td><button class="btn btn btn-light">Enviar</button></td>
                                        </tr>
                                    </table>                                    
                                </form>    
                            </div>
                        </center>
                    </div>
                </div>
                <div class="row" id="footer">
                    <div class="col-12">
                        <p class="footer-list" style="text-align:center">Todos los derechos reservados 2022</p>
                    </div>
                </div>
            </section>
        </div>

        <script src="src/bootstrap.js"></script>
        <script src="src/lightbox-plus-jquery.js"></script>
        <script>
            var alertPlaceholder = document.getElementById('liveAlertPlaceholder');
            var alertTrigger = document.getElementById('liveAlertBtn');

            function alert(message) {
                var wrapper = document.createElement('div');
                wrapper.innerHTML = '<div class="alert alert-danger alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                alertPlaceholder.append(wrapper);
            }
            
            $("#frmAcceso").on('submit',function(e) {
                e.preventDefault();
                usuario = $("#usuario").val();
                clave = $("#clave").val();
        
                $.post("controllers/author.php?accion=login",{ "usuario":usuario, "clave":clave }, function(data) {
                    data = JSON.parse(data);
                    
                    if (data.author_id > 0) {
                        $(location).attr("href", "inicio.php");
                    } else {
                        alert('No se ha podido iniciar sesión, verifique los datos e intente de nuevo!');
                    }
                });
            });
            
            $(document).keydown(function (event) {
                if (event.keyCode == 123) { // Prevent F12
                    return false;
                } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
                    return false;
                }
            });
            
            $(document).on("contextmenu", function (e) {        
                e.preventDefault();
            });
        </script>
    </body>
</html>