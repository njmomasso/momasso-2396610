<?php 
require_once('header.php');
?>
<h1>Create User</h1>
<form action="user-store.php" method="post">
    <label for="name">Name</label>
    <input id="name" name="name" type="text" required>

    <label for="username">Username (email)</label>
    <input id="username" name="username" type="email" required>

    <label for="password">Password</label>
    <input id="password" name="password" type="password" required>

    <label for="birthday">Birthday</label>
    <input id="birthday" name="birthday" type="date" required>

    <input type="submit" value="Save" class="btn">
</form>
<?php require_once('footer.php'); ?>
