<?php

    session_start();
    
    require "connection.php";

    if(isset($_SESSION["admin"])){
        
        $username = $_POST["username"];
        $password = $_POST["password"];
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];

        if(empty($username)){
            echo "Please enter Username!!!";
        }else if(empty($password)){
            echo "Please enter Password!!!";
        }else if(strlen($password) < 7){
            echo "Password must be 7 Characters or more than 7 Characters!!!";
        }else if(!preg_match("#[0-9]#", $password)){
            echo "Password must contains Numbers!!!";
        }else if(empty($first_name)){
            echo "Please enter First Name!!!";
        }else if(empty($last_name)){
            echo "Please enter Last Name!!!";
        }else if(empty($email)){
            echo "Please enter E-mail Address!!!";
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Invalid E-mail Address!!!";
        }else if($gender == "0"){
            echo "Please select Gender!!!";
        }else{

            Database::iud("UPDATE `admin` SET `username`='".$username."', `password`='".$password."', `first_name`='".$first_name."', `last_name`='".$last_name."', 
            `email`='".$email."', `gender_id`='".$gender."' WHERE `id`='".$_SESSION["admin"]["id"]."';");

            $_SESSION["admin"]["username"] = $username;
            $_SESSION["admin"]["password"] = $password;
            $_SESSION["admin"]["first_name"] = $first_name;
            $_SESSION["admin"]["last_name"] = $last_name;
            $_SESSION["admin"]["email"] = $email;
            $_SESSION["admin"]["gender_id"] = $gender;
            
            if (isset($_FILES["photo"])) {

                $allowed_image_extension = array("png", "jpg", "jpeg", "svg");
    
                $file_extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
    
                if (in_array($file_extension, $allowed_image_extension)) {
                    $fileName = "resources//admin_profile_photos//" . uniqid() . $_FILES["photo"]["name"];
                    move_uploaded_file($_FILES["photo"]["tmp_name"], $fileName);
    
                    $profilers = Database::search("SELECT * FROM `admin_photo` WHERE `admin_id`='". $_SESSION["admin"]["id"] ."';");
    
                    if ($profilers->num_rows == 1) {
                        Database::iud("UPDATE `admin_photo` SET `path`='".$fileName."' WHERE `admin_id`='".$_SESSION["admin"]["id"] ."';");
                    } else {
                        Database::iud("INSERT INTO `admin_photo`(`path`,`admin_id`) VALUES('".$fileName."','".$_SESSION["admin"]["id"]."');");
                    }
                } else {
                    echo "Please select Valid Image!!!. You can select only PNG, JPG, JPEG or SVG Files.";
                }
            }
            
            echo 'Success';

        }

    }else{
        echo "Invalid request";
    }

?>