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

if (isset($_GET['delete'])) {
    $post = $_GET['delete'];

    $delete = "DELETE FROM posts WHERE `row` = '$post'";
    if (mysqli_query($connection, $delete)) {
        ?>
        <script>
            window.alert("پست حذف شد");
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

if (isset($_GET['status'])) {
    $post = $_GET['status'];

    $get_post_query = "SELECT * FROM posts WHERE `row` = '$post'";
    $get_post_result = mysqli_query($connection, $get_post_query);
    $get_post_all = mysqli_fetch_assoc($get_post_result);

    if ($get_post_all['status'] == 'public') {
        $update = "UPDATE posts SET `status` = 'private' WHERE `row` = '$post'";
        if (mysqli_query($connection, $update)) {
            ?>
            <script>
                window.alert("وضعیت پست تغییر کرد");
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
    else if ($get_post_all['status'] == 'private') {
        $update = "UPDATE posts SET `status` = 'public' WHERE `row` = '$post'";
        if (mysqli_query($connection, $update)) {
            ?>
            <script>
                window.alert("وضعیت پست تغییر کرد");
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