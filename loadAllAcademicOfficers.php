<?php

    session_start();

    require "connection.php";

    if(!isset($_SESSION["admin"])) {

        ?>
    
        <script>window.location = "index.php";</script>
    
        <?php
    
    }else{

?>

<div class="col-11 bg-white table-responsive" style="height: 375px; border-radius: 15px;">
    <div class="row">
        <div class="col-12" >
            <table class="table">
                <thead style="color: rgb(68, 210, 111);">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Username</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Gender</th>
                    </tr>
                </thead>
                <tbody>

                <?php

                $resultset1 = Database::search("SELECT * FROM `academic_officer`;");

                for ($k1 = 0; $k1 < $resultset1->num_rows; $k1++) {
                    $aoDetails = $resultset1->fetch_assoc();

                ?>

                    <tr ondblclick="loadAcademicOfficerDetails('<?php echo $aoDetails['id']; ?>');">
                        <td><?php echo $aoDetails["id"]; ?></td>

                        <?php

                        $resultset2 = Database::search("SELECT * FROM `ao_photo` WHERE `academic_officer_id`='".$aoDetails["id"]."';");

                        if($resultset2->num_rows == 1){

                            for($k2 = 0; $k2 < $resultset2->num_rows; $k2++){
                                $aoimg = $resultset2->fetch_assoc();
                                ?>

                                <td><img src="<?php echo $aoimg["path"]; ?>" class="rounded-circle" height="43px" /></td>

                                <?php
                            }
                            
                        }else{
                            ?>

                            <td><img src="resources/emptyprofileimg2.svg" class="rounded-circle" height="43px" /></td>
                            
                            <?php
                        }

                        ?>
                        
                        <td><?php echo $aoDetails["username"]; ?></td>
                        <td><?php echo $aoDetails["email"]; ?></td>
                        <td><?php echo $aoDetails["first_name"]; ?></td>
                        <td><?php echo $aoDetails["last_name"]; ?></td>

                        <?php
                            
                            if($aoDetails["gender_id"] == 1){
                                ?>
                                <td><?php echo "Male"; ?></td>
                                <?php
                            }else if($aoDetails["gender_id"] == 2){
                                ?>
                                <td><?php echo "Female"; ?></td>
                                <?php
                            }else{
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