<?php

session_start();

include('../pack/config/config.php');

$errors = array();

if ($_SESSION['status'] != true) {
    ?>
    <script>
        window.location.replace('../');
    </script>
    <?php
}

if (isset($_POST['post'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    if (empty($title)) {
        array_push($errors, 'موضوع پست را وارد نکردید');
    }
    if (empty($content)) {
        array_push($errors, 'متن پست را وارد نکردید');
    }

    if (count($errors) == 0) {
        $date = date("M/d/Y H:i:s");
        $auther = "امیرحسین";

        $insert = "INSERT INTO posts (`title`, `content`, `auther`, `dt`, `status`) VALUES ('$title', '$content', '$auther', '$date', 'public')";
        if (mysqli_query($connection, $insert)) {
            ?>
            <script>
                window.alert("پست اضافه شد");
                window.location.replace(".");
            </script>
            <?php
        }
        else {
            ?>
            <script>
                window.alert("<?php echo mysqli_error($connection); ?>");
                window.location.replace(".");
            </script>
            <?php
        }
    }
}