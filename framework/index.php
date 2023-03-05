<?php
/* include the class file (global - within application) */
include_once 'class/class.admin.php';
include_once 'class/class.customer.php';
include_once 'class/class.room.php';
include_once 'class/class.reserve.php';
include 'config/config.php';

$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$admin = new Admin();
$customer = new Customer();
$room = new Room();
$reserve = new Reserve();

if(!$admin->get_session()){
	header("location: login.php");
}
$admin_user = $admin->get_username($_SESSION['adm_username']);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Dormitory Reservation Homepage</title>
		<link rel="stylesheet" href="css/style.css?<?php echo time();?>">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	</head>
	<header>
	<div id="navbar">
		<h1>Dormitory Reservation System</h1>
			<div id="navbar-contents">	
				<span class="hover"><a href="index.php"><i class="fa-sharp fa fa-house"></i>&nbspHome</a> &nbsp</span>
				<span class="hover"><a href="index.php?page=reserve"><i class="fa-sharp fa-solid fa-pen-to-square"></i>&nbspReservation</a> &nbsp</span>
				<span class="hover"><a href="#"><i class="fa-sharp fa-solid fa-calendar-days"></i>&nbspRental</a> &nbsp||&nbsp</span>
				<span class="hover"><a href="index.php?page=customers"><i class="fa-sharp fa-solid fa-users"></i>&nbspCustomers</a> &nbsp</span>
				<span class="hover"><a href="index.php?page=rooms"><i class="fa-sharp fa-solid fa-door-closed"></i>&nbspRooms</a> &nbsp</span>
				<span class="hover"><a href="index.php?page=admins"><i class="fa-sharp fa-solid fa-user-tie"></i>&nbspAdmins</a> &nbsp</span>
				<span class="hover"><a href="logout.php" class="right">Logout</a></span>
				<span class="right">Hello &nbsp<?php echo $admin->get_fname($admin_user).' '.$admin->get_lname($admin_user);?>!&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</span> 
			</div>
	</div>
	</header>
	<body>
	
	<div id="content">
	<?php
    switch($page){
                case 'reserve':
                    require_once 'reserve-module/index.php';
                break; 
                case 'customers':
                    require_once 'customers-module/index.php';
                break; 
                case 'rooms':
                    require_once 'room-module/index.php';
                break;
				case 'admins':
                    require_once 'admin-module/index.php';
                break; 
                default:
                    require_once 'main.php';
                break; 
            }
    ?>
	</div>
	</body>
</html>