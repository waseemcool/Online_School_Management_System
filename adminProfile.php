<?php

    session_start();

    require "connection.php";

    if(!isset($_SESSION["admin"])){

        ?>

        <script>window.location = "index.php";</script>

        <?php

    }else{

        $resultset1 = Database::search("SELECT * FROM `admin`;");

        if($resultset1->num_rows == 1){
            $adminDetails = $resultset1->fetch_assoc();

?>

<!DOCTYPE html>

<html>

<head>
    <title>OSMS - Admin Home</title>

    <!--Head Links-->
    <?php require "headLinks.php"; ?>
    <!--Head Links-->
</head>

<body>

    <div class="container-fluid">

        <div class="row">

            <div class="col-12">
                <div class="row">

                    <div class="col-2 kur-box" style="border-bottom: none; border-top: none; border-left: none;">
                        <div class="row mt-3">
                            
                            <div class="col-12" style="text-align: center;">
                                <?php

                                $resultset2 = Database::search("SELECT * FROM `admin_photo`;");

                                if($resultset2->num_rows == 1){

                                    for($k1 = 0; $k1 < $resultset2->num_rows; $k1++){
                                        $aimg = $resultset2->fetch_assoc();
                                        ?>
                                        <img src="<?php echo $aimg["path"]; ?>" class="rounded-circle" width="160px" height="150px" />
                                        <?php
                                    }
                                    
                                }else{
                                    ?>
                                    <img src="resources/emptyprofileimg2.svg" class="rounded-circle" width="160px" height="150px" />
                                    <?php
                                }

                                ?>                                        
                            </div>
                            <div class="col-12 mt-2" style="text-align: center;">
                                <h3 style="color: rgb(68, 210, 111);"><?php echo $_SESSION["admin"]["username"]; ?></h3>
                                <label class="text-primary fs-5">Admin</label>
                            </div>

                            <div class="col-12" style="margin-top: 70px;">
                                <button class="kur-btn2" style="font-size: 18px;" onclick="goToAdminHomeDashboard();"><i><img src="resources/dashboard3.png" 
                                style="width: 37px; height: 37px;"/></i>&nbsp;&nbsp;&nbsp;Dashboard</button>
                            </div>
                            <div class="col-12 d-grid mt-3">
                                <button class="kur-btn2" style="font-size: 18px;" onclick="goToAdminHomeTeacher();"><i><img src="resources/admin_home_images/teachers2.png" 
                                style="width: 40px; height: 40px;"/></i>&nbsp;&nbsp;Teachers</button>
                            </div>
                            <div class="col-12 d-grid mt-3">
                                <button class="kur-btn2" style="font-size: 18px;" onclick="goToAdminHomeStudent();"><i><img src="resources/students2.png" 
                                style="width: 40px; height: 40px;"/></i>&nbsp;&nbsp;Students</button>
                            </div>
                            <div class="col-12 d-grid mt-3">
                                <button class="kur-btn2" style="font-size: 18px;" onclick="goToAdminHomeAcademicOfficer();"><i><img src="resources/admin_home_images/academic_officers2.png" 
                                style="width: 37px; height: 37px;"/></i>&nbsp;&nbsp;&nbsp;Academic Officers</button>
                            </div>
                            <div class="col-12 mt-3">
                                <button class="kur-btn2" style="font-size: 18px;" onclick="goToAdminProfile();"><i><img src="resources/profile1.png" 
                                style="width: 37px; height: 37px;"/></i>&nbsp;&nbsp;&nbsp;My Profile</button>
                            </div>

                        </div>
                    </div>

                    <div class="col-10">
                        <div class="row">

                            <div class="col-12 border border-info border-3 border-start-0 border-end-0 border-top-0">
                                <div class="row">

                                    <div class="col-7 mt-3" >
                                        <h2 style="color: rgb(68, 210, 111); font-weight: bold;">Welcome to Kurundugolla Central College</h2>
                                    </div>

                                    <div class="offset-1 col-2 text-center mt-4" >
                                        <button class="ms-5" style="background-color: transparent; border: none; outline: none;"><i class="bi bi-calendar-day text-secondary fs-3"></i></button>
                                        <button class="ms-3" style="background-color: transparent; border: none; outline: none;" onclick="signOut();"><i class="bi bi-box-arrow-left text-secondary fs-3"></i></button>
                                    </div>

                                    <div class="col-2 text-center mb-2">
                                        <img src="resources/JIAT3_rb1.png" width="150px"/>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-12" style="background-color: rgb(240, 240, 240);">
                                        <div class="row">
                                            
                                            <div class="col-12 mt-3">
                                                <h4 class="text-primary fw-bold" style="margin-left: 40px;">My Profile</h4>
                                            </div>

                                            <div class="col-12 mt-4" style="margin-bottom: 144px;">
                                                <div class="row justify-content-center">
                                                    <div class="col-11 bg-white" style=" border-radius: 15px;">
                                                        <div class="row">
                                                            <div class="col-12 mt-5">
                                                                <div class="row justify-content-center">

                                                                    <div class="col-3 text-center">
                                                                        <div class="row">
                                                                            
                                                                            <div class="col-12">
                                                                                <?php

                                                                                $resultset3 = Database::search("SELECT * FROM `admin_photo`;");

                                                                                if($resultset3->num_rows == 1){

                                                                                    for($k1 = 0; $k1 < $resultset3->num_rows; $k1++){
                                                                                        $aimg = $resultset3->fetch_assoc();
                                                                                        ?>
                                                                                        <img src="<?php echo $aimg["path"]; ?>" class="rounded-circle" width="260px" height="260px" id="aphoto" />
                                                                                        <?php
                                                                                    }
                                                                                    
                                                                                }else{
                                                                                    ?>
                                                                                    <img src="resources/emptyprofileimg2.svg" class="rounded-circle" width="260px" height="260px" id="aphoto" />
                                                                                    <?php
                                                                                }

                                                                                ?>
                                                                            </div>
                                                                            
                                                                            <div class="col-12 mt-3">

                                                                                <div class="row justify-content-center">
                                                                                    <div class="col-7 d-grid">
                                                                                        <input type="file" accept="img/*" class="form-control d-none" id="aphotopath" /> 
                                                                                        <label for="aphotopath" class="btn btn-info text-white fw-bold border-radius" style="font-size: 17px;" onclick="adminUploadPhoto();">Upload Photo</label>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row justify-content-center">
                                                                                    <div class="col-7 d-grid mt-2">
                                                                                        <button class="btn btn-danger fw-bold border-radius" style="font-size: 17px;" onclick="adminRemovePhoto();">Remove Photo</button>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                                                                                                            
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-8">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    
                                                                                    <div class="col-6">
                                                                                        <label class="form-label" style="font-size: 17px;">Username :</label>
                                                                                        <input type="text" value="<?php echo $adminDetails["username"]; ?>" class="form-control border-radius" style="font-size: 17px;" id="un"/>
                                                                                    </div>

                                                                                    <div class="col-6">
                                                                                        <label class="form-label" style="font-size: 17px;">Password :</label>
                                                                                        <input type="text" value="<?php echo $adminDetails["password"]; ?>" class="form-control border-radius" style="font-size: 17px;" id="pw" /><span>
                                                                                    </div>

                                                                                    <div class="col-6 mt-5">
                                                                                        <label class="form-label" style="font-size: 17px;">First Name :</label>
                                                                                        <input type="text" value="<?php echo $adminDetails["first_name"]; ?>" class="form-control border-radius" style="font-size: 17px;" id="fn" />
                                                                                    </div>

                                                                                    <div class="col-6 mt-5">
                                                                                        <label class="form-label" style="font-size: 17px;">Last Name :</label>
                                                                                        <input type="text" value="<?php echo $adminDetails["last_name"]; ?>" class="form-control border-radius" style="font-size: 17px;" id="ln" />
                                                                                    </div>

                                                                                    <div class="col-6 mt-5">
                                                                                        <label class="form-label" style="font-size: 17px;">E-mail-Address :</label>
                                                                                        <input type="text" value="<?php echo $adminDetails["email"]; ?>" class="form-control border-radius" style="font-size: 17px;" id="e" />
                                                                                    </div>

                                                                                    <div class="col-6 mt-5">
                                                                                        <label class="form-label" style="font-size: 17px;">Gender :</label>
                                                                                        <?php
                                            
                                                                                        if($adminDetails["gender_id"] == 1){
                                                                                            ?>
                                                                                            <input type="text" value="Male" class="form-control border-radius" style="font-size: 17px;" id="ag" disabled />
                                                                                            <?php
                                                                                        }else if($adminDetails["gender_id"] == 2){
                                                                                            ?>
                                                                                            <input type="text" value="Female" class="form-control border-radius" style="font-size: 17px;" id="ag" disabled />
                                                                                            <?php
                                                                                        }else{
                                                                                            ?>
                                                                                            <select class="form-select border-radius" style="font-size: 17px;" id="ag">
                                                                                                <option value="0">Select</option>
                                                                                                <option value="1">Male</option>
                                                                                                <option value="2">Female</option>
                                                                                            </select>
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
                                                            <div class="col-12 mt-5 mb-5">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-3 d-grid">
                                                                        <button class="btn kur-btn fw-bold" onclick="adminUpdateProfile();">Save Changes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <!-- JS Links -->
    <?php require "jsLinks.php"; ?>
    <!-- JS Links -->

</body>

</html>

<?php

        }

    }

?>