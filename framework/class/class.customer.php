<?php
class Customer{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='test';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function new_customer($fname,$mname,$lname,$email,$address,$cnumber,$status){
		
		$data = [
			[$fname,$mname,$lname,$email,$address,$cnumber,$status],
		];
		$stmt = $this->conn->prepare("INSERT INTO customer (cust_fname, cust_mname, cust_lname, cust_email, cust_address, cust_cnumber, cust_status) VALUES (?,?,?,?,?,?,?)");
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

	public function update_customer($fname, $mname, $lname, $email, $address, $cnumber, $status, $id){
		
		$sql = "UPDATE customer SET cust_fname=:cust_fname, cust_mname=:cust_mname, cust_lname=:cust_lname, cust_email=:cust_email, cust_address=:cust_address, cust_cnumber=:cust_cnumber, cust_status=:cust_status WHERE cust_id=:cust_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':cust_fname'=>$fname, ':cust_mname'=>$mname,':cust_lname'=>$lname,':cust_email'=>$email,':cust_address'=>$address, 'cust_cnumber'=>$cnumber, 'cust_status'=>$status, ':cust_id'=>$id));
		return true;
	}
	
	public function delete_customer($fname, $mname, $lname, $email, $address, $cnumber, $status, $id){
		
		$sql = "DELETE * from customer where cust_id=:id";
		$q = $this->conn->prepare($sql);

		return true;
	}

	public function list_customers(){
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

	function get_cust_status($id){
		$sql="SELECT cust_status FROM customer WHERE cust_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cust_status = $q->fetchColumn();
		return $cust_status;
	}
}