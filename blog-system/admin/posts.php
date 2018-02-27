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
    <title>Management Center </title>
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
    <div style="padding-top: 10px">
        <a href="add-new-post.php">Insert New Post</a>
    </div>
    <table>
        <tr>
            <td>Name of Post</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
        <?php
        $get_posts = mysqli_query($db, "SELECT * FROM posts");
        while ($row = mysqli_fetch_assoc($get_posts)) {
            ?>
            <tr>
                <td><?php echo $row['post_title'] ?></td>
                <td><a href="edit-post.php?post-id=<?php echo $row[id] ?>">Edit</a></td>
                <td><a href="action/delete-post.php?post-id=<?php echo $row[id]?>"onclick="return confirm('Do you want delete?')">Delete</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
</body>
</html>
