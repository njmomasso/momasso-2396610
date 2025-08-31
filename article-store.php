<?php
if($_SERVER['REQUEST_METHOD'] !="POST"){
    header('location:article-index.php');
}

require_once('db/connex.php');

foreach($_POST as $key=>$value){
    $$key = mysqli_real_escape_string($connex, $value);
}

$user_id = $_SESSION['id'];

$sql = "INSERT INTO article (title, content, user_id) VALUES ('$title', '$content', '$user_id')";

if(mysqli_query($connex, $sql)){
    header('location:article-index.php');
}else{
    echo mysqli_error($connex);
}
?>
