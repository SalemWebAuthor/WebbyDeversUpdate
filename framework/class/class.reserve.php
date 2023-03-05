<?php
class Reserve{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='test';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	public function new_reserve($rrescust,$rresroom,$rrestransaction){
		
		$data = [
			[$rrescust,$rresroom,$rrestransaction],
		];
		$stmt = $this->conn->prepare("INSERT INTO reserve (cust_id, room_id, type_id) VALUES (?,?,?)");
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

	public function delete_reservation($rrescust,$rresroom,$rrestransaction,$resid){
		
		$sql = "DELETE *from reserve where reserve_id=:id";
		$q = $this->conn->prepare($sql);
		

		return true;
	}

	public function list_reserve(){
		$sql="SELECT * FROM reserve";
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
	
	public function list_customer(){
		$sql="SELECT * FROM customer";
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

    public function new_transaction_type($type_desc){
    
        $data = [
            [$type_desc],
        ];
        $stmt = $this->conn->prepare("INSERT INTO transaction_type (type_description) VALUES (?)");
        try {
            $this->conn->beginTransaction();
            foreach ($data as $row)
            {
                $stmt->execute($row);
            }
            $id= $this->conn->lastInsertId();
            $this->conn->commit();
            
        }catch (Exception $e){
            $this->conn->rollback();
            throw $e;
        }
    
        return $id;
    
        }
		

    public function list_transaction_type(){
		$sql="SELECT * FROM transaction_type";
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

	function get_res_id($id){
		$sql="SELECT reserve_id FROM reserve WHERE reserve_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$res_id = $q->fetchColumn();
		return $res_id;
	}
	function get_cust_id($id){
		$sql="SELECT cust_id FROM customer WHERE cust_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cust_id = $q->fetchColumn();
		return $cust_id;
	}
	function get_cust_fname($id){
		$sql="SELECT cust_fname FROM customer WHERE cust_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cust_fname = $q->fetchColumn();
		return $cust_fname;
	}
	function get_cust_mname($id){
		$sql="SELECT cust_mname FROM customer WHERE cust_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cust_mname = $q->fetchColumn();
		return $cust_mname;
	}
	function get_cust_lname($id){
		$sql="SELECT cust_lname FROM customer WHERE cust_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cust_lname = $q->fetchColumn();
		return $cust_lname;
	}
	function get_cust_email($id){
		$sql="SELECT cust_email FROM customer WHERE cust_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cust_email = $q->fetchColumn();
		return $cust_email;
	}
	function get_cust_address($id){
		$sql="SELECT cust_address FROM customer WHERE cust_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cust_address = $q->fetchColumn();
		return $cust_address;
	}
	function get_cust_cnumber($id){
		$sql="SELECT cust_cnumber FROM customer WHERE cust_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cust_cnumber = $q->fetchColumn();
		return $cust_cnumber;
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
	function get_room_vacancy($id){
		$sql="SELECT room_vacancy FROM room WHERE room_id = :room_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['room_id' => $id]);
		$room_vacancy = $q->fetchColumn();
		return $room_vacancy;
	}
	public function subtract_room_vacancy($id){
		$sql= "UPDATE room SET room_vacancy=room_vacancy - 1 WHERE room_id = :room_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['room_id' => $id]);
		$room_vacancy = $q->fetchColumn();
		return $room_vacancy;
	}

	public function add_room_vacancy($id){
		$sql= "UPDATE room SET room_vacancy=room_vacancy + 1 WHERE room_id = :room_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['room_id' => $id]);
		$room_vacancy = $q->fetchColumn();
		return $room_vacancy;
	}

	public function update_cust_status($id){
		$sql= "UPDATE customer SET cust_status = 'Reserved' WHERE cust_id = :cust_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['cust_id' => $id]);
		$room_vacancy = $q->fetchColumn();
		return $room_vacancy;
	}

	function get_transaction_type_id($id){
		$sql="SELECT type_id FROM transaction_type WHERE type_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$type_id = $q->fetchColumn();
		return $type_id;
	}
	function get_transaction_type_description($id){
		$sql="SELECT type_description FROM transaction_type WHERE type_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$type_desc = $q->fetchColumn();
		return $type_desc;
	}

	// function check_room_status($id){
	// 	$sql = "SELECT * FROM room"; 
	// 	$q = $this->conn->prepare($sql);
	// 	$q->execute(['id' => $id]);
	// 	$number_of_rooms = $q->fetchColumn();
		
}
?>