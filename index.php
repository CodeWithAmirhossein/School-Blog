<?php

include('pack/config/config.php');

$get_posts_query = "SELECT * FROM posts WHERE `status` = 'public' ORDER BY `row` DESC";
$get_posts_result = mysqli_query($connection, $get_posts_query);

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
    <link href="pack/css/index.css" rel="stylesheet" rel="text/css">
    <link href="pack/css/font.css" rel="stylesheet" rel="text/css">
</head>
<body class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <?php
                if (mysqli_num_rows($get_posts_result) != 0) {
                    while ($post = mysqli_fetch_assoc($get_posts_result)) {
                        ?>
                        <div class="dialog">
                            <h3>
                                <?php echo $post['title']; ?>
                            </h3>
                            <hr>
                            <p>
                                <?php echo substr($post['content'], 0, 100) . " . . . "; ?>
                            </p>
                            <p class="pfooter">
                                <a target="_blank" href="post/index.php?id=<?php echo $post['row']; ?>" class="more">
                                    مشاهده مطلب کامل
                                </a>
                                <span style="float: left;">
                                    <?php echo $post['dt']; ?>
                                </span>
                            </p>
                        </div>
                        <br>
                        <?php
                    }
                }
                else {
                    echo "پستی یافت نشد.";
                }
                ?>
            </div>
            <div class="col-md-3">
                <div class="dialog side">
                    <h5>
                        آخرین پست ها
                    </h5>
                    <br>
                    <div class="links">
                    <?php
                    $get_posts_query = "SELECT * FROM posts ORDER BY `row` DESC";
                    $get_posts_result = mysqli_query($connection, $get_posts_query);
                    if (mysqli_num_rows($get_posts_result) != 0) {
                        while ($post = mysqli_fetch_assoc($get_posts_result)) {
                            ?>
                            <p>
                                <a target="_blank" class="more" href="post/index.php?id=<?php echo $post['row']; ?>">
                                    <?php echo $post['title']; ?>
                                </a>
                            </p>
                            <hr>
                            <?php
                        }
                    }
                    else {
                        echo "پستی یافت نشد.";
                    }
                    ?>
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