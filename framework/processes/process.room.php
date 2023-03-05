<?php
include '../class/class.room.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id= isset($_GET['id']) ? $_GET['id'] : '';
$status= isset($_GET['status']) ? $_GET['status'] : '';

switch($action){
	case 'new':
        create_new_room();
	break;
    case 'update':
        update_room();
	break;
}

function create_new_room(){
    $room = new Room();
    $number = $_POST['room_number'];
    $type = ucfirst($_POST['room_type']);
    $description = ucfirst($_POST['room_desc']);
    $price = ucfirst($_POST['room_price']);
    $floor = ucfirst($_POST['room_floor']);
    $vacancy = $_POST['room_vacancy'];
    $status = $_POST['room_status'];

    $result = $room->new_room($number,$type,$description,$price,$floor,$vacancy,$status);
    if($result){
        $id = $room->get_room_id($number);
        header("location: ../index.php?page=rooms&subpage=records");
    }
}

function update_room(){  
    $room = new Room();
    $room_id = $_POST['room_id'];
    $number = $_POST['room_number'];
    $type = ucfirst($_POST['room_type']);
    $description = ucfirst($_POST['room_desc']);
    $price = ucfirst($_POST['room_price']);
    $floor = ucfirst($_POST['room_floor']);
    $rvacancy = $_POST['room_vacancy'];
    $rstatus = $_POST['room_status'];
    
    $result = $room->update_room($number,$type,$description,$price,$floor,$rvacancy,$rstatus,$room_id);
    if($result){
        header('location: ../index.php?page=rooms&subpage=records&id='.$room_id);
    }
}
?>