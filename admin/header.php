<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION["username"])){
?>
    <script type="text/javascript">
        window.location="login.php";
    </script>
?>
<?php
    }
    include "connection.php";
    $res = mysqli_query($link, "select * from admin where username='$_SESSION[username]'");
    $userDetails = mysqli_fetch_array($res);
    $name = $userDetails["firstname"] . " ". $userDetails["lastname"];
    $username = $userDetails["username"];
    $profileImage = "../assets/img/profile/" . $userDetails["image"];
    if(!$userDetails["image"]) {
        $profileImage = "../assets/img/profile/default-avatar.png";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>    
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>BMS</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<body class="profile-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" rel="tooltip">
                    Nav Bar
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">       
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="edit.php#editProfile">Edit Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="books.php#bookBar">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="search.php#searchBar">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="notification.php" rel="tooltip" title="Checkout Notifications" data-placement="bottom">
                            <i class="now-ui-icons ui-1_email-85"></i>
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" rel="tooltip" title="Logout" data-placement="bottom">
                            <i class="now-ui-icons media-1_button-power"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="wrapper">
    <div class="page-header page-header-small" filter-color="orange">
        <div class="page-header-image" data-parallax="true" style="background-image: url('../assets/img/login.jpg');">
        </div>
        <div class="container">
            <div class="content-center">
                <div>
                    <img class="photo-container" src=<?php echo $profileImage;?> alt="profile image">
                </div>
                <h3 class="title">
                    <?php echo $name;?>
                </h3>
                <p class="category">
                    <?php echo $username;?>
                </p>
            </div>
        </div>
    </div>
    <div class="section">
            <div class="container">
                <div class="button-container">
                    <a href="chatBot.php" target="_blank" class="btn btn-primary btn-round btn-lg">Chat with Us</a>
                </div>
