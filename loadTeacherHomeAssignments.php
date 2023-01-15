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
                <h4 class="text-primary fw-bold" style="margin-left: 40px;">Assignments</h4>
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
                                            <th scope="col">Date & Time</th>
                                            <th scope="col">Assignments</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $resultset1 = Database::search("SELECT `subject`.`name` AS `subject`, `grade`.`name` AS `grade`, 
                                                `assignments`.`path`, `assignments`.`date_time` FROM `assignments` INNER JOIN `teacher_has_subject` ON 
                                                `assignments`.`teacher_has_subject_id`=`teacher_has_subject`.`id` INNER JOIN `subject` ON 
                                                `teacher_has_subject`.`subject_id`=`subject`.`id` INNER JOIN `grade` ON 
                                                `teacher_has_subject`.`grade_id`=`grade`.`id` WHERE `teacher_has_subject`.`teacher_id`='" . $_SESSION["teacher"]["id"] . "';");

                                        for ($k1 = 0; $k1 < $resultset1->num_rows; $k1++) {
                                            $as = $resultset1->fetch_assoc();

                                        ?>

                                            <tr>
                                                <td><?php echo $as["subject"]; ?></td>
                                                <td><?php echo $as["grade"] ?></td>
                                                <td><?php echo $as["date_time"]; ?></td>
                                                <td><a href="<?php echo $as["path"] ?>" class="text-primary fw-bold text-decoration-none">View Assignments</a></td>
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
        <a onclick="openAddAssignmentModal();" href="#" style="color: rgb(68, 210, 111); text-decoration: none; font-weight: bold;"><i class="bi bi-plus-square"></i>&nbsp;&nbsp;Add Assignments</a>
    </div>

    <!-- Add Lesson Note Modal -->
    <div class="modal fade" tabindex="-1" id="addAssignmentModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Assignments</h5>
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
                                <div class="col-6 d-grid">
                                    <input type="file" accept="pdf" class="d-none" id="assignment" />
                                    <label for="assignment" class="btn btn-info text-white fw-bold border-radius" style="font-size: 17px;">Choose a Assignment</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary border-radius" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn kur-btn" onclick="addAssignment('<?php echo $_SESSION['teacher']['id']; ?>');">Add Assignment</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Lesson Note Modal -->

<?php

}

?>