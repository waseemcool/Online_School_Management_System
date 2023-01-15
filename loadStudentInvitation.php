<?php

    require "connection.php";

?>

<div class="col-12 mt-5" style="margin-bottom: 117px;">
    <div class="row justify-content-center">
        <div class="col-6" style="margin-left: 53px;">
            <div class="row">

                <div class="col-12 text-center">
                    <h4 class="text-primary fw-bold">Student Register and Invite</h4>
                </div>

                <div class="col-12 shadow mt-5" style="border-radius: 15px;">
                    <div class="row justify-content-center">

                        <div class="col-10 mt-3">
                            <label class="form-label fs-5">E-mail Address</label>
                            <div class="input-group">
                                <input type="text" class="form-control border-radius" style="font-size: 20px;" id="e" />
                                <span class="input-group-text fs-5 border-radius"><i class="bi bi-envelope"></i></span>
                            </div>
                        </div>

                        <div class="col-10 mt-3">
                            <label class="form-label fs-5">Username</label>
                            <div class="input-group">
                                <input type="text" class="form-control fs-5 border-radius" style="font-size: 20px;" id="un" />
                                <span class="input-group-text fs-5 border-radius"><i class="bi bi-person"></i></span>
                            </div>
                        </div>

                        <div class="col-10 mt-3">
                            <label class="form-label fs-5">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control fs-5 border-radius" style="font-size: 20px;" id="pw" />
                                <span class="input-group-text fs-5 border-radius"><i class="bi bi-key"></i></span>
                            </div>
                        </div>

                        <div class="col-10 mt-3">
                            <label class="form-label fs-5">Grade</label>
                            <div class="input-group">
                                <select class="form-select fs-5 border-radius" style="font-size: 20px;" id="g">
                                    <option value="0">Select</option>
                                    <?php

                                    $rs = Database::search("SELECT * FROM `grade`");

                                    for ($i = 0; $i < $rs->num_rows; $i++) {

                                        $grade = $rs->fetch_assoc();

                                    ?>

                                        <option value="<?php echo $grade["id"]; ?>"><?php echo $grade["name"]; ?></option>

                                    <?php

                                    }

                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-10 d-grid mt-5 mb-4">
                            <button class="btn kur-btn fs-5" onclick="studentRegSendInvitation();">Register & Send Invitation</button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>