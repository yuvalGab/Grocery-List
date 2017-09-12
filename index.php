<?php
    if(isset($_COOKIE['username'])) {
        header("Location: main.php?username=" . $_COOKIE['username']);
    } else {
        header("Location: login.php");
    }