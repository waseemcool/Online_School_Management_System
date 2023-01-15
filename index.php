<?php

    session_start();

    if(isset($_SESSION["admin"])){

        ?>

        <script>window.location = "adminHomeDashboard.php";</script>

        <?php

    }else if(isset($_SESSION["teacher"])){

        ?>

        <script>window.location = "teacherHome.php";</script>

        <?php

    }else if(isset($_SESSION["student"])){

        ?>

        <script>window.location = "studentHome.php";</script>

        <?php

    }else if(isset($_SESSION["ao"])){

        ?>

        <script>window.location = "academicOfficerHome.php";</script>

        <?php

    }else{

?>

<!DOCTYPE html>

<html>

<head>
    <title>Java Institute</title>

    <!--Head Links-->
    <?php
    
        require "headLinks.php";

    ?>
    <!--Head Links-->
</head>

<body>

    <div class="container-fluid">

        <div class="row">

            <!--School Logo-->
            <div class="col-12 text-center mt-3">
                <img src="resources/JIAT3_rb1.png" width="430px"/>
            </div>
            <!--School Logo-->

            <!--Content lg screen to above-->
            <div class="col-12 d-none d-lg-block" style="margin-top: 100px;">
                <div class="row">

                    <div class="col-12">

                        <div class="row justify-content-center">

                            <div class="col-md-3 col-lg-2 text-center">
                                <a href="signIn.php?user=Admin"><img src="resources/user_images/admin3.png" width="128px" height="128px"/></a>                       
                            </div>

                            <div class="col-md-3 col-lg-2 text-center">
                                <a href="signIn.php?user=Teacher"><img src="resources/user_images/teachers3.png"/></a>
                            </div>

                            <div class="col-md-3 col-lg-2 text-center ">
                                <a href="signIn.php?user=Student"><img src="resources/user_images/students3.png"/></a>
                            </div>

                            <div class="col-md-3 col-lg-2 text-center">
                                <a href="signIn.php?user=Academic_Officer"><img src="resources/user_images/academic_officers3.png"/></a>
                            </div>

                        </div>

                        <div class="row justify-content-center">

                            <div class="col-md-3 col-lg-2 text-center mt-2">
                                <label class="form-label fs-5">Admin</label>
                            </div>

                            <div class="col-md-3 col-lg-2 text-center mt-2">
                                <label class="form-label fs-5">Teacher</label>
                            </div>

                            <div class="col-md-3 col-lg-2 text-center mt-2">
                                <label class="form-label fs-5">Student</label>
                            </div>

                            <div class="col-md-3 col-lg-2 text-center mt-2">
                                <label class="form-label fs-5">Academic Officer</label>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
            <!--Content lg screen to above-->

            <!--Content md screen only-->
            <div class="col-12 d-none d-md-block d-lg-none" style="margin-top: 30px;">
                <div class="row">

                    <div class="col-12">

                        <div class="row justify-content-center">

                            <div class="col-md-3 col-lg-2 text-center">
                                <a href="signIn.php?user=Admin"><img src="resources/user_images/admin3.png" width="128px" height="128px"/></a>                       
                            </div>

                            <div class="col-md-3 col-lg-2 text-center">
                                <a href="signIn.php?userTteacher"><img src="resources/user_images/teachers3.png"/></a>
                            </div>

                            <div class="col-md-3 col-lg-2 text-center ">
                                <a href="signIn.php?user=Student"><img src="resources/user_images/students3.png"/></a>
                            </div>

                            <div class="col-md-3 col-lg-2 text-center">
                                <a href="signIn.php?user=Academic_Officer"><img src="resources/user_images/academic_officers3.png"/></a>
                            </div>

                        </div>

                        <div class="row justify-content-center">

                            <div class="col-md-3 col-lg-2 text-center mt-2">
                                <label class="form-label fs-5">Admin</label>
                            </div>

                            <div class="col-md-3 col-lg-2 text-center mt-2">
                                <label class="form-label fs-5">Teacher</label>
                            </div>

                            <div class="col-md-3 col-lg-2 text-center mt-2">
                                <label class="form-label fs-5">Student</label>
                            </div>

                            <div class="col-md-3 col-lg-2 text-center mt-2">
                                <label class="form-label fs-5">Academic Officer</label>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
            <!--Content md screen only-->

            <!--Content sm screen only-->
            <div class="col-12 d-none d-sm-block d-md-none mt-5">

                <div class="row justify-content-center">

                    <div class="col-sm-4 text-center">
                        <a href="signIn.php?user=Admin"><img src="resources/user_images/admin3.png" width="128px" height="128px"/></a>                       
                    </div>

                    <div class="col-sm-4 text-center">
                        <a href="signIn.php?user=Teacher"><img src="resources/user_images/teachers3.png"/></a>
                    </div>

                </div>

                <div class="row justify-content-center">

                    <div class="col-sm-4 text-center mt-2">
                        <label class="form-label fs-5">Admin</label>
                    </div>

                    <div class="col-sm-4 text-center mt-2">
                        <label class="form-label fs-5">Teacher</label>
                    </div>

                </div>

                <div class="row justify-content-center">

                    <div class="col-sm-4 text-center mt-3">
                        <a href="signIn.php?user=Student"><img src="resources/user_images/students3.png"/></a>
                    </div>

                    <div class="col-sm-4 text-center mt-3">
                        <a href="signIn.php?user=Academic_Officer"><img src="resources/user_images/academic_officers3.png"/></a>
                    </div>

                </div>

                <div class="row justify-content-center">

                    <div class="col-sm-4 text-center mt-2">
                        <label class="form-label fs-5">Student</label>
                    </div>

                    <div class="col-sm-4 text-center mt-2">
                        <label class="form-label fs-5">Academic Officer</label>
                    </div>

                </div>

            </div>
            <!--Content sm screen only-->

            <!-- Content xs screen only -->
            <div class="col-12 d-block d-sm-none mt-5">

                <div class="row justify-content-center">
                    <div class="col-6 text-center">
                        <a href="signIn.php?user=Admin"><img src="resources/user_images/admin3.png" width="128px" height="128px"/></a>       
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-6 text-center mt-2">
                        <label class="form-label fs-5">Admin</label>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-6 text-center mt-4">
                        <a href="signIn.php?user=Teacher"><img src="resources/user_images/teachers3.png"/></a>   
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-6 text-center mt-2">
                        <label class="form-label fs-5">Teacher</label>
                    </div>
                </div>
            
                <div class="row justify-content-center ">
                    <div class="col-6 text-center mt-4">
                        <a href="signIn.php?user=Student"><img src="resources/user_images/students3.png"/></a>      
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-6 text-center mt-2">
                        <label class="form-label fs-5">Student</label>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-6 text-center mt-4">
                        <a href="signIn.php?user=Academic_Officer"><img src="resources/user_images/academic_officers3.png"/></a>      
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-6 text-center mt-2">
                        <label class="form-label fs-5">Academic Officer</label>
                    </div>
                </div>

            </div>
            <!-- Content xs screen only -->

            <!-- Footer xs screen only -->
            <!-- <div class="col-12 d-block d-sm-none mt-4">
                <p class="text-center">Powered by &copy; 2022 Kur Software Solutions (Pvt) Ltd</p>
            </div> -->
            <!-- Footer xs screen only -->

            <!-- Footer sm screen to above -->
            <!-- <div class="col-12 d-none d-sm-block fixed-bottom">
                <p class="text-center">Powered by &copy; 2022 Kur Software Solutions (Pvt) Ltd</p>
            </div> -->
            <!-- Footer sm screen to above -->

            <!-- Footer lg screen to above -->
            <div class="col-12 d-none d-lg-block fixed-bottom">
                <div class="row">

                    <div class="col-12">
                        <div class="row">
                            <div class="col-4 bg-info pt-2" style="height: 75px;">
                                <a href="#" class="text-decoration-none ms-3">
                                    <i class="bi bi-geo-alt text-white fs-1"></i>&nbsp;
                                    <span class="text-white fs-4 fw-bold">3B 1/4, Havelock Road, Colombo 05</span>
                                </a>
                            </div>
                            <div class="col-4 bg-primary pt-2" style="height: 75px;">
                                <a href="#" class="text-decoration-none ms-3">
                                    <i class="bi bi-envelope text-white fs-1"></i>&nbsp;&nbsp;
                                    <span class="text-white fs-4 fw-bold">info@javainstitute.edu.lk</span>
                                </a>
                            </div>
                            <div class="col-4 pt-2" style="background-color: rgb(68, 210, 111); height: 75px;">
                                <a href="#" class="text-decoration-none ms-3">
                                    <i class="bi bi-telephone text-white fs-1"></i>&nbsp;&nbsp;
                                    <span class="text-white fs-4 fw-bold">+9411 250 6000</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 text-center mt-2">
                        <p class="text-secondary fs-5">All Rights Reserved</p>
                    </div>

                </div>
            </div>
            <!-- Footer lg screen to above -->

            <!-- Footer xs screen to sm screen only -->
            <div class="col-12 d-block d-md-none mt-5">
                <div class="row">

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 bg-info pt-2" style="height: 65px;">
                                <a href="#" class="text-decoration-none ms-3">
                                    <i class="bi bi-geo-alt text-white fs-1"></i>&nbsp;&nbsp;
                                    <span class="text-white fs-4 fw-bold">3B 1/4, Havelock Road, Colombo 05</span>
                                </a>
                            </div>
                            <div class="col-12 bg-primary pt-2" style="height: 65px;">
                                <a href="#" class="text-decoration-none ms-3">
                                    <i class="bi bi-envelope text-white fs-1"></i>&nbsp;&nbsp;
                                    <span class="text-white fs-4 fw-bold">info@javainstitute.edu.lk</span>
                                </a>
                            </div>
                            <div class="col-12 pt-2" style="background-color: rgb(68, 210, 111); height: 65px;">
                                <a href="#" class="text-decoration-none ms-3">
                                    <i class="bi bi-telephone text-white fs-1"></i>&nbsp;&nbsp;
                                    <span class="text-white fs-4 fw-bold">+9411 250 6000</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 text-center mt-2">
                        <p class="text-secondary fs-5">All Rights Reserved</p>
                    </div>

                </div>
            </div>
            <!-- Footer xs screen to sm screen only -->

            <!-- Footer md screen only -->
            <div class="col-12 d-none d-md-block d-lg-none" style="margin-top: 64px;">
                <div class="row">

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 bg-info pt-2" style="height: 65px;">
                                <a href="#" class="text-decoration-none ms-3">
                                    <i class="bi bi-geo-alt text-white fs-1"></i>&nbsp;&nbsp;
                                    <span class="text-white fs-4 fw-bold">3B 1/4, Havelock Road, Colombo 05</span>
                                </a>
                            </div>
                            <div class="col-12 bg-primary pt-2" style="height: 65px;">
                                <a href="#" class="text-decoration-none ms-3">
                                    <i class="bi bi-envelope text-white fs-1"></i>&nbsp;&nbsp;
                                    <span class="text-white fs-4 fw-bold">info@javainstitute.edu.lk</span>
                                </a>
                            </div>
                            <div class="col-12 pt-2" style="background-color: rgb(68, 210, 111); height: 65px;">
                                <a href="#" class="text-decoration-none ms-3">
                                    <i class="bi bi-telephone text-white fs-1"></i>&nbsp;&nbsp;
                                    <span class="text-white fs-4 fw-bold">+9411 250 6000</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 text-center mt-2">
                        <p class="text-secondary fs-5">All Rights Reserved</p>
                    </div>

                </div>
            </div>
            <!-- Footer md screen only -->

        </div>

    </div>

    <!-- JS Links -->
    <?php
    
        require "jsLinks.php";
    
    ?>
    <!-- JS Links -->

</body>

</html>

<?php

    }

?>