<?php

require_once 'config/connection.php';

// base model class
class Model
{
    // database connection and statement
    protected $db;
    protected $stmt;

    // constructor to establish database connection
    public function __construct()
    {
        try {
            $dsn = Config::getDSN();
            $this->db = new PDO(
                $dsn,
                Config::$db_user,
                Config::$db_pass
            );
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Koneksi database gagal: " . $e->getMessage());
        }
    }

    // method to execute a query with optional parameters
    public function execute($query, $params = [])
    {
        try {
            $this->stmt = $this->db->prepare($query);
            $this->stmt->execute($params);
            return $this->stmt;
        } catch (PDOException $e) {
            die("Query gagal: " . $e->getMessage());
        }
    }

    // method to fetch all results
    public function fetchAll()
    {
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // method to fetch a single result
    public function fetch()
    {
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>