<?php
    session_start();
    if(!isset($_SESSION["username"]))
    {
?>
        <script type="text/javascript">
            window.location="login.php";
        </script>
<?php
    }
    include "connection.php";
    include "header.php";
?>

    <!-- page content area main -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3></h3>
                </div>


            </div>

            <div class="clearfix"></div>
            <div class="row" style="min-height:500px">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>My Issued Books</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table class="table table-bordered">
                                <th>
                                    Student Id
                                </th>
                                <th>
                                    Books ISBN
                                </th>
                                <th>Books Title</th>
                                <th>
                                    Books Issue Date
                                </th>

                                <th>
                                    Books Return Date
                                </th>
                                <?php
                                $res = mysqli_query($link, "select * from issue_books where student_username='$_SESSION[username]' && back='no'");
                                while ($row = mysqli_fetch_array($res)) {
                                    echo "<tr>";
                                    echo "<td>";
                                    echo $row["student_id"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["books_isbn"];
                                    echo "</td>";

                                    echo "<td>";
                                    $res10=mysqli_query($link,"select * from add_books where books_isbn='$row[books_isbn]'");
                                    while($row10=mysqli_fetch_array($res10))
                                    {
                                        echo $row10["books_title"];
                                    }
                                    echo "</td>";

                                    echo "<td>";
                                    echo $row["books_issue_date"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["books_return_date"];
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                ?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

<?php include "footer.php"; ?>