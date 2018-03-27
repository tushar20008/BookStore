<?php include "header.php"; ?>
    <h3 id="notification" class="title">Notifications</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Message</th>
                <th scope="col">Date</th>
                <th scope="col">Mark Read</th>
            </tr>
        </thead>
        <tbody>
<?php
    $rowNumber = 1;
    $res=mysqli_query($link,"select * from notification where username='$_SESSION[username]' order by date desc, id desc");
    while($row=mysqli_fetch_array($res)){
        if(!$row["hasRead"]){
            echo "<tr class='bookRow text-danger'>";    
        }
        else{
            echo "<tr class='bookRow'>";
        }
        echo "<th scope='row'>". $rowNumber. "</th>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td>" . $row["message"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";  
        if(!$row["hasRead"]){
            echo 
            "<td> 
                <a id='updateStatus' href='updateNotification.php?id=". $row["id"]."#notification' class='text-info' rel='tooltip' title='Mark Read' data-placement='bottom'>
                    <i class='now-ui-icons ui-1_check'></i>
                </a> 
            </td>";   
        }  
        else{
            echo 
            "<td> 
                <a id='updateStatus' href='updateNotification.php?id=". $row["id"]."#notification' class='text-info' rel='tooltip' title='Mark Unread' data-placement='bottom'>
                    <i class='now-ui-icons ui-1_simple-remove'></i>
                </a> 
            </td>";   
        }  
        echo "</tr>";
        $rowNumber++;
    }
?>  
        </tbody>
    </table>
<?php if($rowNumber == 1){
        echo "<h6 class='text-info text-center'> No notifications </h6>";
    }
?>
<?php include "footer.php"; ?>