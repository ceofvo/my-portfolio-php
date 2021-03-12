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
$uploadOk = 1; //status of the upload

if ( isset( $_POST['add-portfolio'] ) ) {

    $portTitle = filter_var($_POST['port-title'], FILTER_SANITIZE_STRING);
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
        $imageFileType = strtolower(pathinfo($destination, PATHINFO_EXTENSION));

        if ($_FILES["port-image"]["size"] > 500000) {
            $imageErr = "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $imageErr =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ( $uploadOk === 1 ) {
            move_uploaded_file($_FILES['port-image']['tmp_name'], $destination);
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
            $image = "";
            $portTitle = "";
            $portDesc = "";
            $portUrl = "";

        } else {
            $addErr = "Error adding the portfolio item. Please try again later";
        }
    }
}


//Edit Portfolio Item From Admin STEP 1 get data from db and populate
if ( isset($_GET['editid']) ) {
    $portfolioId = htmlspecialchars($_GET['editid']);

    $sql2 = "SELECT * FROM portfolio_items WHERE id=? LIMIT 1";
    $stmt = $conn->prepare($sql2);
    $stmt->bind_param("s", $portfolioId); 
    $stmt->execute();
    $result = $stmt->get_result();

    if($portfolioItem = $result->fetch_assoc()) {
        $image = $portfolioItem['image'];
        $portTitle = $portfolioItem['title'];
        $portDesc = $portfolioItem['description'];
        $portUrl = $portfolioItem['url'];
    }
}

//Edit Sponsorship From Admin STEP 2 update db data
if ( isset( $_POST['edit-portfolio'] ) ) {
    $portTitle = filter_var($_POST['port-title'], FILTER_SANITIZE_STRING);
    $portDesc = filter_var($_POST['port-desc'], FILTER_SANITIZE_STRING);
    $portUrl = $_POST['port-url'];
    $portfolioId = $_POST['portfolio-id'];
    $image = $_POST['port-image-curr'];

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
        $imageFileType = strtolower(pathinfo($destination, PATHINFO_EXTENSION));

        if ($_FILES["port-image"]["size"] > 500000) {
            $imageErr = "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $imageErr =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ( $uploadOk === 1 ) {
            move_uploaded_file($_FILES['port-image']['tmp_name'], $destination);
            $image = $image_name;
        } else {
            $addErr = "Failed to upload image";
        }      
    }

    //If there are no errors add data to database
    if ( empty($imageErr) && empty($portTitleErr) && empty($portDescErr) && empty($portUrlErr) ) {

        $sql3 = "UPDATE portfolio_items SET image=?, title=?, description=?, url=? WHERE id=?";
        $stmt = $conn->prepare($sql3);
        $stmt->bind_param('sssss', $image, $portTitle, $portDesc, $portUrl, $portfolioId);

        if ( $stmt->execute() ) {
            $successMessage = "You have successfully updated the porfolio item.";
        } else {
            $addErr = "Error updating the portfolio item. Please try again later";
        }
    }
}

//Extract data from the message table in the database and populate the portfolio items page
$sql4 = "SELECT * FROM portfolio_items";
$stmt = $conn->prepare($sql4); 
$stmt->execute();
$result = $stmt->get_result();

?>