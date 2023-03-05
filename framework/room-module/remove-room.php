<?php
include "../config/config.php";

$conn = mysqli_connect('localhost', 'root', '', 'test');
$id = $_GET['room_id'];
$sql = "DELETE FROM room WHERE room_id = $id";
$result = mysqli_query($conn, $sql);

if($result){
	echo "Deleted a record successfully";
	header("location: ../index.php?page=rooms");
}
else {
	echo "Failed";
}
?>