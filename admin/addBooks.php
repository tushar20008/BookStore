<h3 class="title">Add New Books</h3>
        <div class="card card-signup" data-background-color="orange">
            <form class="form" enctype="multipart/form-data" method="post" action="">
                <div class="header text-center">
                    <h4 class="title title-up">Book Information</h4>
                </div>
                <div class="card-body">
                    <div class="input-group form-group-no-border">
                        <img class="photo-container rounded img-raised" src=<?php echo '../assets/img/books/default-book.jpg';?> alt="book image">
                    </div>
                    <div class="input-group form-group-no-border">
                        <input class="btn btn-primary btn-round" type="file" name="image">
                    </div>
                    <div class="input-group form-group-no-border">
                        <span class="input-group-addon" style='color: black'>Book Code :</span>
                        <input type="text" class="form-control" name ="bookCode" value="">
                    </div>
                    <div class="input-group form-group-no-border">
                        <span class="input-group-addon" style='color: black'>Title :</span>
                        <input type="text" value="" name="title" class="form-control">
                    </div>
                    <div class="input-group form-group-no-border">
                        <span class="input-group-addon" style='color: black'>Author :</span>
                        <input type="text" value="" name ="author" class="form-control">
                    </div>
                    <div class="input-group form-group-no-border">
                        <span class="input-group-addon" style='color: black'>Quantity :</span>
                        <input type="text" value="" name ="qty" class="form-control">
                    </div>
                </div>
                <div class="footer text-center">
                    <button id="edit" class="btn btn-neutral btn-round btn-lg" name="submit">Add</button>
                </div>
            </form>
            <?php
                if(isset($_POST["submit"])){
                    $isMissingInfo = false;

                    $res = mysqli_query($link,"select * from add_books where bookCode='$_POST[bookCode]'") or die(mysqli_error($link));
                    $count = mysqli_num_rows($res);

                    if(strlen($_POST['bookCode']) == 0 || strlen($_POST['title']) == 0 || strlen($_POST['author']) == 0 || strlen($_POST['qty']) == 0){
                        $isMissingInfo = true;
                        $errorMessage = "Make sure all the fields are entered.";
                    }
                    else if($count > 0){
                        $isMissingInfo = true;
                        $errorMessage = "Book Code already in use.";
                    }

                    if($isMissingInfo){
            ?>
                        <div id="#addMsg" class="alert alert-danger" role="alert">
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
                            $imageName = 'default-book.jpg';
                        }
                        
                        mysqli_query($link,"insert into add_books(id, title, image, author, bookCode, qty)  values('','$_POST[title]','$imageName','$_POST[author]','$_POST[bookCode]','$_POST[qty]')") or die(mysqli_error($link));
                        
                        
            ?>
                        <div id="#addMsg" class="alert alert-success" role="alert">
                            <div class="container">
                                <div class="alert-icon">
                                    <i class="now-ui-icons ui-2_like"></i>
                                </div>
                                <strong>Well done!</strong> Sucessfully Added new Book.
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
                            window.location="#addMsg";
                </script>
            <?php
                }
            ?>
        </div>