<?php include './header.php'; ?>
<?php include './menu.php'; ?>
<?php $slug = $_REQUEST["ver"]; ?>
<?php
    $query = mysqli_query($conexion, "
                        SELECT post_id, post_title, post_summary, post_published, post_content
                        FROM post
                        WHERE post_slug = '$slug'
                        AND post_status = 1; ");
    if ($row = mysqli_fetch_array($query)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_summary = $row['post_summary'];
        $post_published = $row['post_published'];
        $post_content = $row['post_content'];
    }
?>

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
                                <?php
                                    $query = mysqli_query($conexion, "
                                                        SELECT image_url
                                                        FROM image
                                                        WHERE image_status = 1
                                                        AND id_post = $post_id
                                                        ORDER BY image_position DESC; ");
                                    while ($row = mysqli_fetch_array($query)) {
                                        echo '<a href="images/post/'.$row['image_url'].'" data-lightbox="models"><img src="images/post/'.$row['image_url'].'" style="width:90%;" /></a><br><br>';
                                    }
                                ?>
                                <p><?php echo $post_content; ?></p>
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