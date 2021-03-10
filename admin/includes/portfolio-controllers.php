<?php

//store error variables
$imageErr = "";
$portTitleErr = "";
$portDescErr = "";
$portUrlErr = "";
$addErr = "";


//hold and update user data
$image = "";
$portTitle = "";
$portDesc = "";
$portUrl= "";

if ( isset( $_POST['add-portfolio'] ) ) {

    $portTitle = filter_var($_POST['port-title'], FILTER_SANITIZE_EMAIL);
    $portDesc = filter_var($_POST['port-desc'], FILTER_SANITIZE_STRING);
    $portUrl = $_POST['port-url'];
    
    //validation
    if ( empty($portTitle) ) {
        $portTitleErr = "Portfolio title is required";
    }
    if ( empty($portDesc) ) {
        $portDescErr = "Portfolio description is required";
    }
    if ( empty($portUrl) ) {
        $portUrlErr = "Portfolio URL is required";
    }
    if ( !preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$portUrl) ) {
        $portUrlErr = "Invalid URL";
    }
    if( trim($portDesc) === '' ) {
        $portDescErr = "Please enter the description of the portfolio item";
    }

    if(!empty($_FILES['port-image']['name'])) {
        $image_name = time() . '_' . $_FILES['port-image']['name'];
        $destination = "../assets/img/" . $image_name;
        $result = move_uploaded_file($_FILES['port-image']['tmp_name'], $destination);

        if ($result) {
            $image = $image_name;
        } else {
            $addErr = "Failed to upload image";
        }      
    } else {
        $imageErr = "Portfolio image required";
    }

    //If there are no errors add data to database
    if ( empty($imageErr) && empty($portTitleErr) && empty($portDescErr) && empty($portUrlErr) ) {

        $sql = "INSERT INTO portfolio_items (image, title, description, url) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssss', $image, $portTitle, $portDesc, $portUrl);

        if ( $stmt->execute() ) {
            $successMessage = "You have successfully added the porfolio item.";
        } else {
            $addErr = "Error adding the portfolio item. Please try again later";
        }
    }
}
?>