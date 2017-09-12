<?php
    //set all exists items selected
    $query = "UPDATE $username SET selected='true' WHERE deleted='false'";
    mysqli_query($con, $query);