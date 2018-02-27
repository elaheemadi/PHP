<?php
require_once 'db.php';
global $db;
$comment_id = $_POST['comment-id'];
$answer = $_POST['comment-answer'];
$add_answer = mysqli_query($db, "UPDATE comments SET answer='$answer'  WHERE id=$comment_id");
if($add_answer){
    header('Location: ../comments.php');
}
?>