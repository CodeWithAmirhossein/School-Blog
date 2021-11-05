<?php

session_start();

include("../pack/config/config.php");

if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    $get_post_query = "SELECT * FROM posts WHERE id = '$post_id'";
    $get_post_result = mysqli_query($connection, $get_post_query);

    if (mysqli_num_rows($get_post_result) == 1) {
        $post = mysqli_fetch_assoc($get_post_result);
    }
    else {
        ?>
        <script>
            window.location.replace('../errors/404.php');
        </script>
        <?php
    }
}