<?php include "header.php"; ?>
    <h3 class="title">Books Issued</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Book Code</th>
                <th scope="col">Title</th>
                <th scope="col">Issue Date</th>
                <th scope="col">Return Date</th>
            </tr>
        </thead>
        <tbody>
<?php
    $res = mysqli_query($link, "select * from book_status where username='$_SESSION[username]' && status='issued'");
    $rowNumber = 1;
    while ($row = mysqli_fetch_array($res)) {
        echo "<tr>";
        echo "<th scope='row'>". $rowNumber. "</th>";
        echo "<td>" . $row["bookCode"] . "</td>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td>" . $row["issueDate"] . "</td>";
        echo "<td>" . $row["returnDate"] . "</td>";
        echo "</tr>";
        $rowNumber++;
    }
?>  
        </tbody>
    </table>
<?php if($rowNumber == 1){
        echo "<h6 class='text-success' style='text-align:center'> Nothing Issued </h6>";
    }
?>
</div>
<?php include "footer.php"; ?>