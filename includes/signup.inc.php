<?php

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["email"];
    $email = $_POST["pwd"];
    

    //htmlspecialchars()
    try {
        require_once "dbh.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_contr.inc.php";

        //ERROR HANDLERS
        $errors = [];

        if (is_input_empty($username, $pwd, $email)) {
            $errors["empty_input"] = "Fill in all fields!"; 
        }

        if (is_email_invalid( $email)) {
            $errors["invalid_email"] = "Invalid email used!"; 
        }
        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Username already taken!"; 
        }
        if (is_email_register($pdo, $email)) {
            $errors["email_used"] = "Email already registered!"; 
        }

        require_once "config_session.inc.php";

        if($errors) {
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../generic.php");  // index.php
            die();
        }

        create_users(($pdo, $pwd, $username, $email));

        header("Location: ../generic.php?signup=success"); // index.php

        $pdo = null;
        $stmt = null;
        

        die();


    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage()); 
    }
} else {
    header("Location: ../generic.php"); // index.php
    die();
}

