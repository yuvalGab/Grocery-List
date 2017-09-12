<?php

    //check if user is log in already
    if(isset($_COOKIE['username'])) {
        header('Location: main.php?username=' . $_COOKIE['username']);
    }
    
    include "server/dataBase.php";
    //choose error function
    function getError($name){
        $errors = [
            "password" => "password must contains only english chars and numbers - 6-15 characters..",
            "username" => "username must contains only english chars and numbers - 5-15 characters.",
            "exists" => "username already exists.", 
            "none" => "username is not exists"
        ];
        if(isset($errors[$name])){
            return $errors[$name];
        }
        return "user created successfully!";
    }

    $createError = false;
    $loginError = false;

    //create user actions
    if(isset($_POST["new_user"]) && isset($_POST["new_password"])){
        //get create user inputs 
        $newUser = strtolower($_POST["new_user"]);
        $newPassword = $_POST["new_password"];

        //check if username already exists
        $query = "SELECT username FROM users WHERE username = '$newUser'";
        $users = mysqli_query($con, $query);
        
        //create a new user validation
        if(mysqli_num_rows($users) > 0) {
            $createError = getError("exists");
        }elseif(!preg_match('/^[a-zA-Z0-9]{5,15}$/', $newUser)) {
            $createError = getError("username");
        } elseif(!preg_match('/^[a-zA-Z0-9]{6,15}$/', $newPassword)) {
            $createError = getError("password");
        }

        if($createError === false){
            //create new user in the database
            $query = "INSERT INTO users (username, password) VALUES ('$newUser', '$newPassword')";
            mysqli_query($con, $query);
            //create new table for the new user
            $query = "CREATE TABLE $newUser (
                id int(10) AUTO_INCREMENT,
                item varchar(25) NOT NULL,
                selected ENUM('false', 'true') NOT NULL DEFAULT 'false',
                deleted ENUM('false', 'true') NOT NULL DEFAULT 'false',
                PRIMARY KEY  (ID)
            )";
            mysqli_query($con, $query);
            $loginError = getError("");
        }
    }

    //log-in actions
    if(isset($_POST["username"]) && isset($_POST["password"])){
        //get log-in inputs
        $username = strtolower($_POST["username"]);
        $password = $_POST["password"];

        //serach if username and password have been created
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $userExists  = mysqli_query($con, $query);

        if(mysqli_num_rows($userExists) > 0) {
            setcookie("username", $username, time()+60*60*24*30, "/grocery");
            header('Location: main.php?username=' . $username);
        } elseif(!preg_match('/^[a-zA-Z0-9]{5,15}$/', $username)) {
            $loginError = getError("username");
        } elseif(!preg_match('/^[a-zA-Z0-9]{6,15}$/', $password)) {
            $loginError = getError("password");
        } else {
            $loginError = getError("none");
        }

    }

    include "templates/login.temp.php";