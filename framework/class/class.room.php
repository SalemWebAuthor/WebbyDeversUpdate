<?php
class Room{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='test';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function new_room($rnumber,$rtype,$rdesc,$rprice,$rfloor,$rvacancy,$rstatus){
		
		$data = [
			[$rnumber,$rtype,$rdesc,$rprice,$rfloor,$rvacancy,$rstatus],
		];
		$stmt = $this->conn->prepare("INSERT INTO room (room_number, room_type, room_desc, room_price, room_floor, room_vacancy, room_status) VALUES (?,?,?,?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}

		return true;

	}

	public function update_room($rnumber,$rtype,$rdesc,$rprice,$rfloor,$rvacancy,$rstatus,$id){
		
		$sql = "UPDATE room SET room_number=:room_number, room_type=:room_type, room_desc=:room_desc, room_price=:room_price, room_floor=:room_floor, room_vacancy=:room_vacancy, room_status=:room_status WHERE room_id=:room_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':room_number'=>$rnumber, ':room_type'=>$rtype, ':room_desc'=>$rdesc,':room_price'=>$rprice,':room_floor'=>$rfloor,':room_vacancy'=>$rvacancy,':room_status'=>$rstatus, ':room_id'=>$id));
		return true;
	}

	public function list_rooms(){
		$sql="SELECT * FROM room";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
	}
	function get_room_id($id){
		$sql="SELECT room_id FROM room WHERE room_id = :room_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['room_id' => $id]);
		$room_id = $q->fetchColumn();
		return $room_id;
	}
	function get_room_number($id){
		$sql="SELECT room_number FROM room WHERE room_id = :room_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['room_id' => $id]);
		$room_number = $q->fetchColumn();
		return $room_number;
	}
	function get_room_type($id){
		$sql="SELECT room_type FROM room WHERE room_id = :room_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['room_id' => $id]);
		$room_type = $q->fetchColumn();
		return $room_type;
	}
	function get_room_desc($id){
		$sql="SELECT room_desc FROM room WHERE room_id = :room_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['room_id' => $id]);
		$room_desc = $q->fetchColumn();
		return $room_desc;
	}
	function get_room_price($id){
		$sql="SELECT room_price FROM room WHERE room_id = :room_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['room_id' => $id]);
		$room_price = $q->fetchColumn();
		return $room_price;
	}
	function get_room_floor($id){
		$sql="SELECT room_floor FROM room WHERE room_id = :room_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['room_id' => $id]);
		$room_floor = $q->fetchColumn();
		return $room_floor;
	}
	function get_room_vacancy($id){
		$sql="SELECT room_vacancy FROM room WHERE room_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$room_vacancy = $q->fetchColumn();
		return $room_vacancy;
	}
	function get_room_status($id){
		$sql="SELECT room_status FROM room WHERE room_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$room_status = $q->fetchColumn();
		return $room_status;
	}

	//reserve-extension

	// function get_res_id($id){
	// 	$sql="SELECT reserve_id FROM reserve WHERE reserve_id = :id";	
	// 	$q = $this->conn->prepare($sql);
	// 	$q->execute(['id' => $id]);
	// 	$res_id = $q->fetchColumn();
	// 	return $res_id;
	// }
	// function get_cust_id($id){
	// 	$sql="SELECT cust_id FROM customer WHERE cust_id = :id";	
	// 	$q = $this->conn->prepare($sql);
	// 	$q->execute(['id' => $id]);
	// 	$cust_id = $q->fetchColumn();
	// 	return $cust_id;
	// }
	// function get_cust_fname($id){
	// 	$sql="SELECT cust_fname FROM customer WHERE cust_id = :id";	
	// 	$q = $this->conn->prepare($sql);
	// 	$q->execute(['id' => $id]);
	// 	$cust_fname = $q->fetchColumn();
	// 	return $cust_fname;
	// }
	// function get_cust_mname($id){
	// 	$sql="SELECT cust_mname FROM customer WHERE cust_id = :id";	
	// 	$q = $this->conn->prepare($sql);
	// 	$q->execute(['id' => $id]);
	// 	$cust_mname = $q->fetchColumn();
	// 	return $cust_mname;
	// }
	// function get_cust_lname($id){
	// 	$sql="SELECT cust_lname FROM customer WHERE cust_id = :id";	
	// 	$q = $this->conn->prepare($sql);
	// 	$q->execute(['id' => $id]);
	// 	$cust_lname = $q->fetchColumn();
	// 	return $cust_lname;
	// }
	// function get_cust_email($id){
	// 	$sql="SELECT cust_email FROM customer WHERE cust_id = :id";	
	// 	$q = $this->conn->prepare($sql);
	// 	$q->execute(['id' => $id]);
	// 	$cust_email = $q->fetchColumn();
	// 	return $cust_email;
	// }
	// function get_cust_address($id){
	// 	$sql="SELECT cust_address FROM customer WHERE cust_id = :id";	
	// 	$q = $this->conn->prepare($sql);
	// 	$q->execute(['id' => $id]);
	// 	$cust_address = $q->fetchColumn();
	// 	return $cust_address;
	// }
	// function get_cust_cnumber($id){
	// 	$sql="SELECT cust_cnumber FROM customer WHERE cust_id = :id";	
	// 	$q = $this->conn->prepare($sql);
	// 	$q->execute(['id' => $id]);
	// 	$cust_cnumber = $q->fetchColumn();
	// 	return $cust_cnumber;
	// }
}