<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Registeration Form | BMS </title>
    <!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="Assets/Login and Registeration Form/images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assets/Login and Registeration Form/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assets/Login and Registeration Form/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assets/Login and Registeration Form/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assets/Login and Registeration Form/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="Assets/Login and Registeration Form/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assets/Login and Registeration Form/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assets/Login and Registeration Form/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="Assets/Login and Registeration Form/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assets/Login and Registeration Form/css/util.css">
    <link rel="stylesheet" type="text/css" href="Assets/Login and Registeration Form/css/main.css">
<!--===============================================================================================-->
</head>

<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
                <form name="form1" action="" method="post" class="login100-form validate-form">
                        <?php 
                            if(isset($msg)){
                                echo $msg;
                            }
                        ?>
                    <span class="login100-form-title p-b-33">
                        User Registeration Form
                    </span>
                    
                    <div class="wrap-input100 validate-input" data-validate = "FirstName is required">
                        <input class="input100" type="text" name="firstname" placeholder="FirstName">
                        <span class="focus-input100-1"></span>
                        <span class="focus-input100-2"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "LastName is required">
                        <input class="input100" type="text" name="lastname" placeholder="LastName">
                        <span class="focus-input100-1"></span>
                        <span class="focus-input100-2"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Please enter minimum of 3 characters">
                        <input class="input100" type="text" name="username" placeholder="Username">
                        <span class="focus-input100-1"></span>
                        <span class="focus-input100-2"></span>
                    </div>
                    
                    <div class="wrap-input100 rs1 validate-input" data-validate="Enter combination of characters and digits">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100-1"></span>
                        <span class="focus-input100-2"></span>
                    </div>

                    <div class="container-login100-form-btn m-t-20">
                        <button class="login100-form-btn" name="submit1" onclick="return validate();" value="Register">
                            Sign in
                        </button>
                    </div>

                    <br/>
                    <div class="text-center">
                        <span class="txt1">
                            Already have an account?
                        </span>
                        
                        <a href="login.php" class="txt2 hov1">
                            Login
                        </a>
                    </div>

                    <?php

    if(isset($_POST["submit1"]))
    {
            $count=0;
            $res=mysqli_query($link,"select * from user_registration where username='$_POST[username]'");
            $count=mysqli_num_rows($res);
            if($count>0)
            {
                ?>
                <div class="alert alert-danger text-center">
                    Username already exists
                </div>
                <?php
                
            }
            else{
            
            $pwd=$_POST["password"];
            mysqli_query($link,"insert into user_registration(id,firstname,lastname,username,password) values('','$_POST[firstname]','$_POST[lastname]','$_POST[username]','$pwd')") or die(mysqli_error($link));
            ?>
            <div class="alert alert-success text-center">
                Registration successfull
            </div>
            <?php
            }

    }
    ?>

                </form>
            </div>
        </div>
    </div> 
<!--===============================================================================================-->
    <script src="Assets/Login and Registeration Form/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="Assets/Login and Registeration Form/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="Assets/Login and Registeration Form/vendor/bootstrap/js/popper.js"></script>
    <script src="Assets/Login and Registeration Form/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="Assets/Login and Registeration Form/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="Assets/Login and Registeration Form/vendor/daterangepicker/moment.min.js"></script>
    <script src="Assets/Login and Registeration Form/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="Assets/Login and Registeration Form/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="Assets/Login and Registeration Form/js/main.js"></script>

</body>
</html>
