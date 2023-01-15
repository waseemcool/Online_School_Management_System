<?php

session_start();

require "connection.php";

if (isset($_SESSION["ao"])) {

    $password = $_POST["password"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $num = $_POST["num"];
    $gender = $_POST["gender"];

    if (empty($password)) {
        echo "Please enter Password!!!";
    } else if (strlen($password) < 7) {
        echo "Password must be 7 Characters or more than 7 Characters!!!";
    } else if (!preg_match("#[0-9]#", $password)) {
        echo "Password must contains Numbers!!!";
    } else if (empty($fname)) {
        echo "Please enter First Name!!!";
    } else if (empty($lname)) {
        echo "Please enter Last Name!!!";
    } else if (empty($num)) {
        echo "Please enter Contact Number!!!";
    } else if ($gender == "0") {
        echo "Please select Gender!!!";
    } else {

        Database::iud("UPDATE `academic_officer` SET `password`='" . $password . "', `first_name`='" . $fname . "', `last_name`='" . $lname . "', 
            `contact_number`='" . $num . "', `gender_id`='" . $gender . "' WHERE `id`='" . $_SESSION["ao"]["id"] . "';");

        $_SESSION["ao"]["password"] = $password;
        $_SESSION["ao"]["first_name"] = $fname;
        $_SESSION["ao"]["last_name"] = $lname;
        $_SESSION["ao"]["contact_number"] = $num;
        $_SESSION["ao"]["gender_id"] = $gender;

        if (isset($_FILES["photo"])) {

            $allowed_image_extension = array("png", "jpg", "jpeg", "svg");

            $file_extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);

            if (in_array($file_extension, $allowed_image_extension)) {
                $fileName = "resources//profile_photos//" . uniqid() . $_FILES["photo"]["name"];
                move_uploaded_file($_FILES["photo"]["tmp_name"], $fileName);

                $profilers = Database::search("SELECT * FROM `ao_photo` WHERE `academic_officer_id`='" . $_SESSION["ao"]["id"] . "';");

                if ($profilers->num_rows == 1) {
                    Database::iud("UPDATE `ao_photo` SET `path`='" . $fileName . "' WHERE `academic_officer_id`='" . $_SESSION["ao"]["id"] . "';");
                } else {
                    Database::iud("INSERT INTO `ao_photo`(`path`,`academic_officer_id`) VALUES('" . $fileName . "','" . $_SESSION["ao"]["id"] . "');");
                }
            } else {
                echo "Please select Valid Image!!!. You can select only PNG, JPG, JPEG or SVG Files.";
            }
        }

        echo 'Success';
    }
} else {
    echo "Invalid request";
}
