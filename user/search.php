<?php include "header.php"; ?>
    <h3 class="title">Search Books</h3>
    <form class="form" method="post" action="">
        <div class="row">
            <div class="form-group col-sm-6 col-lg-3">
                <input type="text" value="" placeholder="Book Name" name="bookname" class="form-control">
            </div>
            <div class="form-group col-sm-6 col-lg-3">
                <button name="submit" class="btn btn-round btn-info">Run Search</button>
            </div>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Cover Page</th>
                <th scope="col">Book Code</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Qty</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
<?php
    $rowNumber = 0;
    if(isset($_POST["submit"])) {
        $rowNumber = 1;
        $res=mysqli_query($link,"select * from add_books where title like('%$_POST[bookname]%')");
        while($row=mysqli_fetch_array($res)){
            echo "<tr>";
            echo "<th scope='row'>". $rowNumber. "</th>";
            echo "<td> <img src=" . $row["image"] . " alt='Rounded Image' class='rounded'></td>";
            echo "<td>" . $row["bookCode"] . "</td>";
            echo "<td>" . $row["title"] . "</td>";
            echo "<td>" . $row["author"] . "</td>";
            echo "<td>" . $row["qty"] . "</td>";
            echo "<td> Checkout </td>";
            echo "</tr>";
            $rowNumber++;
        }
    }
?>  
        </tbody>
    </table>
<?php if($rowNumber == 1){
        echo "<h6 class='text-danger' style='text-align:center'> Nothing Found </h6>";
    }
?>
<?php include "footer.php"; ?>