<?php  
class subscribers{
	private $table = "subscribers";
	private $conn;

	//All properties
	public $id;
	public $email;
	public $verified_token;
	public $status;
	public $created_at;
	public $updated_at;

	//Connect DB
	public function __construct($db){
		$this->conn = $db;
	}

	//Read all records
	public function readAll(){
		$sql = "SELECT * FROM $this->table";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	//Read all records to send mail
	public function readSendMail(){
		$sql = "SELECT * FROM $this->table
				WHERE status = 1";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	//Read record
	public function read(){
		$sql = "SELECT * FROM $this->table
				WHERE id = :get_id";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->id);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$row = $stmt->fetch();
			$this->email = $row['email'];
			$this->verified_token = $row['verified_token'];
			$this->status = $row['status'];
			$this->created_at = $row['created_at'];
			$this->updated_at = $row['updated_at'];
		}
	}

	//Check user register
	public function checkRequestSubscriber(){
		$sql = "SELECT * FROM $this->table
				WHERE email = :get_email_request";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_email_request",$this->email);
		$stmt->execute();
		return $stmt;
	}

	//Check user verified
	public function checkRequestVerified(){
		$sql = "SELECT * FROM $this->table
				WHERE verified_token = :get_token";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_token",$this->verified_token);
		$stmt->execute();
		return $stmt;
	}

	//Create new subscriber
	public function create(){
		$sql = "INSERT INTO $this->table
				SET email = :get_email,
					verified_token = :get_verified_token,
					status = 1,
					created_at = :get_created_date,
					updated_at = :get_updated_date";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_email",$this->email);
		$stmt->bindParam(":get_verified_token",$this->verified_token);
		$stmt->bindParam(":get_created_date",$this->created_at);
		$stmt->bindParam(":get_updated_date",$this->updated_at);
		
		if($stmt->execute()){
			return true;
		}
	}

	//Update subscriber
	public function update(){
		$sql = "UPDATE $this->table
				SET email = :get_email,
					verified_token = :get_verified_token,
					status = :get_status,
					updated_at = :get_updated_date
				WHERE id = :get_id";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->id);
		$stmt->bindParam(":get_email",$this->email);
		$stmt->bindParam(":get_verified_token",$this->verified_token);
		$stmt->bindParam(":get_status",$this->status);
		$stmt->bindParam(":get_updated_date",$this->updated_at);
		
		if($stmt->execute()){
			return true;
		}
	}

	//Delete subscriber
	public function delete(){
		$sql = "DELETE FROM $this->table
				WHERE id = :get_id";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->id);
		if($stmt->execute()){
			return true;
		}

	}
}

?>