<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comments</title>
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
        <?php
        require_once 'action/db.php';
        global $db;
        $get_comments = mysqli_query($db, "SELECT * FROM comments WHERE is_confirm=0 ORDER BY id DESC ");
        while ($row = mysqli_fetch_assoc($get_comments)) {
            ?>
            <div class="comment-item">
                <div class="comment-username"><?php echo $row['user_name'] ?><span style="font-family: Arial;color: red;font-size: 12px;padding-right: 10px"><?php if ($row['answer'] != null) {
                            echo '(Answered)';
                        } ?></span></div>
                <div class="comment-post-name"><?php
                    $post_id =  $row['post_id'];
                    $get_posts = mysqli_query($db,"SELECT * FROM posts WHERE id=$post_id");
                    $get_post = mysqli_fetch_assoc($get_posts);
                    echo $get_post['post_title']

                    ?></div>
                <div class="comment"><?php echo $row['comment'] ?></div>
                <div class="comment-setting">
                    <ul>
                        <li><a href="action/confirm-comment.php?comment-id=<?php echo $row['id'] ?>" onclick="return confirm('Verified?')">Confirm Comments</a></li>
                        <li><a href="add-comment-answer.php?comment-id=<?php echo $row['id'] ?>">Add Answer</a></li>
                        <li><a href="action/delete-comment.php?comment-id=<?php echo $row['id'] ?>" onclick="return confirm('Will Delete?')">Delete Comments</a></li>
                    </ul>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
</body>
</html>