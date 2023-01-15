<?php

    session_start();

    require "connection.php";

    if(!isset($_SESSION["admin"])){

        ?>

        <script>window.location = "index.php";</script>

        <?php

    }else{

        $id = $_POST["id"];

        $resultset1 = Database::search("SELECT * FROM `teacher` WHERE `id`='".$id."';");

        if($resultset1->num_rows == 1){
            $teacherDetails = $resultset1->fetch_assoc();

?>

<div class="col-11 bg-white" style="height: 920px; border-radius: 15px;">
    <div class="row">

        <div class="col-12 mt-3">
            <div class="row justify-content-center">
                <div class="col-3 ">
                    <h4 class="text-secondary fw-bold">About Teacher</h4>
                </div>
                <div class="col-5"></div>
                <div class="col-3 d-grid">
                    <button class="btn btn-outline-primary" style="font-size: 17px;" onclick="loadAllTeachers();">Show All Teachers</button>
                </div>
            </div>
        </div>

        <div class="col-12 mt-3">
            <div class="row justify-content-center">

                <div class="col-3 text-center">                   
                    <?php

                    $resultset2 = Database::search("SELECT * FROM `teacher_photo` WHERE `teacher_id`='".$id."';");

                    if($resultset2->num_rows == 1){

                        for($k1 = 0; $k1 < $resultset2->num_rows; $k1++){
                            $timg = $resultset2->fetch_assoc();
                            ?>
                            <img src="<?php echo $timg["path"]; ?>" class="rounded-circle" height="260px" />
                            <?php
                        }
                        
                    }else{
                        ?>
                        <img src="resources/emptyprofileimg2.svg" class="rounded-circle" height="260px" />
                        <?php
                    }

                    ?>
                </div>

                <div class="col-8 ">
                    <div class="row">

                        <div class="col-12">
                            <h4 class="fw-bold"><?php echo $teacherDetails["username"]; ?></h4>
                        </div>

                        <div class="col-12">
                            <div class="row">

                                <div class="col-6 mt-3">
                                    <label class="form-label" style="font-size: 17px;">ID No. :</label>
                                    <input type="number" value="<?php echo $teacherDetails["id"]; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                </div>

                                <div class="col-6 mt-3">
                                    <label class="form-label" style="font-size: 17px;">Verification Status :</label>
                                    <?php
                                
                                    $resultset3 = Database::search("SELECT `verification_status`.`name` AS `vstatus` FROM `teacher` INNER JOIN `verification_status` ON `teacher`.`verification_status_id`=`verification_status`.`id` 
                                    WHERE `teacher`.`id`='".$id."';");

                                    $tvs = $resultset3->fetch_assoc();
                                    
                                    ?>
                                    <input type="text" value="<?php echo $tvs["vstatus"]; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                </div>

                                <div class="col-6 mt-3">
                                    <label class="form-label" style="font-size: 17px;">Username :</label>
                                    <input type="text" value="<?php echo $teacherDetails["username"]; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                </div>

                                <div class="col-6 mt-3">
                                    <label class="form-label" style="font-size: 17px;">Password :</label>
                                    <input type="text" value="<?php echo $teacherDetails["password"]; ?>" class="form-control border-radius" style="font-size: 17px;" disabled /><span>
                                </div>

                                <div class="col-6 mt-3">
                                    <label class="form-label" style="font-size: 17px;">First Name :</label>
                                    <input type="text" value="<?php echo $teacherDetails["first_name"]; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                </div>

                                <div class="col-6 mt-3">
                                    <label class="form-label" style="font-size: 17px;">Last Name :</label>
                                    <input type="text" value="<?php echo $teacherDetails["last_name"]; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                </div>

                                <div class="col-12 mt-3">
                                    <label class="form-label" style="font-size: 17px;">E-mail-Address :</label>
                                    <input type="text" value="<?php echo $teacherDetails["email"]; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                </div>

                                <div class="col-6 mt-3">
                                    <label class="form-label" style="font-size: 17px;">Contact Number :</label>
                                    <input type="text" value="<?php echo $teacherDetails["contact_number"]; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                </div>

                                <div class="col-6 mt-3">
                                    <label class="form-label" style="font-size: 17px;">Gender :</label>
                                    <?php
                                            
                                    if($teacherDetails["gender_id"] == 1){
                                        ?>
                                        <input type="text" value="<?php echo "Male"; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                        <?php
                                    }else if($teacherDetails["gender_id"] == 2){
                                        ?>
                                        <input type="text" value="<?php echo "Female"; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                        <?php
                                    }else{
                                        ?>
                                        <input type="text" value="<?php echo "Null"; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                        <?php
                                    }

                                    ?>
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-12 table-responsive mt-5" style="height: 260px;">
                            <div class="row">
                                <table class="table">
                                    <thead style="color: white; background-color: rgb(68, 210, 111);">
                                        <tr>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Grade</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        
                                            $resultset3 = Database::search("SELECT `subject`.`name` AS `subject`, `grade`.`name` AS `grade` FROM `teacher_has_subject` INNER JOIN `subject` 
                                            ON `teacher_has_subject`.`subject_id`=`subject`.`id` INNER JOIN `grade` ON `teacher_has_subject`.`grade_id`=`grade`.`id` 
                                            WHERE `teacher_has_subject`.`teacher_id`='".$id."';");
                                                
                                            for($k2 = 0; $k2 < $resultset3->num_rows; $k2++){

                                                $tsg = $resultset3->fetch_assoc();

                                                ?>

                                                <tr>
                                                    <td><?php echo $tsg["subject"]; ?></td>
                                                    <td><?php echo $tsg["grade"]; ?></td>
                                                    <td><a onclick="openDelVerTsgModal();" style="cursor: pointer;"><i class="bi bi-x-circle text-danger fs-5"></i></a></td>
                                                </tr>

                                                <?php
                                                
                                            }
                                        
                                        ?> 

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-12 text-center mt-4">
                            <a onclick="openAddTsgModal();" style="color: rgb(68, 210, 111); font-weight: bold; text-decoration: none; cursor: pointer;"><i class="bi bi-plus-square"></i>&nbsp;&nbsp;Add Subject and Grade</a>
                        </div>

                        <!-- Add Subject and Grade Modal -->
                        <div class="modal fade" tabindex="-1" id="addTsgModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Subject and Grade</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-12">
                                                <label class="form-label">Subject</label>
                                                <?php
                                                
                                                $resultset5 = Database::search("SELECT * FROM `subject`;");
                                                
                                                ?>
                                                <select class="form-select border-radius" id="ts">
                                                    <option value="0">Select</option>
                                                    <?php
                                                    
                                                    for($k3 = 0; $k3 < $resultset5->num_rows; $k3++){
                                                        $ts = $resultset5->fetch_assoc();
                                                        ?>

                                                        <option value="<?php echo $ts["id"]; ?>"><?php echo $ts["name"]; ?></option>

                                                        <?php                                                        
                                                    }
                                                    
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-12 mt-3">
                                                <label class="form-label">Grade</label>
                                                <?php
                                                
                                                $resultset6 = Database::search("SELECT * FROM `grade`;");
                                                
                                                ?>
                                                <select class="form-select border-radius" id="tg">
                                                    <option value="0">Select</option>
                                                    <?php
                                                    
                                                    for($k4 = 0; $k4 < $resultset6->num_rows; $k4++){
                                                        $tg = $resultset6->fetch_assoc();
                                                        ?>

                                                        <option value="<?php echo $tg["id"]; ?>"><?php echo $tg["name"]; ?></option>

                                                        <?php                                                        
                                                    }
                                                    
                                                    ?>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary border-radius" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn kur-btn" onclick="addTsg('<?php echo $id; ?>');">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Add Subject and Grade Modal -->

                        <!-- Delete Subject and Grade Verification Modal -->
                        <div class="modal fade" tabindex="-1" id="delTsgVerModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Subject & Grade Verification</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <label class="form-label" style="font-size: 18px;">Are you sure? You want to Delete?</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary border-radius" data-bs-dismiss="modal">No</button>
                                        <button type="button" class="btn btn-danger border-radius" onclick="deleteTsg('<?php echo $id; ?>');">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Delete Subject and Grade Verification Modal -->

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<?php

        }else{
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