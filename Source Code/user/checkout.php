<?php 
    include "header.php";
    $id = $_GET["id"];
    $res = mysqli_query($link, "select * from add_books where bookCode=$id");
    $bookInfo = mysqli_fetch_array($res); 
    $bookImage = "../assets/img/books/".$bookInfo['image'];

    $today_date1 = date("Y-m-d");
    $today_date = strtotime($today_date1);
    $aftersevendays = strtotime("+7 day", $today_date);
    $aftersevendays=date('Y-m-d', $aftersevendays);
?>
    <h3 id="checkoutBook" class="title">Checkout</h3>
    <div class="row">
        <div class="card card-signup" data-background-color="orange">
            <form class="form" enctype="multipart/form-data" method="post" action="">
                <div class="header text-center">
                    <h4 class="title title-up">Book Information</h4>
                </div>
                <div class="card-body">
                    <div class="input-group form-group-no-border">
                        <img class="photo-container rounded img-raised" src=<?php echo $bookImage;?> alt="book image">
                    </div>
                    <div class="input-group form-group-no-border">
                        <span class="input-group-addon" style='color: black'>Code : </span>
                        <label type="text" class="form-control">
                            <?php echo $bookInfo["bookCode"];?>
                        </label>
                    </div>
                    <div class="input-group form-group-no-border">
                        <span class="input-group-addon" style='color: black'>Title : </span>
                        <label type="text" class="form-control">
                            <?php echo $bookInfo["title"];?>
                        </label>
                    </div>
                    <div class="input-group form-group-no-border">
                        <span class="input-group-addon" style='color: black'>Author : </span>
                        <label type="text" class="form-control">
                            <?php echo $bookInfo["author"];?>
                        </label>
                    </div>
                </div>
                <div class="footer text-center">
                    <button id="checkout" class="btn btn-neutral btn-round btn-lg" name="submit">
                        Checkout
                    </button>
                </div>
            </form>
            <?php
                if(isset($_POST["submit"])){
                    $isSuccess = true;
                    $errorMessage = '';

                    $res = mysqli_query($link, "select * from add_books where bookCode=$id");
                    $bookInfo = mysqli_fetch_array($res); 
                    
                    $count = 0;
                    $res = mysqli_query($link, "select * from book_status where bookCode='$id' && username='$_SESSION[username]' && status='issued'");
                    $count = mysqli_num_rows($res);
                    if($bookInfo['qty'] == 0){
                        $isSuccess = false;
                        $errorMessage = 'Book no longer in stock.';
                    }
                    else if($count > 0){
                        $isSuccess = false;
                        $errorMessage = 'You already issued this book.';
                    }
                    else if($booksIssued > 5){
                        $isSuccess = false;
                        $errorMessage = 'Cannot issue more than 5 books.';
                    }

                    if(!$isSuccess){
            ?>
                        <div id="errorMsg" class="alert alert-danger" role="alert">
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
                        mysqli_query($link, "insert into book_status(id, username, bookCode, issueDate, returnDate, status) values('','$_SESSION[username]','$id','$today_date1','$aftersevendays', 'issued')") or die(mysqli_error($link));
                        mysqli_query($link, "update add_books set qty=qty-1 where bookCode='$id'") or die(mysqli_error($link));
                        mysqli_query($link, "update user_registration set booksIssued=booksIssued+1 where username='$_SESSION[username]'") or die(mysqli_error($link));    
                        
            ?>
                        <div id="successMsg" class="alert alert-success" role="alert">
                            <div class="container">
                                <div class="alert-icon">
                                    <i class="now-ui-icons ui-2_like"></i>
                                </div>
                                <strong>Well done!</strong> Book Issued :)
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
                            window.location="#checkout";
                </script>
            <?php
                }
            ?>
        </div>
    </div>
<?php include "footer.php"; ?>