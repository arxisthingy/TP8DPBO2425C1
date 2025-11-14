<?php
require_once 'Model.php';

class Lecturer extends Model
{
    function getLecturer()
    {
        $query = "SELECT * FROM Lecturers";
        return $this->execute($query);
    }

    function getLecturerById($id)
    {
        $query = "SELECT * FROM Lecturers WHERE id = ?";
        return $this->execute($query, [$id]);
    }

    function add($data)
    {
        $query = "INSERT INTO Lecturers (name, nidn, phone, join_date) VALUES (?, ?, ?, ?)";
        $params = [
            $data['name'],
            $data['nidn'],
            $data['phone'],
            $data['join_date']
        ];
        return $this->execute($query, $params);
    }

    function update($data)
    {
        $query = "UPDATE Lecturers SET name=?, nidn=?, phone=?, join_date=? WHERE id=?";
        $params = [
            $data['name'],
            $data['nidn'],
            $data['phone'],
            $data['join_date'],
            $data['id']
        ];
        return $this->execute($query, $params);
    }

    function delete($id)
    {
        $query = "DELETE FROM Lecturers WHERE id = ?";
        return $this->execute($query, [$id]);
    }
}
?>