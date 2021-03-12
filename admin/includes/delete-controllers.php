<?php

session_start();

require 'db.php';

//Delete Portfolio Item 
if( isset($_GET['delid']) ) {
    $delId = htmlspecialchars($_GET['delid']);

    $sql = "DELETE FROM portfolio_items WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $delId); 

    if ( $stmt->execute() ) {
        $_SESSION['success'] = "Portfolio item deleted successfully";
        $_SESSION['timeout'] = time();
        header("location: ../portfolio-items.php");
        exit();  
    } else {
        $addErr = "Request failed: Please try again later.";
    } 
}

?>