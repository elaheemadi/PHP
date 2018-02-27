<?php
require_once 'action/db.php';
global $db;
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
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
    <div class="setting">
        <form action="action/add-new-cat.php" method="post">
            <input type="text" name="cat-name" placeholder="name of new caegory">
            <input type="submit" value="Insert New Category">
        </form>
    </div>
    <table>
        <tr>
            <td>Category Name</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
        <?php
        $get_gats = mysqli_query($db, "SELECT * FROM cats");
        while ($row = mysqli_fetch_assoc($get_gats)) {
        ?>

        <tr>
            <td><?php  echo $row['cat_name']?></td>
            <td><a href="edit-cat.php?cat-id=<?php echo $row['id'] ?>">Edit</a></td>
            <td><a href="action/cat-delete.php?cat-id=<?php echo  $row['id']?>" onclick="return confirm ('Do you want delete?')">Delete</a> </td>
        </tr>
        <?php

        }
   ?>
    </table>
</div>
</body>
</html>