<?php include './header.php'; ?>
<?php include './menu.php'; ?>

    <body>
        <div class="container">
            <section>
                <div class="row bg-gray" style="background-color:pink;">
                    <div class="col-12 col-md-8">
                        <div id="carousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <?php
                                    $cont = 0;
                                    $query = mysqli_query($conexion, "
                                                        SELECT image_id
                                                        FROM image a 
                                                        JOIN post b ON b.post_id = a.id_post
                                                        WHERE a.image_status = 1
                                                        AND a.image_type = 2; ");
                                    while ($row = mysqli_fetch_array($query)) {
                                        $cont++;
                                        if ($cont == 1) {
                                            echo '<button type="button" data-bs-target="#carousel" data-bs-slide-to="'.($cont-1).'" class="active" aria-current="true" aria-label="Slide '.$cont.'"></button>';
                                        } else {
                                            echo '<button type="button" data-bs-target="#carousel" data-bs-slide-to="'.($cont-1).'" aria-label="Slide '.$cont.'"></button>';
                                        }
                                    }
                                ?>
                            </div>
                            <div class="carousel-inner">
                                <?php
                                    $cont = 0;
                                    $query = mysqli_query($conexion, "
                                                        SELECT image_url, b.post_slug, post_title
                                                        FROM image a 
                                                        JOIN post b ON b.post_id = a.id_post
                                                        WHERE a.image_status = 1
                                                        AND a.image_type = 2; ");
                                    while ($row = mysqli_fetch_array($query)) {
                                        $cont++;
                                        if ($cont == 1) {
                                            echo '<div class="carousel-item active">';
                                        } else {
                                            echo '<div class="carousel-item">';
                                        }
                                        $slug = $row['post_slug'];
                                        $img = $row['image_url'];
                                        $alt = $row['post_title'];
                                        echo '<a href="post.php?ver='.$slug.'"><img src="images/post/'.$img.'" class="d-block w-100" alt="'.$alt.'"></a>';
                                            echo '<div class="carousel-caption d-none d-md-block">';
                                                echo '<h5>'.$alt.'</h5>';
                                            echo '</div>';
                                        echo '</div>';
                                    }
                                ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 d-none d-md-block">
                        <img src="images/banners/bg.png" style="width:81%; float:right;" />
                    </div>
                </div>
            </section>
            
            <section>
                <div class="row bg-gray">
                    <div class="col-12 col-md-8">
                        <h1>Tendencias en la industria</h1>
                        <p>El mundo está cambiando con gran rapidez y la industria de la moda no es la excepción. Los avances en la tecnología propician la aparición de nuevos modelos de negocio disruptivos que transforman la manera de hacer las cosas en la industria. Además, el consumidor es cada vez más consciente y empoderado, pues busca productos y servicios que no afecten el medio ambiente y que sean socialmente responsables. Este, a su vez, también amplía sus demandas, expectativas, quejas y comentarios por medio de las redes sociales.</p>
                    </div>                    
                    <div class="col-12 col-md-4 bg-white">
                        <center><img src="images/logo/logo1.png" style="width:81%;" /></center>
                    </div>
                </div>
            </section>
            
            <div class="row bg-white"><br><br><br></div>
            
            <section>
                <div class="row bg-white">
                    <?php
                        $query = mysqli_query($conexion, "
                                            SELECT DISTINCT post_title, post_slug, image_url
                                            FROM post a
                                            JOIN image b ON a.post_id = b.id_post
                                            WHERE image_type = 3
                                            ORDER BY RAND()
                                            LIMIT 4; ");
                        while ($row = mysqli_fetch_array($query)) {
                            $img = $row['image_url'];
                            $alt = $row['post_title'];
                            $slug = $row['post_slug'];
                            echo '<div class="col-12 col-md-3">';
                                echo '<center>';
                                    echo '<div style="width:95%;">';
                                        echo '<a href="post.php?ver='.$slug.'"><img src="images/post/'.$img.'" style="width:100%;"></a>';
                                        echo '<span class="lead"><b>'.$alt.'</b></span>';
                                    echo '</div>';
                                echo '</center>';
                            echo '</div>';
                            $img_final = $row['image_url'];
                        }
                    ?>
                </div>
                <div class="row bg-white"><br><br><br></div>
                <div class="row bg-white">
                    <?php
                        $query = mysqli_query($conexion, "
                                            SELECT DISTINCT post_title, post_slug, image_url
                                            FROM post a
                                            JOIN image b ON a.post_id = b.id_post
                                            WHERE image_type = 3
                                            ORDER BY RAND()
                                            LIMIT 4; ");
                        while ($row = mysqli_fetch_array($query)) {
                            $img = $row['image_url'];
                            $alt = $row['post_title'];
                            $slug = $row['post_slug'];
                            echo '<div class="col-12 col-md-3">';
                                echo '<center>';
                                    echo '<div style="width:95%;">';
                                        echo '<a href="post.php?ver='.$slug.'"><img src="images/post/'.$img.'" style="width:100%;"></a>';
                                        echo '<span class="lead"><b>'.$alt.'</b></span>';
                                    echo '</div>';
                                echo '</center>';
                            echo '</div>';
                            $img_final = $row['image_url'];
                        }
                    ?>
                </div>
            
                <div class="row bg-gray">
                    <div class="col-12 col-md-4 bg-white">
                        <center>
                            <img src="images/logo/logo2.png" style="width:81%;" />
                        </center>
                    </div>
                    
                    <div class="col-12 col-md-8">
                        <h1 style="text-align:right;">Dirección de arte</h1>
                        <p>La industria de la moda ha evolucionado y se ha vuelto muy competitiva. Es por eso que las marcas se han visto en la necesidad de comunicar sus propias ventajas, para así lograr diferenciarse de sus competidores. Debido a este motivo las empresas invierten grandes sumas de dinero en esta técnica fotográfica. Con estas acciones las empresas buscan generar un impacto, seducir y cautivar a sus consumidores. En estos días donde todo ingresa a través de los ojos, la imagen es una prioridad para las empresas.<br>Su objetivo es conceptualizar y diseñar el mensaje que quiere trasmitir la marca. Debe ser capaz de crear ideas y desarrollar proyectos dependiendo las necesidades que tengan cada empresa. Estas campañas deben estar enfocadas en cumplir con los objetivos, además de estar alineadas con el público de la compañía.</p>
                    </div>
                </div>
            </section>
            
            <div class="row bg-white"><br><br><br></div>
            
            <section>
                <div class="row bg-white">
                    <?php
                        $query = mysqli_query($conexion, "
                                            SELECT DISTINCT post_title, post_slug, image_url
                                            FROM post a
                                            JOIN image b ON a.post_id = b.id_post
                                            WHERE image_type = 3
                                            ORDER BY RAND()
                                            LIMIT 4; ");
                        while ($row = mysqli_fetch_array($query)) {
                            $img = $row['image_url'];
                            $alt = $row['post_title'];
                            $slug = $row['post_slug'];
                            echo '<div class="col-12 col-md-3">';
                                echo '<center>';
                                    echo '<div style="width:95%;">';
                                        echo '<a href="post.php?ver='.$slug.'"><img src="images/post/'.$img.'" style="width:100%;"></a>';
                                        echo '<span class="lead"><b>'.$alt.'</b></span>';
                                    echo '</div>';
                                echo '</center>';
                            echo '</div>';
                            $img_final = $row['image_url'];
                        }
                    ?>
                </div>
                <div class="row bg-white"><br><br><br></div>
                <div class="row bg-white">
                    <?php
                        $query = mysqli_query($conexion, "
                                            SELECT DISTINCT post_title, post_slug, image_url
                                            FROM post a
                                            JOIN image b ON a.post_id = b.id_post
                                            WHERE image_type = 3
                                            ORDER BY RAND()
                                            LIMIT 4; ");
                        while ($row = mysqli_fetch_array($query)) {
                            $img = $row['image_url'];
                            $alt = $row['post_title'];
                            $slug = $row['post_slug'];
                            echo '<div class="col-12 col-md-3">';
                                echo '<center>';
                                    echo '<div style="width:95%;">';
                                        echo '<a href="post.php?ver='.$slug.'"><img src="images/post/'.$img.'" style="width:100%;"></a>';
                                        echo '<span class="lead"><b>'.$alt.'</b></span>';
                                    echo '</div>';
                                echo '</center>';
                            echo '</div>';
                            $img_final = $row['image_url'];
                        }
                    ?>
                </div>
            </section>
            
            <div class="row bg-white"><br><br><br></div>

<?php include './footer.php'; ?>