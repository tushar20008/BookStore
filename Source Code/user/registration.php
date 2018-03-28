<?php
    session_start();
    include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>    
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Registeration Form | BMS</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
</head>

<body class="login-page sidebar-collapse">
    <div class="page-header" filter-color="orange">
        <div class="page-header-image" style="background-image:url(../assets/img/login.jpg)"></div>
        <div class="container">
            <div class="col-md-4 content-center">
                <div class="card card-login card-plain">
                    <form class="form" method="post" action="">
                        <div class="header header-primary text-center">
                            <h2 class="h2-seo">Registeration</h2>
                        </div>
                        <div class="content">
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons text_caps-small"></i>
                                </span>
                                <input type="text" id="firstname" placeholder="First Name..." name="firstname" class="form-control" />
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons text_caps-small"></i>
                                </span>
                                <input type="text" id="lastname" placeholder="Last Name..." name="lastname" class="form-control" />
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons users_circle-08"></i>
                                </span>
                                <input type="text" id="username" class="form-control" name="username" placeholder="Username...">
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons text_caps-small"></i>
                                </span>
                                <input type="password" id="password" placeholder="Password..." name="password" class="form-control" />
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button id="register" name="submit" class="btn btn-primary btn-round btn-lg btn-block">Get Started</button>
                        </div>
                        <div class="pull-left">
                            <h6>
                                <a id="login" href="login.php" class="link">Login</a>
                            </h6>
                        </div>
                    </form>
                </div>
            </div>
            <?php
                if(isset($_POST["submit"])){

                    $count=0;
                    $res=mysqli_query($link,"select * from user_registration where username='$_POST[username]'");
                    $count=mysqli_num_rows($res);

                    $isMissingInfo = false;
                    if($count>0){
                        $errorMessage = "Username already exists.";
                    }
                    if(strlen($_POST['username']) == 0 || strlen($_POST['password']) == 0 || strlen($_POST['firstname']) == 0 || strlen($_POST['lastname']) == 0){
                        $isMissingInfo = true;
                        $errorMessage = "Make sure all the fields are entered.";
                    }

                    if($count>0 || $isMissingInfo){
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
                        $pwd=$_POST["password"];
                        mysqli_query($link,"insert into user_registration(id,firstname,lastname,username,password) values('','$_POST[firstname]','$_POST[lastname]','$_POST[username]','$pwd')") or die(mysqli_error($link));
            ?>
                        <div id="successMsg" class="alert alert-success" role="alert">
                            <div class="container">
                                <div class="alert-icon">
                                    <i class="now-ui-icons ui-2_like"></i>
                                </div>
                                <strong>Well done!</strong> You successfully registered.
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
</body>
<!-- Core JS Files  --> 
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>
</html>
