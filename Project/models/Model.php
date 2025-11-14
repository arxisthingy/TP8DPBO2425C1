<?php

require_once 'config/connection.php';

class Model
{
    protected $db;
    protected $stmt;

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

    public function fetchAll()
    {
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetch()
    {
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>