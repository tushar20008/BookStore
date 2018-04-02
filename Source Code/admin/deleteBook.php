 <?php
    if (isset($_GET['id'])) {
        $id = $_GET["id"];
        $res = mysqli_query($link, "select * from book_status where bookCode='$id' and status='issued'");
        $count = mysqli_num_rows($res);
        if($count == 0){
            mysqli_query($link, "delete from add_books where bookCode='$id'");
?>
            <div id="successMsg deleteMsg" class="alert alert-success" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="now-ui-icons ui-2_like"></i>
                    </div>
                    <strong>Well done!</strong> Book removed from database.
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
            <div id="errorMsg deleteMsg" class="alert alert-danger" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="now-ui-icons objects_support-17"></i>
                    </div>
                    <strong>Oh snap!</strong> Book cannot be removed as already issued by someone.
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