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
                <h4 class="text-primary fw-bold">Results</h4>
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
                                            <th scope="col">Assignment Id</th>
                                            <th scope="col">Student Id</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Marks</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $ResultSet = Database::search("SELECT `assignment_marks`.`id`, `assignment_marks`.`marks`, 
                                        `assignment_marks`.`assignments_id`, `student`.`id` AS `student_id`, `student`.`username` FROM 
                                        `assignment_marks` INNER JOIN `student` ON `assignment_marks`.`student_id` = `student`.`id` ORDER BY 
                                        `assignments_id` ASC");

                                        for ($i = 0; $i < $ResultSet->num_rows; $i++) {

                                            $marksDetails = $ResultSet->fetch_assoc();

                                        ?>
                                            <tr>
                                                <td><?php echo $marksDetails["assignments_id"]; ?></td>
                                                <td><?php echo $marksDetails["student_id"]; ?></td>
                                                <td><?php echo $marksDetails["username"]; ?></td>

                                                <?php

                                                if ($marksDetails["marks"] != null) {
                                                ?>
                                                    <td><?php echo $marksDetails["marks"]; ?></td>
                                                <?php
                                                } else {
                                                ?>
                                                    <td class="text-success" style="cursor: pointer;" onclick="AddAssignmentMarksModal('<?php echo $marksDetails['id']; ?>');">ADD</td>
                                                <?php
                                                }

                                                ?>


                                            </tr>

                                            <div class="modal fade" id="AddAssignmentMarksModal<?php echo $marksDetails['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Add Assignment Marks</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-12">
                                                                <div class="row g-2">
                                                                    <div class="col-12">
                                                                        <label class="form-label">Marks</label>
                                                                        <input type="number" class="form-control" id="marks<?php echo $marksDetails['id']; ?>" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" onclick="AddMarks('<?php echo $marksDetails['id']; ?>');">Add</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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