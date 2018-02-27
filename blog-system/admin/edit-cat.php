<?php
require_once 'action/db.php';
global $db;
session_start();
if(!isset($_SESSION['admin_logged_in'])){
    header('Location: login.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Categories</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
<div class="admin">
    <h2>Blog Managament center</h2>
    <div class="top-menu">
        <ul>
            <li><a href="index.php">Main</a></li>
            <li><a href="posts.php">Post Items</a></li>
            <li><a href="comments.php">Comments</a></li>
            <li><a href="cats.php">Categories</a></li>
            <li><a href="logout.php">Exit</a></li>
        </ul>
    </div>
    <?php
    $cat_id = $_GET['cat-id'];
    $get_cat_name = mysqli_query($db, "SELECT * FROM cats WHERE id=$cat_id");
    $cat_name = mysqli_fetch_assoc($get_cat_name);
    ?>
    <div class="setting">
        <form action="action/edit-cat.php" method="post">
            <input type="hidden" name="cat-id" value="<?php echo $cat_id ?>">
            <input type="text" name="cat-name" value="<?php echo $cat_name['cat_name'] ?>" placeholder="New category Name">
            <input type="submit" value="Update Gategory Name">
        </form>
    </div>
</div>
</body>
</html>