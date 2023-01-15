<?php

    session_start();
    
    require "connection.php";

    if(isset($_SESSION["student"])){
        
        $password = $_POST["password"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $num = $_POST["num"];
        $gender = $_POST["gender"];

        if(empty($password)){
            echo "Please enter Password!!!";
        }else if(strlen($password) < 7){
            echo "Password must be 7 Characters or more than 7 Characters!!!";
        }else if(!preg_match("#[0-9]#", $password)){
            echo "Password must contains Numbers!!!";
        }else if(empty($fname)){
            echo "Please enter First Name!!!";
        }else if(empty($lname)){
            echo "Please enter Last Name!!!";
        }else if(empty($num)){
            echo "Please enter Contact Number!!!";
        }else if($gender == "0"){
            echo "Please select Gender!!!";
        }else{

            Database::iud("UPDATE `student` SET `password`='".$password."', `first_name`='".$fname."', `last_name`='".$lname."', 
            `contact_number`='".$num."', `gender_id`='".$gender."' WHERE `id`='".$_SESSION["student"]["id"]."';");

            $_SESSION["student"]["password"] = $password;
            $_SESSION["student"]["first_name"] = $fname;
            $_SESSION["student"]["last_name"] = $lname;
            $_SESSION["student"]["contact_number"] = $num;
            $_SESSION["student"]["gender_id"] = $gender;
            
            if (isset($_FILES["photo"])) {

                $allowed_image_extension = array("png", "jpg", "jpeg", "svg");
    
                $file_extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
    
                if (in_array($file_extension, $allowed_image_extension)) {
                    $fileName = "resources//profile_photos//" . uniqid() . $_FILES["photo"]["name"];
                    move_uploaded_file($_FILES["photo"]["tmp_name"], $fileName);
    
                    $profilers = Database::search("SELECT * FROM `student_photo` WHERE `student_id`='". $_SESSION["student"]["id"] ."';");
    
                    if ($profilers->num_rows == 1) {
                        Database::iud("UPDATE `student_photo` SET `path`='".$fileName."' WHERE `student_id`='".$_SESSION["student"]["id"] ."';");
                    } else {
                        Database::iud("INSERT INTO `student_photo`(`path`,`student_id`) VALUES('".$fileName."','".$_SESSION["student"]["id"]."');");
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
