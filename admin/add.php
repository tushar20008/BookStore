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
                        <div id="addMsg" class="alert alert-danger" role="alert">
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
                        <div id="addMsg" class="alert alert-success" role="alert">
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
                    window.location="books.php#addMsg";
                </script>
            <?php
                }
            ?>