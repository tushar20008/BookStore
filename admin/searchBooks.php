    <h3 id="searchedBooks" class="title">Search Books</h3>
</div>
<div class="row collections">
    <form method="post" action="">
        <div class="row">
            <input type="text" value="" placeholder="Book Name" name="bookname" class="form-control">
            <div class="form-group col-sm-6 col-lg-3">
                <button name="submit" class="btn btn-round btn-info">Run Search</button>
            </div>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Cover</th>
                <th scope="col">Code</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
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
            echo "<td> <img src='../assets/img/books/" . $row["image"] . "' alt='Rounded Image' class='col-sm-3'></td>";
            echo "<td>" . $row["bookCode"] . "</td>";
            echo "<td>" . $row["title"] . "</td>";
            echo "<td>" . $row["author"] . "</td>";
            echo 
                "<td> 
                    <a href='editBook.php?id=". $row["bookCode"] . "#editBook' class='text-info' rel='tooltip' title='Edit' data-placement='bottom'>
                        <i class='now-ui-icons ui-1_simple-add'></i>
                    </a> 
                </td>";
            echo 
                "<td> 
                    <a href='search.php?id=". $row["bookCode"] . "#booksTab' class='text-danger' rel='tooltip' title='Delete' data-placement='bottom'>
                        <i class='now-ui-icons ui-1_simple-delete'></i>
                    </a> 
                </td>";
           
            
            echo "</tr>";
            $rowNumber++;
        }
    }
?>  
        </tbody>
    </table>
<?php if($rowNumber == 1){
        echo "<h6 class='text-danger text-center'> Nothing Found </h6>";
    }
?>
<?php if($rowNumber == 0){
        echo "<h6 class='text-info text-center'> Run Search First </h6>";
    }
?>