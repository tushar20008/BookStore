    <h3 id="searchedBooks" class="title">Search Users</h3>
</div>
<div class="row collections">
    <form method="post" action="">
        <div class="row">
            <input type="text" value="" placeholder="Username" name="username" class="form-control col-sm-4">
            <input type="text" value="" placeholder="Firstname" name="firstname" class="form-control col-sm-4">
            <input type="text" value="" placeholder="Lastname" name="lastname" class="form-control col-sm-4">
            <div class="form-group col-sm-6">
                <button name="submit" class="btn btn-round btn-info">Run Search</button>
            </div>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Books Issued</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
<?php
    $rowNumber = 0;
    if(isset($_POST["submit"]) && isset($_POST["username"])) {
        $rowNumber = 1;
        $res=mysqli_query($link,"select * from user_registration where username like('%$_POST[username]%') and firstname like('%$_POST[firstname]%') and lastname like('%$_POST[lastname]%')");
        while($row=mysqli_fetch_array($res)){
            echo "<tr>";
            echo "<th scope='row'>". $rowNumber. "</th>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["firstname"] . "</td>";
            echo "<td>" . $row["lastname"] . "</td>";
            echo "<td>" . $row["booksIssued"] . "</td>";
            echo 
                "<td> 
                    <a href='editUser.php?username=". $row["username"] . "#editUser' class='text-info' rel='tooltip' title='Edit' data-placement='bottom'>
                        <i class='now-ui-icons ui-1_simple-add'></i>
                    </a> 
                </td>";
            echo 
                "<td> 
                    <a href='search.php?username=". $row["username"] . "#userTab' class='text-danger' rel='tooltip' title='Delete' data-placement='bottom'>
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