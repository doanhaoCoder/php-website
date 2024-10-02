<?php
class blogs
{
	private $table = "blogs";
	private $conn;

	//All properties
	public $id;
	public $title;
	public $content;
	public $image;
	public $status;
	public $id_category;
	public $id_user;
	public $created_at;
	public $updated_at;

	public $page_start;  //page number
	public $page_record; //number records of page

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

	//Read all records by id_user
	public function readUserId()
	{
		$sql = "SELECT * FROM $this->table
		WHERE status = 0
		AND id_user = :get_id_user";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':get_id_user', $this->id_user);
		$stmt->execute();
		return $stmt;
	}

	//Read all records by user
	// public function readAllUser()
	// {
	// 	$sql = "SELECT * FROM $this->table
	// 			WHERE status = 1
	// 			AND id_user = :get_id_user";

	// 	$stmt = $this->conn->prepare($sql);
	// 	$stmt->bindParam(':get_id_user', $this->id_user);
	// 	$stmt->execute();
	// 	return $stmt;
	// }

	//Read all records by category
	public function showAllCategories()
	{
		$sql = "SELECT * FROM $this->table
				WHERE status = 1
				AND id_category = :get_id_category";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':get_id_category', $this->id_category);
		$stmt->execute();
		return $stmt;
	}

	//Read all records by page category
	public function showAllCategoriesLimit()
	{
		$sql = "SELECT * FROM $this->table
				WHERE status = 1
				AND id_category = :get_id_category
				LIMIT :get_page_start, :get_page_record ";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':get_id_category', $this->id_category);
		$stmt->bindParam(':get_page_start', $this->page_start, PDO::PARAM_INT);   //Khai báo giá trị truyền kiểu số nguyên
		$stmt->bindParam(':get_page_record', $this->page_record, PDO::PARAM_INT); //Khai báo giá trị truyền kiểu số nguyên
		$stmt->execute();
		return $stmt;
	}

	//Read all records by page
	public function readPageLimit()
	{
		$sql = "SELECT * FROM $this->table
				WHERE status = 1
				LIMIT :get_page_start, :get_page_record ";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':get_page_start', $this->page_start, PDO::PARAM_INT);   //Khai báo giá trị truyền kiểu số nguyên
		$stmt->bindParam(':get_page_record', $this->page_record, PDO::PARAM_INT); //Khai báo giá trị truyền kiểu số nguyên
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
			$this->title = $row['title'];
			$this->status = $row['status'];

			$this->content = $row['content'];
			$this->image = $row['image'];
			$this->id_category = $row['id_category'];
			$this->id_user = $row['id_user'];
			$this->created_at = $row['created_at'];
			$this->updated_at = $row['updated_at'];
		}
	}

	//Create new blog post
	public function create()
	{
		$sql = "INSERT INTO $this->table
				SET title = :get_title,
					content = :get_content,
					image = :get_image,
					id_category = :get_id_category,
					id_user = :get_id_user,
					created_at = :get_created_date,
					updated_at = :get_updated_date";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_title", $this->title);
		$stmt->bindParam(":get_content", $this->content);
		$stmt->bindParam(":get_image", $this->image);
		$stmt->bindParam(":get_id_category", $this->id_category);
		$stmt->bindParam(":get_id_user", $this->id_user);
		$stmt->bindParam(":get_created_date", $this->created_at);
		$stmt->bindParam(":get_updated_date", $this->updated_at);

		if ($stmt->execute()) {
			return true;
		}
	}

	//Update blog post
	public function update()
	{
		$sql = "UPDATE $this->table
				SET title = :get_title,
					status = :get_status,
					content = :get_content,
					image = :get_image,
					id_category = :get_id_category,
					id_user = :get_id_user,
					updated_at = :get_updated_date
				WHERE id = :get_id";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id", $this->id);
		$stmt->bindParam(":get_title", $this->title);
		$stmt->bindParam(":get_status", $this->status);

		$stmt->bindParam(":get_content", $this->content);
		$stmt->bindParam(":get_image", $this->image);
		$stmt->bindParam(":get_id_category", $this->id_category);
		$stmt->bindParam(":get_id_user", $this->id_user);
		$stmt->bindParam(":get_updated_date", $this->updated_at);
		if ($stmt->execute()) {
			return true;
		}
	}

	//Delete blog post
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
