<?php
class Admin{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='test';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function new_admin($username,$password,$email,$fname,$lname,$cnumber){
		
		$data = [
			[$username,$password,$email,$fname,$lname,$cnumber],
		];
		$stmt = $this->conn->prepare("INSERT INTO admin (adm_username, adm_password, adm_email, adm_fname, adm_lname, adm_cnumber) VALUES (?,?,?,?,?,?)");
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

	public function update_admin($username,$password,$email,$fname,$lname,$cnumber){
		
		$sql = "UPDATE admin SET adm_password=:adm_password, adm_email=:adm_email, adm_fname=:adm_fname, adm_lname=:adm_lname, adm_cnumber=:adm_cnumber WHERE adm_username=:adm_username";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':adm_password'=>$password, ':adm_email'=>$email,':adm_fname'=>$fname,':adm_lname'=>$lname,':adm_cnumber'=>$cnumber, ':adm_username'=>$username));
		return true;
	}

	public function list_admins(){
		$sql="SELECT * FROM admin";
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

	function get_username($username){
		$sql="SELECT adm_username FROM admin WHERE adm_username = :username";	
		$q = $this->conn->prepare($sql);
		$q->execute(['username' => $username]);
		$username = $q->fetchColumn();
		return $username;
	}
	function get_password($username){
		$sql="SELECT adm_password FROM admin WHERE adm_username = :username";	
		$q = $this->conn->prepare($sql);
		$q->execute(['username' => $username]);
		$password = $q->fetchColumn();
		return $password;
	}
	function get_email($username){
		$sql="SELECT adm_email FROM admin WHERE adm_username = :username";	
		$q = $this->conn->prepare($sql);
		$q->execute(['username' => $username]);
		$email = $q->fetchColumn();
		return $email;
	}
	function get_fname($username){
		$sql="SELECT adm_fname FROM admin WHERE adm_username = :username";	
		$q = $this->conn->prepare($sql);
		$q->execute(['username' => $username]);
		$fname = $q->fetchColumn();
		return $fname;
	}
	function get_lname($username){
		$sql="SELECT adm_lname FROM admin WHERE adm_username = :username";	
		$q = $this->conn->prepare($sql);
		$q->execute(['username' => $username]);
		$lname = $q->fetchColumn();
		return $lname;
	}
	function get_cnumber($username){
		$sql="SELECT adm_cnumber FROM admin WHERE adm_username = :username";	
		$q = $this->conn->prepare($sql);
		$q->execute(['username' => $username]);
		$cnumber = $q->fetchColumn();
		return $cnumber;
	}
	function get_session(){
		if(isset($_SESSION['login']) && $_SESSION['login'] == true){
			return true;
		}else{
			return false;
		}
	}
	public function check_login($username,$password){
		
		$sql = "SELECT count(*) FROM admin WHERE adm_username = :username AND adm_password = :password"; 
		$q = $this->conn->prepare($sql);
		$q->execute(['username' => $username,'password' => $password ]);
		$number_of_rows = $q->fetchColumn();
		

	
		if($number_of_rows == 1){
			
			$_SESSION['login']=true;
			$_SESSION['adm_username']=$username;
			return true;
		}else{
			return false;
		}
	}
}