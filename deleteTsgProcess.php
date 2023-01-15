<?php

    session_start();

    require "connection.php";

    if(isset($_SESSION["admin"])){

        $id = $_POST["id"];

        Database::iud("DELETE FROM `teacher_has_subject` WHERE `teacher_id`='".$id."';");

        echo "Success";

    }else{
        echo "Invalid request";
    }

?>