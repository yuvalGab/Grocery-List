<?php

    $username = $_GET['username'];
    $newItem = $_POST["new_item"];

    //new item validation
    $error ="false";
    if($newItem == "") {
        $error = "item must be inserted.";
    } elseif(mb_strlen($newItem, 'utf-8') > 25) {
        $error = "item text can be up to 25 characters.";
    } else {
        $query = "INSERT INTO $username (item) VALUES ('$newItem')";
        mysqli_query($con, $query);
    }
