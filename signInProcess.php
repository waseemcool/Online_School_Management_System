<?php

    session_start();
    
    require "connection.php";

    if(isset($_POST["user"]) && isset($_POST["username"]) && isset($_POST["password"])){

        $user = $_POST["user"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        if(empty($username)){
            echo "Please enter Username!!!";
        }else if(empty($password)){
            echo "Please enter Password!!!";
        }else{

            $resultSet = Database::search("SELECT * FROM `".$user."` WHERE `username`='".$username."' AND `password`='".$password."';");
            $nor = $resultSet->num_rows;

            if($nor == 1){

                $userDetails = $resultSet->fetch_assoc();

                if($user == "Teacher"){

                    if($userDetails["verification_status_id"] == 2){
                        echo "Unverified";
                    }else{
                        echo "Success";
                    }

                    $_SESSION["teacher"] = $userDetails;

                }else if($user == "Student"){

                    if($userDetails["verification_status_id"] == 2){
                        echo "Unverified";
                    }else{
                        echo "Success";
                    }

                    $_SESSION["student"] = $userDetails;

                }else if($user == "Academic_Officer"){

                    if($userDetails["verification_status_id"] == 2){
                        echo "Unverified";
                    }else{
                        echo "Success";
                    }

                    $_SESSION["ao"] = $userDetails;

                }else{
                    echo "Success";
                    $_SESSION["admin"] = $userDetails;
                }

                //$_SESSION["user"] = $userDetails;

            }else{
                echo "Invalid Username or Password!!!";
            }

        }

    }else{
        echo "Invalid Request!!!";
    }

?>