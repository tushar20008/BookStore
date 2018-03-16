<?php 
        include "header.php";
                            $id = $_GET["id"];
                            $res = mysqli_query($link, "select * from add_books where id=$id");
                            while ($row = mysqli_fetch_array($res)) {
                                $books_image = "../admin/" . $row["books_image"];
                                $books_title = $row["books_title"];
                                $books_author_name = $row["books_author_name"];
                                $books_isbn = $row["books_isbn"];
                                $availble_qty = $row["available_qty"];
                            }
                            $today_date1 = date("Y-m-d");
                            $today_date = strtotime($today_date1);
                            $aftersevendays = strtotime("+7 day", $today_date);
                            $aftersevendays=date('Y-m-d', $aftersevendays);

                            ?>
    <h3 id="searchedBooks" class="title">Checkout</h3>
<?php include "footer.php"; ?>