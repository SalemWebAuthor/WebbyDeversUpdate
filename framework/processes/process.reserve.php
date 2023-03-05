<?php
include '../class/class.reserve.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id= isset($_GET['id']) ? $_GET['id'] : '';
$status= isset($_GET['status']) ? $_GET['status'] : '';

switch($action){
	case 'new':
        create_new_reserve();
	break;
    case 'cancel':
        delete_reservation();
	break;
}

function create_new_reserve(){
    $reserve = new Reserve();
    $rescust = $_POST['cust_id'];
    $restransaction = $_POST['trans_id'];
    $resroom = $_POST['room_id'];

    $result = $reserve->new_reserve($rescust,$resroom,$restransaction);
    if($result){
        $id = $reserve->get_res_id($rescust);
        $result2 = $reserve->subtract_room_vacancy($resroom);
        $result3 = $reserve->update_cust_status($rescust);
            header("location: ../index.php?page=reserve&subpage=records");
    }
}

function delete_reservation(){
    $reserve = new Reserve();
    $resid = $_POST['reserve_id'];
    $rescust = $_POST['cust_id'];
    $restransaction = $_POST['trans_id'];
    $resroom = $_POST['room_id'];

    $result = $reserve->delete_reservation($rescust,$resroom,$restransaction,$resid);
    if($result){
        $result4 = $reserve->add_room_vacancy($resroom);
        header("location: ../index.php?page=reserve&subpage=records");
    }
}
// function subtract_new_reserve_room(){
//     $reserve = new Reserve();
//     $resroom = $_POST['room_id'];

//     $result = $reserve->subtract_room_vacancy($resroom);
//     if($result){
//             header("location: ../index.php?page=reserve&subpage=records");
//     }
// }

?>