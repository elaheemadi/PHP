<?php
require_once 'admin/action/db.php';
global $db;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo constant('MY_BLOG_NAME') ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
<section id="text">
<div id="container">
    <h1><?php echo constant('MY_BLOG_NAME') ?></h1>
    <div class="content">
        <?php
        $get_posts = mysqli_query($db, "SELECT * FROM posts ORDER BY id DESC");
        while ($row = mysqli_fetch_assoc($get_posts)) {
            ?>
            <div class="post">
                <div class="post-title"><a href="post.php?post-id=<?php echo $row['id'] ?>"><?php echo $row['post_title'] ?></a></div>
                <div class="post-cat">Categoris: <?php
                    $post_cat = $row['post_cat'];
                    $get_cat_name = mysqli_query($db, "SELECT * FROM cats WHERE id=$post_cat");
                    $get_name = mysqli_fetch_assoc($get_cat_name);
                    echo $get_name['cat_name'];
                    ?></div>
                <div class="post-text"><?php echo $row['post_text'] ?></div>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="sidebar">
        <h3>Categories</h3>
        <ul>
            <?php
            $get_cats = mysqli_query($db, "SELECT * FROM cats");
            while ($row = mysqli_fetch_assoc($get_cats)) {
                ?>
                <li><?php echo $row['cat_name'] ?></li>
                <?php
            }
            ?>
        </ul>
        <h3>New Posts</h3>
        <ul>
            <?php
            $get_three_posts = mysqli_query($db, "SELECT * FROM posts ORDER BY id DESC LIMIT 3");
            while ($row = mysqli_fetch_assoc($get_three_posts)) {
                ?>
                <li><a href="post.php?post-id=<?php echo $row['id'] ?>"><?php echo $row['post_title'] ?></a></li>
                <?php
            }
            ?>
        </ul>
    </div
</body>
</html>