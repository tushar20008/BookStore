<?php
	include 'connection.php';
    if (isset($_GET['id'])) {
        $id = $_GET["id"];
        mysqli_query($link,"update notification set hasRead=!hasRead where id='$id'");
    }
?>

<script type="text/javascript">
    window.location="notification.php#notification";
</script>