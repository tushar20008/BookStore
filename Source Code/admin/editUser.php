<?php include "header.php"; ?>
<?php
    $username = $_GET["username"];
    $res = mysqli_query($link, "select * from user_registration where id='$username'");
    $userDetails = mysqli_fetch_array($res);
    $image = "../assets/img/profile/" . $userDetails["image"];
    if(!$userDetails["image"]) {
        $image = "../assets/img/profile/default-avatar.png";
    }
?>
    <h3 id="editUser" class="title">Edit User</h3>
    <div class="row">
        <div class="card card-signup" data-background-color="orange">
            <form class="form" enctype="multipart/form-data" method="post" action="">
                <div class="header text-center">
                    <h4 class="title title-up">User Information</h4>
                </div>
                <div class="card-body">
                    <div class="input-group form-group-no-border">
                        <img class="photo-container" src=<?php echo $image;?> alt="user image">
                    </div>
                    <div class="input-group form-group-no-border">
                        <input class="btn btn-primary btn-round" type="file" name="image">
                    </div>
                    <div class="input-group form-group-no-border">
                        <span class="input-group-addon" style='color: black'>Username :</span> 
                        <input id="username" type="text" class="form-control" name ="username" value="<?php echo htmlspecialchars($userDetails['username']);?>">
                    </div>
                    <div class="input-group form-group-no-border">
                        <span class="input-group-addon" style='color: black'>Password :</span>
                        <input id="password" type="password" value="<?php echo htmlspecialchars($userDetails['password']);?>" name ="password" class="form-control">
                    </div>
                    <div class="input-group form-group-no-border">
                        <span class="input-group-addon" style='color: black'>Firstname :</span>
                        <input id="firstname" type="text" value="<?php echo htmlspecialchars($userDetails['firstname']);?>" name ="firstname" class="form-control">
                    </div>
                    <div class="input-group form-group-no-border">
                        <span class="input-group-addon" style='color: black'>Lastname :</span>
                        <input id="lastname" type="text" value="<?php echo htmlspecialchars($userDetails['lastname']);?>" name ="lastname" class="form-control">
                    </div>
                </div>
                <div class="footer text-center">
                    <button id="edit" class="btn btn-neutral btn-round btn-lg" name="submit">Update</button>
                </div>
            </form>
            <?php
                if(isset($_POST["submit"])){
                    $isMissingInfo = false;

                    if(strlen(trim($_POST['username'])) == 0 || strlen(trim($_POST['password'])) == 0 || strlen(trim($_POST['firstname'])) == 0 || strlen(trim($_POST['lastname'])) == 0){
                        $isMissingInfo = true;
                        $errorMessage = "Make sure all the fields are entered.";
                    }
                    else if(preg_match('/[^A-Za-z0-9]/', $_POST['username']) && 
                            preg_match('/[^A-Za-z0-9]/', $_POST['password']) && 
                            preg_match('/[^A-Za-z0-9]/', $_POST['firstname']) && 
                            preg_match('/[^A-Za-z0-9]/', $_POST['lastname'])){
                        $isMissingInfo = true;
                        $errorMessage = "Make sure all the fields only contain numbers and characters.";
                    }
                    else{
                        $res = mysqli_query($link,"select * from user_registration where id!='$username' and username='$_POST[username]'") or die(mysqli_error($link));
                        $count = mysqli_num_rows($res);
                    
                        if($count > 0){
                            $isMissingInfo = true;
                            $errorMessage = "Someone is using that username.";
                        }
                    }

                    if($isMissingInfo){
            ?>
                        <div id="errorMsg editUserMsg" class="alert alert-danger" role="alert">
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
                            $imageName = $userDetails["image"];
                        }
                        
                        mysqli_query($link,"update user_registration set username='$_POST[username]', password='$_POST[password]', firstname='$_POST[firstname]', lastname='$_POST[lastname]', image='$imageName' where id='$username'") or die(mysqli_error($link));
                        mysqli_query($link,"update book_status set username='$_POST[username]'where username='$userDetails[username]'") or die(mysqli_error($link));
            ?>
                        <div id="successMsg editUserMsg" class="alert alert-success" role="alert">
                            <div class="container">
                                <div class="alert-icon">
                                    <i class="now-ui-icons ui-2_like"></i>
                                </div>
                                <strong>Well done!</strong> Sucessfully Updated, Go Back to make further changes.
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
                    window.location="#editUserMsg";
                </script>
            <?php
                }
            ?>
        </div>
    </div>
<?php include "footer.php"; ?>