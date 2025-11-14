<?php
require_once 'config/connection.php';
require_once 'models/Course.php';
require_once 'models/Lecturer.php';

// controller courses
class CourseController
{
    // course and lecturer models
    private $course;
    private $lecturer;

    // constructor to initialize models
    function __construct()
    {
        $this->course = new Course();
        $this->lecturer = new Lecturer();
    }

    //method to display the list of courses and handle edit requests
    public function index()
    {
        // initialize variables
        $data_list = [];
        $data_to_edit = null;
        $lecturers = [];

        // fetch all courses and lecturers
        $this->course->getCourse();
        $data_list = $this->course->fetchAll();
        
        // fetch lecturers for dropdown
        $this->lecturer->getLecturer();
        $lecturers = $this->lecturer->fetchAll();
        
        // check if edit_id is set for editing a course
        if (isset($_GET['edit_id'])) {
            $this->course->getCourseById($_GET['edit_id']);
            $data_to_edit = $this->course->fetch();
        }

        // include view files
        include 'views/layout/header.php';
        include 'views/course.php';
        include 'views/layout/footer.php';
    }

    // Method to store a new course
    public function store($data)
    {
        $this->course->add($data);
        header("Location: index.php?controller=course&status=success_add");
    }

    // Method to update an existing course
    public function update($data)
    {
        $this->course->update($data);
        header("Location: index.php?controller=course&status=success_edit");
    }

    // Method to delete a course
    public function delete($id)
    {
        $this->course->delete($id);
        header("Location: index.php?controller=course&status=success_delete");
    }
}
?>