<?php
    $connex = mysqli_connect('localhost', 'root', '', 'forum_maisonneuve', 3306);

    if(mysqli_connect_error()) {
        echo "Connection error" . mysqli_connect_error();
        exit();
    }

    mysqli_set_charset($connex, "utf8");
?>