<?php
require_once 'Model.php';

// publication class model
class Publication extends Model
{
    // methods for publication model
    function getPublication()
    {
        $query = "SELECT p.*, l.name AS lecturer_name
                  FROM publications p
                  LEFT JOIN lecturers l ON p.lecturer_id = l.id";
        return $this->execute($query);
    }

    // method to get publication by id
    function getPublicationById($id)
    {
        $query = "SELECT * FROM publications WHERE id = ?";
        return $this->execute($query, [$id]);
    }

    // method to add a new publication
    function add($data)
    {
        $title = $data['title'];
        $journal_name = $data['journal_name'];
        $year = $data['publication_year'];
        $lecturer_id = $data['lecturer_id'];

        $query = "INSERT INTO publications (title, journal_name, publication_year, lecturer_id)
                  VALUES ('$title', '$journal_name', $year, $lecturer_id)";

        return $this->execute($query);
    }

    // method to update an existing publication
    function update($data)
    {
        $id = $data['id'];
        $title = $data['title'];
        $journal_name = $data['journal_name'];
        $year = $data['publication_year'];
        $lecturer_id = $data['lecturer_id'];

        $query = "UPDATE publications
                  SET title='$title', journal_name='$journal_name', publication_year=$year, lecturer_id=$lecturer_id
                  WHERE id=$id";

        return $this->execute($query);
    }   

    // method to delete a publication
    function delete($id)
    {
        $query = "DELETE FROM publications WHERE id = $id";
        return $this->execute($query);
    }
}
?>