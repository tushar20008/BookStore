<?php include "header.php"; ?>
    <h3 class="title">Edit Profile</h3>
    <div class="row">
        <div class="card card-signup" data-background-color="orange">
            <form class="form" method="post" action="">
                <div class="header text-center">
                    <h4 class="title title-up">Personal Information</h4>
                </div>
                <div class="card-body">
                    <div class="input-group form-group-no-border">
                        <span class="input-group-addon" style='color: black'>Username :</span>
                        <input type="text" class="form-control" name ="username" value=<?php echo $userDetails["username"];?>>
                    </div>
                    <div class="input-group form-group-no-border">
                        <span class="input-group-addon" style='color: black'>Password :</span>
                        <input type="text" value=<?php echo $userDetails["password"];?> name ="password" class="form-control">
                    </div>
                    <div class="input-group form-group-no-border">
                        <span class="input-group-addon" style='color: black'>First Name :</span>
                        <input type="text" value=<?php echo $userDetails["firstname"];?> name ="firstname" class="form-control">
                    </div>
                    <div class="input-group form-group-no-border">
                        <span class="input-group-addon" style='color: black'>Last Name :</span>
                        <input type="text" value=<?php echo $userDetails["lastname"];?> name ="lastname" class="form-control">
                    </div>
                </div>
                <div class="footer text-center">
                    <button class="btn btn-neutral btn-round btn-lg" name="submit">Update</button>
                </div>
            </form>
            <?php
                if(isset($_POST["submit"])){
                    $isMissingInfo = false;

                    if(strlen($_POST['username']) == 0 || strlen($_POST['password']) == 0 || strlen($_POST['firstname']) == 0 || strlen($_POST['lastname']) == 0){
                        $isMissingInfo = true;
                        $errorMessage = "Make sure all the fields are entered.";
                    }

                    if($isMissingInfo){
            ?>
                        <div class="alert alert-danger" role="alert">
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
                        
                        mysqli_query($link,"update user_registration set firstname='$_POST[firstname]', lastname='$_POST[lastname]', username='$_POST[username]', password='$_POST[password]' where username='$_POST[username]'") or die(mysqli_error($link));
            ?>
                        <div class="alert alert-success" role="alert">
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

                }
            ?>
        </div>
    </div>
<?php include "footer.php"; ?>