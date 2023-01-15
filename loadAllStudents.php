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

?>

    <div class="col-11 bg-white table-responsive" style="height: 570px; border-radius: 15px; margin-bottom: 112px;">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead style="color: rgb(68, 210, 111);">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Username</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Grade</th>
                            <th scope="col">Gender</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $resultset1 = Database::search("SELECT * FROM `student`");

                        for ($k1 = 0; $k1 < $resultset1->num_rows; $k1++) {
                            $studentDetails = $resultset1->fetch_assoc();

                            $rs = Database::search("SELECT * FROM `grade` WHERE `id` = '" . $studentDetails["grade_id"] . "'");
                            $grade = $rs->fetch_assoc();

                        ?>

                            <tr ondblclick="loadStudentDetails('<?php echo $studentDetails['id']; ?>');">
                                <td><?php echo $studentDetails["id"]; ?></td>

                                <?php

                                $resultset2 = Database::search("SELECT * FROM `student_photo` WHERE `student_id`='" . $studentDetails["id"] . "';");

                                if ($resultset2->num_rows == 1) {

                                    for ($k2 = 0; $k2 < $resultset2->num_rows; $k2++) {
                                        $simg = $resultset2->fetch_assoc();
                                ?>

                                        <td><img src="<?php echo $simg["path"]; ?>" class="rounded-circle" height="43px" /></td>

                                    <?php
                                    }
                                } else {
                                    ?>

                                    <td><img src="resources/emptyprofileimg2.svg" class="rounded-circle" height="43px" /></td>

                                <?php
                                }

                                ?>

                                <td><?php echo $studentDetails["username"]; ?></td>
                                <td><?php echo $studentDetails["email"]; ?></td>
                                <td><?php echo $studentDetails["first_name"]; ?></td>
                                <td><?php echo $studentDetails["last_name"]; ?></td>
                                <td><?php echo $grade["name"]; ?></td>

                                <?php

                                if ($studentDetails["gender_id"] == 1) {
                                ?>
                                    <td><?php echo "Male"; ?></td>
                                <?php
                                } else if ($studentDetails["gender_id"] == 2) {
                                ?>
                                    <td><?php echo "Female"; ?></td>
                                <?php
                                } else {
                                ?>
                                    <td><?php echo "Null"; ?></td>
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

<?php

}

?>