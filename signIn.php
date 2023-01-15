<?php

    session_start();

    $user = $_GET["user"];

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
    <title>OSMS - <?php echo $user; ?> Sign In</title>

    <!--Head Links-->
    <?php require "headLinks.php"; ?>
    <!--Head Links-->
</head>

<body>

    <div class="container-fluid">

        <div class="row">

            <!--School Logo-->
            <div class="col-12 text-center">
                <img src="resources/JIAT3_rb1.png" width="430px"/>
            </div>
            <!--School Logo-->

            <!-- Sign In Design lg screen to above -->
            <div class="col-12 d-none d-lg-block" style="margin-top: 50px;">
                <div class="row justify-content-center">

                    <div class="col-5 text-center">
                        <img src="resources/student1.jpg" width="570px" height="470px" />
                    </div>

                    <div class="col-5 ">
                        <div class="row ">
                            
                            <!-- Heading -->
                            <div class="col-12 text-center mt-2">
                                <h1 style="color: rgb(68, 210, 111); font-weight: bold;"><?php echo $user; ?> Sign In</h1>
                            </div>
                            <!-- Heading -->

                            <!-- Sub Heading -->
                            <div class="col-12 text-center mt-3">
                                <h2 class="text-primary" style="font-family: Honey Script;">Sign In To Your Account</h2>
                            </div>
                            <!-- Sub Heading -->

                            <!-- Content -->
                            <div class="col-12 mt-3">

                                <div class="row justify-content-center">
                                    <div class="col-10">
                                        <label class="form-label fs-5">User Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control fs-5 border-radius" id="un"/>
                                            <span class="input-group-text fs-5 border-radius"><i class="bi bi-person"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-10 mt-2">
                                        <label class="form-label fs-5">Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control fs-5 border-radius" id="pw"/>
                                            <span class="input-group-text fs-5 border-radius"><i class="bi bi-key"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-10 mt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label"  for="flexCheckDefault">Remember Me</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-10 text-center mt-2">
                                        <a href="#" class="link-success" style="text-decoration: none;">Forgot Password</a>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-5 d-grid mt-4 mb-3">
                                        <button class="btn btn-primary fs-5 border-radius" onclick="goToHome();">Back To Home</button>
                                    </div>
                                    <div class="col-5 d-grid mt-4 mb-3">
                                        <button class="btn kur-btn fs-5" onclick="signIn('<?php echo $user; ?>');">Sign In</button>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- Content -->

                        </div>
                    </div>

                </div>
            </div>
            <!-- Sign In Design lg screen to above -->

            <!-- Sign In Design xs,sm,md screens only -->
            <div class="col-12 d-block d-lg-none mt-4">
                <div class="row justify-content-center">

                    <!-- Heading -->
                    <div class="col-12 text-center">
                        <h2 style="color: rgb(68, 210, 111); font-weight: bold;"><?php echo $user; ?> Sign In</h2>
                    </div>
                    <!-- Heading -->

                    <!-- Sub Heading -->
                    <div class="col-12 text-center mt-3">
                        <label class="text-primary login-heading" style="font-family: Honey Script; font-size: 30px;">Sign In To Your Account</label>
                    </div>
                    <!-- Sub Heading -->

                    <!-- Content -->
                    <div class="col-12 mt-3">

                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-8">
                                <label class="form-label fs-5">User Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control fs-5 border-radius" id="un"/>
                                    <span class="input-group-text fs-5 border-radius"><i class="bi bi-person"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-8 mt-2">
                                <label class="form-label fs-5">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control fs-5 border-radius" id="pw"/>
                                    <span class="input-group-text fs-5 border-radius"><i class="bi bi-key"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-8 mt-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" value="" id="flexCheckDefault" />
                                    <label class="form-check-label"  for="flexCheckDefault">Remember Me</label>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-8 text-center mt-3">
                                <a href="#" class="link-success" style="text-decoration: none;">Forgot Password</a>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-4 d-grid mt-4">
                                <button class="btn btn-primary border-radius" onclick="goToHome();">Back To Home</button>
                            </div>
                            <div class="col-10 col-sm-4 d-grid mt-2 mt-sm-4">
                                <button class="btn kur-btn">Sign In</button>
                            </div>
                        </div>

                    </div>
                    <!-- Content -->

                </div>
            </div>
            <!-- Sign In Design xs,sm,md screens only -->

            <!-- Verification Modal -->
            <div class="modal fade" tabindex="-1" id="VModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><?php echo $user; ?> Sign In Verification</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label">Enter the Verification Code</label>
                                    <input class="form-control border-radius" type="text" id="svc" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary border-radius" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn kur-btn" onclick="signInVerify('<?php echo $user; ?>');">Verify To Sign In</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Verification Modal -->

        </div>

    </div>

    <!-- js links -->
    <?php require "jsLinks.php"; ?>
    <!--js links-->

</body>

</html>

<?php

    }

?>