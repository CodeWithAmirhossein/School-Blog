<?php

session_start();

include("../pack/config/config.php");

if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    $get_post_query = "SELECT * FROM posts WHERE `row` = '$post_id'";
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post['title']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <link href="../pack/css/post.css" rel="stylesheet" rel="text/css">
</head>
<body class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="dialog">
                    <div class="head">
                        <?php echo $post['title']; ?>
                    </div>
                    <br>
                    <div class="body">
                        <p>
                            <?php echo $post['content']; ?>
                        </p>
                    </div>
                    <hr>
                    <div class="foot">
                        <span class="left">
                            <?php echo $post['dt']; ?>
                        </span>
                        <span class="right">
                            <?php echo $post['auther']; ?>
                        </span>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>