<?php

session_start();

if ($_SESSION['status'] != true) {
    ?>
    <script>
        window.location.replace('../');
    </script>
    <?php
}