<?php
if($_SERVER['REQUEST_METHOD'] != "POST"){
    header('Location: user-create.php');
    exit();
}

require_once('db/connex.php');


foreach($_POST as $key => $value){
    $$key = mysqli_real_escape_string($connex, $value);
}


$password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);


$sql = "INSERT INTO user (name, username, password, birthday) 
        VALUES ('$name', '$username', '$password', '$birthday')";

if(mysqli_query($connex, $sql)){
    header('Location: login.php');
    exit();
}else{
    echo mysqli_error($connex);
}
?>