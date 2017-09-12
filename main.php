<?php

    include "server/dataBase.php";

    //check if user is log in already
    if(!isset($_COOKIE['username'])) {
        header('Location: login.php');
    } elseif(!isset($_GET['username'])) {
        header('Location: index.php');
    }

    //get the current login username
    $username = $_GET['username'];
    
    //operate if new task inserted
    if(isset($_POST["new_item"])) {
        include "server/addItem.php";  
    }

    //select all items
    if(isset($_POST['select-all'])) {
        include "server/selectAll.php";
    }

    //delete all selected items
    if(isset($_POST["delete_selected"])) {
        include "server/deleteSelected.php"; 
    }

    //get the update grocery list items form the database
    $query = "SELECT * FROM $username ORDER BY id DESC";
    $items = mysqli_query($con, $query);
    
    include "templates/main.temp.php";
 