<!DOCTYPE html>

<html>

<head>
    <title>OSMS - Academic Officer Log In</title>

    <?php require "headLinks.php"; ?>
</head>

<body>

    <div class="container-fluid">

        <div class="row">

            <!--<div class="col-12">

<h1 style="color: rgb(89, 224, 89); text-align: center;">Assalamu Alaikum Warahmathullahi Wabarakathuhu</h1>

            </div>-->

            <div class="col-12 text-center" style="margin-top: 150px;">
                <h2>Academic Officer Log In</h2>
            </div>

            <div class="col-12 text-center mt-3">
                <label class="login-heading">Log In To Your Account</label>
            </div>

            <div class="col-12 mt-3">

                <div class="row justify-content-center">
                    <div class="col-8 col-lg-4">
                        <label class="form-label fs-5">User Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control"/>
                            <span class="input-group-text fs-5"><i class="bi bi-person"></i></span>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-8 col-lg-4 mt-2">
                        <label class="form-label fs-5">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control"/>
                            <span class="input-group-text fs-5"><i class="bi bi-key"></i></span>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-8 col-lg-4 mt-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label"  for="flexCheckDefault">Remember Me</label>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-8 col-lg-4 text-center mt-2">
                        <a href="#" class="link-success" style="text-decoration: none;">Forgot Password</a>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-8 col-lg-2 d-grid mt-4">
                        <button class="btn btn-primary" onclick="goToHome();">Back To Home</button>
                    </div>
                    <div class="col-8 col-lg-2 d-grid mt-4">
                        <button class="btn kur-btn">Log In</button>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <?php require "jsLinks.php"; ?>

</body>

</html>