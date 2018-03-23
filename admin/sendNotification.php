<?php include "header.php"; ?>
    <h3 id="notification" class="title">Send Notification</h3>
    <div class="row">
        <div class="card card-signup" data-background-color="blue">
            <form class="form" enctype="multipart/form-data" method="post" action="">
                <div class="header text-center">
                    <h4 class="title title-up">Message</h4>
                </div>
                <div class="card-body">
                    <div class="input-group form-group-no-border">
                        <select name ="username" class="form-control">
                            <option style='color: black' value="0">Select Username</option>
                            <?php
                                $res=mysqli_query($link,"select * from user_registration");
                                while($row=mysqli_fetch_array($res)){
                                    echo "<option style='color: black' value='".$row['username']."'>";
                                    echo $row['username'];
                                    echo "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-group form-group-no-border">
                        <span class="input-group-addon" style='color: black'>Title :</span>
                        <input type="text" class="form-control" name ="title" value="">
                    </div>
                    <div class="input-group form-group-no-border">
                        <span class="input-group-addon" style='color: black'>Message :</span>
                        <input type="text" class="form-control" name ="message" value="">
                    </div>
                </div>
                <div class="footer text-center">
                    <button id="send" class="btn btn-neutral btn-round btn-lg" name="submit">Send</button>
                </div>
            </form>
            <?php
                if(isset($_POST["submit"])){
                    $isMissingInfo = false;

                    if(strlen($_POST['title']) == 0 || strlen($_POST['message']) == 0 || $_POST['username'] == '0'){
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
                        $date = date("Y-m-d");
                        mysqli_query($link,"insert into notification(id, username, title, message, date) values('','$_POST[username]','$_POST[title]','$_POST[message]','$date')");
            ?>
                        <div class="alert alert-success" role="alert">
                            <div class="container">
                                <div class="alert-icon">
                                    <i class="now-ui-icons ui-2_like"></i>
                                </div>
                                <strong>Well done!</strong> Sucessfully sent.
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
                            window.location="#send";
                </script>
            <?php
                }
            ?>
        </div>
    </div>
<?php include "footer.php"; ?>