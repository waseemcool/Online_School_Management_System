<?php

    session_start();

    require "connection.php";

    if(isset($_SESSION["admin"])){

        $id = $_POST["id"];
        $sgrade_id = $_POST["sgrade_id"];

        if($sgrade_id == "0"){
            echo "Please select Student Grade";
        }else{

            Database::iud("UPDATE `student` SET `grade_id`='".$sgrade_id."' WHERE `id`='".$id."';");

            echo "Success";

        }

    }else{
        echo "Invalid Request!!!";
    }

?>