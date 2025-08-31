<?php
if($_SERVER['REQUEST_METHOD'] !="POST"){
    header('location:article-index.php');
}

require_once('db/connex.php');

foreach($_POST as $key => $value){
    $$key = mysqli_real_escape_string($connex, $value);
}

$user_id = $_SESSION['id'];

$sql = "UPDATE article SET title = '$title', content = '$content' WHERE id = '$id' AND user_id = '$user_id'";

if(mysqli_query($connex, $sql)){
     header('location:article-show.php?id='.$id);
}else{
    echo mysqli_error($connex);
}
?>
