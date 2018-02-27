<?php
require_once 'db.php';
global $db;
$comment_id = $_GET['comment-id'];
$confirm_comment = mysqli_query($db, "UPDATE comments SET is_confirm=1 WHERE id=$comment_id");
if ($confirm_comment) {
    header('Location: ../comments.php');
}
?>