<?php

session_start();

require "connection.php";

if (isset($_SESSION["teacher"])) {

    $subject = $_GET["subject"];

?>

    <option value="0">Select</option>

    <?php

    $resultSet = Database::search("SELECT `teacher_has_subject`.`id`, `subject`.`id` AS `subject_id`, `subject`.`name` AS `subject`, `grade`.`id` AS `grade_id`, `grade`.`name` AS `grade` FROM `teacher_has_subject` INNER JOIN `subject` ON `teacher_has_subject`.`subject_id` = `subject`.`id` INNER JOIN `grade` ON `teacher_has_subject`.`grade_id` = `grade`.`id` WHERE `teacher_id` = '" . $_SESSION["teacher"]["id"] . "' AND `subject_id` = '" . $subject . "';");
    
    for ($k = 0; $k < $resultSet->num_rows; $k++) {
        $grade = $resultSet->fetch_assoc();

    ?>

        <option value="<?php echo $grade["grade_id"]; ?>"><?php echo $grade["grade"]; ?></option>

    <?php

    }

    ?>

<?php

}else{
    echo "Invalid Request!!!";
}

?>