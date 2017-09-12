<?php

    include "dataBase.php";

    //select/unselect one item
    $itemId = $_POST['item'];
    $isSelected = $_POST['selected'];
    $username =  $_POST['username'];

    //check if item already selected
    $query = "";
    if($isSelected == 'true') {
        $query = "UPDATE $username SET selected='false' WHERE id=$itemId";
    } else {
        $query = "UPDATE $username SET selected='true' WHERE id=$itemId";
    }
    
    //change value in database
    mysqli_query($con, $query);
