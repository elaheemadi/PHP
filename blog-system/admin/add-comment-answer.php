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
    <title>Add Answer To Comment </title>
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
    <div class="comment-item">
        <?php
        $comment_id = $_GET['comment-id'];
        $get_comment = mysqli_query($db, "SELECT * FROM comments WHERE id=$comment_id");
        $comment = mysqli_fetch_assoc($get_comment);
        ?>
        <div class="comment-username"><?php echo $comment['user_name'] ?></div>
        <div class="comment-post-name">
            <?php
            $comment_post_id = $comment['post_id'];
            $get_posts = mysqli_query($db, "SELECT * FROM posts WHERE id=$comment_post_id");
            $post = mysqli_fetch_assoc($get_posts);
            echo $post['post_title'];
            ?>
        </div>
        <div class="comment"><?php echo $comment['comment'] ?></div>
        <div class="comment-setting">
            <form action="action/add-comment-answer.php" method="post">
                <input type="hidden" name="comment-id" value="<?php echo $comment_id ?>">
                <textarea name="comment-answer" placeholder="Answer to this comment" cols="30" rows="10"></textarea><br>
                <input type="submit" value="Send Answer">
                <a href="comments.php">
                    <button>Escape</button>
                </a>
            </form>
        </div>
    </div>
</div>
</body>
</html>