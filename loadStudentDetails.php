<?php

session_start();

require "connection.php";

if (!isset($_SESSION["admin"])) {

?>

    <script>
        window.location = "index.php";
    </script>

    <?php

} else {

    $id = $_POST["id"];

    $resultset1 = Database::search("SELECT * FROM `student` WHERE `student`.`id`='" . $id . "';");

    if ($resultset1->num_rows == 1) {
        $studentDetails = $resultset1->fetch_assoc();

    ?>

        <div class="col-11 bg-white mb-5" style="border-radius: 15px;">
            <div class="row">

                <div class="col-12 mt-3">
                    <div class="row justify-content-center">
                        <div class="col-3 ">
                            <h4 class="text-secondary fw-bold">About Student</h4>
                        </div>
                        <div class="col-5"></div>
                        <div class="col-3 d-grid">
                            <button class="btn btn-outline-primary fs-5" onclick="loadAllStudents();">Show All Students</button>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-3">
                    <div class="row justify-content-center">

                        <div class="col-3 text-center">
                            <?php

                            $resultset2 = Database::search("SELECT * FROM `student_photo` WHERE `student_id`='" . $id . "';");

                            if ($resultset2->num_rows == 1) {

                                for ($k1 = 0; $k1 < $resultset2->num_rows; $k1++) {
                                    $simg = $resultset2->fetch_assoc();
                            ?>
                                    <img src="<?php echo $simg["path"]; ?>" class="rounded-circle" height="260px" />
                                <?php
                                }
                            } else {
                                ?>
                                <img src="resources/emptyprofileimg2.svg" class="rounded-circle" height="260px" />
                            <?php
                            }

                            ?>
                        </div>

                        <div class="col-8 ">
                            <div class="row">

                                <div class="col-12">
                                    <h4 class="fw-bold"><?php echo $studentDetails["username"]; ?></h4>
                                </div>

                                <div class="col-12">
                                    <div class="row">

                                        <div class="col-6  mt-3">
                                            <label class="form-label" style="font-size: 17px;">ID No. :</label>
                                            <input type="number" value="<?php echo $studentDetails["id"]; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                        </div>

                                        <div class="col-6 mt-3">
                                            <label class="form-label" style="font-size: 17px;">E-mail-Address :</label>
                                            <input type="text" value="<?php echo $studentDetails["email"]; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                        </div>

                                        <div class="col-6 mt-3">
                                            <label class="form-label" style="font-size: 17px;">Username :</label>
                                            <input type="text" value="<?php echo $studentDetails["username"]; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                        </div>

                                        <div class="col-6 mt-3">
                                            <label class="form-label" style="font-size: 17px;">Password :</label>
                                            <input type="text" value="<?php echo $studentDetails["password"]; ?>" class="form-control border-radius" style="font-size: 17px;" disabled /><span>
                                        </div>

                                        <div class="col-6 mt-3">
                                            <label class="form-label" style="font-size: 17px;">First Name :</label>
                                            <input type="text" value="<?php echo $studentDetails["first_name"]; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                        </div>

                                        <div class="col-6 mt-3">
                                            <label class="form-label" style="font-size: 17px;">Last Name :</label>
                                            <input type="text" value="<?php echo $studentDetails["last_name"]; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                        </div>

                                        <?php

                                        $rs = Database::search("SELECT * FROM `grade` WHERE `id` = '" . $studentDetails["grade_id"] . "'");
                                        $g = $rs->fetch_assoc();

                                        ?>

                                        <div class="col-6 mt-3">
                                            <label class="form-label" style="font-size: 17px;">Grade :</label>
                                            <div class="input-group mb-3">
                                                <input type="text" value="<?php echo $g["name"]; ?>" class="form-control border-radius" style="font-size: 17px;" aria-label="Recipient's username" aria-describedby="button-addon2" disabled />
                                                <button class="btn btn-outline-success border-radius" type="button" onclick="openChangeStudentGradeModal();" id="button-addon2">Change</button>
                                            </div>
                                        </div>

                                        <div class="col-6 mt-3">
                                            <label class="form-label" style="font-size: 17px;">Contact Number :</label>
                                            <input type="text" value="<?php echo $studentDetails["contact_number"]; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                        </div>

                                        <div class="col-6 mt-3">
                                            <label class="form-label" style="font-size: 17px;">Gender :</label>
                                            <?php

                                            if ($studentDetails["gender_id"] == 1) {
                                            ?>
                                                <input type="text" value="<?php echo "Male"; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                            <?php
                                            } else if ($studentDetails["gender_id"] == 2) {
                                            ?>
                                                <input type="text" value="<?php echo "Female"; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                            <?php
                                            } else {
                                            ?>
                                                <input type="text" value="<?php echo "Null"; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                            <?php
                                            }

                                            ?>
                                        </div>

                                        <div class="col-6 mt-3">
                                            <label class="form-label" style="font-size: 17px;">Verification Status :</label>
                                            <?php

                                            $resultset4 = Database::search("SELECT `verification_status`.`name` AS `vstatus` FROM `student` INNER JOIN `verification_status` ON `student`.`verification_status_id`=`verification_status`.`id` 
                                    WHERE `student`.`id`='" . $id . "';");

                                            $tvs = $resultset4->fetch_assoc();

                                            ?>
                                            <input type="text" value="<?php echo $tvs["vstatus"]; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 table-responsive mt-5" style="height: 260px;">
                                    <div class="row">
                                        <table class="table">
                                            <thead style="color: white; background-color: rgb(68, 210, 111);">
                                                <tr>
                                                    <th scope="col">Subject</th>
                                                    <th scope="col">Assignment ID</th>
                                                    <th scope="col">Marks</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php

                                                $resultset5 = Database::search("SELECT `subject`.`name` AS `subject`, `assignments`.`id` AS `assignment_id`, `assignment_marks`.`marks` FROM `released_marks` INNER JOIN 
                                            `assignment_marks` ON `released_marks`.`assignment_marks_id`=`assignment_marks`.`id` INNER JOIN `assignments` ON 
                                            `assignment_marks`.`assignments_id`=`assignments`.`id` INNER JOIN `teacher_has_subject` ON 
                                            `assignments`.`teacher_has_subject_id`=`teacher_has_subject`.`id` INNER JOIN `subject` ON `teacher_has_subject`.`subject_id`=`subject`.`id` 
                                            WHERE `assignment_marks`.`student_id`='" . $id . "';");

                                                for ($k2 = 0; $k2 < $resultset5->num_rows; $k2++) {

                                                    $ssam = $resultset5->fetch_assoc();

                                                ?>

                                                    <tr>
                                                        <td><?php echo $ssam["subject"]; ?></td>
                                                        <td><?php echo $ssam["assignment_id"]; ?></td>
                                                        <td><?php echo $ssam["marks"]; ?></td>
                                                    </tr>

                                                <?php

                                                }

                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Change Student Grade Modal -->
                                <div class="modal fade" tabindex="-1" id="changeStudentGradeModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Change Student Grade Verification</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12 mt-3">
                                                        <label class="form-label">Grade</label>
                                                        <?php

                                                        $resultset6 = Database::search("SELECT * FROM `grade`;");

                                                        ?>
                                                        <select class="form-select border-radius" id="sg">
                                                            <option value="0">Select</option>
                                                            <?php

                                                            for ($k3 = 0; $k3 < $resultset6->num_rows; $k3++) {
                                                                $sg = $resultset6->fetch_assoc();
                                                            ?>

                                                                <option value="<?php echo $sg["id"]; ?>"><?php echo $sg["name"]; ?></option>

                                                            <?php
                                                            }

                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary border-radius" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn kur-btn" onclick="changeStudentGrade('<?php echo $id; ?>');">Change</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Change Student Grade Modal -->

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    <?php

    } else {
    ?>

        <script>
            swal({
                title: "Invalid Request!!!",
                icon: "error",
                button: "Ok",
            });
        </script>

<?php
    }
}

?>