<?php include "header.php"; ?>
<?php
    $id = $_GET["id"];
    $res = mysqli_query($link, "select * from add_books where bookCode='$id'");
    $bookDetails = mysqli_fetch_array($res);
    $image = "../assets/img/books/" . $bookDetails["image"];
?>
    <h3 id="editBook" class="title">Edit Book</h3>
    <div class="row">
        <div class="card card-signup" data-background-color="orange">
            <form class="form" enctype="multipart/form-data" method="post" action="">
                <div class="header text-center">
                    <h4 class="title title-up">Book Information</h4>
                </div>
                <div class="card-body">
                    <div class="input-group form-group-no-border">
                        <img class="photo-container rounded img-raised" src=<?php echo $image;?> alt="book image">
                    </div>
                    <div class="input-group form-group-no-border">
                        <input class="btn btn-primary btn-round" type="file" name="image">
                    </div>
                    <div class="input-group form-group-no-border">
                        <span class="input-group-addon" style='color: black'>Book Code :</span>
                        <input type="text" class="form-control" id="bookCode" name="bookCode" value=<?php echo $bookDetails["bookCode"];?>>
                    </div>
                    <div class="input-group form-group-no-border">
                        <span class="input-group-addon" style='color: black'>Title :</span>
                        <input type="text" value=<?php echo $bookDetails["title"];?> id="title"name="title" class="form-control">
                    </div>
                    <div class="input-group form-group-no-border">
                        <span class="input-group-addon" style='color: black'>Author :</span>
                        <input type="text" value=<?php echo $bookDetails["author"];?> id="author"name="author" class="form-control">
                    </div>
                    <div class="input-group form-group-no-border">
                        <span class="input-group-addon" style='color: black'>Quantity :</span>
                        <input type="text" value=<?php echo $bookDetails["qty"];?> name ="qty" class="form-control">
                    </div>
                </div>
                <div class="footer text-center">
                    <button id="edit" class="btn btn-neutral btn-round btn-lg" name="submit">Update</button>
                </div>
            </form>
            <?php
                if(isset($_POST["submit"])){
                    $isMissingInfo = false;

                    if(strlen(trim($_POST['bookCode'])) == 0 || strlen(trim($_POST['title'])) == 0 || strlen(trim($_POST['author'])) == 0 || strlen(trim($_POST['qty'])) == 0){
                        $isMissingInfo = true;
                        $errorMessage = "Make sure all the fields are entered.";
                    }
                    else if(preg_match('/[^A-Za-z0-9]/', $_POST['bookCode']) && 
                            preg_match('/[^A-Za-z0-9 ]/', $_POST['title']) && 
                            preg_match('/[^A-Za-z0-9 ]/', $_POST['author']) && 
                            preg_match('/[^A-Za-z0-9]/', $_POST['qty'])){
                        $isMissingInfo = true;
                        $errorMessage = "Make sure all the fields only contain numbers and characters.";
                    }
                    else{
                        $res = mysqli_query($link,"select * from add_books where bookCode='$id'") or die(mysqli_error($link));
                        $count = mysqli_num_rows($res);
                        if($count > 0 && $id != $_POST['bookCode']){
                            $isMissingInfo = true;
                            $errorMessage = "Book Code already in use.";
                        }
                    }

                    if($isMissingInfo){
            ?>
                        <div id="errorMsg editBookMsg" class="alert alert-danger" role="alert">
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
                        $imageName = $_POST['bookCode'].".png";
                        $dst="./../assets/img/books/".$imageName;
                        if(!move_uploaded_file($_FILES["image"]["tmp_name"],$dst)){
                            $imageName = $bookDetails["image"];
                        }
                        
                        mysqli_query($link,"update add_books set title='$_POST[title]', author='$_POST[author]', bookCode='$_POST[bookCode]', qty='$_POST[qty]', image='$imageName' where bookCode='$_POST[bookCode]'") or die(mysqli_error($link));
                        mysqli_query($link,"update book_status set bookCode='$_POST[bookCode]'where bookCode='$_POST[bookCode]'") or die(mysqli_error($link));
            ?>
                        <div id="successMsg editBookMsg" class="alert alert-success" role="alert">
                            <div class="container">
                                <div class="alert-icon">
                                    <i class="now-ui-icons ui-2_like"></i>
                                </div>
                                <strong>Well done!</strong> Sucessfully Updated, Refresh to view changes.
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
                    window.location="#editBookMsg";
                </script>
            <?php
                }
            ?>
        </div>
    </div>
<?php include "footer.php"; ?>