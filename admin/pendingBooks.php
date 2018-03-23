    <h3 class="title">Books Issued</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Book Code</th>
                <th scope="col">Book Title</th>
                <th scope="col">Issue Date</th>
                <th scope="col">Return Date</th>
                <th scope="col">Overdue</th>
            </tr>
        </thead>
        <tbody>
<?php
    $res = mysqli_query($link, "select * from book_status where status='issued' order by id desc");
    $rowNumber = 1;
    $todayDate = date("Y-m-d");;
    while ($row = mysqli_fetch_array($res)) {
        echo "<tr>";
        echo "<th scope='row'>". $rowNumber. "</th>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["bookCode"] . "</td>";

        $bookInfo = mysqli_fetch_array(mysqli_query($link,"select * from add_books where bookCode='$row[bookCode]'"));
        echo "<td>" . $bookInfo["title"] . "</td>";
        echo "<td>" . $row["issueDate"] . "</td>";
        echo "<td>" . $row["returnDate"] . "</td>";

        $diff = date_diff(new DateTime($row["returnDate"]), new DateTime($todayDate));
        if($row["returnDate"] < $todayDate){
            echo "<td class='text-danger'>". $diff->format("%R%a days") ."</td>";
        }
        else{
            echo "<td class='text-info'> - </td>";
        }
        
        echo "</tr>";
        $rowNumber++;
    }
?>  
        </tbody>
    </table>
<?php if($rowNumber == 1){
        echo "<h6 class='text-info'> No Books Issued </h6>";
    }
?>