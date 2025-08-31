<?php 
$msg = null;
if(isset($_GET['msg']) && $_GET['msg'] == 1){
    $msg = "Please check username!";
}elseif(isset($_GET['msg']) && $_GET['msg'] == 2){
    $msg = "Please check password!";
}

$title="Login";
require_once('header.php')
?>
<form action="auth.php" method="post">
    <h1>Login</h1>
    <span class="text-danger"><?= $msg ?></span>
    <label for="username">Userame</label>
    <input id="username" name="username" type="email">
    <label for="password">Password</label>
    <input id="password" name="password" type="password">
    <input type="submit" value="Login" class="btn">
</form>
<?php 
require_once('footer.php')
?>
