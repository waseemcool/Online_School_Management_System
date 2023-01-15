<?php

    session_start();

    if(!isset($_SESSION["ao"])){

        ?>

        <script>window.location = "index.php";</script>

        <?php

    }else{

?>

<!DOCTYPE html>

<html>

<head>
    <title>OSMS - Academic Officer Home</title>

    <!--Head Links-->
    <?php require "headLinks.php"; ?>
    <!--Head Links-->
</head>

<body onload="loadReleaseResults();">

    <div class="container-fluid">

        <div class="row">

            <div class="col-12">
                <div class="row">

                    <div class="col-2 kur-box" style="border-bottom: none; border-top: none; border-left: none;">
                        <div class="row">
                            
                            <!-- <div class="col-12 mt-3" style="text-align: center;">
                                <img src="resources/demoprofileimg3.svg" id="prev" class="img-thumbnail rounded-circle" width="150px" height="150px" />
                            </div>
                            <div class="col-12 mt-2" style="text-align: center;">
                                <h3 style="color: rgb(68, 210, 111);">Kurundugolla</h3>
                                <label class="text-primary fs-5">Academic Officer</label>
                            </div> -->

                            <div class="col-12" style="margin-top: 320px;">
                                <button class="kur-btn2" style="width: 282px; font-size: 18px;" onclick="loadReleaseResults();"><i><img src="resources/assignments.png" 
                                style="width: 34px; height: 34px;"/></i>&nbsp;&nbsp;Release Results</button>
                            </div>
                            <div class="col-12 mt-3">
                                <button class="kur-btn2" style="width: 282px; font-size: 18px;" onclick="loadStudentInvitation();"><i><img src="resources/students2.png" 
                                style="width: 40px; height: 40px;"/></i>&nbsp;&nbsp;Invite Student</button>
                            </div>
                            <div class="col-12 mt-3">
                                <button class="kur-btn2" style="width: 282px; font-size: 18px;" onclick="loadAoProfile();"><i><img src="resources/profile1.png" 
                                style="width: 34px; height: 34px;"/></i>&nbsp;&nbsp;My Profile</button>
                            </div>
                                                        
                        </div>
                    </div>

                    <div class="col-10">
                        <div class="row">

                            <div class="col-12 border border-info border-3 border-start-0 border-end-0 border-top-0">
                                <div class="row">

                                    <div class="col-7 mt-3" >
                                        <h2 style="color: rgb(68, 210, 111); font-weight: bold;">Welcome to Java Institute</h2>
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
                                <div class="row" id="t">

                                    

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

?>