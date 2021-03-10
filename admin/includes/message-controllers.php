<?php

//store error variables
$fullnameErr = "";
$emailErr = "";
$phoneNumberErr = "";
$subjectErr = "";
$messageBodyErr = "";

//hold and update user data
$fullname = "";
$email = "";
$phoneNumber = "";
$subject = "";
$messageBody = "";
$successMessage = "";


//get the user details on registration submit and validate
if ( isset( $_POST['contact-submit'] ) ) {

    $fullname =  filter_var($_POST['full-name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email-address'], FILTER_SANITIZE_EMAIL);
    $phoneNumber = filter_var($_POST['phone-number'], FILTER_SANITIZE_STRING);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $messageBody = filter_var($_POST['message'], FILTER_SANITIZE_STRING);  
    
    //validation
    if ( empty($fullname) ) {
        $fullnameErr = "Full name required";
    }
    if ( empty($phoneNumber) ) {
        $phoneNumberErr = "Phone number required";
    }
    if ( empty($email) ) {
        $emailErr = "Email required";
    }
    if ( !filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)  ) {
        $emailErr = "Email address is invalid";
    }
    if ( empty($subject) ) {
        $subjectErr = "Please enter the subject";
    }
    if( trim($messageBody) === '' ) {
        $messageBodyErr = "Please enter your message";
    }

    //If there are no errors add data to database
    if ( empty($fullnameErr) && empty($phoneNumberErr) && empty($emailErr) && empty($subjectErr) && empty($messageBodyErr)) {

        $sql = "INSERT INTO messages (fullname, email, phone_no, subject, message_body) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssss', $fullname, $email, $phoneNumber, $subject, $messageBody);

        if ( $stmt->execute() ) {
            $successMessage = "Your message has been sent successfully. Thank you";
        } else {
            $errorsdb = "Error sending message. Please try again later";
        }
    }


}


//Extract data from the message table in the database and populate the message page
$sql2 = "SELECT * FROM messages";
$stmt = $conn->prepare($sql2); 
$stmt->execute();
$result = $stmt->get_result();

$tableNum = 1;



?>