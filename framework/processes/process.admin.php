<?php
include '../class/class.admin.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id= isset($_GET['id']) ? $_GET['id'] : '';
$status= isset($_GET['status']) ? $_GET['status'] : '';

switch($action){
	case 'new':
        create_new_admin();
	break;
    case 'update':
        update_admin();
	break;
    case 'delete':
        delete_customer();
    break;
}

function create_new_admin(){
    $admin = new Admin();
    $username = $_POST['adm_username'];
    $password = $_POST['adm_password'];
    $email = $_POST['adm_email'];
    $fname = ucfirst($_POST['adm_fname']);
    $lname = ucfirst($_POST['adm_lname']);
    $cnumber = $_POST['adm_cnumber'];

    $result = $admin->new_admin($username,$password,$email,$fname,$lname,$cnumber);
    if($result){
        $username = $admin->get_username($username);
        header("location: ../index.php?page=admins");
    }
}

function update_admin(){  
    $admin = new Admin();
    $username = $_POST['adm_username'];
    $password = $_POST['adm_password'];
    $email = $_POST['adm_email'];
    $fname = ucfirst($_POST['adm_fname']);
    $lname = ucfirst($_POST['adm_lname']);
    $cnumber = $_POST['adm_cnumber'];
    
    $result = $admin->update_admin($username,$password,$email,$fname,$lname,$cnumber);
    if($result){
        header('location: ../index.php?page=admins&subpage=records&id='.$username);
    }
}

function delete_admin(){
    $admin = new Admin();
    $username = $_POST['adm_username'];
    $password = $_POST['adm_password'];
    $email = $_POST['adm_email'];
    $fname = ucfirst($_POST['adm_fname']);
    $lname = ucfirst($_POST['adm_lname']);
    $cnumber = $_POST['adm_cnumber'];

    $result = $admin->delete_admin($username,$password,$email,$fname,$lname,$cnumber);
    if($result){
        header('location: ../index.php?page=admins&subpage=records');        
    }
}