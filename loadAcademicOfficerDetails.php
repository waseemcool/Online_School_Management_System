<?php

    session_start();

    require "connection.php";

    if(!isset($_SESSION["admin"])){

        ?>

        <script>window.location = "index.php";</script>

        <?php

    }else{

        $id = $_POST["id"];

        $resultset1 = Database::search("SELECT * FROM `academic_officer` WHERE `id`='".$id."';");

        if($resultset1->num_rows == 1){
            $aoDetails = $resultset1->fetch_assoc();

?>

<div class="col-11 bg-white" style="height: 600px; border-radius: 15px;">
    <div class="row">

        <div class="col-12 mt-3">
            <div class="row justify-content-center">
                <div class="col-3 ">
                    <h4 class="text-secondary fw-bold">About Academic Officer</h4>
                </div>
                <div class="col-4"></div>
                <div class="col-4 d-grid">
                    <button class="btn btn-outline-primary fs-5" onclick="loadAllAcademicOfficers();">Show All Academic Officers</button>
                </div>
            </div>
        </div>

        <div class="col-12 mt-3">
            <div class="row justify-content-center">

                <div class="col-3 text-center">
                    <?php

                    $resultset2 = Database::search("SELECT * FROM `ao_photo` WHERE `academic_officer_id`='".$id."';");

                    if($resultset2->num_rows == 1){

                        for($k1 = 0; $k1 < $resultset2->num_rows; $k1++){
                            $aoimg = $resultset2->fetch_assoc();
                            ?>
                            <img src="<?php echo $aoimg["path"]; ?>" class="rounded-circle" height="260px" />
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
                            <h4 class="fw-bold"><?php echo $aoDetails["username"]; ?></h4>
                        </div>

                        <div class="col-12">
                            <div class="row">

                                <div class="col-6  mt-3">
                                    <label class="form-label" style="font-size: 17px;">ID No. :</label>
                                    <input type="number" value="<?php echo $aoDetails["id"]; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                </div>

                                <div class="col-6 mt-3">
                                    <label class="form-label" style="font-size: 17px;">Verification Status :</label>
                                    <?php
                                
                                    $resultset3 = Database::search("SELECT `verification_status`.`name` AS `vstatus` FROM `academic_officer` INNER JOIN `verification_status` ON `academic_officer`.`verification_status_id`=`verification_status`.`id` 
                                    WHERE `academic_officer`.`id`='".$id."';");

                                    $aovs = $resultset3->fetch_assoc();
                                    
                                    ?>
                                    <input type="text" value="<?php echo $aovs["vstatus"]; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                </div> 

                                <div class="col-6 mt-3">
                                    <label class="form-label" style="font-size: 17px;">Username :</label>
                                    <input type="text" value="<?php echo $aoDetails["username"]; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                </div>

                                <div class="col-6 mt-3">
                                    <label class="form-label" style="font-size: 17px;">Password :</label>
                                    <input type="text" value="<?php echo $aoDetails["password"]; ?>" class="form-control border-radius" style="font-size: 17px;" disabled /><span>
                                </div>

                                <div class="col-6 mt-3">
                                    <label class="form-label" style="font-size: 17px;">First Name :</label>
                                    <input type="text" value="<?php echo $aoDetails["first_name"]; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                </div>

                                <div class="col-6 mt-3">
                                    <label class="form-label" style="font-size: 17px;">Last Name :</label>
                                    <input type="text" value="<?php echo $aoDetails["last_name"]; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                </div>

                                <div class="col-12 mt-3">
                                    <label class="form-label" style="font-size: 17px;">E-mail-Address :</label>
                                    <input type="text" value="<?php echo $aoDetails["email"]; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                </div>

                                <div class="col-6 mt-3">
                                    <label class="form-label" style="font-size: 17px;">Contact Number :</label>
                                    <input type="text" value="<?php echo $aoDetails["contact_number"]; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                </div>

                                <div class="col-6 mt-3">
                                    <label class="form-label" style="font-size: 17px;">Gender :</label>

                                    <?php
                                            
                                    if($aoDetails["gender_id"] == 1){
                                        ?>
                                        <input type="text" value="<?php echo "Male"; ?>" class="form-control border-radius" style="font-size: 17px;" disabled />
                                        <?php
                                    }else if($aoDetails["gender_id"] == 2){
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