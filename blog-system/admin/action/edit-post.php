
<?php
require_once 'db.php';
global $db;
$post_id=$_POST['post-id'];
$post_cat=$_POST['post-cat'];
$post_title=$_POST['post-title'];
$post_text=$_POST['post-text'];

$sql = "UPDATE posts SET post_title='$post_title',post_text='$post_text',post_cat=$post_cat WHERE id=$post_id";
echo $sql;

$update_post=mysqli_query($db, $sql);
if($update_post){
    header("Location: ../posts.php");
}
else{
    header("Locatin: ../edit-post.php");
    echo "Error ";
}
?>