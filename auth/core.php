<?php

session_start();

include("../pack/config/config.php");

$errors = array();

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($_POST['username'], $connection);
    $password = mysqli_real_escape_string($_POST['password'], $connection);

    if (empty($username)) {
        array_push($errors, "نام کاربری را وارد کنید.");
    }
    if (empty($password)) {
        array_push($errors, "رمز عبور را وارد کنید.");
    }

    if (count($errors) == 0) {
        if ($username == "amir" && $password == "coldweather") {
            $_SESSION['status'] == true;
            ?>
            <script>
                window.location.replace('../admin');
            </script>
            <?php
        }
        else {
            array_push($errors, "نام کاربری و رمز درست نمیباشد.");
        }
    }
}