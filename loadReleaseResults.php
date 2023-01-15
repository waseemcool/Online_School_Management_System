<?php

session_start();

require "connection.php";

if (!isset($_SESSION["ao"])) {

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
                <h4 class="text-primary fw-bold">Release Results</h4>
            </div>
        </div>
    </div>

    <div class="col-12 mt-3" style="margin-bottom: 189px;">
        <div class="row justify-content-center">
            <div class="col-7 kur-box table-responsive shadow" style="height: 500px; border-radius: 15px; border-color: white; border-width: 0px;">
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
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $ResultSet = Database::search("SELECT `assignment_marks`.`id`, `assignment_marks`.`marks`, `assignment_marks`.`assignments_id`, `student`.`id` AS `student_id`, `student`.`username` 
                                                                        FROM `assignment_marks` 
                                                                        INNER JOIN `student` ON `assignment_marks`.`student_id` = `student`.`id` ORDER BY `assignments_id` ASC");

                                        for ($i = 0; $i < $ResultSet->num_rows; $i++) {

                                            $marksDetails = $ResultSet->fetch_assoc();

                                        ?>
                                            <tr>

                                                <?php

                                                if ($marksDetails["marks"] != null) {
                                                ?>
                                                    <td><?php echo $marksDetails["assignments_id"]; ?></td>
                                                    <td><?php echo $marksDetails["student_id"]; ?></td>
                                                    <td><?php echo $marksDetails["username"]; ?></td>
                                                    <td><?php echo $marksDetails["marks"]; ?></td>
                                                    <?php
                                                    $ResultSet2 = Database::search("SELECT * FROM `released_marks` WHERE `assignment_marks_id` = '" . $marksDetails["id"] . "'");
                                                    if ($ResultSet2->num_rows == 1) {
                                                    ?>
                                                        <td class="text-danger">Released</td>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <td class="text-success" style="cursor: pointer;" onclick="ReleaseMarks('<?php echo $marksDetails['id']; ?>');">Release</td>
                                                    <?php
                                                    }

                                                    ?>

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