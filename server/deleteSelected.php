<?php

    //delete all checked items
    $query = "UPDATE $username SET deleted='true' WHERE selected='true' AND deleted='false'";
    mysqli_query($con, $query);
