<?php

    session_start();

    require "connection.php";

    if(isset($_SESSION["admin"])){

        $resultset = Database::search("SELECT * FROM `admin_photo` WHERE `admin_id`='".$_SESSION["admin"]["id"]."';");

        if($resultset->num_rows == 1){

            Database:: iud("DELETE FROM `admin_photo` WHERE `admin_id`='".$_SESSION["admin"]["id"]."';");

            echo "Success";

        }else{
            echo "No Photo have to remove";
        }

    }else{
        echo "Invalid Request!!!";
    }

?>