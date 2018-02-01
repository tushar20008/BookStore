<?php
	$username = $_SESSION['username'];

	$query = "SELECT role FROM `User` WHERE username='$username'";
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	$role = mysqli_fetch_array($result)[0];
?>

<?php
	if($role == 'customer'){
?>

	Welcome Noob

<?php
	}
	else{
?>

	Welcome Pro
<?php
	}
?>