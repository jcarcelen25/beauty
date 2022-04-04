<?php include './header.php'; ?>
<?php include './menu.php'; ?>
<?php $slug = isset($_REQUEST["ver"])? $_REQUEST["ver"]:""; ?>
<?php $origen = isset($_REQUEST["o"])? $_REQUEST["o"]:""; ?>

<?php
    if ($slug == "") {
        echo '<script> location.href = "inicio.php"; </script>';
    }
?>

<?php if ($origen != "") { ?>
    <script>
        $.post("controllers/social.php?accion=registrar_origen",{ "social_id": <?php echo $origen; ?> }, function(data) {
            if (data == 0) {
                console.log("Visita o no se pudo registrar");
            }
        });
    </script>
<?php } ?>

<?php
    $query = mysqli_query($conexion, "
                        SELECT post_id, post_title, post_meta_title, post_summary, post_published, post_content
                        FROM post
                        WHERE post_slug = '$slug'
                        AND post_status = 1; ");
    if ($row = mysqli_fetch_array($query)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_summary = $row['post_summary'];
        $post_published = $row['post_published'];
        $post_content = $row['post_content'];
        $post_video = $row['post_meta_title'];
    }
    
    $query = mysqli_query($conexion, "
                        SELECT COUNT(image_id) AS total
                        FROM image d
                        WHERE d.id_post = $post_id
                        AND image_status = 1; ");
    if ($row = mysqli_fetch_array($query)) {
        $total_fotos = $row['total'];
    }
?>

<script>
    $.post("controllers/post.php?accion=visita",{ "post_id": <?php echo $post_id; ?> }, function(data) {
        if (data == 0) {
            console.log("Visita no se pudo registrar");
        }
    });
</script>
<body>
    <div class="container">
        <div class="row bg-white">
            <div class="col-12"><br><br><br>
                <div class="row">
                    <div class="col-12 col-md-8">
                        <center>
                            <div style="width:95%;">
                                <h2><?php echo $post_title; ?></h2>
                                <p><?php echo $post_summary; ?></p>
                                <video width="400" controls controlsList="nodownload">
                                    <source src="images/videos/<?php echo $post_video; ?>" type="video/mp4">
                                    Your browser does not support HTML video.
                                </video><br><br>
                                
                                <div style="background-color:#AD727D; width:95%; padding:20px; color:#fff;">
                                    Puedes donar $2 para recibir por correo todos los recursos disponibles en este post.<br>
                                    Tenemos videos <b><?php echo $post_content; ?></b> y <b><?php echo $total_fotos; ?></b> fotos para ti.<br><br>
                                    <?php
                                        $query = mysqli_query($conexion, "SELECT config_value FROM config WHERE config_id = 2; ");
                                        if ($row = mysqli_fetch_array($query)) {
                                            $enlace_donar = $row['config_value'];
                                            echo '<a href="'.$enlace_donar.'" target="_blank" onclick="donar(1)" class="btn-coffe">Donar $2</a>';
                                        }
                                    ?>
                                </div><br><br>
                                
                                <div class="row">
                                    <?php
                                        $query = mysqli_query($conexion,
                                                            "SELECT image_url
                                                            FROM image
                                                            WHERE image_status = 1
                                                            AND id_post = $post_id
                                                            ORDER BY image_position ASC; ");
                                        while ($row = mysqli_fetch_array($query)) {
                                            echo '<div class="col-4"><center><a href="'.$enlace_donar.'" target="_blank"><img src="images/post/'.$row['image_url'].'" style="width:95%; margin:5px;" /></a></center></div>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </center>
                    </div>
                    
                    <div class="col-12 col-md-4"><br><br><br><br>
                        <center>
                            <div class="row">
                                <div class="col-12">
                                    <h3>Entradas populares</h3>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-1"></div>
                                <?php
                                    $query = mysqli_query($conexion, "
                                                        SELECT DISTINCT post_title, post_slug, image_url
                                                        FROM post a
                                                        JOIN image b ON a.post_id = b.id_post
                                                        WHERE image_type = 3
                                                        AND post_meta_title = ''
                                                        ORDER BY RAND()
                                                        LIMIT 2; ");
                                    while ($row = mysqli_fetch_array($query)) {
                                        echo '<div class="col-5">';
                                            echo '<img src="images/post/'.$row['image_url'].'" style="width:100%;">';
                                            echo '<a href="post.php?ver='.$row['post_slug'].'">';
                                                echo '<div class="overlay">';
                                                    echo '<div class="text">'.$row['post_title'].'</div>';
                                                echo '</div>';
                                            echo '</a>';
                                        echo '</div>';
                                    }
                                ?>
                                <div class="col-1"></div>
                            </div>
                            <div class="row"><br></div>
                            <div class="row">
                                <div class="col-1"></div>
                                <?php
                                    $query = mysqli_query($conexion, "
                                                        SELECT DISTINCT post_title, post_slug, image_url
                                                        FROM post a
                                                        JOIN image b ON a.post_id = b.id_post
                                                        WHERE image_type = 3
                                                        AND post_meta_title = ''
                                                        ORDER BY RAND()
                                                        LIMIT 2; ");
                                    while ($row = mysqli_fetch_array($query)) {
                                        echo '<div class="col-5">';
                                            echo '<img src="images/post/'.$row['image_url'].'" style="width:100%;">';
                                            echo '<a href="post.php?ver='.$row['post_slug'].'">';
                                                echo '<div class="overlay">';
                                                    echo '<div class="text">'.$row['post_title'].'</div>';
                                                echo '</div>';
                                            echo '</a>';
                                        echo '</div>';
                                    }
                                ?>
                                <div class="col-1"></div>
                            </div>
                            
                            <div class="row"><br><br></div>
                            
                            <div class="row">
                                <div class="col-12">
                                    <h3>Entradas recientes</h3>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-1"></div>
                                <?php
                                    $query = mysqli_query($conexion, "
                                                        SELECT DISTINCT post_title, post_slug, image_url
                                                        FROM post a
                                                        JOIN image b ON a.post_id = b.id_post
                                                        WHERE image_type = 3
                                                        AND post_meta_title = ''
                                                        ORDER BY RAND()
                                                        LIMIT 2; ");
                                    while ($row = mysqli_fetch_array($query)) {
                                        echo '<div class="col-5">';
                                            echo '<img src="images/post/'.$row['image_url'].'" style="width:100%;">';
                                            echo '<a href="post.php?ver='.$row['post_slug'].'">';
                                                echo '<div class="overlay">';
                                                    echo '<div class="text">'.$row['post_title'].'</div>';
                                                echo '</div>';
                                            echo '</a>';
                                        echo '</div>';
                                    }
                                ?>
                                <div class="col-1"></div>
                            </div>
                            <div class="row"><br></div>
                            <div class="row">
                                <div class="col-1"></div>
                                <?php
                                    $query = mysqli_query($conexion, "
                                                        SELECT DISTINCT post_title, post_slug, image_url
                                                        FROM post a
                                                        JOIN image b ON a.post_id = b.id_post
                                                        WHERE image_type = 3
                                                        AND post_meta_title = ''
                                                        ORDER BY RAND()
                                                        LIMIT 2; ");
                                    while ($row = mysqli_fetch_array($query)) {
                                        echo '<div class="col-5">';
                                            echo '<img src="images/post/'.$row['image_url'].'" style="width:100%;">';
                                            echo '<a href="post.php?ver='.$row['post_slug'].'">';
                                                echo '<div class="overlay">';
                                                    echo '<div class="text">'.$row['post_title'].'</div>';
                                                echo '</div>';
                                            echo '</a>';
                                        echo '</div>';
                                    }
                                ?>
                                <div class="col-1"></div>
                            </div>
                            
                            <div class="row"><br><br></div>
                            
                            <div class="row">
                                <div class="col-12">
                                    <h3>Entradas recomendadas</h3>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-1"></div>
                                <?php
                                    $query = mysqli_query($conexion, "
                                                        SELECT DISTINCT post_title, post_slug, image_url
                                                        FROM post a
                                                        JOIN image b ON a.post_id = b.id_post
                                                        WHERE image_type = 3
                                                        AND post_meta_title = ''
                                                        ORDER BY RAND()
                                                        LIMIT 2; ");
                                    while ($row = mysqli_fetch_array($query)) {
                                        echo '<div class="col-5">';
                                            echo '<img src="images/post/'.$row['image_url'].'" style="width:100%;">';
                                            echo '<a href="post.php?ver='.$row['post_slug'].'">';
                                                echo '<div class="overlay">';
                                                    echo '<div class="text">'.$row['post_title'].'</div>';
                                                echo '</div>';
                                            echo '</a>';
                                        echo '</div>';
                                    }
                                ?>
                                <div class="col-1"></div>
                            </div>
                            <div class="row"><br></div>
                            <div class="row">
                                <div class="col-1"></div>
                                <?php
                                    $query = mysqli_query($conexion, "
                                                        SELECT DISTINCT post_title, post_slug, image_url
                                                        FROM post a
                                                        JOIN image b ON a.post_id = b.id_post
                                                        WHERE image_type = 3
                                                        AND post_meta_title = ''
                                                        ORDER BY RAND()
                                                        LIMIT 2; ");
                                    while ($row = mysqli_fetch_array($query)) {
                                        echo '<div class="col-5">';
                                            echo '<img src="images/post/'.$row['image_url'].'" style="width:100%;">';
                                            echo '<a href="post.php?ver='.$row['post_slug'].'">';
                                                echo '<div class="overlay">';
                                                    echo '<div class="text">'.$row['post_title'].'</div>';
                                                echo '</div>';
                                            echo '</a>';
                                        echo '</div>';
                                    }
                                ?>
                                <div class="col-1"></div>
                            </div>
                            
                            <div class="row"><br><br></div>
                            
                            <div class="row">
                                <div class="col-12">
                                    <h3>Otros usuarios miran</h3>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-1"></div>
                                <?php
                                    $query = mysqli_query($conexion, "
                                                        SELECT DISTINCT post_title, post_slug, image_url
                                                        FROM post a
                                                        JOIN image b ON a.post_id = b.id_post
                                                        WHERE image_type = 3
                                                        AND post_meta_title = ''
                                                        ORDER BY RAND()
                                                        LIMIT 2; ");
                                    while ($row = mysqli_fetch_array($query)) {
                                        echo '<div class="col-5">';
                                            echo '<img src="images/post/'.$row['image_url'].'" style="width:100%;">';
                                            echo '<a href="post.php?ver='.$row['post_slug'].'">';
                                                echo '<div class="overlay">';
                                                    echo '<div class="text">'.$row['post_title'].'</div>';
                                                echo '</div>';
                                            echo '</a>';
                                        echo '</div>';
                                    }
                                ?>
                                <div class="col-1"></div>
                            </div>
                            <div class="row"><br></div>
                            <div class="row">
                                <div class="col-1"></div>
                                <?php
                                    $query = mysqli_query($conexion, "
                                                        SELECT DISTINCT post_title, post_slug, image_url
                                                        FROM post a
                                                        JOIN image b ON a.post_id = b.id_post
                                                        WHERE image_type = 3
                                                        AND post_meta_title = ''
                                                        ORDER BY RAND()
                                                        LIMIT 2; ");
                                    while ($row = mysqli_fetch_array($query)) {
                                        echo '<div class="col-5">';
                                            echo '<img src="images/post/'.$row['image_url'].'" style="width:100%;">';
                                            echo '<a href="post.php?ver='.$row['post_slug'].'">';
                                                echo '<div class="overlay">';
                                                    echo '<div class="text">'.$row['post_title'].'</div>';
                                                echo '</div>';
                                            echo '</a>';
                                        echo '</div>';
                                    }
                                ?>
                                <div class="col-1"></div>
                            </div>
                            
                            <div class="row"><br><br></div>
                        </center>
                    </div>
                </div><br><br><br>
            </div>
        </div>
<?php include './footer.php'; ?>                              
                                