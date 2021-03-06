<?php
                if(isset($_POST["submit"])){
                    $isMissingInfo = false;

                    $res = mysqli_query($link,"select * from add_books where bookCode='$_POST[bookCode]'") or die(mysqli_error($link));
                    $count = mysqli_num_rows($res);

                    if(strlen(trim($_POST['bookCode'])) == 0 || strlen(trim($_POST['title'])) == 0 || strlen(trim($_POST['author'])) == 0 || strlen(trim($_POST['qty'])) == 0){
                        $isMissingInfo = true;
                        $errorMessage = "Make sure all the fields are entered.";
                    }
                    else if(preg_match('/[^A-Za-z0-9]/', $_POST['bookCode']) && 
                            preg_match('/[^A-Za-z0-9 ]/', $_POST['title']) && 
                            preg_match('/[^A-Za-z0-9 ]/', $_POST['author']) && 
                            preg_match('/[^0-9]/', $_POST['qty'])){
                        $isMissingInfo = true;
                        $errorMessage = "Make sure all the fields only contain numbers and characters.";
                    }
                    else if((int)$_POST['qty'] < 0){
                        $isMissingInfo = true;
                        $errorMessage = "Book quantity not valid";
                    }
                    else if($count > 0){
                        $isMissingInfo = true;
                        $errorMessage = "Book Code already in use.";
                    }

                    if($isMissingInfo){
            ?>
                        <div id="errorMsg addMsg" class="alert alert-danger" role="alert">
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
                        <div id="successMsg addMsg" class="alert alert-success" role="alert">
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
                    document.getElementById('addTab').classList.add('active');
                </script>
            <?php
                }
            ?>