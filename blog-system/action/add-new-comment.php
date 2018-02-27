<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Suggestion</title>
</head>
<body>
<?php
require_once '../admin/action/db.php';
global $db;
$username = $_POST['username'];
$email = $_POST['email'];
$comment = $_POST['comment'];
$post_id = $_POST['post-id'];


$insert_comment = mysqli_query($db, "INSERT INTO comments (user_name,user_email,comment,post_id) VALUES ('$username','$email','$comment','$post_id')");

if ($insert_comment) {
    echo 'Registered Successfully' . '<br>';
    echo '<a href="../post.php?post-id=' . $post_id . '">Goto Posts</a>';
} else {
    echo 'Error Somthing Wrong Happened';
}
?>
</body>
</html>