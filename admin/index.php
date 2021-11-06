<?php

include('core.php');

$get_posts_query = "SELECT * FROM posts";
$get_posts_result = mysqli_query($connection, $get_posts_query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیر</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <link href="../pack/css/panel.css" rel="stylesheet" rel="text/css">
    <link href="../pack/css/font.css" rel="stylesheet" rel="text/css">
</head>
<body class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3>پست جدید</h3>
                <br>
                <div class="dialog">
                    <form method="post" action="index.php">
                        <input type="text" name="title" placeholder="موضوع" class="form-control">
                        <br>
                        <textarea rows="8" class="form-control" name="content" placeholder="پست را اینجا بنویسید . . ."></textarea>
                        <br>
                        <button class="btn btn-primary" name="post" type="submit">انتشار</button>
                    </form>
                </div>
                <br>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <h3>مدیریت پست ها</h3>
                <br>
                <div class="dialog">
                    <?php
                    if (mysqli_num_rows($get_posts_result) != 0) {
                        while ($post = mysqli_fetch_assoc($get_posts_result)) {
                            $id = $post['row'];
                            ?>
                            <p>
                                <span class="post-title"><?php echo $post['title']; ?></span>
                                <span class="left" style="float: left;">
                                    <i onclick="location.href = '../post/index.php?id=<?php echo $id; ?>'" class="fa fa-sign-in action text-info"></i>
                                    &nbsp;
                                    <i onclick="location.href = 'index.php?delete=<?php echo $id; ?>'" class="fa fa-trash action text-danger"></i>
                                    &nbsp;
                                    <i onclick="location.href = 'index.php?status=<?php echo $id; ?>'" class="fa fa-eye action text-primary"></i>
                                    &nbsp;
                                    <?php
                                    if ($post['status'] == 'public') {
                                        echo "<i class='fa fa-circle text-success'></i>";
                                    }
                                    else {
                                        echo "<i class='fa fa-circle text-danger'></i>";
                                    }
                                    ?>
                                </span>
                            </p>
                            <hr>
                            <?php
                        }
                    }
                    else {
                        echo "پست جدیدی ثبت نشده است.";
                    }
                    ?>
                </div>
                <br>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>