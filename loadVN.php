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
                <h4 class="text-primary fw-bold">Lesson Notes</h4>
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
                                            <th scope="col">Note</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $ResultSet = Database::search("SELECT `lesson_notes`.`path`, `lesson_notes`.`date_time`, `subject`.`name` AS `subject`, `grade`.`name` AS `grade` 
                                                                        FROM `lesson_notes` 
                                                                        INNER JOIN `teacher_has_subject` 
                                                                        ON `lesson_notes`.`teacher_has_subject_id` = `teacher_has_subject`.`id` 
                                                                        INNER JOIN `subject` 
                                                                        ON `teacher_has_subject`.`subject_id` = `subject`.`id`
                                                                        INNER JOIN `grade` 
                                                                        ON `teacher_has_subject`.`grade_id` = `grade`.`id` WHERE `grade`.`id` = '" . $_SESSION["student"]["grade_id"] . "'");

                                        for ($i = 0; $i < $ResultSet->num_rows; $i++) {

                                            $notesDetails = $ResultSet->fetch_assoc();

                                            $date = explode(" ", $notesDetails["date_time"]);

                                        ?>
                                            <tr>
                                                <td><?php echo $notesDetails["subject"]; ?></td>
                                                <td><?php echo $date[0]; ?></td>
                                                <td><a href="<?php echo $notesDetails["path"]; ?>" class="text-decoration-none text-primary fw-bold">View Notes</a></td>
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