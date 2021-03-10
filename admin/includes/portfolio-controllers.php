<?php

//store error variables
$imageErr = "";
$portTitleErr = "";
$portDescErr = "";
$portUrlErr = "";


//hold and update user data
$image = "";
$portTitle = "";
$portDesc = "";
$portUrl= "";





if(!empty($_FILES['inv-image']['name'])) {
        $image_name = time() . '_' . $_FILES['inv-image']['name'];
        $destination = ABSPATH . "/assets/images/" . $image_name;
        $result = move_uploaded_file($_FILES['inv-image']['tmp_name'], $destination);

        if ($result) {
            $invimage = $image_name;
        } else {
            $errors['update_fail'] = "Failed to upload image";
        }      
    } else {
        $errors['invimage'] = "Waste type image required";
    }

?>