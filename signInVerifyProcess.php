<?php

require "connection.php";

if(isset($_POST["user"]) && isset($_POST["username"]) && isset($_POST["vcode"])){

    $user = $_POST["user"];
    $username = $_POST["username"];
    $vcode = $_POST["vcode"];

    if (empty($username)) {
        echo "Please enter Username";
    } else if (empty($vcode)) {
        echo "Please enter Verification Code";
    } else {

        $resultset = Database::search("SELECT * FROM `" . $user . "` WHERE `username` = '" . $username . "' AND `verification_code` = '" . $vcode . "'");

        if ($resultset->num_rows == 1) {

            Database::iud("UPDATE `" . $user . "` SET `verification_status_id` = '1' WHERE `verification_code` = '" . $vcode . "'");

            echo "Success";
            
        } else {
            echo "Invalid Code";
        }
    }

}else{
    echo "Invalid Request!!!";
}

?>