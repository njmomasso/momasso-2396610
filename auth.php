<?php
session_start();


require_once('db/connex.php');

foreach($_POST as $key=>$value){
    $$key = mysqli_real_escape_string($connex, $value);
}


$sql = "SELECT * FROM user WHERE username = '$username'";
$result = mysqli_query($connex, $sql);


$count = mysqli_num_rows($result);
if($count == 1){
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $dbPassword = $user['password'];

    
    if(password_verify($password, $dbPassword)){
        session_regenerate_id();
        $_SESSION['fingerPrint'] = md5($_SERVER["HTTP_USER_AGENT"].$_SERVER["REMOTE_ADDR"]);
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        header('location:article-create.php'); 
    }else{
       header('location:login.php?msg=2'); 
    }
}else{
    header('location:login.php?msg=1');
}
?>