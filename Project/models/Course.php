<?php
require_once 'Model.php';

// course class model
class Course extends Model
{
    //  methods for course model
    function getCourse()
    {
        $query = "SELECT c.*, l.name AS lecturer_name
                  FROM courses c
                  LEFT JOIN lecturers l ON c.lecturer_id = l.id";
        return $this->execute($query);
    }

    // method to get course by id
    function getCourseById($id)
    {
        $query = "SELECT * FROM courses WHERE id = ?";
        return $this->execute($query, [$id]);
    }

    // method to add a new course
    function add($data)
    {
        $course_code = $data['course_code'];
        $course_name = $data['course_name'];
        $sks = $data['sks'];
        $lecturer_id = $data['lecturer_id'];

        $query = "INSERT INTO courses (course_code, course_name, sks, lecturer_id) VALUES ('$course_code', '$course_name', $sks, $lecturer_id)";

        return $this->execute($query);
    }

    // method to update an existing course
    function update($data)
    {
        $id = $data['id'];
        $course_code = $data['course_code'];
        $course_name = $data['course_name'];
        $sks = $data['sks'];
        $lecturer_id = $data['lecturer_id'];

        $query = "UPDATE courses SET course_code='$course_code', course_name='$course_name', sks=$sks, lecturer_id=$lecturer_id WHERE id=$id";
        return $this->execute($query);
    }

    // method to delete a course
    function delete($id)
    {
        $query = "DELETE FROM courses WHERE id=$id";
        return $this->execute($query);
    }
}
?>