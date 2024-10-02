<?php
class users
{
	private $table = "users";
	private $conn;

	//All properties
	public $id;
	public $name;
	public $username;
	public $password;
	public $email;
	public $image;
	public $phone;
	public $role;
	public $status;
	public $email_verified;
	public $created_at;
	public $updated_at;

	//Connect DB
	public function __construct($db)
	{
		$this->conn = $db;
	}

	//Read all records
	public function readAll()
	{
		$sql = "SELECT * FROM $this->table";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	//Read record
	public function read()
	{
		$sql = "SELECT * FROM $this->table
				WHERE id = :get_id";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id", $this->id);
		$stmt->execute();
		if ($stmt->rowCount() > 0) {
			$row = $stmt->fetch();
			$this->name = $row['name'];
			$this->username = $row['username'];
			$this->password = $row['password'];
			$this->email = $row['email'];
			$this->image = $row['image'];
			$this->phone = $row['phone'];
			$this->role = $row['role'];
			$this->status = $row['status'];
			$this->email_verified = $row['email_verified'];
			$this->created_at = $row['created_at'];
			$this->updated_at = $row['updated_at'];
		}
	}

	//Read user by role (Admin)
	public function roleAdmin()
	{
		$sql = "SELECT * FROM $this->table
				WHERE role = 2";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	//Check login
	public function userLogin()
	{
		$sql = "SELECT * FROM $this->table
				WHERE username = :get_username 
				AND password = :get_password";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':get_username', $this->username);
		$stmt->bindParam(':get_password', $this->password);
		$stmt->execute();
		return $stmt;
	}

	//Create user
	public function create()
	{
		$sql = "INSERT INTO $this->table
				SET name = :get_name,
					username = :get_username,
					password = :get_password,
					email = :get_email,
					image = :get_image,
					phone = :get_phone,
					role = :get_role,
					status = :get_status,
					email_verified = :get_email_verified,
					created_at = :get_created_date,
					updated_at = :get_updated_date";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_name", $this->name);
		$stmt->bindParam(":get_username", $this->username);
		$stmt->bindParam(":get_password", $this->password);
		$stmt->bindParam(":get_email", $this->email);
		$stmt->bindParam(":get_image", $this->image);
		$stmt->bindParam(":get_phone", $this->phone);
		$stmt->bindParam(":get_role", $this->role);
		$stmt->bindParam(":get_status", $this->status);
		$stmt->bindParam(":get_email_verified", $this->email_verified);
		$stmt->bindParam(":get_created_date", $this->created_at);
		$stmt->bindParam(":get_updated_date", $this->updated_at);

		if ($stmt->execute()) {
			return true;
		}
	}

	//Update user
	public function update()
	{
		$sql = "UPDATE $this->table
				SET name = :get_name,
					username = :get_username,
					password = :get_password,
					email = :get_email,
					image = :get_image,
					phone = :get_phone,
					role = :get_role,
					status = :get_status,
					email_verified = :get_email_verified,
					updated_at = :get_updated_date
				WHERE id = :get_id";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id", $this->id);
		$stmt->bindParam(":get_name", $this->name);
		$stmt->bindParam(":get_username", $this->username);
		$stmt->bindParam(":get_password", $this->password);
		$stmt->bindParam(":get_email", $this->email);
		$stmt->bindParam(":get_image", $this->image);
		$stmt->bindParam(":get_phone", $this->phone);
		$stmt->bindParam(":get_role", $this->role);
		$stmt->bindParam(":get_status", $this->status);
		$stmt->bindParam(":get_email_verified", $this->email_verified);
		$stmt->bindParam(":get_updated_date", $this->updated_at);

		if ($stmt->execute()) {
			return true;
		}
	}

	//Delete user
	public function delete()
	{
		$sql = "DELETE FROM $this->table
				WHERE id = :get_id";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id", $this->id);
		if ($stmt->execute()) {
			return true;
		}
	}
}
