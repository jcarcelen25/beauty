            <section>
                <div class="row" id="footer">
                    <div class="col-12 col-md-4">
                        <center><h4>Entradas populares</h4></center>
                        <ul class="footer-list" style="margin-left:25px;">
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
                        </ul>
                    </div>
                    
                    <div class="col-12 col-md-4">
                        <center><h4>Contáctanos</h4></center>
                        <p class="footer-list">Si quieres contactarte con nostros escríbenos al correo:
                        <?php
                            $query = mysqli_query($conexion, "SELECT config_value FROM config WHERE config_id = 5; ");
                            if ($row = mysqli_fetch_array($query)) {
                                echo '<a href="mailto:'.$row['config_value'].'" class="white">'.$row['config_value'].'</a>';
                            }
                        ?>
                        </p>
                    </div>
                    
                    <div class="col-12 col-md-4">
                        <center>
                            <div style="width:90%;">
                                <h4>Boletin informativo</h4>
                                <p class="footer-list">Suscríbete a nuestro boletín para recibir noticias cada semana</p>
                                <form id="frmNewsletter" method="POST">
                                    <table>
                                        <tr>
                                            <td><input type="email" id="newsletter_email" name="newsletter_email" class="form-control" /></td>
                                            <td></td>
                                            <td><button class="btn btn btn-light">Enviar</button></td>
                                        </tr>
                                    </table>                                    
                                </form>    
                            </div>
                        </center>
                    </div>
                </div>
            </section>
        </div>

        <div class="coffe">
            <center>
                <h4 style="margin-bottom:0px;">Soporta este contenido</h4>
                Si te gusta esto puedes donar aquí
                <table style="width:90%; margin:15px;">
                    <tr>
                        <?php
                            $query = mysqli_query($conexion, "SELECT config_value FROM config WHERE config_id = 4; ");
                            if ($row = mysqli_fetch_array($query)) {
                                echo '<td style="text-align:center;"><a href="'.$row['config_value'].'" target="_blank" onclick="donar(1)" class="btn-coffe">$1</a></td>';
                            }
                            
                            $query = mysqli_query($conexion, "SELECT config_value FROM config WHERE config_id = 2; ");
                            if ($row = mysqli_fetch_array($query)) {
                                echo '<td style="text-align:center;"><a href="'.$row['config_value'].'" target="_blank" onclick="donar(2)" class="btn-coffe">$2</a></td>';
                            }
                            
                            $query = mysqli_query($conexion, "SELECT config_value FROM config WHERE config_id = 1; ");
                            if ($row = mysqli_fetch_array($query)) {
                                echo '<td style="text-align:center;"><a href="'.$row['config_value'].'" target="_blank" onclick="donar(3)" class="btn-coffe">$5</a></td>';
                            }
                        ?>
                    </tr>
                </table>
                <?php
                    $query = mysqli_query($conexion, "SELECT config_value FROM config WHERE config_id = 3; ");
                    if ($row = mysqli_fetch_array($query)) {
                        echo 'Llévate toda la galería de fotos <a href="'.$row['config_value'].'" onclick="donar(10)" target="_blank" class="white">aquí</a>';
                    }
                ?>
            </center>
        </div>

        <script>
            var alertPlaceholder = document.getElementById('liveAlertPlaceholder');
            var alertTrigger = document.getElementById('liveAlertBtn');

            function alert2(message) {
                var wrapper = document.createElement('div');
                wrapper.innerHTML = '<div class="alert alert-danger alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                alertPlaceholder.append(wrapper);
            }
            
            function like(id) {
                $.post("controllers/post.php?accion=like",{ "post_id": id }, function(data) {
                    if (data == 1) {
                        Swal.fire(
                            'Genial!',
                            'Gracias por tu like!',
                            'success'
                        );
                    } else {
                        Swal.fire(
                            'Error!',
                            'No se pudo guardar tu like, intenta de nuevo más tarde!',
                            'warning'
                        );
                    }
                });
            }
            
            function donar(usd) {
                $.post("controllers/post.php?accion=donar",{ "ads_type": usd }, function(data) {
                    if (data == 1) {
                        console.log("Dato registrado");
                    } else {
                        console.log("Dato no se pudo registrar");
                    }
                });
            }
            
            $("#frmNewsletter").on('submit',function(ex) {
                ex.preventDefault();
                var formData = new FormData($("#frmNewsletter")[0]);
                $.ajax({
                    url: "controllers/newsletter.php?accion=guardar",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (datos) {
                        if (datos == "1") {
                            Swal.fire(
                                'Genial!',
                                'Te has registrado en el boletín!',
                                'success'
                            );
                        } else {
                            Swal.fire(
                                'Error!',
                                'Usuario ya registrado!',
                                'warning'
                            );
                        }
                    }
                });
            });
            
            $("#frmAcceso").on('submit',function(e) {
                e.preventDefault();
                usuario = $("#usuario").val();
                clave = $("#clave").val();
        
                $.post("controllers/author.php?accion=login",{ "usuario":usuario, "clave":clave }, function(data) {
                    if (data.length != 4) {
                        $(location).attr("href", "inicio.php");
                    } else {
                        alert2('No se ha podido iniciar sesión, verifique los datos e intente de nuevo!');
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