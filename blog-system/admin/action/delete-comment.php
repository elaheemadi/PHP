<?php
require_once 'db.php';
global $db;
$comment_id = $_GET['comment-id'];
$delete_comment = mysqli_query($db, "DELETE FROM comments WHERE id=$comment_id");
if ($delete_comment) {
    header('Location: ../comments.php');
}
?>