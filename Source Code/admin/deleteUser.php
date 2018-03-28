 <?php
    if (isset($_GET['username'])) {
        $username = $_GET["username"];
        $res = mysqli_query($link, "select * from book_status where username='$username' and status='issued'");
        $count = mysqli_num_rows($res);
        if($count == 0){
            mysqli_query($link, "delete from user_registration where username='$username'");
?>
            <div id="deleteMsg successMsg" class="alert alert-success" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="now-ui-icons ui-2_like"></i>
                    </div>
                    <strong>Well done!</strong> User removed from database.
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
?>
            <div id="deleteMsg errorMsg" class="alert alert-danger" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="now-ui-icons objects_support-17"></i>
                    </div>
                    <strong>Oh snap!</strong> User cannot be removed as some books have not been returned.
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