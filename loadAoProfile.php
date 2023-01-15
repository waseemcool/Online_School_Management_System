<?php

session_start();

require "connection.php";

$rs = Database::search("SELECT * FROM `academic_officer` WHERE `id` = '" . $_SESSION["ao"]["id"] . "'");
$details = $rs->fetch_assoc();

?>

<div class="col-12 mt-3">
    <div class="row justify-content-center">
        <div class="col-2 text-center">
            <h4 class="text-primary fw-bold">My Profile</h4>
        </div>
    </div>
</div>

<div class="col-12 mt-3">
    <div class="row justify-content-center">

        <div class="col-3 text-center">
            <div class="row">

                <?php

                $prs = Database::search("SELECT * FROM `ao_photo` WHERE `academic_officer_id` = '" . $details["id"] . "'");

                if ($prs->num_rows == 1) {
                    $p = $prs->fetch_assoc();

                ?>
                    <div class="col-12">
                        <img src="<?php echo $p["path"]; ?>" class="rounded-circle" height="260px" id="pic" />
                    </div>
                <?php
                } else {
                ?>
                    <div class="col-12">
                        <img src="resources/emptyprofileimg2.svg" class="rounded-circle" height="260px" id="pic" />
                    </div>
                <?php
                }

                ?>

                <div class="col-12 mt-3">
                    <div class="row justify-content-center">
                        <div class="col-7 d-grid">
                            <input type="file" accept="img/*" class="form-control d-none" id="profile" />
                            <label for="profile" class="btn btn-info text-white fw-bold" style="font-size: 17px;" onclick="uploadImage();">Upload Photo</label>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-8 ">
            <div class="row">

                <div class="col-12">
                    <h4 class="fw-bold"><?php echo $details["username"]; ?></h4>
                </div>

                <div class="col-12">
                    <div class="row">

                        <div class="col-6  mt-3">
                            <label class="form-label" style="font-size: 17px;">ID No. :</label>
                            <input value="<?php echo $details["id"]; ?>" class="form-control " style="font-size: 17px;" disabled />
                        </div>

                        <div class="col-6 mt-3">
                            <label class="form-label" style="font-size: 17px;">E-mail-Address :</label>
                            <input value="<?php echo $details["email"]; ?>" class="form-control" style="font-size: 17px;" disabled />
                        </div>

                        <div class="col-6 mt-3">
                            <label class="form-label" style="font-size: 17px;">Username :</label>
                            <input value="<?php echo $details["username"]; ?>" class="form-control" style="font-size: 17px;" disabled />
                        </div>

                        <div class="col-6 mt-3">
                            <label class="form-label" style="font-size: 17px;">Password :</label>
                            <input value="<?php echo $details["password"]; ?>" class="form-control" style="font-size: 17px;" id="p" /><span>
                        </div>

                        <div class="col-6 mt-3">
                            <label class="form-label" style="font-size: 17px;">First Name :</label>
                            <input value="<?php echo $details["first_name"]; ?>" class="form-control" style="font-size: 17px;" id="fn" />
                        </div>

                        <div class="col-6 mt-3">
                            <label class="form-label" style="font-size: 17px;">Last Name :</label>
                            <input value="<?php echo $details["last_name"]; ?>" class="form-control" style="font-size: 17px;" id="ln" />
                        </div>

                        <div class="col-6 mt-3">
                            <label class="form-label" style="font-size: 17px;">Contact Number :</label>
                            <input value="<?php echo $details["contact_number"]; ?>" class="form-control" style="font-size: 17px;" id="cn" />
                        </div>

                        <div class="col-6 mt-3">
                            <label class="form-label" style="font-size: 17px;">Gender :</label>
                            <?php

                            if ($details["gender_id"] == 1) {
                            ?>
                                <input type="text" value="Male" class="form-control border-radius" style="font-size: 17px;" id="ag" disabled />
                            <?php
                            } else if ($details["gender_id"] == 2) {
                            ?>
                                <input type="text" value="Female" class="form-control border-radius" style="font-size: 17px;" id="ag" disabled />
                            <?php
                            } else {
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

<div class="col-12 mt-5" style="margin-bottom: 208px;">
    <div class="row justify-content-center">
        <div class="col-3 d-grid">
            <button class="btn kur-btn fw-bold" onclick="UpdateAoProfile();">Save Changes</button>
        </div>
    </div>
</div>