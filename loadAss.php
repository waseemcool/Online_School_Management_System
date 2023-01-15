<?php

session_start();

require "connection.php";

if (!isset($_SESSION["student"])) {

?>

    <script>
        window.location = "index.php";
    </script>

<?php

} else {

?>

    <div class="col-12 mt-3">
        <div class="row justify-content-center">
            <div class="col-2 text-center">
                <h4 class="text-primary fw-bold">Assignments</h4>
            </div>
        </div>
    </div>

    <div class="col-12 mt-3">
        <div class="row justify-content-center">
            <div class="col-7 kur-box table-responsive shadow" style="height: 500px; border-radius: 15px; border-color: white; border-width: 0px; margin-bottom: 189px;">
                <div class="row">
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-11 mt-3 mb-1">
                                <table class="table">
                                    <thead style="color: white; background-color: rgb(68, 210, 111)">
                                        <tr>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Assignments</th>
                                            <th scope="col"></th>
                                            <th scope="col">Marks</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $ResultSet = Database::search("SELECT `assignments`.`id`, `assignments`.`teacher_has_subject_id`, `assignments`.`date_time`, `assignments`.`path`, `teacher_has_subject`.`teacher_id`, `grade`.`name` AS `grade`, `subject`.`name` AS `subject` FROM `assignments` INNER JOIN `teacher_has_subject` ON `assignments`.`teacher_has_subject_id` = `teacher_has_subject`.`id` INNER JOIN `subject` ON `teacher_has_subject`.`subject_id` = `subject`.`id` INNER JOIN `grade` ON `teacher_has_subject`.`grade_id` = `grade`.`id` WHERE `grade_id` = '" . $_SESSION["student"]["grade_id"] . "'");

                                        for ($i = 0; $i < $ResultSet->num_rows; $i++) {

                                            $assignmentsDetails = $ResultSet->fetch_assoc();

                                            $date = explode(" ", $assignmentsDetails["date_time"]);

                                        ?>
                                            <tr>
                                                <td><?php echo $assignmentsDetails["subject"]; ?></td>
                                                <td><?php echo $date[0]; ?></td>
                                                <td><a href="<?php echo $assignmentsDetails["path"]; ?>" class="text-decoration-none text-primary fw-bold">View Assignment</a></td>

                                                <?php

                                                $ResultSet2 = Database::search("SELECT `assignment_marks`.`id` FROM `assignment_marks` 
                                                                                INNER JOIN `student` ON `assignment_marks`.`student_id` = `student`.`id` 
                                                                                INNER JOIN `assignments` ON `assignment_marks`.`assignments_id` = `assignments`.`id`
                                                                                WHERE `assignments`.`id` = '" . $assignmentsDetails["id"] . "' AND `student`.`id` = '" . $_SESSION["student"]["id"] . "'");

                                                if ($ResultSet2->num_rows == 1) {

                                                    $ResultSet3 = Database::search("SELECT * FROM `assignment_marks` 
                                                                                    INNER JOIN `released_marks` 
                                                                                    ON `assignment_marks`.`id` = `released_marks`.`assignment_marks_id` 
                                                                                    WHERE `student_id` = '" . $_SESSION["student"]["id"] . "' AND `assignments_id` = '" . $assignmentsDetails["id"] . "'");

                                                    if ($ResultSet3->num_rows == 1) {
                                                        $marks = $ResultSet3->fetch_assoc();
                                                ?>
                                                        <td><label class="text-danger">UPLOADED</label></td>
                                                        <td><?php echo $marks["marks"]; ?></td>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <td><label class="text-danger">UPLOADED</label></td>
                                                        <td>PENDING</td>
                                                    <?php
                                                    }

                                                    ?>
                                                <?php
                                                } else {
                                                ?>
                                                    <td class="d-none"><input type="file" accept="pdf" id="result" /></td>
                                                    <td><label for="result" class="link-success" style="cursor: pointer;">SELECT</label></td>
                                                    <td><label class="text-primary" style="cursor: pointer;" onclick="UploadAssignment('<?php echo $assignmentsDetails['id']; ?>');">UPLOAD</label></td>
                                                <?php
                                                }


                                                ?>
                                            </tr>
                                        <?php

                                        }

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

}

?>