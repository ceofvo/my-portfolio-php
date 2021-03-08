<?php

session_start();

require 'db.php';

//store error variables
$firstnameErr = "";
$lastnameErr = "";
$emailErr = "";
$passwordErr = "";

//hold and update user data
$firstname = "";
$lastname = "";
$email = "";
$password = "";


//get the user details on registration submit and validate
if ( isset( $_POST['register-submit'] ) ) {

    $firstname =  filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    echo $firstname;
    echo $lastname;
    echo $email;
    echo $password;
   
    
    //validation
    if ( empty($firstname) ) {
        $firstnameErr = "First name required";
    }
    if ( empty($lastname) ) {
        $lastnameErr = "Last name required";
    }
    if ( empty($email) ) {
        $emailErr = "Email required";
    }
    if ( !filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)  ) {
        $emailErr = "Email address is invalid";
    }
    if ( empty($password) ) {
        $passwordErr = "Password required";
    }

    //check if email exists
    $emailSql = "SELECT * FROM users WHERE email=? LIMIT 1";
    $stmt = $conn->prepare($emailSql); 
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    if($userCount > 0) {
        $emailErr = "Email already exists";
    }

    //If there are no errors add data to database
    if ( empty($firstnameErr) && empty($lastnameErr) && empty($emailErr) && empty($passwordErr) ) {
        $password = password_hash( $password, PASSWORD_DEFAULT );

        $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssss', $firstname, $lastname, $email, $password);

        if ( $stmt->execute() ) {
            $user_id = $conn->insert_id;
            $_SESSION['id'] = $user_id;

            header('location: login.php');
            exit();
        } else {
            $errorsdb = "Registration failed: Error connecting to server";
        }
    }


}

?>