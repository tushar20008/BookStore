 <?php
    if (isset($_GET['id']) && isset($_GET['username'])) {
        $id = $_GET["id"];
        $username = $_GET["username"];
        $res = mysqli_query($link,"select * from book_status where status='issued' and bookCode='$id' and username='$username'") or die(mysqli_error($link));
        $count = mysqli_num_rows($res);
        if($count == 0){
?>
            <div id="returnMsg errorMsg" class="alert alert-danger" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="now-ui-icons objects_support-17"></i>
                    </div>
                    <strong>Oh snap!</strong> Book already returned :)
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
            mysqli_query($link,"update add_books set qty=qty+1 where bookCode='$id'")or die(mysqli_error($link));
            mysqli_query($link,"update book_status set status='returned' where bookCode='$id' and username='$username'")or die(mysqli_error($link));
            mysqli_query($link,"update user_registration set booksIssued=booksIssued-1, booksRead=booksRead+1 where username='$username'")or die(mysqli_error($link));
?>
            <div id="returnMsg successMsg" class="alert alert-success" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="now-ui-icons ui-2_like"></i>
                    </div>
                    <strong>Well done!</strong> Sucessfully Returned.
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