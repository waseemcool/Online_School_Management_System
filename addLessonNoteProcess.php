<?php

session_start();

require "connection.php";

if (isset($_SESSION["teacher"])) {

    if (isset($_POST["id"]) && isset($_POST["subject"]) && isset($_POST["grade"]) && isset($_FILES["note"])) {

        $id = $_POST["id"];
        $subject = $_POST["subject"];
        $grade = $_POST["grade"];

        if ($subject == "0") {
            echo "Please select Subject!!!";
        } else if ($grade == "0") {
            echo "Please select Grade!!!";
        } else if (empty($_FILES["note"])) {
            echo "Please select Lesson Note File!!!";
        } else {

            $allowed_image_extension = array("pdf");

            $file_extension = pathinfo($_FILES["note"]["name"], PATHINFO_EXTENSION);

            if (in_array($file_extension, $allowed_image_extension)) {
                $fileName = "resources//lesson_notes//" . uniqid() . $_FILES["note"]["name"];
                move_uploaded_file($_FILES["note"]["tmp_name"], $fileName);

                $resultSet = Database::search("SELECT `teacher_has_subject`.`id` FROM `teacher_has_subject` WHERE `teacher_id` = '" . $id . "' AND `subject_id` = '" . $subject . "' AND `grade_id` = '" . $grade . "';");

                if ($resultSet->num_rows == 1) {

                    $teacherHasSubjectId = $resultSet->fetch_assoc();

                    $d = new DateTime();
                    $tz = new DateTimeZone("Asia/Colombo");
                    $d->setTimezone($tz);
                    $date = $d->format("Y-m-d H:i:s");

                    Database::iud("INSERT INTO `lesson_notes`(`teacher_has_subject_id`,`path`,`date_time`) VALUES('" . $teacherHasSubjectId["id"] . "','" . $fileName . "','" . $date . "');");

                    echo "Success";

                } else {
                    echo "Invalid Request!!!";
                }

            } else {
                echo "You Can Select Only PDF Files!!!";
            }

        }

    } else {
        echo "Invalid Request!!!";
    }

} else {
    echo "Invalid Request!!!";
}

?>