 <?php
    if (isset($_GET['id'])) {
        $id = $_GET["id"];
        mysqli_query($link, "delete from add_books where bookCode='$id'");
?>
            <div id="deleteMsg" class="alert alert-success" role="alert">
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
?>