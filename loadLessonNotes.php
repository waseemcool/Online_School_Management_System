<?php

session_start();

require "connection.php";

if (!isset($_SESSION["teacher"])) {

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
            <div class="col-7 kur-box table-responsive shadow" style="height: 500px; border-radius: 15px; border-color: white; border-width: 0px;">
                <div class="row">
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-11 mt-3 mb-1">
                                <table class="table">
                                    <thead style="color: white; background-color: rgb(68, 210, 111)">
                                        <tr>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Grade</th>
                                            <th scope="col">Notes</th>
                                            <th scope="col">Date & Time</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $resultset1 = Database::search("SELECT `subject`.`name` AS `subject`, `grade`.`name` AS `grade`, 
                                    `lesson_notes`.`path`, `lesson_notes`.`date_time` FROM `lesson_notes` INNER JOIN `teacher_has_subject` ON 
                                    `lesson_notes`.`teacher_has_subject_id`=`teacher_has_subject`.`id` INNER JOIN `subject` ON 
                                    `teacher_has_subject`.`subject_id`=`subject`.`id` INNER JOIN `grade` ON 
                                    `teacher_has_subject`.`grade_id`=`grade`.`id` WHERE `teacher_has_subject`.`teacher_id`='" . $_SESSION["teacher"]["id"] . "';");

                                        for ($k1 = 0; $k1 < $resultset1->num_rows; $k1++) {
                                            $ls = $resultset1->fetch_assoc();

                                        ?>

                                            <tr>
                                                <td><?php echo $ls["subject"]; ?></td>
                                                <td><?php echo $ls["grade"] ?></td>
                                                <td><a href="<?php echo $ls["path"] ?>" class="text-primary fw-bold text-decoration-none">View Notes</a></td>
                                                <td><?php echo $ls["date_time"]; ?></td>
                                                <td><a href="#"><i class="bi bi-x-circle text-danger fs-5"></i></a></td>
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

    <div class="col-12 text-center mt-5" style="margin-bottom: 117px;">
        <a onclick="openAddLessonNoteModal();" style="color: rgb(68, 210, 111); text-decoration: none; font-weight: bold; cursor: pointer;"><i class="bi bi-plus-square"></i>&nbsp;&nbsp;Add Lesson Notes</a>
    </div>

    <!-- Add Lesson Note Modal -->
    <div class="modal fade" tabindex="-1" id="addLessonNoteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Lesson Notes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-12">
                            <label class="form-label">Subject</label>
                            <?php

                            $resultset2 = Database::search("SELECT `teacher_has_subject`.`id`, `subject`.`id` AS `subject_id`, `subject`.`name` AS 
                        `subject`, `grade`.`id` AS `grade_id`, `grade`.`name` AS `grade` FROM `teacher_has_subject` INNER JOIN `subject` ON 
                        `teacher_has_subject`.`subject_id`=`subject`.`id` INNER JOIN `grade` ON `teacher_has_subject`.`grade_id`=`grade`.`id` 
                        WHERE `teacher_has_subject`.`teacher_id`='" . $_SESSION["teacher"]["id"] . "';");

                            ?>
                            <select class="form-select border-radius" id="s" onchange="loadTeacherGrades();">
                                <option value="0">Select</option>
                                <?php

                                for ($k2 = 0; $k2 < $resultset2->num_rows; $k2++) {
                                    $s = $resultset2->fetch_assoc();
                                ?>

                                    <option value="<?php echo $s["subject_id"]; ?>"><?php echo $s["subject"]; ?></option>

                                <?php
                                }

                                ?>
                            </select>
                        </div>

                        <div class="col-12 mt-3">
                            <label class="form-label">Grade</label>
                            <select class="form-select border-radius" id="g">

                            </select>
                        </div>

                        <div class="col-12 mt-3">
                            <div class="row">
                                <div class="col-5 d-grid">
                                    <input type="file" accept="pdf" class="d-none" id="note" />
                                    <label for="note" class="btn btn-info text-white fw-bold border-radius" style="font-size: 17px;">Choose a Note</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary border-radius" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn kur-btn" onclick="addLessonNote('<?php echo $_SESSION['teacher']['id']; ?>');">Add Lesson Note</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Lesson Note Modal -->

<?php

}

?>