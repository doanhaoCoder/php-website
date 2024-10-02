<?php
class settings
{
    private $table = "settings";
    private $conn;

    // All properties
    public $id;
    public $site_name;
    public $site_logo;
    public $site_favicon;
    public $site_map;
    public $site_timezone;
    public $site_footer;
    public $contact_email;
    public $contact_phone;
    public $contact_address;
    public $created_at;
    public $updated_at;

    // Connect DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Read all records
    public function readAll()
    {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    // Read record
    public function read()
    {
        $sql = "SELECT * FROM $this->table WHERE id = :get_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":get_id", $this->id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch();
            $this->site_name = $row['site_name'];
            $this->site_logo = $row['site_logo'];
            $this->site_favicon = $row['site_favicon'];
            $this->site_map = $row['site_map'];
            $this->site_timezone = $row['site_timezone'];
            $this->site_footer = $row['site_footer'];
            $this->contact_email = $row['contact_email'];
            $this->contact_phone = $row['contact_phone'];
            $this->contact_address = $row['contact_address'];
            $this->created_at = $row['created_at'];
            $this->updated_at = $row['updated_at'];
        }
    }

    // Create settings page
    public function create()
    {
        $sql = "INSERT INTO $this->table
                SET site_name = :get_site_name,
                    site_logo = :get_site_logo,
                    site_favicon = :get_site_favicon,
                    site_map = :get_site_map,
                    site_timezone = :get_site_timezone,
                    site_footer = :get_site_footer,
                    contact_email = :get_contact_email,
                    contact_phone = :get_contact_phone,
                    contact_address = :get_contact_address,
                    created_at = :get_created_date,
                    updated_at = :get_updated_date";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":get_site_name", $this->site_name);
        $stmt->bindParam(":get_site_logo", $this->site_logo);
        $stmt->bindParam(":get_site_favicon", $this->site_favicon);
        $stmt->bindParam(":get_site_map", $this->site_map);
        $stmt->bindParam(":get_site_timezone", $this->site_timezone);
        $stmt->bindParam(":get_site_footer", $this->site_footer);
        $stmt->bindParam(":get_contact_email", $this->contact_email);
        $stmt->bindParam(":get_contact_phone", $this->contact_phone);
        $stmt->bindParam(":get_contact_address", $this->contact_address);
        $stmt->bindParam(":get_created_date", $this->created_at);
        $stmt->bindParam(":get_updated_date", $this->updated_at);
        try {
            if ($stmt->execute()) {
                return true;
            }
        } catch (PDOException $e) {
            echo "Error: <br>" . $e->getMessage();
        }
    }

    // Update settings page
    public function update()
    {
        $sql = "UPDATE $this->table
                SET site_name = :get_site_name,
                    site_logo = :get_site_logo,
                    site_favicon = :get_site_favicon,
                    site_map = :get_site_map,
                    site_timezone = :get_site_timezone,
                    site_footer = :get_site_footer,
                    contact_email = :get_contact_email,
                    contact_phone = :get_contact_phone,
                    contact_address = :get_contact_address,
                    updated_at = :get_updated_date
                WHERE id = :get_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":get_id", $this->id);
        $stmt->bindParam(":get_site_name", $this->site_name);
        $stmt->bindParam(":get_site_logo", $this->site_logo);
        $stmt->bindParam(":get_site_favicon", $this->site_favicon);
        $stmt->bindParam(":get_site_map", $this->site_map);
        $stmt->bindParam(":get_site_timezone", $this->site_timezone);
        $stmt->bindParam(":get_site_footer", $this->site_footer);
        $stmt->bindParam(":get_contact_email", $this->contact_email);
        $stmt->bindParam(":get_contact_phone", $this->contact_phone);
        $stmt->bindParam(":get_contact_address", $this->contact_address);
        $stmt->bindParam(":get_updated_date", $this->updated_at);
        try {
            if ($stmt->execute()) {
                return true;
            }
        } catch (PDOException $e) {
            echo "Error: <br>" . $e->getMessage();
        }
    }
}
