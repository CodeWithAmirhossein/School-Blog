<?php

session_start();

include("../pack/config/config.php");

$errors = array();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) {
        array_push($errors, "نام کاربری را وارد کنید.");
    }
    if (empty($password)) {
        array_push($errors, "رمز عبور را وارد کنید.");
    }

    if (count($errors) == 0) {
        if ($username == "admin" && $password == "admin") {
            $_SESSION['status'] = true;
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