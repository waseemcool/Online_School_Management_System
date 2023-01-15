<?php

    //session_start();

    require "connection.php";

    require 'Exception.php';
    require 'PHPMailer.php';
    require 'SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    
    //if(isset($_SESSION["admin"])){

        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        $verification_code = uniqid();

        if(empty($email)){
            echo "Please enter E-mail Address!!!";
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Invalid E-mail Address!!!";
        }else if(empty($username)){
            echo "Please enter Username!!!";
        }else if(empty($password)){
            echo "Please enter Password!!!";
        }else if(strlen($password) < 7){
            echo "Password must be 7 Characters or more than 7 Characters!!!";
        }else if(!preg_match("#[0-9]#", $password)){
            echo "Password must contains Numbers!!!";
        }else{

            $resultset = Database::search("SELECT * FROM `academic_officer` WHERE `username`='".$username."' AND `password`='".$password."';");

            if($resultset->num_rows == 1){
                echo "This Username already Exists!!!";
            }else{

                Database::iud("INSERT INTO `academic_officer`(`username`,`password`,`email`,`status_id`,`verification_status_id`,`verification_code`) VALUES('".$username."','".$password."','".$email."','1','2','".$verification_code."');");

                //email code
                $mail = new PHPMailer;
                $mail->IsSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'abdulrahumanmuhammedwaseem@gmail.com';
                $mail->Password = 'jnldffcwtbhvwrtl';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->setFrom('abdulrahumanmuhammedwaseem@gmail.com', 'Kurundugolla Central College');
                $mail->addReplyTo('abdulrahumanmuhammedwaseem@gmail.com', 'Kurundugolla Central College');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = 'Kurundugolla Central College Invitation';
                $bodyContent = '<h1 style="color: rgb(68, 210, 111); font-weight: bold;">Academic Officer Invitation</h1> 
                                <span style="color: #0d6efd; font-size: 17px;">Your Username : </span> <span style="color: rgb(68, 210, 111); font-size: 17px;">'.$username.'</span>
                                <br/>
                                <span style="color: #0d6efd; font-size: 17px;">Your Password : </span> <span style="color: rgb(68, 210, 111); font-size: 17px;">'.$password.'</span>
                                <br/>
                                <span style="color: #0d6efd; font-size: 17px;">Your Verification Code : </span> <span style="color: rgb(68, 210, 111); font-size: 17px;">'.$verification_code.'</span>
                                <br/>
                                <a href="http://localhost/osms/signIn.php?user=academic_officer" style="color: rgb(68, 210, 111); font-size: 17px;">Click Here To Sign In</a>';
                $mail->Body    = $bodyContent;

                if (!$mail->send()) {
                    echo "Verification Code sending fail";
                } else {
                    echo 'Success';
                }
                //email code

            }

        }

    // }else{
    //     echo "Invalid Request";
    // }

?>