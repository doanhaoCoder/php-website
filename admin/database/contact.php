<?php  
class contact{
	private $table = "contact";
	private $conn;

	//All properties
	public $id;
	public $content;
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

	//Read record
	public function read(){
		$sql = "SELECT * FROM $this->table
				WHERE id = :get_id";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->id);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$row = $stmt->fetch();
			$this->content = $row['content'];
			$this->created_at = $row['created_at'];
			$this->updated_at = $row['updated_at'];
		}
	}

	//Create contact page
	public function create(){
		$sql = "INSERT INTO $this->table
				SET content = :get_content,
					created_at = :get_created_date,
					updated_at = :get_updated_date";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_content",$this->content);
		$stmt->bindParam(":get_created_date",$this->created_at);
		$stmt->bindParam(":get_updated_date",$this->updated_at);
		
		if($stmt->execute()){
			return true;
		}
	}

	//Update contact page
	public function update(){
		$sql = "UPDATE $this->table
				SET content = :get_content,
					updated_at = :get_updated_date
				WHERE id = :get_id";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->id);
		$stmt->bindParam(":get_content",$this->content);
		$stmt->bindParam(":get_updated_date",$this->updated_at);
		
		if($stmt->execute()){
			return true;
		}
	}

}

?>