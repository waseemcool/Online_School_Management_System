<?php

    session_start();

    require "connection.php";

    if(isset($_SESSION["admin"])){

        $id = $_POST["id"];
        $tsubject = $_POST["tsubject"];
        $tgrade = $_POST["tgrade"];

        if($tsubject == "0"){
            echo "Please select Subject!!!";
        }else if($tgrade == "0"){
            echo "Please select Grade!!!";
        }else{

            $resultset = Database::search("SELECT * FROM `teacher_has_subject` WHERE `teacher_id`='".$id."' AND `subject_id`='".$tsubject."' 
            AND `grade_id`='".$tgrade."';");

            if($resultset->num_rows == 1){
                echo "This Subject and Grade already added to this Teacher!!!";
            }else{

                Database::iud("INSERT INTO `teacher_has_subject`(`teacher_id`,`subject_id`,`grade_id`) 
                VALUES('".$id."','".$tsubject."','".$tgrade."');");

                echo "Success";

            }

        }

    }else{
        echo "Invalid Request!!!";
    }

?>