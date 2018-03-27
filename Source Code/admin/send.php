<?php
	include 'connection.php';
    if(isset($_POST["submit"])){

        if(strlen($_POST['title']) == 0 || strlen($_POST['message']) == 0 || $_POST['username'] == '0'){
?>
			<script type="text/javascript">
                window.location="sendNotification.php?msg=0#send";
            </script>
<?php
        }    
        else{ 
	        $date = date("Y-m-d");
	        mysqli_query($link,"insert into notification(id, username, title, message, date) values('','$_POST[username]','$_POST[title]','$_POST[message]','$date')");  
?>
			<script type="text/javascript">
                window.location="sendNotification.php?msg=1#send";
            </script>
<?php 
	    }      
    }       
?>
