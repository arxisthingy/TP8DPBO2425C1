<?php
require_once 'Model.php';

// lecturer class model
class Lecturer extends Model
{
    // methods for lecturer model
    function getLecturer()
    {
        $query = "SELECT * FROM Lecturers";
        return $this->execute($query);
    }

    // method to get lecturer by id
    function getLecturerById($id)
    {
        $query = "SELECT * FROM Lecturers WHERE id = ?";
        return $this->execute($query, [$id]);
    }

    // method to add a new lecturer
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

    // method to update an existing lecturer
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

    // method to delete a lecturer
    function delete($id)
    {
        $query = "DELETE FROM Lecturers WHERE id = ?";
        return $this->execute($query, [$id]);
    }
}
?>