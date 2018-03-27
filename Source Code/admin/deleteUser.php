 <?php
    if (isset($_GET['username'])) {
        $username = $_GET["username"];
        mysqli_query($link, "delete from user_registration where username='$username'");
?>
            <div id="deleteMsg" class="alert alert-success" role="alert">
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
?>