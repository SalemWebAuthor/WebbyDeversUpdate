<?php
include "../config/config.php";

$conn = mysqli_connect('localhost', 'root', '', 'test');
$username = $_GET['adm_username'];
$sql = "DELETE FROM admin WHERE adm_username = $username";
$result = mysqli_query($conn, $sql);

if($result){
	echo "Deleted a record successfully";
	header("location: ../index.php?page=admins&subpage=records");
}
else {
	echo "Failed";
}
?>