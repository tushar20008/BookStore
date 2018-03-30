<?php include "header.php"; ?>
    <h3 id="editProfile" class="title">Edit Profile</h3>
    <div class="row">
        <div class="card card-signup" data-background-color="orange">
            <form class="form" enctype="multipart/form-data" method="post" action="">
                <div class="header text-center">
                    <h4 class="title title-up">Personal Information</h4>
                </div>
                <div class="card-body">
                    <div class="input-group form-group-no-border">
                        <img class="photo-container" src=<?php echo $profileImage;?> alt="profile image">
                    </div>
                    <div class="input-group form-group-no-border">
                        <input class="btn btn-primary btn-round" type="file" name="image">
                    </div>
                    <div class="input-group form-group-no-border">
                        <span class="input-group-addon" style='color: black'>Username :</span>
                        <input type="text" class="form-control" name ="username" value=<?php echo $userDetails["username"];?>>
                    </div>
                    <div class="input-group form-group-no-border">
                        <span class="input-group-addon" style='color: black'>Password :</span>
                        <input type="password" value=<?php echo $userDetails["password"];?> name ="password" class="form-control">
                    </div>
                    <div class="input-group form-group-no-border">
                        <span class="input-group-addon" style='color: black'>First Name :</span>
                        <input id="firstname" type="text" value=<?php echo $userDetails["firstname"];?> name ="firstname" class="form-control">
                    </div>
                    <div class="input-group form-group-no-border">
                        <span class="input-group-addon" style='color: black'>Last Name :</span>
                        <input id="lastname" type="text" value=<?php echo $userDetails["lastname"];?> name ="lastname" class="form-control">
                    </div>
                </div>
                <div class="footer text-center">
                    <button id="edit" class="btn btn-neutral btn-round btn-lg" name="submit">Update</button>
                </div>
            </form>
            <?php
                if(isset($_POST["submit"])){
                    $isMissingInfo = false;

                    $res = mysqli_query($link,"select * from user_registration where username='$_POST[username]'") or die(mysqli_error($link));
                    $count = mysqli_num_rows($res);

                    if(strlen(trim($_POST['username'])) == 0 || strlen(trim($_POST['password'])) == 0 || strlen(trim($_POST['firstname'])) == 0 || strlen(trim($_POST['lastname'])) == 0){
                        $isMissingInfo = true;
                        $errorMessage = "Make sure all the fields are entered.";
                    }
                    else if($count > 0 && $_SESSION["username"] != $_POST['username']){
                        $isMissingInfo = true;
                        $errorMessage = "Someone is using that username.";
                    }

                    if($isMissingInfo){
            ?>
                        <div id="errorMsg" class="alert alert-danger" role="alert">
                            <div class="container">
                                <div class="alert-icon">
                                    <i class="now-ui-icons objects_support-17"></i>
                                </div>
                                <strong>Oh snap!</strong> 
            <?php
                                echo $errorMessage;
            ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">
                                        <i class="now-ui-icons ui-1_simple-remove"></i>
                                    </span>
                                </button>
                            </div>
                        </div>
            <?php     
                    }
                    else{ 
                        $imageName = $_POST['username'].".png";
                        $dst="./../assets/img/profile/".$imageName;
                        if(!move_uploaded_file($_FILES["image"]["tmp_name"],$dst)){
                            $imageName = '';
                        }
                        
                        mysqli_query($link,"update user_registration set firstname='$_POST[firstname]', lastname='$_POST[lastname]', username='$_POST[username]', password='$_POST[password]', image='$imageName' where username='$_POST[username]'") or die(mysqli_error($link));
                        
                        
            ?>
                        <div id="successMsg" class="alert alert-success" role="alert">
                            <div class="container">
                                <div class="alert-icon">
                                    <i class="now-ui-icons ui-2_like"></i>
                                </div>
                                <strong>Well done!</strong> Sucessfully Updated, Refresh to view changes.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">
                                        <i class="now-ui-icons ui-1_simple-remove"></i>
                                    </span>
                                </button>
                            </div>
                        </div>
            <?php
                    }
            ?>
                <script type="text/javascript">
                            window.location="#edit";
                </script>
            <?php
                }
            ?>
        </div>
    </div>
<?php include "footer.php"; ?>